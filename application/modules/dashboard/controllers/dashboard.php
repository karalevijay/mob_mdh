<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $unset = array('vitals', 'meds', 'cholesterol', 'a1c', 'goals', 'questions');
        $this->session->unset_userdata($unset);
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->template->load_template('template', 'dashboard_view', $this->template_data);
    }

    public function alert()
    {
        $this->template->load_template('template', 'alerts', $this->template_data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */