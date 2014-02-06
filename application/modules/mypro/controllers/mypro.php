<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Mypro extends My_Controller
{
    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());
    public $tab;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('myprofile_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->template->load_template('template', 'myProfile', $this->template_data);
    }

    public function abt_my_profile()
    {
        $flag = $this->myprofile_model->get_profile_detail();
        $this->template_data['content_data'] = $flag;
         if (is_array($flag))
        {
            $this->template_data['content_data']['data'] = $flag;
             $this->template_data['head_data'] = $this->load->view('validation_pro', '', true);
            $this->template->load_template('template', 'myProfile_AboutMe', $this->template_data);
         }
        else
        {
               $newdata = array('error' => "<font color='red'>Problem in Loading Page. Please Try Again.</font>");
               redirect("mypro/abt_my_profile");
        }
    }
     public function abt_my_profile_submit()
    {
        $form_data['old_data'] = $_POST;

        if ($_POST['mydate'] == '' || $_POST['FN'] == '')
        {
            $newdata = array('error' => "<font color='red'>Plaese Fill all the details.</font>");
            $this->session->set_flashdata($newdata);
            redirect("mypro/abt_my_profile");
        }
       else
        {
             redirect("mypro/abt_my_profile");
        }
    }
    public function Edit_myProvider($p_uid)
    {
        $flag = $this->myprofile_model->get_my_provider();
        if (is_array($flag))
        {
            $i = sizeof($flag['prescribers']);
            for($j=0;$j<$i;$j++)
            {
                if($flag['prescribers'][$j]['prescriber_uid'] == $p_uid)
                {
                        $this->template_data['content_data']= $flag['prescribers'][$j];
                        $this->template->load_template('template', 'myProfile_EditProvider', $this->template_data);
                        break;
                }
            }
        }
      }
     public function Edit_Provider()
    {
        $this->template->load_template('template', 'myProfile_EditProvider', $this->template_data);
    }  
    public function Edit_Pharmacy()
    {
        $this->template->load_template('template', 'myProfile_EditPharmacy', $this->template_data);
    }

    public function submit_provider()
    {
        $form_data['old_data'] = $_POST;
        if ($_POST['pro_name'] == '')
        {
            $newdata = array('error' => "<font color='red'>Please Enter Provider name.</font>");
            $this->session->set_flashdata($newdata);
            redirect("mypro/Edit_Provider");
        }
        if ($_POST['phone'] == '')
        {
            $newdata = array('error' => "<font color='red'>Please Enter Phone Number.</font>");
            $this->session->set_flashdata($newdata);
            redirect("mypro/Edit_Provider");
        }
        $data = array('result_Provider_Name' => $this->check_null($_POST['pro_name']),
                'result_Speciality' => $this->check_null($_POST['Spe']),
                'result_Street' => $this->check_null($_POST['Street']),
                'result_Zip_code' => $this->check_null($_POST['Zip']),
                'result_City' => $this->check_null($_POST['City']),
                'result_State' => $this->check_null($_POST['State']),
                'result_Phone' => $this->check_null($_POST['phone']),
                'result_My_Notes' => $this->check_null($_POST['notes']),
                );
        $flag=$this->myprofile_model->Save_Provider($data);
        if($flag == 0)
        {
                $form_data['old_data'] = '';
                $newdata = array('error' => "<font color='green'>Provider information saved!</font>");
        }
        
            else if ($flag == 4)
            {
                $newdata = array('error' => "<font color='red'>Invalid User!</font>");
            }
        //$this->template->load_template('template', 'myProfile_AddProvider', $this->template_data);
    }
    public function Edit_myPharmacy($p_id)
    {
        $xyz=array('pharmacy_uid'=>$p_id);
        $flag = $this->myprofile_model->get_my_pharmacy($xyz);
        $this->template_data['content_data'] = $flag;
        if (is_array($flag))
        {
            $i = sizeof($flag['pharmacies']);
            for($j=0;$j<$i;$j++)
            {
                if($flag['pharmacies'][$j]['pharmacy_uid'] == $p_id)
                {
                        $this->template_data['content_data']= $flag['pharmacies'][$j];
                        $this->template->load_template('template', 'myProfile_EditPharmacy', $this->template_data);
                        break;
                }
            }
        }
        else
        {
            $newdata = array('error' => "<font color='red'>Problem in Loading Page. Please Try Again.</font>");
        }
    }
    public function save_myPharmacy()
    {
        $form_data['old_data'] = $_POST;
        if ($_POST['pha_name'] == '')
        {
            $newdata = array('error' => "<font color='red'>Please Enter Pharmacy name.</font>");
            $this->session->set_flashdata($newdata);
            redirect("mypro/Edit_Pharmacy");
        }
        if ($_POST['Phone'] == '')
        {
            $newdata = array('error' => "<font color='red'>Please Enter Phone Number.</font>");
            $this->session->set_flashdata($newdata);
            redirect("mypro/Edit_Pharmacy");
        }
        $data = array('pharmacy_name' => $_POST['pha_name'],
                'pharmacyStreet' => $_POST['Street'],
                'pharmacyCity' => $_POST['city'],
                'pharmacyState' => $_POST['State'],
                'pharmacyZip' => $_POST['Zip'],
                'pharmacyPhone' => $_POST['Phone'],
                'pharmacyFax' => $_POST['Fax'],
                'pharmacyEmail' => $_POST['Email'],
                'pharmacyUrl' => $_POST['web'],
                'op'=>'update',
                'pharmacy_id'=>$_POST['pha_id']
                );
               
        $flag=$this->myprofile_model->save_my_pharmacy($data);
        if($flag == 0)
        {
                $form_data['old_data'] = '';
                $newdata = array('error' => "<font color='green'>Pharmacy information saved!</font>");
                $this->session->set_flashdata($newdata);
                redirect('mypro/add_healthteam');
        }
        if($flag == -1)
        {
                $newdata = array('error' => "<font color='green'>Sever has problem please reload the page!</font>");
                $this->session->set_flashdata($newdata);
                redirect('mypro/add_healthteam');
        }
        else if ($flag == 3)
        {
                $newdata = array('error' => "<font color='red'>Missing Parameter!</font>");
                $this->session->set_flashdata($newdata);
                redirect('mypro/Edit_myPharmacy');
        }
    }
     public function add_Provider()
    {
        $this->template->load_template('template', 'myProfile_AddProvider', $this->template_data);
    }
    public function add_Pharmacy()
    {
        $this->template->load_template('template', 'myProfile_AddPharmacy', $this->template_data);
    }
    public function add_healthteam()
    {
        $flag = $this->myprofile_model->get_my_provider();
        $this->template_data['content_data']['provider'] = $flag;
        $flag = $this->myprofile_model->get_my_pharmacy();
        $this->template_data['content_data']['pharmacy'] = $flag;
        $this->template->load_template('template', 'myProfile_HealthTeam', $this->template_data);
     }
    public function Setting()
    {
        $this->template->load_template('template', 'myProfile_changePassword', $this->template_data);
    }

}

// $flag = $this->myprofile_model->update_sugar($data);
