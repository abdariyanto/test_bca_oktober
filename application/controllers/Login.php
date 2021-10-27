<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function index()
    {
        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[3]',
            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $cek = $this->db->get('user');
            $status = $cek->row()->status;
            if ($cek->num_rows() > 0) {
               
                    $this->session->set_userdata('login', TRUE);
                    $this->session->set_userdata('nama', $cek->row()->nama);
                    $this->session->set_userdata('id', $cek->row()->id);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation !. You have been Login</div>');
                    redirect('admin');
               
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Sorry !. Email dan Password Salah</div>');
                redirect('login');
            }
        }
        $this->load->view('view_login');
    }
}
