<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mymedsimp extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mymedsimp_model');
         $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        
        $this->template->load_template('template', 'myMedsimple', $this->template_data);
    }
    public function myMedsimple_view()
    {
         $this->template->load_template('template', 'myMedsimple_mymeds', $this->template_data);
    }
    public function myMed_adToMyMedlist()
    {
         $this->template->load_template('template', 'myMedsimple_adToMyMedlist', $this->template_data);
        
    }
    public function add_medlist()
    {
        $form_data['old_data'] = $_POST;
        if ($_POST['sdf'] != '' || $_POST['sds'] != '' || $_POST['hm'] != '' || $_POST['wmtf'] != '' || $_POST['si'] != '')
        {
            
            $flag = $this->mymedsimp->save_med($form_data['old_data']);
            if ($flag == 0)
            {
                $form_data['old_data'] = '';
                $newdata = array('error' => "<font color='green'>Med information saved!</font>");
            }
            
        }
        else
        {
            $newdata = array('error' => "<font color='red'>Please enter at least one Med.</font>");
        }

        $this->session->set_flashdata($newdata);
        redirect("mymedsimp/myMed_adToMyMedlist");
    }

    public function test()
    {
        $data=array('abc'=>'test','name'=>'vishal');
        $flag = $this->mymedsimp_model->get_meds($data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */