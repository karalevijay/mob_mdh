<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cholesterol extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cholesterol_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->load->model('mynumbers/mynumbers_model');
        $flag = $this->mynumbers_model->get_latest_cholesterol();
        if (is_array($flag))
        {
            $this->template_data['content_data'] = $flag;
        }
        else if ($flag == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }
        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'cholesterol_entryNow_view', $this->template_data);
    }

    public function delete_cholesterol($cholesterol_id = null)
    {
        if ($cholesterol_id == null)
        {
            $newdata = array('error' => '<font color="red">Wrong Cholesterol.</font>');
        }
        else
        {
            $data = array('cholesterol_id' => $cholesterol_id, 'op' => 'delete');
            $flag = $this->cholesterol_model->update_cholesterol($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">Cholesterol information successfully deleted.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Wrong Cholesterol.</font>');
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
        $this->session->set_flashdata($newdata);
        redirect('/cholesterol/pastdata');
    }

    public function update_cholesterol()
    {
        if ($this->input->post('cholesterol_id', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Wrong Cholesterol.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/cholesterol/pastdata');
        }
        else if ($this->input->post('total', TRUE) == '' || $this->input->post('mydate', TRUE) == '' || $this->input->post('hdl', TRUE) == '' || $this->input->post('ldl', TRUE) == '' || $this->input->post('tri', TRUE) == '' || $this->input->post('cholesterol_id', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/cholesterol/edit/' . $this->input->post('cholesterol_id', TRUE));
        }
        else if ($this->input->post('total', TRUE) > 999 || $this->input->post('hdl', TRUE) > 99 || $this->input->post('ldl', TRUE) > 999 || $this->input->post('tri', TRUE) > 999)
        {
            $newdata = array('error' => '<font color="red">Total cholesterol, LDL, and TG cannot exceed 1000, and HDL cannot exceed 99.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/cholesterol/edit/' . $this->input->post('cholesterol_id', TRUE));
        }
        else
        {
            $data = array('cholesterol_id' => $this->input->post('cholesterol_id', TRUE), 'total' => $this->input->post('total', TRUE), 'date' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE), 'hdl' => $this->input->post('hdl', TRUE), 'ldl' => $this->input->post('ldl', TRUE), 'tri' => $this->input->post('tri', TRUE));
            $flag = $this->cholesterol_model->update_cholesterol($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">Cholesterol information successfully updated.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
                    $this->session->set_flashdata($newdata);
                    redirect('/cholesterol/edit/' . $this->input->post('cholesterol_id', TRUE));
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata['error'] = '<font color="red">Cholesterol information already exists for this date.</font>';
                    $this->session->set_flashdata($newdata);
                    redirect('/cholesterol/edit/' . $this->input->post('cholesterol_id', TRUE));
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        redirect('/cholesterol/pastdata');
    }

    public function edit($cholesterol_id = null)
    {
        $newdata=array();
        if ($cholesterol_id == null)
        {
            $this->template_data['content_data']['error'] = '<font color="red">Wrong Cholesterol.</font>';
            redirect('/cholesterol/pastdata');
        }
        else
        {
            $flag = $this->cholesterol_model->get_single_cholesterol(array('cholesterolid' => $cholesterol_id));
            if (!is_array($flag))
            {
                switch ($flag)
                {
                    case -1:
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        break;
                    case 999:
                        $newdata = array('error' => '<font color="red">Wrong Cholesterol.</font>');
                        $this->session->set_flashdata($newdata);
                        redirect('/cholesterol/pastdata');
                        break;
                    default:
                        log_message('error', 'Return Parameter:' . $flag);
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        break;
                }
            }
            else
            {
                $this->template_data['content_data']['cholesterol'] =  isset($flag['lab_cholesterol']) ? $flag['lab_cholesterol'] : null;
            }
        }
        $this->session->set_flashdata($newdata);
        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'cholesterol_edit_view', $this->template_data);
    }

    public function submit_cholesterol()
    {
        $frm['old_data'] = $_POST;
        if ($this->input->post('total', TRUE) == '' || $this->input->post('mydate', TRUE) == '' || $this->input->post('hdl', TRUE) == '' || $this->input->post('ldl', TRUE) == '' || $this->input->post('tri', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
        }
        else if ($this->input->post('total', TRUE) > 999 || $this->input->post('hdl', TRUE) > 99 || $this->input->post('ldl', TRUE) > 999 || $this->input->post('tri', TRUE) > 999)
        {
            $newdata = array('error' => '<font color="red">Total cholesterol, LDL, and TG cannot exceed 1000, and HDL cannot exceed 99. </font>');
            $this->session->set_flashdata($newdata);
            redirect('/cholesterol');
        }
        else
        {
            $data = array('total' => $this->input->post('total', TRUE), 'date' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE), 'hdl' => $this->input->post('hdl', TRUE), 'ldl' => $this->input->post('ldl', TRUE), 'tri' => $this->input->post('tri', TRUE));
            $flag = $this->cholesterol_model->add_cholesterol($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">Cholesterol Information Successfully Added.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata['old_data'] = $_POST;
                    $newdata['error'] = '<font color="red">Cholesterol information already exists for this date.</font>';
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        redirect('/cholesterol');
    }

    public function pastdata()
    {
        $flag = $this->cholesterol_model->get_cholesterol();
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
        $this->template->load_template('template', 'cholesterol_pastdata_view', $this->template_data);
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
        $flag = $this->cholesterol_model->get_cholesterol();
        if (is_array($flag))
        {

            $this->template_data['content_data']['old_data'] = $flag;
            $this->array_sort_by_column($flag['lab_cholesterol'], 'cholesterol_date');
            $this->template_data['head_data']['cholesterol'] = $flag;
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
        $this->template->load_template('template', 'cholesterol_graph_view', $this->template_data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */