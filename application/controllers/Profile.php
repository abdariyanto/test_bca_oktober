<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        } else {
            $id = $this->input->get('id');

            $this->db->where('id', $id);

            $data['z'] = $this->db->get('user');
            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();

            $data['title'] = 'Profile';
            $data2['isi'] = $this->load->view('view_profile', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }
    public function list_profile()
    {
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        } else {
            $data['z'] = $this->db->get('user')->result();
            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();

            $data['title'] = 'Profile';
            $data2['isi'] = $this->load->view('view_listprofile', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }


    public function editProfile()
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

        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == true) {
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $id     = $this->input->post('id', TRUE);

            $update = array(
                'nama' =>  $nama,
                'email' =>  $email,
            );
            $this->db->where('id', $id);
            $iya = $this->db->update('user', $update);
            if ($iya) {

                $this->session->set_flashdata('msg', '<div class="alert

                    alert-success" role="alert">Success Edit Profile</div>');

                redirect('profile/list_profile');
            } else {

                $this->session->set_flashdata('msg', '<div class="alert

                 alert-danger" role="alert">Sorry! Failed Update Profile</div>');

                redirect('profile/editprofile');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert

            alert-danger" role="alert">Sorry! Failed Update Profile</div>');

            redirect('profile/editprofile');
        }
    }

    public function tambahProfile()
    {
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        } else {
            $data['z'] = $this->db->get('user')->result();
            $data['user'] = $this->db->get_where('user', ['id' =>
            $this->session->userdata('id')])->row_array();

            $data['title'] = 'Profile';
            $data2['isi'] = $this->load->view('view_tambahprofile', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }

    public function tambahProfileAksi()
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
                redirect('profile/list_profile');
            }

            $data = [
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('msg', '<div class="alert
            alert-success" role="alert">Berhasil menambahkan user!</div>');
            redirect('profile/list_profile');
        }
    }


    public function deleteProfile()
    {
        $id = $this->input->get('id', TRUE);
        if ($id === $this->session->userdata['id']) {
            $this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Profile tidak berhasil dihapus karena sedang login!!</div>');
            redirect('profile/list_profile');
        }
        $this->db->where('id', $id);
        $delete = $this->db->delete('user');
        if ($delete) {
            $this->session->set_flashdata('msg', '<div class="alert
        alert-success" role="alert">Profile berhasil dihapus</div>');
            redirect('profile/list_profile');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Profile tidak berhasil dihapus!!</div>');
            redirect('profile/list_profile');
        }
    }

    public function forgotPassword()
    {
        $data['title'] = 'Forgot Password';
        $this->load->view('view_forgotpassword', $data);
    }

    public function forgotPasswordAksi()
    {

        $config = array(
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|trim'

            ),
        );

        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email', true);

            $this->db->where('email', $email);
            $get = $this->db->get('user');
            $config = [
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'protocol'  => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_user' => 'abdurrahman.ariyanto19@gmail.com',  // Email gmail
                'smtp_pass'   => '19@Riyanto',  // Password gmail
                'smtp_crypto' => 'ssl',
                'smtp_port'   => 465,
                'crlf'    => "\r\n",
                'newline' => "\r\n"
            ];

            $this->load->library('email', $config);

            if ($get->num_rows() > 0) {

                $random = md5(rand(0, 100) . rand(0, 2000) . $get->row()->email . 'riyan' . rand(1, 200) . date('D d m y H:i:s'));

                $this->email->from('abdurrahman.ariyanto19@gmail.com', 'Abdurrahman Ariyanto');
                $this->email->to($email);
                $this->email->subject('Request ubah password');
                $this->email->message("berikut linknya <a href='http://localhost/test_super/profile/gantipassword?token=$random'  target='_blank' rel='noopener'>Klik disini</a>");
                if ($this->email->send()) {
                    $update = array(
                        'token' => $random
                    );

                    $this->db->where('email', $email);
                    $this->db->update('user', $update);

                    $this->session->set_flashdata('msg', '<div class="alert
                    alert-success" role="alert">Sukses! email berhasil dikirim. Silahkan cek email anda</div>');
                    redirect('profile/forgotpassword');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert
                    alert-danger" role="alert">Email tidak berhasil dikirim!!</div>');
                    redirect('profile/forgotpassword');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Email tidak ada!!</div>');
                redirect('profile/forgotpassword');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert
			alert-danger" role="alert">Email tidak boleh kosong!!</div>');
            redirect('profile/forgotpassword');
        }
    }

    public function gantiPassword()
    {
        $token = $this->input->get('token');

        $this->db->where('token', $token);
        $cek = $this->db->get('user')->row_array();
        $data['get_id'] = $cek['id'];

        if ($data['get_id']) {
            $config = array(
                array(
                    'field' => 'password',
                    'label' => 'password',
                    'rules' => 'required|trim|min_length[3]|matches[password1]',
                    'error' => array(
                        'matches' => 'password dont match',
                        'min_length' => 'password to short',
                    )

                ),

                array(
                    'field' => 'password1',
                    'label' => 'password1',
                    'rules' => 'required|trim|matches[password]'
                ),
            );

            $this->form_validation->set_rules($config);
            $password = $this->input->post('password');
            $id = $this->input->post('id');

            if ($this->form_validation->run() == TRUE) {
                $update = array(
                    'password' => md5($password)
                );


                $this->db->where('id', $id);
                $berhasil = $this->db->update('user', $update);
                if ($berhasil) {
                    $this->session->set_flashdata('msg', '<div class="alert
                        alert-success" role="alert">Berhasil mengubah password!</div>');
                    redirect('login');
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert
                        alert-danger" role="alert">Tidak berhasil mengubah password!!</div>');
                    redirect('login');
                }
            }
            $data['title'] = 'Ganti Password';
            $this->load->view('view_gantipassword', $data);
        }
    }
}
