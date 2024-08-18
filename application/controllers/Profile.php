<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Profile";
        $data['user'] = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row_array();
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar');
        $this->load->view('profile/index');
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim|numeric');

        $data['user'] = $this->db->get_where('user', ['user_id' => $this->session->userdata('user_id')])->row_array();

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger col-3" role="alert">
            Failed to edit profile!
            </div>');
            redirect('profile');
        } else {

            $imagenew = $_FILES['imagenew']['name'];
            $image = $this->input->post('imageold');

            if ($imagenew) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('imagenew')) {
                    if ($image != "default.jpg") {
                        $path = 'assets/img/profile/';
                        unlink(FCPATH . $path . $image);
                    }
                    $image = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger col-4" role="alert">' . $this->upload->display_errors() . '
                    </div>');
                    redirect('profile');
                }
            }

            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'address'  => $this->input->post('address'),
                'phone_number'  => $this->input->post('phone_number'),
                'image' => $image
            );
            $this->db->where('user_id', $this->input->post('user_id'));
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success col-3" role="alert">
            Edit profile success!
            </div>');
            redirect('profile');
        }
    }
}
