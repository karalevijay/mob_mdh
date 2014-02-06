<?php

class S_Controller extends MX_Controller
{

    public function is_Logged_In()
    {
        if (isset($this->session->userdata('uid')))
            redirect('/dashbaord');
        else
        {
            return false;
        }
    }

}
