<?php

// User authentication model
class Cholesterol_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    function get_single_cholesterol($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/getcholesterolbyid/format/json';

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
    
    function get_cholesterol()
    {
        $service_url = api_url() . 'med/mobile/numberscholesterolget/format/json';
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

    
    function add_cholesterol($data = array())
    {

        $service_url = api_url() . 'med/mobile/numberscholesteroladd/format/json';
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
    
    function update_cholesterol($data = array())
    {

        $service_url = api_url() . 'med/mobile/numberscholesterolupdate/format/json';
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
