<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test4 extends CI_Controller
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

            $data['title'] = 'Test4';
            $data2['isi'] = $this->load->view('view_test4', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }

    public function action_test()
    {
        
            $number1 = $this->input->post('number1');
            $number2 = $this->input->post('number2');
           
            for($a= $number1;$a <= $number2;$a++){
                for($b = $number1;$b <= $number2;$b++){
                    if($a > 1 && $a == $b){
                        for($c = 1; $c< $b; $c++ ){
                            echo $b;
                        }
                    }
                    echo $b ;
                    
                }
               
                echo "<br>";
            }

            echo "<a href='http://localhost/test_bca/test4'>Back</a>";
        
    }
}
