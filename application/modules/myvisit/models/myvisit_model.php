<?php

// User authentication model
class Myvisit_model extends My_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_notes($app_id)
    {
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['app_id'] = $app_id;
        $data['meds'] = $this->get_meds_notes($app_id);
        $data['cholesterol'] = $this->get_cholesterol($curl_post_data);
        $data['a1c'] = $this->get_a1c($curl_post_data);
        $data['vitals'] = $this->get_vitals();
        return $data;
    }



    function get_meds_notes($app_id)
    {
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['app_id'] = $app_id;
        $service_url = api_url() . 'med/mobile/visitmednotes/format/json';
        $curl = curl_init($service_url);
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function add_update_meds($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitmednotesedit/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
        {
            return -1;
        }
        else
        {
            Switch ($decoded->returnCode)
            {
                case 0:
                    return 0;
                    break;
                default:
                    return $decoded->returnCode;
            }
        }
    }

    function update_goals($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitgoalsupdate/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function add_goals($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitgoalsadd/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function get_goals()
    {
        $service_url = api_url() . 'med/mobile/visitgoalsget/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['from_date'] = '2000-01-01';
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function update_q($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitqsupdate/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function add_q($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitqsadd/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function get_q()
    {
        $service_url = api_url() . 'med/mobile/visitqsget/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['from_date'] = '2000-01-01';
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function add_prescriber($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/addprescriber/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
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

    function get_premium_user()
    {
        $service_url = api_url() . 'med/mobile/getprofile/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
        {
            return -1;
        }
        else
        {
            Switch ($decoded->returnCode)
            {
                case 0:
                    if ($decoded->user_subscription === false)
                        return 1;
                    else
                        return 0;
                    break;
                default:
                    return $decoded->returnCode;
            }
        }
    }

    function get_name()
    {
        $service_url = api_url() . 'med/mobile/getprofile/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
        {
            return -1;
        }
        else
        {
            if ($decoded->returnCode == 0)
            {
                return $decoded->user_profile->first_name;
            }
            else
            {
                return 'user';
            }
        }
    }

    function get_single_med($med_id = null)
    {
        if ($med_id == NULL)
        {
            return -2;
        }
        $flag = $this->get_meds();

        if (!is_array($flag))
        {
            return $flag;
        }
        else
        {
            foreach ($flag['patient_drugs_base'] as $data)
                if ($data['patient_drug_id'] == $med_id)
                {
                    return $data;
                }
        }
    }

    function get_meds()
    {
        $service_url = api_url() . 'med/mobile/visitmeds/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['app_id'] = 0;
        $decoded = $this->curl_call($service_url, $curl_post_data);

        if (!is_object($decoded))
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

    function delete($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/deleteappointment/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
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

    function add_vitals($curl_post_data = array())
    {

        $service_url = api_url() . 'med/mobile/visitvitals/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
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

    function update_vitals($curl_post_data = array())
    {

        $service_url = api_url() . 'med/mobile/visitvitalsedit/format/json';
        $curl = curl_init($service_url);

        $curl_post_data['uid'] = $this->session->userdata('uid');
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

    function get_vitals()
    {

        $service_url = api_url() . 'med/mobile/visitvitalsget/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['app_id'] = $this->session->userdata('app_id');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
        {
            return -1;
        }
        else
        {
            $newdata = json_decode(json_encode($decoded), true);
            if ($newdata['returnCode'] == 0)
            {
                return $newdata['visitvitals'];
//                $date_ap = $this->get_appointments();
//                if (is_array($date_ap))
//                {
//                    foreach ($date_ap['appointments'] as $app)
//                    {
//                        foreach ($newdata['visitvitals'] as $vitals)
//                            if (date('d-m-y', strtotime($vitals['create_time'])) == date('d-m-y', strtotime($app['date'])))
//                            {
//                                return $vitals;
//                            }
//                    }
//                }
            }
            else
            {
                return $decoded->returnCode;
            }
        }
    }

    function get_reasons()
    {
        $service_url = api_url() . 'med/mobile/getvoreasons/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function get_prescribers()
    {
        $service_url = api_url() . 'med/mobile/getproviders/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function get_cholesterol($curl_post_data = array())
    {

        $service_url = api_url() . 'med/mobile/visitlabscholesterolget/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function add_cholesterol($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitlabscholesteroladd/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);

        if (!is_object($decoded))
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

    function update_cholesterol($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitlabscholesterolupdate/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $data = $this->get_cholesterol(array('app_id' => $curl_post_data['app_id']));
        $curl_post_data['lab_cholesterol_id'] = $data['lab_cholesterol'][0]['lab_cholesterol_id'];
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function get_a1c($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitlabsa1cget/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function add_a1c($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/visitlabsa1cadd/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');

        $decoded = $this->curl_call($service_url, $curl_post_data);

        if (!is_object($decoded))
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

    function update_a1c($curl_post_data = array())
    {

        $service_url = api_url() . 'med/mobile/visitlabsa1cupdate/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $data = $this->get_a1c(array('app_id' => $curl_post_data['app_id']));
        $curl_post_data['lab_a1c_id'] = $data['lab_a1c'][0]['lab_a1c_id'];
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    function get_appointments()
    {

        $service_url = api_url() . 'med/mobile/listmyvisits/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['from_date'] = date('Y-M-d',now());
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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
    function get_appointment_by_id($app_id)
    {
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $curl_post_data['appid'] = $app_id;
        $service_url = api_url() . 'med/mobile/getappointmentbyid/format/json';
        $curl = curl_init($service_url);
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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
    public function add_appointment($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/addappointment/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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

    public function get_reminder_text($curl_post_data = array())
    {
        $service_url = api_url() . 'med/mobile/getremindertextbyid/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
        $decoded = $this->curl_call($service_url, $curl_post_data);
        if (!is_object($decoded))
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
    
    function update($curl_post_data = array())
    {

        $service_url = api_url() . 'med/mobile/editappointment/format/json';
        $curl = curl_init($service_url);
        $curl_post_data['uid'] = $this->session->userdata('uid');
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

}
