<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aonec extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('aonec_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->load->model('mynumbers/mynumbers_model');
        $flag = $this->mynumbers_model->get_latest_a1c();
        if (is_array($flag))
        {
            $this->template_data['content_data'] = $flag;
        }
        else if ($flag == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }

        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'a1c_EntryNow_view', $this->template_data);
    }

    public function delete_aonec($a1c_id = null)
    {
        if ($a1c_id == null)
        {
            $newdata = array('error' => '<font color="red">Wrong A1C.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/aonec/pastdata');
        }
        $data = array('a1c_id' => $a1c_id, 'op' => 'delete');
        $flag = $this->aonec_model->update_aonec($data);
        Switch ($flag)
        {
            case 0:
                $newdata = array('error' => '<font color="green">A1C Information Successfully Deleted.</font>');
                break;
            case 3:
                $newdata = array('error' => '<font color="red">Wrong A1C.</font>');
                break;
            case -1:
                $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                break;
            default:
                log_message('error', 'Return Parameter:' . $flag);
                $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                break;
        }
        $this->session->set_flashdata($newdata);
        redirect('/aonec/pastdata');
    }

    public function edit($a1c_id = null)
    {
        $newdata = null;
        if ($a1c_id == null)
        {
            $this->template_data['content_data']['error'] = '<font color="red">Invalid A1C.</font>';
            $this->session->set_flashdata($newdata);
            redirect('/aonec/pastdata');
        }
        else
        {

            $flag = $this->aonec_model->get_single_aonec(array('a1cid' => $a1c_id));
            if (!is_array($flag))
            {
                switch ($flag)
                {
                    case -1:
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        break;
                    case 999:
                        $newdata = array('error' => '<font color="red">Wrong A1C.</font>');
                        $this->session->set_flashdata($newdata);
                        redirect('/aonec/pastdata');
                        break;
                    default:
                        log_message('error', 'Return Parameter:' . $flag);
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        break;
                }
            }
            else
            {
                $this->template_data['content_data']['a1c'] = isset($flag['lab_a1c']) ? $flag['lab_a1c'] : null;
            }
        }
        $this->session->set_flashdata($newdata);
        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'a1c_edit_view', $this->template_data);
    }

    public function update_aonec()
    {
        if ($this->input->post('a1c_id', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Wrong A1C.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/aonec/pastdata');
        }
        else if ($this->input->post('result', TRUE) == '' || $this->input->post('mydate', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/aonec/edit/' . $this->input->post('aonec_id', TRUE));
        }
        else if ($this->input->post('result', TRUE) >= 100 || $this->input->post('result', TRUE) < 0)
        {
            $newdata = array('error' => '<font color="red">Please enter a number less than or equal to 99.9.</font>');
            $this->session->set_flashdata($newdata);
            redirect('aonec/edit/' . $this->input->post('a1c_id', TRUE));
        }
        else
        {
            $data = array('a1c' => $this->input->post('result', TRUE), 'a1c_id' => $this->input->post('a1c_id', TRUE), 'a1c_date' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE));
            $flag = $this->aonec_model->update_aonec($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">A1C Information Successfully Updated.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata = array('error' => '<font color="red">A1C information already exists for this date.</font>');
                    $this->session->set_flashdata($newdata);
                    redirect('aonec/edit/' . $this->input->post('a1c_id', TRUE));
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        redirect('/aonec/pastdata');
    }

    public function submit_aonec()
    {
        $frm['old_data'] = $_POST;
        if ($this->input->post('result', TRUE) == '' || $this->input->post('mydate', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in date and result fields for adding A1C.</font>');
        }
        else if (!is_numeric($this->input->post('result', TRUE)))
        {
            $newdata = array('error' => '<font color="red">Please enter a number.</font>');
        }
        else if ($this->input->post('result', TRUE) >= 100 || $this->input->post('result', TRUE) < 0)
        {
            $newdata = array('error' => '<font color="red">Please enter value less than or equal to 99.9.</font>');
        }
        else
        {
            $data = array('a1c' => $this->input->post('result', TRUE), 'a1c_date' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE));
            $flag = $this->aonec_model->add_aonec($data);
            Switch ($flag)
            {
                case 0:
                    $frm['old_data'] = '';
                    $newdata = array('error' => '<font color="green">A1C information successfully added.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata = array('error' => '<font color="red">A1C information already exists for this date.</font>');
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        $this->session->set_flashdata($frm);
        redirect('/aonec');
    }

    public function pastdata()
    {
        $this->load->model('mynumbers/mynumbers_model');
        $flag = $this->mynumbers_model->get_latest_a1c();
        if (is_array($flag))
        {
            $this->template_data['content_data']['goal'] = $flag['lab_a1c']['goal'];
        }
        else if ($flag == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }

        $flag = $this->aonec_model->get_aonec();
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
        $this->template->load_template('template', 'a1c_pastData_view', $this->template_data);
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
        $this->load->model('mynumbers/mynumbers_model');
        $flag = $this->mynumbers_model->get_latest_a1c();
        if (is_array($flag))
        {
            $this->template_data['content_data']['goal'] = $flag['lab_a1c']['goal'];
        }
        else if ($flag == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }

        $flag = $this->aonec_model->get_aonec();
        if (is_array($flag))
        {

            $this->template_data['content_data']['old_data'] = $flag;
            $this->array_sort_by_column($flag['lab_a1c'], 'a1c_date');
            $this->template_data['head_data']['a1c'] = $flag;
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
        $this->template->load_template('template', 'a1c_graph_view', $this->template_data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */