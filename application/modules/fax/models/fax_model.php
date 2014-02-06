<?php

// User authentication model
class Fax_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function send_fax($data = array())
    {

//        $data['number']=5156435149;
//        $data['data']='this will be the fax text';
        
//        free test keys
//          'api_key' => '0d6e33716cdf8c2eac602e9a839c2a3ea3e2713f',
//            'api_secret' => '365d0ae7bf0db435f643ab91b59b9396e7d7da08',
        
//        purchased version
//        'api_key' => 'b7cd9e4966fd29e477468544b161d6e9a5e125b2',
//            'api_secret' => 'd48e4bff985fb9e0afb6924682e90c77c6eb1735',
        
        $service_url = 'https://api.phaxio.com/v1/send';
        $curl_post_data = array(
            'to' => $data['number'],
            'api_key' => 'b7cd9e4966fd29e477468544b161d6e9a5e125b2',
            'api_secret' => 'd48e4bff985fb9e0afb6924682e90c77c6eb1735',
            'string_data' => $data['data'],
            'string_data_type'=>'html'
        );
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $curl_response = curl_exec($curl);
        if ($curl_response === false)
        {
            return -1;
        }
        else
        {
            $decoded = json_decode($curl_response);
            $newdata = json_decode(json_encode($decoded), true);

            if ($newdata['success'] == true)
            {
                return 1;
            }
            else
            {
                return 2;
            }
        }
    }

}

//https://api.phaxio.com/v1/send?to=4141234567&api_key=0d6e33716cdf8c2eac602e9a839c2a3ea3e2713f&api_secret=365d0ae7bf0db435f643ab91b59b9396e7d7da08&string_data=test
