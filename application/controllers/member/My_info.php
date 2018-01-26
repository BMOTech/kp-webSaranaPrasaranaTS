<?php
/**
* 
*/
class My_info extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelku');
		$this->load->helper('url');

		if ($this->session->userdata('level') == 'admin') 
		{
			redirect('admin/admin');
		}
		elseif ($this->session->userdata('level') == '') 
		{
			redirect('index.html');
		}
	}

	public function edit_info()
	{
		$this->load->view("member/v_edit_info");
	}

	public function ndeleng_akun()
	{
		$data['t_user'] = $this->modelku->tampil_user()->result();
		$this->load->view('member/v_info', $data);
	}

	public function ngedit_akun($id)
	{
		$where = array('id' => $id);
		$data['t_user'] = $this->modelku->edit_data($where, 't_user')->result();
		$this->load->view('member/v_edit_info', $data);
	}

	public function update_akun()
	{
		$qry1 = $this->db->query("select id from t_user where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $id) 
		{
			$id = $id['id'];
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$fullname = $this->input->post('fullname');
			
			$data = array
			(
				'username' => $username,
				'email' => $email,
				'fullname' => $fullname
			);

			$where = array('id' => $id);

			$this->modelku->update_data($where, $data, 't_user');
			redirect('member\My_info/ndeleng_akun');
		}
	}

	public function ngedit_pass($id)
	{
		$where = array('id' => $id);
		$data['t_user'] = $this->modelku->edit_data($where, 't_user')->result();
		$this->load->view('member/v_edit_pass', $data);
	}

	public function update_pass()
	{
		$qry1 = $this->db->query("select id from t_user where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $id) 
		{
			$id = $id['id'];
			$newpass = $this->input->post('newpass');
			$repass = $this->input->post('rpass');
			
			$data = array
			(
				'password' => md5($newpass),
			);

			$where = array('id' => $id);

			$this->modelku->update_data($where, $data, 't_user');
			redirect('member\My_info/ndeleng_akun');
		}
	}	
}
