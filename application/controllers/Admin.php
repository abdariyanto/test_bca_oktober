<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('login') != TRUE) {
            redirect('auth');
        } else {
            $data['title'] = 'Web Dashboard';
            $data2['isi'] = $this->load->view('view_admin', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }

    
}
