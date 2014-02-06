<?php

class Mymedsimp_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_meds($data = array())
    {
        var_dump($data);
    }
     function save_Med($data = array())
    {

        $service_url = api_url() . 'med/mobile/addsugar/format/json';
        $curl_post_data = array();
        $curl_post_data = $data;
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if ($decoded === -1)
        {
            return -1;
        }
        else
        {
            return $decoded->returnCode;
        }
    }


}
