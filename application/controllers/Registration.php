<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function index()
    {

        $config = array(

            array(
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required'

            ),

            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required|trim|min_length[3]',

            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email', TRUE);
            $nama = $this->input->post('nama', TRUE);
            $password = md5($this->input->post('password'));
            $this->db->where('email', $email);
            $cek_email = $this->db->get('user');
            

            if ($cek_email->num_rows() > 0) {
                $this->session->set_flashdata('msg', '<div class="alert
            alert-danger" role="alert">Failed !. Email already Used !</div>');
                redirect('login');
            }

            $data = [
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
            ];

            $insert = $this->db->insert('user', $data);

            if($insert){
                $this->session->set_flashdata('msg', '<div class="alert
                alert-success" role="alert">Registrasi berhasil</div>');
                redirect('login');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert
                alert-danger" role="alert">Registrasi Tidak Berhasil silahkan dicoba kembali</div>');
                redirect('login');
            }
        }
        $this->load->view('view_registration');
    }

    public function aktivasi()
    {
        $token = $this->input->get('token');

        $this->db->where('token', $token);
        $cek = $this->db->get('user');
        $id = $cek->row()->id;
        if ($cek->num_rows() > 0) {
            $update = array(
                'status' => 1
            );
            $this->db->where('id', $id);
            $berhasil = $this->db->update('user', $update);
            if ($berhasil) {
                $this->session->set_flashdata('msg', '<div class="alert
                alert-success" role="alert">Sukses! Akun anda sudah di aktivasi</div>');
                redirect('login');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert
                    alert-danger" role="alert">Akun anda gagal di aktivasi!!</div>');
                redirect('login');
            }
        }
        $this->load->view('profile/login');
    }
}
