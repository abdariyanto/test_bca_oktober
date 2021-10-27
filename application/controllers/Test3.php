<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test3 extends CI_Controller
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

            $data['title'] = 'Test3';
            $data2['isi'] = $this->load->view('view_test3', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }

    public function action_test()
    {
        
            $number1 = $this->input->post('number1');
            $number2 = $this->input->post('number2');
           
            $test = 1;
            for ( $a = $number2; $a >= $number1; $a--) {
                for ( $b = $number2+1; $b > $a; $b--) {
                   echo "&nbsp";
                }
                for ( $c = $number1++; $c < ($a+1 * 1); $c++) {
                   echo $c;
                }
                
              echo "<br>";
            }
          

            echo "<a href='http://localhost/test_bca/test3'>Back</a>";
        
    }
}
