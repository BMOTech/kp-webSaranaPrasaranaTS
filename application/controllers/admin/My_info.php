<?php
/**
* 
*/
class My_info extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == 'member') 
		{
			redirect('index.html');
		}
		elseif ($this->session->userdata('level') == '') 
		{
			redirect('index.html');
		}
		$this->load->model('modelku');
		$this->load->helper('url');
	}

	public function ndeleng_akun()
	{
		$data['t_admin'] = $this->modelku->tampil_adm_user()->result();
		$this->load->view('admin/v_info', $data);
	}

	public function ngedit_akun($id)
	{
		$where = array('id' => $id);
		$data['t_admin'] = $this->modelku->edit_data($where, 't_admin')->result();
		$this->load->view('admin/v_edit_info', $data);
	}

	public function update_akun()
	{
		$qry1 = $this->db->query("select id from t_admin where id=".$_SESSION['id'])->result_array();
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

			$this->modelku->update_data($where, $data, 't_admin');
			redirect('admin\My_info/ndeleng_akun');
		}
	}

	public function ngedit_pass($id)
	{
		$where = array('id' => $id);
		$data['t_admin'] = $this->modelku->edit_data($where, 't_admin')->result();
		$this->load->view('admin/v_edit_pass', $data);
	}

	public function update_pass()
	{
		$qry1 = $this->db->query("select id from t_admin where id=".$_SESSION['id'])->result_array();
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

			$this->modelku->update_data($where, $data, 't_admin');
			redirect('admin\My_info/ndeleng_akun');
		}
	}
}
