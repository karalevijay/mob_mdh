<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mysugar extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

     function __construct()
    {
        parent::__construct();
        $unset = array('vitals', 'meds', 'labs', 'goals', 'questions');
        $this->session->unset_userdata($unset);
        $this->load->model('mysugar_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
        $this->template_data['head_data']='';
    }


    public function index($tab = 1)
    {
            $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
            $this->template_data['content_data'][0] = $tab;
            $this->template->load_template('template', 'entrynow_view', $this->template_data);
    }

    public function submit_sugar()
    {
        $form_data['old_data'] = $_POST;
        if ($_POST['sugar_date'] == '')
        {
            $newdata = array('error' => "<font color='red'>Please Enter A date.</font>");
            $this->session->set_flashdata($newdata);
            redirect("mysugar/");
        }
        if ($_POST['b4b'] != '' || $_POST['ab'] != '' || $_POST['b4l'] != '' || $_POST['al'] != '' || $_POST['b4s'] != '' || $_POST['as'] != '' || $_POST['bt'] != '' || $_POST['o'] != '')
        {


            $frm = array_values($_POST);
            for ($i = 0; $i < 8; $i++)
            {
                if (!(($frm[$i] >= 30 && $frm[$i] <= 700) || $frm[$i] == 0 || $frm[$i] == ''))
                {
                    $newdata = array('error' => "<font color='red'>Invalid sugar entered. Please enter a number between 30 and 700.</font>");
                    $this->session->set_flashdata($newdata);
                    redirect("mysugar/");
                }
            }
            $all = false;
            for ($i = 0; $i < 8; $i++)
            {
                if ($frm[$i] == 0)
                    $all = false;
                else
                {
                    $all = true;
                    break;
                }
            }
            if ($all == false)
            {
                $newdata = array('error' => "<font color='red'>Please enter at least one sugar number and the date.</font>");
                $this->session->set_flashdata($newdata);
                redirect("mysugar/");
            }
            if (($_POST['b4b'] == '' || ($_POST['b4b'] < 30 || $_POST['b4b'] > 700)) && ($_POST['ab'] == '' || ($_POST['ab'] < 30 || $_POST['ab'] > 700)) && ($_POST['b4l'] == '' || ($_POST['b4l'] < 30 || $_POST['b4l'] > 700)) && ($_POST['al'] == '' || ($_POST['al'] < 30 || $_POST['al'] > 700)) && ($_POST['b4s'] == '' || ($_POST['b4s'] < 30 || $_POST['b4s'] > 700)) && ($_POST['as'] == '' || ($_POST['as'] < 30 || $_POST['as'] > 700)) && ($_POST['bt'] == '' || ($_POST['bt'] < 30 || $_POST['bt'] > 700)) && ($_POST['o'] == '' || ($_POST['o'] < 30 || $_POST['o'] > 700)))
            {
                $newdata = array('error' => "<font color='red'>Invalid sugar entered. Please enter a number between 30 and 700.</font>");
                $this->session->set_flashdata($newdata);
                redirect("mysugar/");
            }
            $data = array('result_number_before_breakfast' => $this->check_null($_POST['b4b']),
                'result_number_after_breakfast' => $this->check_null($_POST['ab']),
                'result_number_before_lunch' => $this->check_null($_POST['b4l']),
                'result_number_after_lunch' => $this->check_null($_POST['al']),
                'result_number_before_supper' => $this->check_null($_POST['b4s']),
                'result_number_after_supper' => $this->check_null($_POST['as']),
                'result_number_bedtime' => $this->check_null($_POST['bt']),
                'result_number_other' => $this->check_null($_POST['o']),
                'sugar_date' => $_POST['sugar_date']
            );
            $flag = $this->mysugar_model->save_sugar($data);
            if ($flag == 0)
            {
                $form_data['old_data'] = '';
                $newdata = array('error' => "<font color='green'>Sugar information saved!</font>");
            }
            else if ($flag == 4)
            {
                $newdata = array('error' => "<font color='red'>Invalid User!</font>");
            }
            else if ($flag == 14)
            {
                $this->session->set_flashdata($form_data);
                $newdata = array('error' => "<font color='red'>You've already entered information for this date—edit past data to add more sugar numbers.</font>");
            }
            else
            {
                $newdata = array('error' => "<font color='red'>Please enter at least one sugar and date.</font>");
            }
        }
        else
        {
            $newdata = array('error' => "<font color='red'>Please enter at least one sugar and date.</font>");
        }

        $this->session->set_flashdata($newdata);
        redirect("mysugar/");
    }

    private function validate_sugar(&$param)
    {

        if (($param >= 30 && $param <= 700) || $param == 0 || $param == '')
            return true;
        else
        {
            return false;
        }
    }

    public function update()
    {
        $tab = (isset($_POST['tab'])) ? $_POST['tab'] : 1;
        $newdata = array();
        if ((isset($_POST['b4b']) || isset($_POST['ab']) || isset($_POST['al']) || isset($_POST['b4l']) || isset($_POST['b4s']) || isset($_POST['as']) || isset($_POST['bt']) || isset($_POST['0'])) && isset($_POST['sugar_date']))
        {
            if (($_POST['b4b'] != '' || $_POST['ab'] != '' || $_POST['b4l'] != '' || $_POST['al'] != '' || $_POST['b4s'] != '' || $_POST['as'] != '' || $_POST['bt'] != '' || $_POST['o'] != '') && $_POST['sugar_date'] != '')
            {

                $frm = array_values($_POST);
                for ($i = 0; $i < 8; $i++)
                {
                    $param = $this->validate_sugar($frm[$i]);
                    if ($param == false)
                    {
                        $newdata = array('error' => "<font color='red'>Invalid sugar number entered. Please enter a number between 30 and 700.</font>");
                        $this->session->set_flashdata($newdata);
                        redirect("mysugar/edit/" . date('Y-m-d', strtotime($_POST['sugar_date'])) . '/1');
                    }
                }
                $all = false;
                for ($i = 0; $i < 8; $i++)
                {
                    if ($frm[$i] == 0)
                        $all = false;
                    else
                    {
                        $all = true;
                        break;
                    }
                }
                if ($all == false)
                {
                    $newdata = array('error' => "<font color='red'>Please enter at least one sugar number and the date.</font>");
                    $this->session->set_flashdata($newdata);
                    redirect("mysugar/edit/" . date('Y-m-d', strtotime($_POST['sugar_date'])) . '/1');
                }

                $data = array('result_number_before_breakfast' => $this->check_null($_POST['b4b']),
                    'result_number_after_breakfast' => $this->check_null($_POST['ab']),
                    'result_number_before_lunch' => $this->check_null($_POST['b4l']),
                    'result_number_after_lunch' => $this->check_null($_POST['al']),
                    'result_number_before_supper' => $this->check_null($_POST['b4s']),
                    'result_number_after_supper' => $this->check_null($_POST['as']),
                    'result_number_bedtime' => $this->check_null($_POST['bt']),
                    'result_number_other' => $this->check_null($_POST['o']),
                    'sugarid' => $_POST['sugar_id'],
                    'sugar_date' => $_POST['sugar_date']
                );
                $flag = $this->mysugar_model->update_sugar($data);
                if ($flag == 0)
                {
                    $newdata = array('error' => "<font color='green'>Sugar information updated!</font>");
                    $this->session->set_flashdata($newdata);
                    redirect("mysugar/pastdata/" . $tab);
                }
                else if ($flag == 4)
                {
                    $newdata = array('error' => "<font color='red'>Invalid User!</font>");
                }
                else if ($flag == 14)
                {
                    $newdata = array('error' => "<font color='red'>No such Sugar Entry Exist for this Date!</font>");
                    $this->session->set_flashdata($newdata);
                    redirect("mysugar/pastdata/" . $tab);
                }
                else
                {
                    $newdata = array('error' => "<font color='red'>Please enter at least one sugar number and the date.</font>");
                    $this->session->set_flashdata($newdata);
                    redirect("mysugar/edit/" . date('Y-m-d', strtotime($_POST['sugar_date'])) . '/1');
                }
            }
            else
            {
                $newdata = array('error' => "<font color='red'>Please enter at least one sugar number and the date.</font>");
                $this->session->set_flashdata($newdata);
                redirect("mysugar/edit/" . date('Y-m-d', strtotime($_POST['sugar_date'])) . '/1');
            }
        }
        $this->session->set_flashdata($newdata);
        redirect("mysugar/pastdata/" . $tab);
    }

    public function pastdata($tab = 1)
    {
        $this->template_data['content_data'][0] = 2;
        $this->template_data['content_data'][1] = $tab;
        $end_date = date("Y-m-d", time());
        $time = strtotime("-14 days", time());
        $start_date = date("Y-m-d", $time);
        $data = array('start_date' => $start_date, 'end_date' => $end_date);
        $flag = $this->mysugar_model->pastdata($data);
        if (is_array($flag))
        {
            $this->template_data['content_data']['data'] = $flag;
            $this->template->load_template('template', 'pastdata_view', $this->template_data);
        }
        else
        {
            switch ($flag)
            {
                case 4:
                    $this->template_data['content_data']['error'] = "Invalid User!";
                    break;
                case 14:
                    $this->template_data['content_data']['error'] = "Invalid Date Range!";
                    break;
                case 3:
                    $this->template_data['content_data']['error'] = "Missing Paramters!";
                    break;
                case 13:
                    $this->template_data['content_data']['error'] = "You don't have any sugar data to display.";
                    break;
                case -1:
                    $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
                    break;
                default:
                    break;
            }
            $this->template->load_template('template', 'pastdata_view', $this->template_data);
        }
    }

    public function graph($data = 14)
    {

        switch ($data)
        {
            case 1:
            case 7:
            case 14:
            case 30:
            case 60:
            case 90:
                break;
            default:
                $data = 14;
        }
        $this->template_data['content_data'][0] = 3;
        $this->template_data['content_data']['range'] = $data;
        $flag = $this->mysugar_model->graph($data);
        if (is_array($flag))
        {
            $this->template_data['head_data']['data'] = $flag;
            $this->template_data['head_data'] = $this->load->view('highchart_view', $this->template_data['head_data'], true);
            $this->template->load_template('template', 'graph_view', $this->template_data);
        }
        else
        {
            switch ($flag)
            {
                case 4:
                    $this->template_data['content_data']['error'] = "Invalid User!";
                    break;
                case 14:
                    $this->template_data['content_data']['error'] = "Invalid Date Range!";
                    break;
                case 3:
                    $this->template_data['content_data']['error'] = "Missing Paramters!";
                    break;
                case 13:
                    $this->template_data['content_data']['error'] = "You don't have any sugar data to display.";
                    break;
                case -1:
                    $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
                    break;
                default:
                    break;
            }
        }
    }

    public function delete($sugar_date = null, $tab = 1)
    {
        if ($sugar_date != null)
        {
            $data = array('sugar_date' => $sugar_date);

            $flag = $this->mysugar_model->delete($data);
            switch ($flag)
            {
                case 0:
                    $newdata = array('error' => "<font color='green'>Sugar information deleted.</font>");
                    break;
                case 3:
                    $newdata = array('error' => "Missing parameter!");
                    break;
                case 4:
                    $newdata = array('error' => "Invalid Userid!");
                    break;
                case 14:
                    $newdata = array('error' => "No Such Sugar Record Exist!");
                    break;
                default:
                    $newdata = array('error' => '<font color="red">The site has encountered a server error. Please refresh the page.</font>');
                    break;
            }
        }
        else
        {
            $newdata = array('error' => "Missing parameter!");
        }
        $this->session->set_flashdata($newdata);
        redirect("mysugar/pastdata/" . $tab);
    }

    public function edit($sugar_date = null, $tab = 1)
    {
        if ($sugar_date != null)
        {
            $data = array('start_date' => $sugar_date, 'end_date' => $sugar_date);
            $flag = $this->mysugar_model->pastdata($data);
            if (is_array($flag))
            {
                $this->template_data['content_data'] = $flag;
                $this->template_data['content_data']['tab'] = $tab;
                $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
                $this->template->load_template('template', 'edit_view', $this->template_data);
            }
            else
            {
                switch ($flag)
                {
                    case 4:
                        $this->template_data['content_data']['error'] = "Invalid User!";
                        break;
                    case 14:
                        $this->template_data['content_data']['error'] = "Invalid Date!";
                        break;
                    case 3:
                        $this->template_data['content_data']['error'] = "Missing Paramters!";
                        break;
                    case 13:
                        $this->template_data['content_data']['error'] = "No Sugar Exist for this date!";
                        break;

                    case -1:
                        $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
                        break;
                    default:
                        $this->template_data['content_data']['error'] = "Check log!";
                        break;
                }
                $this->template->load_template('template', 'error_view', $this->template_data);
            }
        }
        else
        {
            redirect('mysugar/pastdata');
        }
    }

    private function check_null($val)
    {
        if ($val == '')
        {
            return 0;
        }
        else
        {
            return $val;
        }
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */