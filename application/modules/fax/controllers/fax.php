<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fax extends My_Controller
{

    protected $template_data = array('head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fax_model');
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        $this->template_data['head_data'] = $this->load->view('fax_css_view', '', true);
        $this->template->load_template('template', 'fax_body_view', $this->template_data);
    }

    public function fax_data($number = null)
    {

        if ($number == null)
        {
            echo '-2';
        }
        else
        {

            $this->load->model('myvisit/myvisit_model');
            $this->template_data['content_data']['name'] = $this->myvisit_model->get_name();
            $this->template_data['content_data']['prescribers'] = $this->myvisit_model->get_prescribers();
            $this->template_data['content_data']['meds'] = $this->myvisit_model->get_meds();
            $this->template_data['content_data']['goals'] = $this->myvisit_model->get_goals();
            $this->template_data['content_data']['questions'] = $this->myvisit_model->get_q();
            $this->load->model('mynumbers/mynumbers_model');
            $this->template_data['content_data']['latest_bp'] = $this->mynumbers_model->get_latest_bp();
            $this->template_data['content_data']['latest_weight'] = $this->mynumbers_model->get_latest_weight();
            $this->template_data['content_data']['latest_a1c'] = $this->mynumbers_model->get_latest_a1c();
            $this->template_data['content_data']['latest_cholesterol'] = $this->mynumbers_model->get_latest_cholesterol();

            $end_date = date("Y-m-d", time());
            $time = strtotime("-14 days", time());
            $start_date = date("Y-m-d", $time);
            $data = array('start_date' => $start_date, 'end_date' => $end_date);
            $this->load->model('mysugar/mysugar_model');
            $this->template_data['content_data']['sugar'] = $this->mysugar_model->pastdata($data);

            $data['data'] = $this->load->view('fax_report_part_one', $this->template_data, true);
            $data = array('data' => $data['data'], 'number' => $number);
            $flag = $this->fax_model->send_fax($data);

            $data['data'] = $this->load->view('fax_report_part_two', $this->template_data, true);
            $data = array('data' => $data['data'], 'number' => $number);
            $flag1 = $this->fax_model->send_fax($data);
            if ($flag == 1 && $flag1 == 1)
                echo 1;
            else
            {
                log_message('error', 'path:' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . ', Unexpected return value on time ' . date('d-m-Y H:i:s', now()) . ' for user id ' . $this->session->userdata('uid'));
                echo -1;
            }
        }
    }

    public function print_report()
    {
        $this->load->view('print_ajax_view', $this->template_data);
    }

    public function ajax_print()
    {
        $this->load->model('myvisit/myvisit_model');

        $this->template_data['content_data']['name'] = $this->myvisit_model->get_name();
        $this->template_data['content_data']['prescribers'] = $this->myvisit_model->get_prescribers();
        $this->template_data['content_data']['meds'] = $this->myvisit_model->get_meds();
        $this->template_data['content_data']['goals'] = $this->myvisit_model->get_goals();
        $this->template_data['content_data']['questions'] = $this->myvisit_model->get_q();

        $this->load->model('mynumbers/mynumbers_model');
        $this->template_data['content_data']['latest_bp'] = $this->mynumbers_model->get_latest_bp();
        $this->template_data['content_data']['latest_weight'] = $this->mynumbers_model->get_latest_weight();
        $this->template_data['content_data']['latest_a1c'] = $this->mynumbers_model->get_latest_a1c();
        $this->template_data['content_data']['latest_cholesterol'] = $this->mynumbers_model->get_latest_cholesterol();

        $end_date = date("Y-m-d", time());
        $time = strtotime("-14 days", time());
        $start_date = date("Y-m-d", $time);
        $data = array('start_date' => $start_date, 'end_date' => $end_date);
        $this->load->model('mysugar/mysugar_model');
        $this->template_data['content_data']['sugar'] = $this->mysugar_model->pastdata($data);
        $this->load->view('print_body_view', $this->template_data);
    }

    public function mail_feedback()
    {

        $this->template->load_template('template', 'feedback_view', $this->template_data);
    }

    public function mail_report()
    {
        $this->template_data['head_data'] = $this->load->view('mail_report_view_is', '', true);
        $this->template->load_template('template', 'mail_report_view', $this->template_data);
    }

    public function mailpdf_report()
    {
        if ($_POST['email'] == '' || $_POST['date'] == '')
        {
            echo -2;
        }
        else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $this->input->post('email')))
        {
            echo 2;
        }
        else
        {

            $message = $_POST['message'];
            $date = $_POST['date'];
            $email = $_POST['email'];
            $to = $email;

            $this->load->model('myvisit/myvisit_model');
            $user_name = $this->myvisit_model->get_name();
            if ($user_name == 'user' || $user_name == -1)
            {
                log_message('error', 'path:' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . ', Unexpected return value on time ' . date('d-m-Y H:i:s', now()) . ' for user id ' . $this->session->userdata('uid'));
                echo -1;
            }
            else
            {

                $user_provider = 'Doctor';
                $this->template_data['content_data']['name'] = $this->myvisit_model->get_name();
                $this->template_data['content_data']['prescribers'] = $this->myvisit_model->get_prescribers();
                $this->template_data['content_data']['meds'] = $this->myvisit_model->get_meds();
                $this->template_data['content_data']['goals'] = $this->myvisit_model->get_goals();
                $this->template_data['content_data']['questions'] = $this->myvisit_model->get_q();

                $this->load->model('mynumbers/mynumbers_model');
                $this->template_data['content_data']['latest_bp'] = $this->mynumbers_model->get_latest_bp();
                $this->template_data['content_data']['latest_weight'] = $this->mynumbers_model->get_latest_weight();
                $this->template_data['content_data']['latest_a1c'] = $this->mynumbers_model->get_latest_a1c();
                $this->template_data['content_data']['latest_cholesterol'] = $this->mynumbers_model->get_latest_cholesterol();

                $end_date = date("Y-m-d", time());
                $time = strtotime("-14 days", time());
                $start_date = date("Y-m-d", $time);
                $data = array('start_date' => $start_date, 'end_date' => $end_date);
                $this->load->model('mysugar/mysugar_model');
                $this->template_data['content_data']['sugar'] = $this->mysugar_model->pastdata($data);
                $html = $this->load->view('mail_report_body', $this->template_data, true);


                $this->load->library('Mailer');
                try
                {
                    $mail = new PHPMailer();
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: pdf/html; charset=iso-8859-1' . "\r\n";
                    $message = '<html><p>Dear ' . $user_provider . ',</p><p>I am preparing for my next visit with you. Attached to this email is my pertinent health information so that you can review it prior to my visit. I have collected and sent this information via My Diabetes Home, an online tool that I am using to manage my diabetes.</p><p>' . $message . '</p><p>Thank you,<br/>' . $user_name . '</p></html>';
                    $mail->IsSMTP();
                    $mail->IsHTML(true);
                    $mail->SMTPSecure = "ssl";
                    $mail->Host = "smtp.gmail.com";
                    $mail->From = "maydiabeteshome@gmail.com";
                    $mail->FromName = $user_name;
                    $mail->AddAddress($to);
                    $mail->SMTPAuth = "true";
                    $mail->Username = "maydiabeteshome@gmail.com";
                    $mail->Password = "mdhmobile";
                    $mail->Port = "465";
                    $mail->AddReplyTo = $to;
                    $mail->Subject = "$user_name's VisitOptimizer report for appointment on $date";
                    $mail->IsHTML(true);
                    $mail->Body = $message;
                    $mail->AddStringAttachment($html, 'VOReport.html', 'base64', 'application/pdf');
                }
                catch (phpmailerException $e)
                {
                    log_message('error', 'path:' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . ', Unexpected return value on time ' . date('d-m-Y H:i:s', now()) . ' for user id ' . $this->session->userdata('uid'));
                    echo -1;
                }
                catch (Exception $e)
                {
                    log_message('error', 'path:' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . ', Unexpected return value on time ' . date('d-m-Y H:i:s', now()) . ' for user id ' . $this->session->userdata('uid'));
                    echo -1;
                }
                if ($mail->Send())
                {

                    echo 1;
                }
                else
                {
                    log_message('error', 'path:' . $this->router->fetch_class() . '/' . $this->router->fetch_method() . ', Unexpected return value on time ' . date('d-m-Y H:i:s', now()) . ' for user id ' . $this->session->userdata('uid'));
                    echo -1;
                }
            }
        }
    }

}
