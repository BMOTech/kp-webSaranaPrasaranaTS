<?php
/**
* 
*/
class Ruang extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('modelku');
		$this->load->helper('url');
	}

	//For Ruang
	public function ndeleng_ruang()
	{
		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$this->load->view('guest/ruang/v_ruang', $data);
	}
}