<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        //set rules form validation
        $this->form_validation->set_rules('username', 'Username or Numberphone', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Sign In";
            $this->load->view('templates/header_auth', $data);
            $this->load->view('auth/index');
            $this->load->view('templates/footer_auth');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->db->where('username', $username);
            $this->db->or_where('phone_number', $username);
            $user = $this->db->get('user')->row_array();
            var_dump($user);
            if ($user) {
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'username' => $user['username'],
                            'role_id' => $user['role_id'],
                            'user_id' => $user['user_id']
                        ];

                        $this->session->set_userdata($data);

                        if ($user['role_id'] == 1) {
                            redirect('admin');
                        } else {
                            redirect('employee');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="col-10 alert alert-danger" role="alert">
                                                        Your password is wrong!
                                                        </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="col-10 alert alert-danger" role="alert">
                                                        Your account has not been approved by admin!
                                                        </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="col-10 alert alert-danger" role="alert">
                                                        Your account was not found!
                                                        </div>');
                redirect('auth');
            }
        }
    }

    public function signup()
    {
        $this->form_validation->set_rules('name', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|min_length[3]|integer');
        $this->form_validation->set_rules('address', 'Address', 'required|trim|min_length[3]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[4]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Sign Up";
            $this->load->view('templates/header_auth', $data);
            $this->load->view('auth/signup');
            $this->load->view('templates/footer_auth');
        } else {

            $datauser  = [
                'role_id' => 2,
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'name' => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'phone_number' => $this->input->post('phone_number'),
                'gender' => $this->input->post('gender'),
                'is_active' => 0,
                'image' => "default.jpg",
                'created' => time()
            ];
            $this->db->insert('user', $datauser);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                                                        Your account has been created, please wait admin to accept!
                                                        </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        unset(
            $_SESSION['username'],
            $_SESSION['role_id'],
            $_SESSION['user_id'],
        );
        $this->session->set_flashdata('message', '<div class=" col-10 alert alert-success" role="alert">
                                                        Your succesced logout!
                                                        </div>');
        redirect('auth');
    }
}
