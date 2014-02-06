<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Weight extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('weight_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->load->model('mynumbers/mynumbers_model');
        $flag = $this->mynumbers_model->get_latest_weight();
        if (is_array($flag))
        {
            $this->template_data['content_data'] = $flag;
        }
        else if ($flag == -1)
        {
            $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
        }
        $flag = $this->weight_model->get_weight();
        if (is_array($flag))
        {
            $this->array_sort_by_column($flag['lab_bp'], 'weight_date');
            $this->template_data['content_data']['goal'] = $flag['lab_bp'][0]['goal'];
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
        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'weight_entryNow_view', $this->template_data);
    }

    public function delete_weight($weight_id = null)
    {

        if (!$weight_id == null)
        {
            $data = array('op' => 'delete', 'weight_id' => $weight_id);
            $flag = $this->weight_model->update_weight($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">Weight Information Successfully Deleted.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in date and result fields for Deleting Weight.</font>');
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
            $newdata = array('error' => '<font color="red">Wrong Weight.</font>');
        }
        $this->session->set_flashdata($newdata);
        redirect('/weight/pastdata');
    }

    public function update_weight()
    {
        if ($this->input->post('weight_id', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Wrong Weight.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/weight/pastdata');
        }
        else if ($this->input->post('weight', TRUE) == '' || $this->input->post('mydate', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/weight/edit/' . $this->input->post('weight_id', TRUE));
        }
        else if ($this->input->post('weight', TRUE) > 1000 || $this->input->post('goal', TRUE) > 1000 || $this->input->post('weight', TRUE) < 0 || $this->input->post('goal', TRUE) < 0)
        {
            $newdata = array('error' => '<font color="red">Please enter a value less than or equal to 999.9.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/weight/edit/' . $this->input->post('weight_id', TRUE));
        }
        else
        {
            if ($this->input->post('goal', TRUE) != '')
            {
                $goal = $this->input->post('goal', TRUE);
            }
            else
            {
                $goal = 0;
            }
            $data = array('goal' => $goal, 'weight_id' => $this->input->post('weight_id', TRUE), 'weigh' => $this->input->post('weight', TRUE), 'weightDate' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE));
            $flag = $this->weight_model->update_weight($data);
            Switch ($flag)
            {
                case 0:
                    $newdata = array('error' => '<font color="green">Weight Information Successfully Updated.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata = array('error' => '<font color="red">Weight Information Already Exist for this date.</font>');
                    $this->session->set_flashdata($newdata);
                    redirect('/weight/edit/' . $this->input->post('weight_id', TRUE));
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        redirect('/weight/pastdata');
    }

    public function edit($weight_id = null)
    {
        $newdata = array();
        if ($weight_id == null)
        {
            $this->template_data['content_data']['error'] = '<font color="red">Invalid Weight.</font>';
            $this->session->set_flashdata($this->template_data['content_data']);
            redirect('/weight/pastdata');
        }
        else
        {
            $flag = $this->weight_model->get_single_weight(array('weightid' => $weight_id));
            if (!is_array($flag))
            {
                switch ($flag)
                {
                    case -1:
                        $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                        break;
                    case 999:
                        $newdata = array('error' => '<font color="red">Wrong Weight.</font>');
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
                $this->template_data['content_data']['weight'] = isset($flag['lab_bp']) ? $flag['lab_bp'] : null;
            }
        }
        $this->session->set_flashdata($newdata);
        $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
        $this->template->load_template('template', 'weight_edit_view', $this->template_data);
    }

    public function submit_weight()
    {
        if ($this->input->post('weight', TRUE) == '' || $this->input->post('mydate', TRUE) == '')
        {
            $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
        }
        else if ($this->input->post('weight', TRUE) > 1000 || $this->input->post('goal', TRUE) > 1000)
        {
            $newdata = array('error' => '<font color="red">Please enter a value less than or equal to 999.9.</font>');
            $this->session->set_flashdata($newdata);
            redirect('/weight');
        }
        else
        {
            $newdata['old_data'] = $_POST;
            $this->session->set_flashdata($newdata);
            if ($this->input->post('goal', TRUE) != '')
            {
                $goal = $this->input->post('goal', TRUE);
            }
            else
            {
                $goal = 0;
            }
            $data = array('goal' => $goal, 'weigh' => $this->input->post('weight', TRUE), 'weightDate' => $this->input->post('mydate', TRUE), 'notes' => $this->input->post('notes', TRUE));
            $flag = $this->weight_model->add_weight($data);
            Switch ($flag)
            {
                case 0:
                    $newdata['old_data'] = '';
                    $this->session->set_flashdata($newdata);
                    $newdata = array('error' => '<font color="green">Weight information successfully added.</font>');
                    break;
                case 3:
                    $newdata = array('error' => '<font color="red">Please fill in all fields.</font>');
                    break;
                case -1:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
                case 16:
                    $newdata['error'] = '<font color="red">Weight information already exists for this date.</font>';
                    break;
                default:
                    log_message('error', 'Return Parameter:' . $flag);
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        $this->session->set_flashdata($newdata);
        redirect('/weight');
    }

    public function pastdata()
    {
        $flag = $this->weight_model->get_weight();
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
        $this->template->load_template('template', 'weight_pastdata_view', $this->template_data);
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
        $flag = $this->weight_model->get_weight();
        if (is_array($flag))
        {

            $this->template_data['content_data']['old_data'] = $flag;
            $this->array_sort_by_column($flag['lab_bp'], 'weight_date');
            $this->template_data['head_data']['weight'] = $flag;

            $this->load->model('mynumbers/mynumbers_model');
            $flag = $this->mynumbers_model->get_latest_weight();
            if (is_array($flag))
            {
                $this->template_data['content_data']['goal'] = $flag;
            }
            else if ($flag == -1)
            {
                $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
            }
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
        $this->template->load_template('template', 'weight_graph_view', $this->template_data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */