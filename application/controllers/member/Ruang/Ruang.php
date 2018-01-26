<?php
/**
* 
*/
class Ruang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelku');

		if ($this->session->userdata('level') == 'admin') 
		{
			redirect('admin/admin');
		}
		elseif ($this->session->userdata('level') == '') 
		{
			redirect('index.html');
		}
	}

	public function ndeleng_ruang()
	{
		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$this->load->view('member/ruang/v_ruang', $data);
	}
}