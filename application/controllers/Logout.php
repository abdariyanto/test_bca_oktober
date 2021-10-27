<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function index()
    {
        $this->session->unset_userdata('name');
        session_destroy();
        $this->session->set_flashdata('msg', '<div class="alert
		alert-success" role="alert">Congratulation !. You have been Logged out</div>');
        redirect('login');
    }
}
