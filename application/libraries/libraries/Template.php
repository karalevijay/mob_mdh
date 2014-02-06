<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	function check_null($val)
    {
        if ($val!=null || $var!='' || !is_array($var))
        {
            return 0;
        }
        else
        {
            return $val;
        }
    }
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
                        $this->set('head', $this->CI->load->view('head_view', $view_data,true));
                        $this->set('header', $this->CI->load->view('header_view', $view_data,true));
                        $this->set('contents', $this->CI->load->view($view, $view_data,true));	
                        $this->set('footer', $this->CI->load->view('footer_view', $view_data,true));	
                        return $this->CI->load->view($template, $this->template_data, $return);
		}
                
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */