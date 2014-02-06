<?php

class MY_Controller extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('uid') != null)
        {
            return true;
        }
        else
        {
            $newdata = array('error' => "<font color='black'>Please log in below:</font>");
            $this->session->set_flashdata($newdata);
            redirect('/user/login');
        }
    }

}
