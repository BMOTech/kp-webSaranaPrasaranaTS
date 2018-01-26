<?php
	/**
	* 
	*/
	class User extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('modelku');

			if ($this->session->userdata('level') == 'member') 
			{
				redirect('index.html');
			}
			elseif ($this->session->userdata('level') == '') 
			{
				redirect('index.html');
			}	
		}

		public function ndeleng_user()
		{
			$data['t_user'] = $this->modelku->tampil_data('t_user')->result();
			$this->load->view('admin/user/v_user', $data);
		}

		public function ngapus_user($id)
		{
			$where = array('id' => $id);
			$this->modelku->delete_by_id($where, 't_user');
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			echo json_encode(array("status" => TRUE));
		}
	}
?>