<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Checksession
    {
        private $CI;

        public function __construct()
        {
            $this->CI =&get_instance();
        }

        public function index()
        {
            if($this->CI->router->fetch_class() != "login")
            {
                // session check logic here...change this accordingly
                if($this->CI->session->userdata['id'] == '' )
                {
                    redirect('login');
                }
            }

        }
    }