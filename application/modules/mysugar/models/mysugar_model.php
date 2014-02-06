<?php

class Mysugar_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function update_sugar($data = array())
    {
        $service_url = api_url() . 'med/mobile/editsugar/format/json';
        $curl_post_data = array();
        $curl_post_data = $data;
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if ($decoded === -1)
        {
            return -1;
        }
        else if ($decoded->returnCode == 0)
        {
            return 0;
        }
        else if ($decoded->returnCode == 4)
        {
            return 4;
        }
        else
        {
            return 14;
        }
    }

    function pastdata($data = array())
    {

        $service_url = api_url() . 'med/mobile/getsugarsbyrange/format/json';
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
            Switch ($decoded->returnCode)
            {
                case 0:
                    $newdata = json_decode(json_encode($decoded->sugarsrange), true);
                    return $newdata;
                    break;
                default:
                    return $decoded->returnCode;
            }
        }
    }

    function delete($data = array())
    {

        $service_url = api_url() . 'med/mobile/deletesugar/format/json';
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

    function save_sugar($data = array())
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

    function graph($data = 1)
    {
        $service_url = api_url() . 'med/mobile/sugargraphdata/format/json';
        $curl_post_data = array();
        $curl_post_data['date_range'] = $data;
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
                    break;
                case 3:
                    return 3;
                    break;
                case 4:
                    return 4;
                    break;
                case 13:
                    return 13;
                    break;
                case 14:
                    return 14;
                    break;
                default:
                    return -1;
            }
        }
    }

}
