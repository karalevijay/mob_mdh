<?php

// User authentication model
class Aonec_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_single_aonec($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/geta1cbyid/format/json';

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

    function get_aonec()
    {
        $service_url = api_url() . 'med/mobile/numbersa1cget/format/json';
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
                default:
                    return $decoded->returnCode;
            }
        }
    }

    function update_aonec($data = array())
    {

        $service_url = api_url() . 'med/mobile/numbersa1cupdate/format/json';
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

    function add_aonec($data = array())
    {

        $service_url = api_url() . 'med/mobile/numbersa1cadd/format/json';
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
            if (isset($decoded->returnCode))
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
