<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
		{
			redirect('login');
		}
		elseif($this->session->userdata('level') == 'admin')
		{
			redirect('admin/admin');
		}

		$this->load->model('modelku');

	}

	public function index() 
	{
		$data = array(
					'error' => '',
					'username' => $this->session->userdata('username')
				);
		
		$data['side']='member/tampil/side';
		$data['content']='welcome';
		$this->load->view('member/tampil/main', $data);
	}

	public function ndeleng_barang()
	{
		$data['t_barang'] = $this->modelku->tampil_data('t_barang')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_barang';
		$this->load->view('member/tampil/main', $data);
	}

	public function ndeleng_barang_masuk()
	{
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_barang_masuk';
		$this->load->view('member/tampil/main', $data);
	}

	public function ndeleng_barang_keluar()
	{
		$data['t_barang_keluar'] = $this->modelku->tampil_data('t_barang_keluar')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_barang_keluar';
		$this->load->view('member/tampil/main', $data);
	}

	public function ndeleng_barang_dipinjam()
	{
		$where = array('peminjam' => $_SESSION['id']);
		$data['t_peminjaman'] = $this->modelku->tampil_pinjam($where, 't_peminjaman')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_barang_pinjaman';
		$this->load->view('member/tampil/main', $data);
	}

	public function ndeleng_barang_rusak()
	{
		$data['t_kerusakan'] = $this->modelku->tampil_data('t_kerusakan')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_t_kerusakan';
		$this->load->view('member/tampil/main', $data);
	}

	public function ndeleng_barang_ilang()
	{
		$data['t_kehilangan'] = $this->modelku->tampil_data('t_kehilangan')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_t_kehilangan';
		$this->load->view('member/tampil/main', $data);
	}

	public function nginput_barang_pinjam()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_peminjaman';
		$this->load->view('member/tampil/main', $data);
	}

	public function nginput_barang_pengembalian()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_pengembalian';
		$this->load->view('member/tampil/main', $data);
	}

	public function nginput_barang_pengembalianRusak()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_kembalian_barangRusak';
		$this->load->view('member/tampil/main', $data);
	}

	public function nginput_barang_pengembalianHilang()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_pengembalian_barangHilang';
		$this->load->view('member/tampil/main', $data);
	}

	public function ndeleng_ruang()
	{
		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/ruang/v_ruang';
		$this->load->view('member/tampil/main', $data);
	}

	public function nampil_detail($id)
	{
		$where = array
		(
			'id_barang' => $id,
			'kondisi' => 'Ada' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/detail_barang', $data);
	}

	public function nampil_detailMsk($id)
	{
		$where = array
		(
			'id_barang' => $id
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/detail_barang', $data);
	}

	public function nampil_detailKlr($id)
	{
		$where = array
		(
			'id_barang_keluar' => $id,
			'keterangan' => 'barang keluar'
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/detail_barang', $data);
	}

	public function nampil_detailHlng($id)
	{
		$where = array
		(
			'id_barang_keluar' => $id,
			'kondisi' => 'Hilang'
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/detail_barang', $data);
	}

	public function nampil_detailRsk($id)
	{
		$where = array
		(
			'id_barang_keluar' => $id,
			'kondisi' => 'Rusak' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/detail_barang', $data);
	}

	public function nampil_detailPnjm($id)
	{
		$where = array
		(
			'id_peminjaman' => $id,
			'kondisi' => 'Dipinjam' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/detail_barang', $data);
	}

	public function nampil_detailBrangRuang($id)
	{
		$where = array
		(
			'id_ruang' => $id
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/ruang/detail_barang', $data);
	}

	public function logout() 
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('utama');
	}
}