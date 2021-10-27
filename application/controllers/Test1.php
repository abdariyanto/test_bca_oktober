<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test1 extends CI_Controller
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

            $data['title'] = 'Test1';
            $data2['isi'] = $this->load->view('view_test1', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }

    public function action_test()
    {
        
            $number = $this->input->post('number');
            
            for ($i=1; $i<=$number; $i++){
                for ($j=$i; $j<=$number; $j++){
                echo $j;
                }
                echo "<br>";
            }

            echo "<a href='http://localhost/test_bca/test1'>Back</a>";
        
    }
}
