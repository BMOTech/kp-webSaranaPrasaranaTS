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

	public function ndeleng_akun()
	{
		$data['t_user'] = $this->modelku->tampil_user()->result();
		$data['side']='member/tampil/side';
		$data['content']='member/v_info';
		$this->load->view('member/tampil/main', $data);
	}

	public function edit_profile($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_user', $where);
		echo json_encode($data);
	}

	public function update_profil()
	{
		$id = $this->input->post('id');
		$uname = $this->input->post('username');
		$fullname = $this->input->post('fullname');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$deskripsi = $this->input->post('deskripsi');

		$where = array
		(
			'id' => $id
		);

		$data = array
		(
			'username' => $uname,
			'fullname' => $fullname,
			'email' => $email,
			'phone' => $phone,
			'deskripsi' => $deskripsi
		);
		$this->modelku->barang_update($where, $data, 't_user');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');		
	}

	public function ngedit_pass($id)
	{
		$where = array('id' => $id);
		$this->session->set_userdata('idne', $id);
		$data['t_user'] = $this->modelku->edit_data($where, 't_user')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/v_edit_pass';
		$this->load->view('member/tampil/main', $data);
	}

	public function update_pass()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password Baru', 'required|min_length[6]',
        	array
        	(
        		'required' => '%s harus diisi!', 
        		'min_length' => '%s minimal harus 6 karakter!' 
        	)
    	);
        $this->form_validation->set_rules('repassword', 'Ketik Ulang Password Baru', 'required|matches[password]',
        	array
        	(
        		'required' => '%s harus diisi!', 
        		'matches' => '%s tidak cocok!' 
        	)
    	);

    	if ($this->form_validation->run() == FALSE)
        {
        	$idne = $this->session->userdata('idne');
            $where = array('id' => $idne);
			$data['t_user'] = $this->modelku->edit_data($where, 't_user')->result();
			$data['side']='member/tampil/side';
			$data['content']='member/v_edit_pass';
			$this->load->view('member/tampil/main', $data);
        }
        else
        {
        	$qry1 = $this->db->query("select id from t_user where id=".$_SESSION['id'])->result_array();
			foreach ($qry1 as $id) 
			{
				$id = $id['id'];
				$newpass = $this->input->post('password');
				$repass = $this->input->post('repassword');
				
				$data = array
				(
					'password' => md5($newpass),
				);

				$where = array('id' => $id);

				$this->modelku->update_data($where, $data, 't_user');
            	$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Password berhasil diubah! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('member\My_info/ndeleng_akun');
			}
        }
	}

	function hapus($id)
	{
		$where = array('id' => $id);
		$this->modelku->delete_by_id($where,'t_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('utama');
	}	
}
