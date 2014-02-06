<?php

class MY_Model extends CI_Model
{

    function curl_call($service_url, $curl_post_data = array())
    {
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
        $curl_response = curl_exec($curl);
        if ($curl_response === false)
        {
            $info = curl_getinfo($curl);
            curl_close($curl);
            return -1;
        }
        else
        {
            curl_close($curl);
            $decoded = json_decode($curl_response);
            return $decoded;
        }
    }

}

?>