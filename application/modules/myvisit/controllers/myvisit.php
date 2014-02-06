<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myvisit extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->template_data['head_data'] = '';
        $this->load->model('myvisit_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function add_provider()
    {
        $this->template_data['head_data'] = $this->load->view('add_provider_js', '', true);
        $this->template->load_template('template', 'add_provider_view', $this->template_data);
    }

    public function submit_provider()
    {
        $data['prescriberName'] = trim($this->input->post('prescriberName', TRUE));
        $data['prescriberPhone'] = trim($this->input->post('prescriberPhone', TRUE));
        $data['notes'] = $this->input->post('notes', TRUE);
        $flag = $this->myvisit_model->add_prescriber($data);
        switch ($flag)
        {
            case -1:
                $newdata = array('error' => "<font color='red'>The prescriber name you entered already exists.</font>");
                break;
            case 0:
                $newdata = array('error' => "<font color='green'>Provider added successfully.</font>");
                $this->session->set_flashdata($newdata);
                redirect("myvisit/");
                die();
                break;
            case 3:
                $newdata = array('error' => "<font color='red'>Please Enter a Prescriber Name!</font>");
                break;
            default:
                $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                log_message('error', 'path:' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . ', Unexpected return value on time ' . date('d-m-Y H:i:s', now()) . ' for user id ' . $this->session->userdata('uid'));
        }
        $this->session->set_flashdata($newdata);
        redirect("myvisit/add_provider");
    }

    public function add_appointment($start = null) /// error while submiting the data
    {
        if ($this->input->post('prescriber', TRUE) == '')
        {
            $newdata = array('error' => "<font color='red'>Please add Provider first to add appointment!</font>");
            $this->session->set_flashdata($newdata);
            redirect("myvisit/");
        }
        else
        {
            $hr = $this->input->post('hour', TRUE);
            switch ($this->input->post('hour', TRUE))
            {
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                    $hr = 12 + $hr;
                    break;
                default:
                    $hr = $hr;
                    break;
            }
            $data['date'] = date("Y-m-d", strtotime($this->input->post('mydate', TRUE))) . ' ' . $hr . ':' . $this->input->post('minute', TRUE) . ':00';
            $data['prescriber'] = $this->input->post('prescriber', TRUE);
            $data['reason'] = $this->input->post('reason', TRUE);
            if ($this->input->post('reason', TRUE) == 'other')
            {
                $data['other_reason'] = $this->input->post('other', TRUE);
            }
            $data['reminder'] = ($this->input->post('reminder', TRUE) == 1) ? $this->input->post('reminder', TRUE) : null;
            $data['advance'] = 1;
            $flag = $this->myvisit_model->add_appointment($data);
            if (is_array($flag))
            {

                if ($start == 1)
                {
                    $this->start_todays_visit($flag['appt_id']);
                    die();
                }
                else if ($start == 2)
                {
                    $newdata = array('error' => "<font color='green'>Appointment added successfully.</font>");
                    $this->session->set_flashdata($newdata);
                    redirect('myvisit/finalize_app/' . $_POST['go_app_id']);
                }
                $newdata = array('error' => "<font color='green'>Appointment added successfully.</font>");
                $this->session->set_flashdata($newdata);
                redirect("myvisit/");
            }
            else
            {
                switch ($flag)
                {
                    case 16:
                        $newdata = array('error' => "<font color='red'>An appointment already exists on this date at that time. Please enter a different appointment time or select the existing appointment.</font>");
                        if ($start == 2)
                        {
                            $this->session->set_flashdata($newdata);
                            redirect('myvisit/finalize_app/' . $_POST['go_app_id']);
                        }
                        break;
                    default:
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                }
            }
        }

        $this->session->set_flashdata($newdata);
        redirect("myvisit/");
    }

    function edit_app($app_id = null)
    {
        $flag = $this->myvisit_model->get_appointment_by_id($app_id);
        if (is_array($flag))
        {
            $this->template_data['content_data']['appointment'] = $flag;
            $flag = $this->myvisit_model->get_reasons();
            $flag2 = $this->myvisit_model->get_prescribers();
            $this->template_data['content_data']['reason'] = $flag;
            $this->template_data['content_data']['prescriber'] = $flag2;
            $this->load->view('edit_appointment_view', $this->template_data);
        }
        else
        {
            echo -1;
        }
    }

    function open_add_app()
    {

        $flag = $this->myvisit_model->get_reasons();
        $flag2 = $this->myvisit_model->get_prescribers();
        $this->template_data['content_data']['reason'] = $flag;
        $this->template_data['content_data']['prescriber'] = $flag2;
        if (is_array($flag) && is_array($flag2))
            $this->load->view('add_appointment', $this->template_data);
        else
            echo -1;
    }

    function open_add_app_start()
    {

        $flag = $this->myvisit_model->get_reasons();
        $flag2 = $this->myvisit_model->get_prescribers();
        $this->template_data['content_data']['reason'] = $flag;
        $this->template_data['content_data']['prescriber'] = $flag2;
        if (is_array($flag) && is_array($flag2))
            $this->load->view('add_appointment_start', $this->template_data);
        else
            echo -1;
    }

    private function array_sort_by_column(&$array, $column, $direction = SORT_DESC)
    {
        $reference_array = array();

        foreach ($array as $key => $row)
        {
            $reference_array[$key] = $row[$column];
        }

        array_multisort($reference_array, $direction, $array);
    }

    public function delete($app_id = null)
    {
        $data['app_id'] = $app_id;
        $flag = $this->myvisit_model->delete($data);
        if (is_array($flag))
        {
            $newdata = array('error' => "<font color='green'>Appointment deleted successfully.</font>");
        }
        else
        {
            $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
        }
        $this->session->set_flashdata($newdata);
        redirect("myvisit/");
    }

    public function update_appointment()
    {

        $hr = $this->input->post('hour', TRUE);
        switch ($this->input->post('hour', TRUE))
        {
            case 0:
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
                $hr = 12 + $hr;
                break;
            default:
                $hr = $hr;
                break;
        }
        $data['date'] = date("Y-m-d", strtotime($this->input->post('mydate', TRUE))) . ' ' . $hr . ':' . $this->input->post('minute', TRUE) . ':00';
        $data['prescriber'] = $this->input->post('prescriber', TRUE);
        $data['reason'] = $this->input->post('reason1', TRUE);
        if ($this->input->post('reason1', TRUE) == 'other')
            $data['other_reason'] = $this->input->post('other', TRUE);
        $data['reminder'] = ($this->input->post('reminder', TRUE) == 1) ? $this->input->post('reminder', TRUE) : null;
        $data['advance'] = 1;
        $data['app_id'] = $this->input->post('app_id', TRUE);
        $flag = $this->myvisit_model->update($data);
        switch ($flag2)
        {
            case 3:
                $newdata = array('error' => "<font color='red'>All the fields are required.</font>");
                break;
            case 0:
                $newdata = array('error' => "<font color='green'>Appointment updated successfully.</font>");
                break;
            default:
                $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                break;
        }
        $this->session->set_flashdata($newdata);
        redirect("myvisit/");
    }

    public function index()
    {
        $unset = array('vitals', 'meds', 'cholesterol', 'a1c', 'goals', 'questions');
        $this->session->unset_userdata($unset);
        $flag = $this->myvisit_model->get_appointments();
        if (is_array($flag))
        {
            $this->template_data['content_data']['appointment'] = $flag;
        }
        else
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }
        $this->template_data['head_data'] = $this->load->view('add_appointment_js', '', true);
        $this->template->load_template('template', 'myvisits_view', $this->template_data);
    }

    function pastdata()
    {
        $end_date = date("Y-m-d", time());
        $time = strtotime("-14 days", time());
        $start_date = date("Y-m-d", $time);
        $data = array('start_date' => $start_date, 'end_date' => $end_date);
        $this->load->model('mysugar/mysugar_model');
        $flag = $this->mysugar_model->pastdata($data);
        return($flag);
    }

    private function sess()
    {
        $newdata = array('vitals' => 1, 'meds' => 1, 'cholesterol' => 1, 'a1c' => 1, 'goals' => 1, 'questions' => 1);
        $this->session->set_userdata($newdata);
    }

    public function start_todays_visit($app_id = null)
    {
        if ($this->input->post('app_id') != '' || $app_id != null)
        {
            $app_id = ($app_id == null) ? $this->input->post('app_id') : $app_id;
            $this->sess();
            $this->session->set_userdata(array('app_id' => $app_id));
            redirect("myvisit/todays_visit/" . $app_id . "/1");
        }
        else
        {
            $newdata = array('error' => "<font color='red'>Please Select Appointment Before Start.</font>");
            $this->session->set_flashdata($newdata);
            redirect("myvisit/");
        }
    }

    private function check_appointment($app_id = null)
    {
        $apps = $this->myvisit_model->get_appointments();
        if (is_array($apps))
        {
            $flag = false;
            foreach ($apps['appointments'] as $one_app)
            {
                if ($one_app['app_id'] == $app_id)
                {
                    $flag = true;
                    break;
                }
            }
            if ($flag == false)
            {
                $newdata = array('error' => "<font color='red'>Please Select Appointment Before Start!</font>");
                $this->session->set_flashdata($newdata);
                redirect("myvisit/");
                die();
            }
        }
        else
        {

            $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
            $this->session->set_flashdata($newdata);
            redirect("dasboard/");
        }
    }

    public function edit_meds($med_id = null)
    {
        if ($med_id != null)
        {
            $flag = $this->myvisit_model->get_single_med($med_id);
            if (!is_array($flag))
            {
                switch ($flag)
                {
                    case -1:
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        $this->session->set_flashdata($newdata);
                        break;
                    case -2:
                        $newdata = array('error' => '<font color="red">Invalid Parameter.</font>');
                        $this->session->set_flashdata($newdata);
                        break;
                }
            }
            else
            {
                $this->template_data['content_data']['edit_meds'] = $flag;
            }
            $this->load->view('edit_meds_view', $this->template_data['content_data']);
        }
        else
        {
            redirect('user/error');
        }
    }

    public function todays_visit($app_id = null, $tab = 1, $subtab = 1)
    {
        if ($this->input->post('app_id', true) != false)
        {
            $app_id = $this->input->post('app_id', TRUE);
            $tab = $this->input->post('tab', TRUE);
        }
        $this->check_appointment($app_id);
        if ($this->input->post('tab', true) != false)
        {
            $tab = $this->input->post('tab', TRUE);
        }
        $this->template_data['content_data']['app_id'] = $app_id;
        $this->template_data['content_data']['tab'] = $tab;
        $this->template_data['content_data']['name'] = $this->myvisit_model->get_name();
        switch ($tab)
        {
            case 1:

                $this->check_vitals($app_id, $tab);

                break;



            case 2:

                $this->check_meds($app_id, $tab);


                break;



            case 3:


                $this->template_data['content_data']['subtab'] = $subtab;
                $flag = $this->pastdata();
                if (is_array($flag))
                    $this->template_data['content_data']['data'] = $flag;
                else
                {

                    switch ($flag)
                    {
                        case 13:
                            $this->template_data['content_data']['error'] = "There are no sugar entries from the last two weeks to display.";
                            break;
                        default:
                            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
                            break;
                    }
                }
                $this->template->load_template('template', 'sugars_view', $this->template_data);
                break;



            case 4:



                $this->check_labs($app_id, $tab);


                break;


            case 5:

                $this->check_questions($app_id, $tab);

                break;


            case 6:

                $this->check_goals($app_id, $tab);

                break;


            default:

                redirect("myvisit/");
                die();
                break;
        }
    }

    public function delete_notes($app_id = null, $visit_name = null, $visit_id = null, $visit_id2 = null)
    {
        if ($app_id == null || $visit_name == null)
        {
            $newdata = array('error' => "<font color='red'>Invalid Appointment.</font>");
            log_message('error:', $newdata);
            $this->session->set_flashdata($newdata);
            redirect('myvisit');
        }
        else
        {
            if ($visit_name == 'medsnotes')
            {
                $data = array('app_id' => $app_id, 'notes' => '');
                $newdatamed = $this->myvisit_model->add_update_meds($data);
                echo $newdatamed;
            }
            else if ($visit_name == 'vitalsnotes')
            {
                $note = $this->myvisit_model->get_vitals();
                $data['app_id'] = $app_id;
                $data['weight'] = $note[0]['weight'];
                $data['systolic'] = $note[0]['bp_systolic'];
                $data['diastolic'] = $note[0]['bp_diastolic'];
                $data['notes'] = '';
                $vflag = $this->myvisit_model->update_vitals($data);
                echo $vflag;
            }
            else if ($visit_name == 'labsnotes')
            {
                $cflag = 0;
                $aflag = 0;
                if ($visit_id != -1)
                {
                    $note = $this->myvisit_model->get_cholesterol(array('app_id' => $app_id));
                    if (is_array($note))
                    {
                        $data = array('app_id' => $app_id, 'date' => $note['lab_cholesterol'][0]['cholesterol_date'], 'total' => $note['lab_cholesterol'][0]['total'], 'hdl' => $note['lab_cholesterol'][0]['hdl'], 'ldl' => $note['lab_cholesterol'][0]['ldl'], 'tri' => $note['lab_cholesterol'][0]['tri'], 'notes' => '');
                        $cflag = $this->myvisit_model->update_cholesterol($data);
                    }
                    else
                    {
                        $cflag = -1;
                    }
                    if ($visit_id2 != -1)
                    {
                        $note = $this->myvisit_model->get_a1c(array('app_id' => $app_id));
                        if ($visit_id2 == $note['lab_a1c'][0]['lab_a1c_id'])
                        {
                            $data = array('app_id' => $app_id, 'date' => $note['lab_a1c'][0]['date'], 'a1c' => $note['lab_a1c'][0]['result'], 'notes' => '');
                            $aflag = $this->myvisit_model->update_a1c($data);
                        }
                    }
                }
                else
                {
                    if ($visit_id2 != -1)
                    {
                        $note = $this->myvisit_model->get_a1c(array('app_id' => $app_id));
                        if ($visit_id2 == $note['lab_a1c'][0]['lab_a1c_id'])
                        {
                            $note['lab_a1c'][0]['notes'] = '';
                            $aflag = $this->myvisit_model->update_a1c($note['lab_a1c'][0]);
                        }
                    }
                }
                if ((is_array($aflag) || $aflag == 0) && (is_array($cflag) || $cflag == 0))
                    echo 0;
                else
                    echo -1;
            }
        }
    }

    public function final_submit()
    {
//        var_dump($_POST);
        $cflag = -2;
        $aflag = -2;
        $vflag = -2;
        if (isset($_POST['app_id']))
        {
            if (isset($_POST['cholesterol']) && $_POST['cholesterol'] != -1)
            {
                $note = $this->myvisit_model->get_cholesterol(array('app_id' => $_POST['app_id']));
                $data = array('app_id' => $_POST['app_id'], 'date' => $note['lab_cholesterol'][0]['cholesterol_date'], 'total' => $note['lab_cholesterol'][0]['total'], 'hdl' => $note['lab_cholesterol'][0]['hdl'], 'ldl' => $note['lab_cholesterol'][0]['ldl'], 'tri' => $note['lab_cholesterol'][0]['tri'], 'notes' => $_POST['labsnotes']);
                $cflag = $this->myvisit_model->update_cholesterol($data);
                $note = null;
                $data = null;
                if ($_POST['a1c'] != -1)
                {
                    $note = $this->myvisit_model->get_a1c(array('app_id' => $_POST['app_id']));
                    if ($_POST['a1c'] == $note['lab_a1c'][0]['lab_a1c_id'])
                    {
                        $data = array('app_id' => $_POST['app_id'], 'date' => $note['lab_a1c'][0]['date'], 'a1c' => $note['lab_a1c'][0]['result'], 'notes' => $_POST['labsnotes']);
                        $aflag = $this->myvisit_model->update_a1c($data);
                    }
                    $note = null;
                    $data = null;
                }
            }
            else
            {
                if (isset($_POST['a1c']) && $_POST['a1c'] != -1)
                {

                    $note = $this->myvisit_model->get_a1c(array('app_id' => $_POST['app_id']));
                    if ($_POST['a1c'] == $note['lab_a1c'][0]['lab_a1c_id'])
                    {
                        $note['lab_a1c'][0]['notes'] = $_POST['labsnotes'];
                        $aflag = $this->myvisit_model->update_a1c($note['lab_a1c'][0]);
                    }
                    $note = null;
                    $data = null;
                }
            }
            if (isset($_POST['vitals']))
            {

                $note = $this->myvisit_model->get_vitals();
                $data['app_id'] = $this->input->post('app_id', TRUE);
                $data['weight'] = $note[0]['weight'];
                $data['systolic'] = $note[0]['bp_systolic'];
                $data['diastolic'] = $note[0]['bp_diastolic'];
                $data['notes'] = $this->input->post('vitalsnotes', TRUE);
                $vflag = $this->myvisit_model->update_vitals($data);
                $note = null;
                $data = null;
            }
            if ($this->input->post('med_exist', TRUE) == 1)
            {
                $data = array('app_id' => $this->input->post('app_id', TRUE), 'notes' => $_POST['medsnotes']);
                $newdatamed = $this->myvisit_model->add_update_meds($data);
            }
        }
        else
        {
            $newdata = array('error' => "<font color='red'>Please Select Appointment Before Start.</font>");
            log_message('error:', $newdata);
            $this->session->set_flashdata($newdata);
            redirect("myvisit/");
        }
        if (($vflag == 0 || $vflag == -2) && (is_array($aflag) || $aflag == -2) && (is_array($cflag) || $cflag == -2) && $newdatamed == 0)
        {
            $newdata = array('error' => "<font color='green'>Changes Saved.</font>");
            $this->session->set_flashdata($newdata);
            redirect("myvisit/finalize_app/" . $_POST['app_id']);
        }
        else
        {
            $newdata = array('error' => "<font color='red'> The site has encountered a server error. Please refresh the page.</font>");
            log_message('error:', $newdata);
            $this->session->set_flashdata($newdata);
            redirect("myvisit/finalize_app/" . $_POST['app_id']);
        }
    }

    public function finalize_app($app_id = null)
    {
        if ($app_id == null)
        {
            $this->template_data['content_data']['error'] = "<font color='red'>Please Select Appointment Before Start.</font>";
            redirect('myvisit');
        }
        $this->template_data['content_data']['app_id'] = $app_id;
        $this->template_data['head_data'] = $this->load->view('final_js', '', true);
        $this->template->load_template('template', 'final_view', $this->template_data);
    }

    function open_add_app_final($app_id = null)
    {
        if ($app_id == null)
            echo -1;
        $this->template_data['content_data']['app_id'] = $app_id;
        $flag = $this->myvisit_model->get_reasons();
        $flag2 = $this->myvisit_model->get_prescribers();
        $this->template_data['content_data']['reason'] = $flag;
        $this->template_data['content_data']['prescriber'] = $flag2;
        if (is_array($flag) && is_array($flag2))
            $this->load->view('add_appointment_final', $this->template_data);
        else
            echo -1;
    }

    function open_display_note($app_id = null)
    {
        if ($app_id == null)
            echo -1;
        else
        {
            $notes = $this->myvisit_model->get_notes($app_id);
            $this->template_data['content_data']['app_id'] = $app_id;
            $this->template_data['content_data']['notes'] = $notes;
            if (is_array($notes))
                $this->load->view('notes_popup', $this->template_data);
            else
                echo -1;
        }
    }

    public function submit_goal($app_id = null, $count = 5)
    {

        $newdata = array();
        $flag = 0;

        for ($i = 1; $i <= (count($_POST) / 2); $i++)
        {

            $data['goal'] = $_POST['g' . $i];
            $data['app_id'] = $app_id;
            if ($_POST['gid' . $i] == '')
            {
                if ($data['goal'] != '')
                    $newdata = $this->myvisit_model->add_goals($data);
            }
            else
            {
                if ($data['goal'] != '')
                {

                    $data['gid'] = $_POST['gid' . $i];
                    $newdata = $this->myvisit_model->update_goals($data);
                }
            }

            if (!is_array($newdata))
            {
                $flag = 1;
                log_message('error:', $newdata);
                break;
            }
        }
        if ($flag == 1)
            echo 1;
        else
            echo 0;
    }

    private function check_goals($app_id = null, $tab = 5)
    {
        $newdata = $this->myvisit_model->get_goals();
        $this->template_data['head_data']['count'] = 0;
        $this->template_data['head_data']['app_id'] = $app_id;
        if (is_array($newdata))
        {
            $this->template_data['content_data']['old_data'] = $newdata;
            $this->template_data['head_data']['count'] = count($newdata['goals']);
        }
        else if ($newdata == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }

        $this->template_data['head_data'] = $this->load->view('goals_js', $this->template_data['head_data'], true);
        $this->template->load_template('template', 'goals_view', $this->template_data);
    }

    private function check_questions($app_id = null, $tab = 5)
    {
        $data['app_id'] = $app_id;
        $newdata = $this->myvisit_model->get_q($data);
        $this->template_data['head_data']['count'] = 0;
        $this->template_data['head_data']['app_id'] = $app_id;
        if (is_array($newdata))
        {
            $this->template_data['content_data']['old_data'] = $newdata;
            $this->template_data['head_data']['count'] = count($newdata['questions']);
        }
        else if ($newdata == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }

        $this->template_data['head_data'] = $this->load->view('question_js', $this->template_data['head_data'], true);
        $this->template->load_template('template', 'questions_view', $this->template_data);
    }

    public function submit_questions($app_id = null, $count = 5)
    {

        $newdata = array();
        $flag = 0;

        for ($i = 1; $i <= (count($_POST) / 3); $i++)
        {

            $data['text'] = $_POST['q' . $i];
            $data['ans'] = $_POST['a' . $i];
            $data['app_id'] = $app_id;

            if ($_POST['qid' . $i] == '')
            {

                if ($data['text'] != '')
                    $newdata = $this->myvisit_model->add_q($data);
            }
            else
            {
                if ($data['text'] != '')
                {

                    $data['qid'] = $_POST['qid' . $i];
                    $newdata = $this->myvisit_model->update_q($data);
                }
            }
            if (!is_array($newdata))
            {
                $flag = 1;
                log_message('error:', $newdata);
                break;
            }
        }
        if ($flag == 1)
            echo 1;
        else
            echo 0;
    }

    private function check_meds($app_id = null, $tab = 2)
    {
        $newdata = $this->myvisit_model->get_meds();
        $newdata1 = $this->myvisit_model->get_meds_notes($app_id);
        if (is_array($newdata))
        {
            $this->template_data['old_data']['meds'] = $newdata['patient_drugs'];
        }
        if (is_array($newdata1))
            $this->template_data['old_data']['note'] = $newdata1;
        $this->template_data['head_data'] = $this->load->view('edit_meds_js', '', true);
        $this->template->load_template('template', 'meds_view', $this->template_data);
    }

    public function submit_meds_notes()
    {
        if ($_POST['notes'] == '')
            redirect("myvisit/todays_visit/" . $_POST['app_id'] . '/3');
        $data = array('app_id' => $_POST['app_id'], 'notes' => $_POST['notes']);
        $newdata = $this->myvisit_model->add_update_meds($data);
        if ($newdata == 0)
            redirect("myvisit/todays_visit/" . $_POST['app_id'] . '/3');
        else if ($newdata == -1)
        {
            $newdata = array('error' => "<font color='red'>The site has encountered a server error. Please refresh the page</font>");
            $this->session->set_flashdata($newdata);
            redirect("myvisit/todays_visit/" . $_POST['app_id'] . '/2');
        }
    }

    public function submit_cholesterol($app_id = null, $total = null, $hdl = null, $ldl = null, $tg = null, $date = null, $notes = null)
    {

        $data = array('app_id' => $app_id, 'date' => $date, 'total' => $total, 'hdl' => $hdl, 'ldl' => $ldl, 'tri' => $tg, 'notes' => $notes);
        if ($this->session->userdata('cholesterol') == 1)
        {
            $newdata = $this->myvisit_model->add_cholesterol($data);
        }
        else
        {
            $newdata = $this->myvisit_model->update_cholesterol($data);
        }

        if (is_array($newdata))
        {
            $this->session->set_userdata(array('cholesterol' => ($this->session->userdata('cholesterol') + 1)));
            echo "<font color='green'>Cholesterol saved successfully.</font>";
        }
        else if ($newdata == -1)
        {
            echo '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }
        else
        {
            echo "<font color='red'>Please fill in all required fields for adding Cholesterol!</font>";
        }
    }

    public function submit_a1c($app_id = null, $result = null, $date = null, $notes = null)
    {

        $data = array('app_id' => $app_id, 'date' => $date, 'a1c' => $result, 'notes' => $notes);
        if ($this->session->userdata('a1c') == 1)
        {
            $newdata = $this->myvisit_model->add_a1c($data);
        }
        else
        {
            $newdata = $this->myvisit_model->update_a1c($data);
        }

        if (is_array($newdata))
        {
            $this->session->set_userdata(array('a1c' => ($this->session->userdata('a1c') + 1)));
            echo "<font color='green'>A1C saved successfully.</font>";
        }
        else if ($newdata == -1)
        {
            echo '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }
        else
        {
            echo "<font color='red'>Please fill in all of the fields below./font>";
        }
    }

    public function submit_labs($app_id = null, $result = null, $date1 = null, $total = null, $hdl = null, $ldl = null, $tg = null, $date = null, $notes = null)
    {
        $this->submit_a1c($app_id, $result, $date1, $notes);
        $this->submit_cholesterol($app_id, $total, $hdl, $ldl, $tg, $date, $notes);
    }

    private function check_labs($app_id = null, $tab = 4)
    {
        $data = array('app_id' => $app_id);
        $this->template_data['head_data'] = $this->load->view('labs_js', $data, true);
        $data['app_id'] = $app_id;
        //cholesterol
        $newdata = $this->myvisit_model->get_cholesterol($data);
        $this->template_data['old_data']['app_id'] = $app_id;
        if (is_array($newdata))
        {
            $this->template_data['old_data']['cholesterol'] = $newdata;
            $this->session->set_userdata(array('cholesterol' => ($this->session->userdata('cholesterol') + 1)));
        }
        else if ($newdata == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }

        //a1c
        $newdata1 = $this->myvisit_model->get_a1c($data);
        if (is_array($newdata1))
        {
            $this->template_data['old_data']['a1c'] = $newdata1;
            $this->session->set_userdata(array('a1c' => ($this->session->userdata('a1c') + 1)));
        }
        else if ($newdata1 == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }

        $this->template->load_template('template', 'labs_view', $this->template_data);
    }

    private function check_vitals($app_id = null, $tab = 1)
    {
        $newdata = $this->myvisit_model->get_vitals();
        if (is_array($newdata))
        {
            $this->template_data['old_data'] = $newdata[0];
            $this->session->set_userdata(array('vitals' => ($this->session->userdata('vitals') + 1)));
        }
        if (($this->input->post('app_id', TRUE) != false))
        {
            $data = $_POST;
            $app_id = $this->input->post('app_id', TRUE);
            $newdata = array(
                'vitals_data' => $data
            );
            $this->session->set_flashdata($newdata);
            if ($this->session->userdata('vitals') == 1)
                $flag = $this->myvisit_model->add_vitals($data);
            else
                $flag = $this->myvisit_model->update_vitals($data);
            if ($flag == 14)
            {
                $this->template_data['content_data']['error'] = '<font color="red">Please fill in all fields before hitting next.</font>';
            }
            else if ($flag == 0)
            {
                $temp = $this->session->userdata('vitals') + 1;
                $this->session->set_userdata(array('vitals' => $temp));
                redirect('myvisit/todays_visit/' . $app_id . '/2');
            }
            else
            {
                $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
            }
        }

        $this->template_data['head_data'] = $this->load->view('vitals_validation_js', array('app_id' => $app_id), true);
        $this->template->load_template('template', 'vitals_view', $this->template_data);
    }

    //    not yet using
}

?>