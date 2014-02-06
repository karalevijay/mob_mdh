<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bp extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bp_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->load->model('mynumbers/mynumbers_model');
        $flag = $this->mynumbers_model->get_latest_bp();
        if (is_array($flag))
        {
            $this->template_data['content_data'] = $flag;
        }
        else if ($flag == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }
        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'bloodPressure_EntryNow_view', $this->template_data);
    }

    public function delete_bp($bp_id = null)
    {
        if (!$bp_id == null)
        {
            $data = array('op' => 'delete', 'bp_id' => $bp_id);
            $flag = $this->bp_model->update_bp($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">Blood pressure information successfully deleted.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Missing parameter.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        else
        {
            $newdata = array('error' => '<font color="red">Wrong BP.</font>');
        }
        $this->session->set_flashdata($newdata);
        redirect('/bp/pastdata');
    }

    public function update_bp()
    {
        if ($this->input->post('bp_id', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Wrong BP.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/bp/pastdata');
        }
        else if ($this->input->post('systolic', TRUE) == '' || $this->input->post('mydate', TRUE) == '' || $this->input->post('diastolic', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/bp/edit/' . $this->input->post('bp_id', TRUE));
        }
        else if ($this->input->post('systolic', TRUE) < 0 || $this->input->post('systolic', TRUE) > 999 || $this->input->post('diastolic', TRUE) > 999 || $this->input->post('diastolic', TRUE) < 0)
        {
            $newdata = array('error' => '<font color="red">Please enter values between 0 and 1000.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/bp/edit/' . $this->input->post('bp_id', TRUE));
        }
        else
        {
            if ($this->input->post('bp_id', TRUE) == '')
            {
                $newdata = array('error' => '<font color="red">Wrong BP.</font>');
                $this->session->set_flashdata($newdata);
                redirect('/bp/pastdata');
            }
            $data = array('bp_id' => $this->input->post('bp_id', TRUE), 'systolic' => $this->input->post('systolic', TRUE), 'diastolic' => $this->input->post('diastolic', TRUE), 'bpDate' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE));
            $flag = $this->bp_model->update_bp($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">Blood pressure information successfully updated.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata = array('error' => '<font color="red">Blood pressure information already exists for this date.</font>');
                    $this->session->set_flashdata($newdata);
                    redirect('/bp/edit/' . $this->input->post('bp_id', TRUE));
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        redirect('/bp/pastdata');
    }

    public function edit($bp_id = null)
    {
        $newdata=array();
        if ($bp_id == null)
        {
            $this->template_data['content_data']['error'] = '<font color="red">Invalid BP.</font>';
            $this->session->set_flashdata($this->template_data['content_data']);
            redirect('/bp/pastdata');
        }
        else
        {
            $flag = $this->bp_model->get_single_bp(array('bpid' => $bp_id));
            if (!is_array($flag))
            {
                switch ($flag)
                {
                    case -1:
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        break;
                    case 999:
                        $newdata = array('error' => '<font color="red">Wrong Blood Pressure.</font>');
                        $this->session->set_flashdata($newdata);
                        redirect('/bp/pastdata');
                        break;
                    default:
                        log_message('error', 'Return Parameter:' . $flag);
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        break;
                }
            }
            else
            {
                $this->template_data['content_data']['bp'] = isset($flag['lab_bp']) ? $flag['lab_bp'] : null;
            }
        }
        $this->session->set_flashdata($newdata);
        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'bloodPressure_edit_view', $this->template_data);
    }

    public function submit_bp()
    {
        $frm['old_data'] = $_POST;
        if ($this->input->post('systolic', TRUE) == '' || $this->input->post('diastolic', TRUE) == '' || $this->input->post('mydate', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in all fields for adding Blood Pressure.</font>');
        }
        else if ($this->input->post('systolic', TRUE) > 999 || $this->input->post('diastolic', TRUE) > 999 || $this->input->post('diastolic', TRUE) < 0 || $this->input->post('systolic', TRUE) < 0)
        {
            $newdata = array('error' => '<font color="red">Please enter value less than 1000.</font>');
        }
        else
        {
            $data = array('systolic' => $this->input->post('systolic', TRUE), 'diastolic' => $this->input->post('diastolic', TRUE), 'bpDate' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE));
            $flag = $this->bp_model->add_bp($data);
            Switch ($flag)
            {
                case 0:
                    $frm['old_data'] = '';
                    $newdata = array('error' => '<font color="green">Blood pressure information successfully added.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields for adding Blood Pressure.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata['error'] = '<font color="red">Blood pressure information already exists for this date.</font>';
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        $this->session->set_flashdata($frm);
        redirect('/bp');
    }

    public function pastdata()
    {
        $flag = $this->bp_model->get_bp();
        if (is_array($flag))
        {
            $this->template_data['content_data']['old_data'] = $flag;
        }
        else
        {
            Switch ($flag)
            {
                case 3:
                    $newdata = array('error' => '<font color="red">Invalid User.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->template->load_template('template', 'bloodPressure_pastData_view', $this->template_data);
    }

    private function array_sort_by_column(&$array, $column, $direction = SORT_ASC)
    {
        $reference_array = array();

        foreach ($array as $key => $row)
        {
            $reference_array[$key] = $row[$column];
        }

        array_multisort($reference_array, $direction, $array);
    }

    public function graph()
    {
        $flag = $this->bp_model->get_bp();
        if (is_array($flag))
        {

            $this->template_data['content_data']['old_data'] = $flag;
            $this->array_sort_by_column($flag['lab_bp'], 'bp_date');
            $this->template_data['head_data']['bp'] = $flag;
        }
        else
        {
            Switch ($flag)
            {
                case 3:
                    $newdata = array('error' => '<font color="red">Invalid User.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->template_data['head_data'] = $this->load->view('graph_js', isset($this->template_data['head_data']) ? $this->template_data['head_data'] : '', true);
        $this->template->load_template('template', 'bloodPressure_graph_view', $this->template_data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */