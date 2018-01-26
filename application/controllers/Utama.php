<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('modelku');
		if($this->session->userdata('username'))
		{
			if($this->session->userdata('level') == "admin")
			{
				redirect('admin/admin');
			}
			elseif($this->session->userdata('level') == "member")
			{
				redirect('member/member');
			}
		}
	}

	public function index()
	{
		$data = array('error' => '');
		$this->load->view('content/v_headerHome', $data);
		$this->load->view('content/v_home', $data);
	}

	public function login_process()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$result = $this->modelku->cek_user($username, $password);
		$result2 = $this->modelku->cek_admin($username, $password);

		//For member/user
		if($result->num_rows() > 0)
		{
			foreach ($result->result() as $row) 
			{
				$id = $row->id;
				$username = $row->username;
				$password = $row->password;
				$emaile = $row->email;
				$fullnamee = $row->fullname;
				$level = $row->level;
			}

			$newdata = array
			(
			        'id'  => $id,
			        'username' => $username,
			        'password' => $password,
			        'email' => $emaile,
			        'fullname' => $fullnamee,
			        'level' => $level,
			        'logged_in' => TRUE
			);
			
			//set up session data
			$this->session->set_userdata($newdata);
			if($this->session->userdata('level')=='admin') 
			{
				redirect('admin/admin');
			}
			elseif ($this->session->userdata('level')=='member') 
			{
				redirect('member/member');
			}
		}
		else
		{
			
			?>
				<script type="text/javascript">
					alert("Username dan kata sandi yang dimasukan salah!");
				</script>
			<?php
		}


		//For Admin
		if($result2->num_rows() > 0)
		{
			foreach ($result2->result() as $garis) 
			{
				$id = $garis->id;
				$username = $garis->username;
				$password = $garis->password;
				$emailku = $garis->email;
				$fullname = $garis->fullname;
				$level = $garis->level;
			}

			$newdata2 = array
			(
			        'id'  => $id,
			        'username' => $username,
			        'password' => $password,
			        'email' => $emailku,
			        'fullname' => $fullname,
			        'level' => $level,
			        'logged_in' => TRUE
			);
			
			//set up session data
			$this->session->set_userdata($newdata2);
			if($this->session->userdata('level')=='admin') 
			{
				redirect('admin/admin');
			}
			elseif ($this->session->userdata('level')=='member') 
			{
				redirect('member/member');
			}
		}
		else
		{

			?>
				<script type="text/javascript">
					alert("Username dan kata sandi yang dimasukan salah!");
				</script>
			<?php
		}
	}
}
