<?php

// User authentication model
class Auth_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function verify($data = array())
    {
        $service_url = api_url() . 'med/mobile/getuserdetails/format/json';
        $curl_post_data = array(
            'email' => $data['email']
        );
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
        {
            return -1;
        }
        else if ($decoded->returnCode == 0)
        {

            if (do_hash($data['password'], 'md5') == $decoded->user->password)
            {

//                if ($decoded->user->validation_key != null)
//                {
//
//                    $newdata1 = array(
//                        'error' => "Please Verify Your Email ID!"
//                    );
//                    $this->session->set_flashdata($newdata1);
//                }
                $newdata = array(
                    'uid' => $decoded->user->uid,
                );
                $this->session->set_userdata($newdata);
                return 0;
            }
            else
            {
                return 1;
            }
        }
        else if ($decoded->returnCode == 4)
        {
            return 4;
        }
    }

    function register($data = array())
    {

        $service_url = api_url() . 'med/mobile/registermobilesite/format/json';
        $curl = curl_init($service_url);
        $curl_post_data = array(
            'password' => $data['password'],
            'email' => $data['email'],
            'firstname' => $data['firstname'],
            'diabetestype' => $data['diabetestype'],
            'zip' => $data['zip']
        );
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
        {
            return -1;
        }
        else if ($decoded->returnCode == 0)
        {

            $newdata = array(
                'uid' => $decoded->uid
            );
            $this->session->set_userdata($newdata);
            return 0;
        }
        else if ($decoded->returnCode == 1)
        { //email already registered
            return 1;
        }
        else if ($decoded->returnCode == 2)
        { //email already registered
            return 2;
        }
        else
        { // unknown error
            return -2;
        }
    }

    function forgot_password($data = array())
    {

        $service_url = api_url() . 'med/mobile/forgotpassword/format/json';
        $curl = curl_init($service_url);
        $curl_post_data = array(
            'email' => $data['email']
        );
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
        {
            return -1;
        }
        else
        {
            return $decoded->returnCode;
        }
    }

    function destroy()
    {
        $array_items = array('uid' => '');
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
    }

}
