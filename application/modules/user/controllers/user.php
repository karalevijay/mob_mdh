<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MX_Controller
{

    protected $template_data = array('static_page', 'head_data', 'header_data' => array(), 'content_data' => array(), 'footer_data' => array());

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
        $unset = array('vitals', 'meds', 'labs', 'goals', 'questions');
        $this->session->unset_userdata($unset);
        $this->template_data['header_data'] = array('uid' => $this->session->userdata('uid'));
    }

    public function index()
    {
        if ($this->session->userdata('uid') != null)
        {
            redirect("/dashboard");
            die();
        }

        $this->template_data['head_data'] = $this->load->view('ios_app_js', '', true);
        $this->template->load_template('template', 'home_view', $this->template_data);
    }

    public function about_us()
    {
        $this->template->load_template('template', 'aboutus_view', $this->template_data);
    }

    public function privacy()
    {
        $this->template->load_template('template', 'privacyPolicy', $this->template_data);
    }

    public function learn_more()
    {
        $this->template->load_template('template', 'learnmore_view', $this->template_data);
    }

    public function tac()
    {
        $this->template->load_template('template', 'tac_view', $this->template_data);
    }

    public function login()
    {
        if ($this->session->userdata('uid') != null)
        {
            redirect("/dashboard");
            die();
        }
        $data = array();
        if ($this->input->post('email', TRUE))
        {

            if ($this->input->post('email', TRUE) == '' || $this->input->post('password', TRUE) == '')
            {
                $this->template_data['content_data']['error'] = '<font color="red">Both fields are required.</font>';
            }
            else
            {
                $data = array('password' => $this->input->post('password', TRUE), 'email' => $this->input->post('email', TRUE));
                $flag = $this->auth_model->verify($data);

                if ($flag == 0)
                {

                    if (isset($_POST['remember']))
                    {
                        $year = time() + 31536000;
                        setcookie('remember_me', $this->input->post('email', TRUE), $year);
                    }
                    else
                    {
                        if (isset($_COOKIE['remember_me']))
                        {
                            $past = time() - 100;
                            setcookie('remember_me', '', $past);
                        }
                    }


                    redirect("dashboard/");
                }
                else if ($flag == 1 || $flag == 4)
                {
                    $this->template_data['content_data']['error'] = 'The email/password combintation you entered was incorrect. Please try again.';
                }
                else if ($flag == -1)
                {
                    $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
                }
            }
            $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
            $this->template->load_template('template', 'login_view', $this->template_data);
        }
        else
        {
            $this->template_data['head_data'] = $this->load->view('validation_js', '', true);
            $this->template->load_template('template', 'login_view', $this->template_data);
        }
    }

    public function register()
    {

        if ($this->session->userdata('uid') != null)
        {
            redirect("/dashboard");
            die();
        }
        $data = array();
        $this->template_data['head_data'] = $this->load->view('geopicker_view', '', true);
        if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['firstname']) && isset($_POST['zip']))
        {
            if ($_POST['email'] != "" && $_POST['password'] != "" && $_POST['firstname'] != "" && $_POST['zip'] != "" && $_POST['diabetestype'] != "" && isset($_POST['tac']) && $_POST['repassword'] != "")
            {
                $data = array('password' => $_POST['password'], 'email' => $_POST['email'], 'firstname' => $_POST['firstname'], 'diabetestype' => $_POST['diabetestype'], 'zip' => $_POST['zip']);

                if ($_POST['password'] != $_POST['repassword'])
                {
                    $this->template_data['content_data']['error'] = "<font color='red'>The password fields do not match.</font>";
                }
                else if ($this->auth_model->register($data) == 0)
                {
                    redirect("dashboard/");
                    die();
                }
                else if ($this->auth_model->register($data) == 1)
                {

                    $this->template_data['content_data']['error'] = "Invalid email address.";
                }
                else if ($this->auth_model->register($data) == 2)
                {
                    $this->template_data['content_data']['error'] = "This email address is already associated with an account. ";
                }
                else
                {
                    $this->template_data['content_data']['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
                }
            }
            else
            {
                $this->template_data['content_data']['error'] = "Please fill in all fields for registration.";
            }
            $this->template_data['content_data']['data'] = $data;
            $this->template->load_template('template', 'register_view', $this->template_data);
        }
        else
        {
            $this->template->load_template('template', 'register_view', $this->template_data);
        }
    }

    public function error()
    {
        $this->template->load_template('template', 'error_view', $this->template_data);
    }

    public function forgot_pwd()
    {
        if ($this->session->userdata('uid') != null)
        {
            redirect("/dashboard");
            die();
        }
        $this->template_data['head_data'] = $this->load->view('forgot_pwd_js','', true);
        $this->template->load_template('template', 'forgotpwd_view', $this->template_data);
    }

    public function forgot_pwd_submit()
    {
        $data = array();
        if (isset($_POST['email']) && $_POST['email'] != '')
        {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $newdata['error'] = 'Invalid email address.';
                $this->session->set_flashdata($newdata);
                redirect('/user/forgot_pwd');
            }
            else
            {
                $data = array('email' => $_POST['email']);
                $this->load->model('auth_model');
                $flag = $this->auth_model->forgot_password($data);
                if ($flag == 0)
                {
                    $this->template_data['content_data']['error'] = "<font color='green'>We just sent you a link to reset your password. Check your inbox!</font>";
                    $this->template->load_template('template', 'error_view', $this->template_data);
                }
                else if ($flag == 1)
                {
                    $newdata['error'] = 'Invalid email address.';
                    $this->session->set_flashdata($newdata);
                    redirect('/user/forgot_pwd');
                }
                else
                {
                    $newdata['error'] = '<font color="red">The site has encountered a server error. Please refresh the page.</font>';
                    $this->session->set_flashdata($newdata);
                    redirect('/user/forgot_pwd');
                }
            }
        }
        else
        { 
            $newdata['error'] = '<font color="red">Please Enter E-Mail!</font>';
            $this->session->set_flashdata($newdata);
            redirect('/user/forgot_pwd');
        }
    }

    public function logout()
    {

        $this->load->model('auth_model');
        $this->auth_model->destroy();
        $newdata = array('error' => "<font color='green'>You have been successfully logged out.</font>");
        $this->session->set_flashdata($newdata);
        redirect("user/login");
    }

}
