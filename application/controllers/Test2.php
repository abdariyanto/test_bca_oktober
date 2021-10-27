<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test2 extends CI_Controller
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

            $data['title'] = 'Test2';
            $data2['isi'] = $this->load->view('view_test2', $data, TRUE);
            $this->load->view('main_view', $data2);
        }
    }

    public function action_test()
    {
        
            $text = $this->input->post('text');
            $chars = str_split($text);
            $total = strlen($text);
            $test = 1;
             for($i=$chars; $i <= $total;$i++){
                    
                }
            foreach($chars as $char)
            {
                for($i= 1; $i <= $test;$i++){
                    echo " ";
                }
                $test++;
               
                echo  $char . "<br>";
            }
            echo "<a href='http://localhost/test_bca/test2'>Back</a>";
        
    }
}
