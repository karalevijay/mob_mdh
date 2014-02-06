<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myprofile_model
 *
 * @author User
 */
class myprofile_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_profile_detail()
    {

        $service_url = api_url() . 'med/mobile/getprofile/format/json';
        $curl_post_data = array();
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
                default:
                    return $decoded->returnCode;
            }
        }
    }

    function get_my_provider()
    {
        $data = '';
        $service_url = api_url() . 'med/mobile/getproviders/format/json';
        $curl_post_data = array();
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
                default:
                    return $decoded->returnCode;
            }
        }
    }

    function Save_Provider($data = array())
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

    function get_my_pharmacy()
    {
        $data = '';
        $service_url = api_url() . 'med/mobile/getpharmacylist/format/json';
        $curl_post_data = array();
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
                 
                default:
                    return $decoded->returnCode;
            }
        }
    }

    function save_my_pharmacy($dataary = array())
    {
        $service_url = api_url() . 'med/mobile/addupdatepharmacy/format/json';
        $curl_post_data = array();
        $curl_post_data = $dataary;
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
                    $newdata = json_decode(json_encode($decoded), true);
                    return $newdata;
                    break;
              default :
                   return $decoded->returnCode;
            }
        }
    }

}
