<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mynumbers extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mynumbers_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->template_data['content_data']['a1c'] = $this->mynumbers_model->get_latest_a1c();
        $this->template_data['content_data']['weight'] = $this->mynumbers_model->get_latest_weight();
        $this->template_data['content_data']['cholesterol'] = $this->mynumbers_model->get_latest_cholesterol();
        $this->template_data['content_data']['bp'] = $this->mynumbers_model->get_latest_bp();
        if ($this->template_data['content_data']['a1c'] == -1 || $this->template_data['content_data']['weight'] == -1 || $this->template_data['content_data']['cholesterol'] == -1 || $this->template_data['content_data']['bp'] == -1)
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        $this->template->load_template('template', 'myNumbers_view', $this->template_data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */