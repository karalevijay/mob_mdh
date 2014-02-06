<?php

// User authentication model
class Bp_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    function get_single_bp($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/getbpbyid/format/json';

        $curl_post_data['uid'] = $this->session->userdata('uid');
        
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if ($decoded === -1)
        {
            return -1;
        }
        else
        {
            Switch ($decoded->returnCode)
            {
                case 0:
                    $newdata = json_decode(json_encode($decoded), true);
                    return $newdata;
                default:
                    return $decoded->returnCode;
            }
        }
    }
    
    function get_bp()
    {
        $service_url = api_url() . 'med/mobile/numbersbpget/format/json';
        $curl_post_data = array();
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['from_date'] ='2000-01-01';
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if ($decoded === -1)
        {
            return -1;
        }
        else
        {
            Switch ($decoded->returnCode)
            {
                case 0:
                    $newdata = json_decode(json_encode($decoded), true);
                    return $newdata;
                    break;
                default:
                    return $decoded->returnCode;
            }
        }
    }

    
    function add_bp($data = array())
    {

        $service_url = api_url() . 'med/mobile/numbersbpadd/format/json';
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
    
    function update_bp($data = array())
    {

        $service_url = api_url() . 'med/mobile/numbersbpupdate/format/json';
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
            if(isset($decoded->returnCode))
            {
                return $decoded->returnCode;
            }
            else
            {
                   return -1;
            }
        }
    }

    
}
