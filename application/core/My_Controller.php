<?php

/**
* 
*/
class My_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function layout($content, $data = null)
	{
		$data['header'] = $this->load->view('content/v_dbheader', $data, TRUE);
		$data['sidebar'] = $this->load->view('admin/templates/sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('admin/templates/footer', $data, TRUE);
        
        $this->load->view('admin/templates/main', $data);
	}

	public function layoutMem($content, $data = null)
	{
		$data['header'] = $this->load->view('content/v_headerMem', $data, TRUE);
		$data['sidebar'] = $this->load->view('member/templates/sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('member/templates/footer', $data, TRUE);
        
        $this->load->view('member/templates/main', $data);
	}

	public function layoutGuest($content, $data = null)
	{
		$data['header'] = $this->load->view('content/v_headerGuest', $data, TRUE);
		$data['sidebar'] = $this->load->view('guest/templates/sidebar', $data, TRUE);
        $data['content'] = $this->load->view($content, $data, TRUE);
        $data['footer'] = $this->load->view('guest/templates/footer', $data, TRUE);
        
        $this->load->view('guest/templates/main', $data);
	}
}