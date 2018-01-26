<?php
/**
* 
*/
class Daftar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//load Modelku.php	
		$this->load->model('modelku');

		// load form and url helpers
        $this->load->helper(array('form', 'url'));
         
        // load form_validation library
        $this->load->library('form_validation');

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
            else
            {
                redirect('error/index');
            }
        }
	}
	public function index()
	{
        $data = array('error' => '');
        $this->load->view('content/v_header', $data);
        $this->load->view('signup/v_daftar', $data);
	}

	public function ndaftar()
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|min_length[3]',
        	array
        	(
        		'required' => 'Field %s harus diisi!',
        		'min_length' => '%s minimal 3 karakter!'
        	)
    	);
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[10]|min_length[3]',
        	array
        	(
        		'required' => 'Field %s harus diisi!',
        		'max_length' => '%s maksimal 10 karakter!',
        		'min_length' => '%s minimal 3 karakter!'
        	)
    	);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email',
        	 array
        	 (
        	 	'valid_email' => 'Isikan %s yang benar!',
        	 	'required' => '%s harus diisi!'
        	 )
    	);
    	$this->form_validation->set_rules('phone', 'Nomor HP/Telepon', 'required|numeric',
        	 array
        	 (
        	 	'required' => '%s harus diisi!',
        	 	'numeric' => 'Isikan %s yang benar!' 
        	 )
    	);
        $this->form_validation->set_rules('password', 'Kata Sandi', 'required|min_length[6]',
        	array
        	(
        		'required' => '%s harus diisi!', 
        		'min_length' => '%s minimal harus 6 karakter!' 
        	)
    	);
        $this->form_validation->set_rules('confirmPass', 'Konfirmasi kata sandi', 'required|matches[password]',
        	array
        	(
        		'required' => '%s harus diisi!', 
        		'matches' => '%s tidak cocok!' 
        	)
    	);
        $this->form_validation->set_rules('lain-lain', 'Lain-lain', 'required|min_length[10]',
        	 array
        	 (
        	 	'required' => '%s harus diisi, misal status anda dll. Karena untuk mempermudah kami mengetahui anda',
        	 	'min_length' => '%s minimal diisi 10 karakter!'
        	 )
    	);

    	if ($this->form_validation->run() == FALSE)
        {
            $this->load->view("signup/v_daftar");
        }
        else
        {
        	$nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$phone = $this->input->post('phone');
			$lain = $this->input->post('lain-lain');

			$data = array
			(
				'fullname' => $nama,
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'phone' => $phone,
				'deskripsi' => $lain,
				'level' => 'member'
			);

			$this->modelku->input_data($data, 't_user');
            $this->session->set_flashdata('succesDaftar','<div class="alert alert-success" role="alert"> Selamat anda berhasil mendaftar! Silahkan login! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('signUp/daftar/index');
        }
	}
}