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
            
            $test = 1;
            for ( $a = $number; $a >= 1; $a--) {
                for ( $b = $number; $b > $a; $b--) {
                   echo "&nbsp";
                }
                for ( $c = $test++; $c < ($a * 1); $c++) {
                   echo $c;
                }
                
              echo "<br>";
            }
            echo "<a href='http://localhost/test_bca/test1'>Back</a>";
        
    }
}
