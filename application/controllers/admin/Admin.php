<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
		{
			redirect('login');
		}
		elseif($this->session->userdata('level') == 'member')
		{
			redirect('member/member');
		}

		$this->load->model('modelku');
	}

	public function index() 
	{
		$data = array(
					'error' => '',
					'username' => $this->session->userdata('username')
				);
		
		$data['side']='admin/tampil/side';
		$data['content']='welcome';
		$this->load->view('admin/tampil/main', $data);
	}

	public function njajal()
	{
		$this->load->view("welcome2");
	}

	public function nampil_detail($id)
	{
		$where = array
		(
			'id_barang' => $id,
			'kondisi' => 'Ada' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/detail_barang', $data);
	}

	public function nampil_detailMsk($id)
	{
		$where = array
		(
			'id_barang' => $id
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/detail_barang', $data);
	}

	public function nampil_detailKlr($id)
	{
		$where = array
		(
			'id_barang_keluar' => $id,
			'keterangan' => 'barang keluar'
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/detail_barang', $data);
	}

	public function nampil_detailIlng($id)
	{
		$where = array
		(
			'id_barang_keluar' => $id,
			'kondisi' => 'Hilang'
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/detail_barang', $data);
	}

	public function nampil_detailRsk($id)
	{
		$where = array
		(
			'id_barang_keluar' => $id,
			'kondisi' => 'Rusak' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/detail_barang', $data);
	}

	public function nampil_detailPnjm($id)
	{
		$where = array
		(
			'id_peminjaman' => $id,
			'kondisi' => 'Dipinjam' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/detail_barang', $data);
	}

	public function nampil_detailHstr($id)
	{
		$where = array
		(
			'id_peminjaman' => $id,
			'kondisi' => 'Dipinjam' 
		);
		$data['detail_histori_pinjam'] = $this->modelku->tampil_detail($where, 'detail_histori_pinjam')->result();
		$this->load->view('admin/barang/detail_hstr', $data);
	}

	public function nampil_detailPngmblian($id)
	{
		$where = array
		(
			'id_peminjaman' => $id
		);
		$data['detail_pengembalian'] = $this->modelku->tampil_detail($where, 'detail_pengembalian')->result();
		$this->load->view('admin/barang/detail_pngmblian', $data);
	}

	public function nampil_detailBrangRuang($id)
	{
		$where = array
		(
			'id_ruang' => $id
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/ruang/detail_barang', $data);
	}

	public function ndeleng_barang()
	{
		$data['t_barang'] = $this->modelku->tampil_data('t_barang')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_barang';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barangMasuk()
	{
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/l_barang_masuk';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_keluar()
	{
		$data['t_barang_keluar'] = $this->modelku->tampil_data('t_barang_keluar')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_barang_keluar';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_ilang()
	{
		$data['t_kehilangan'] = $this->modelku->tampil_data('t_kehilangan')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_t_kehilangan';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_rusak()
	{
		$data['t_kerusakan'] = $this->modelku->tampil_data('t_kerusakan')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_t_kerusakan';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_pinjam()
	{
		$data['t_peminjaman'] = $this->modelku->tampil_data('t_peminjaman')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_t_peminjaman';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_histori_pinjam()
	{
		$data['t_histori_pinjam'] = $this->modelku->tampil_data('t_histori_pinjam')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_histori_pinjam';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_data_pengembalian()
	{
		$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_data_pengembalian';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_ruang()
	{
		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/ruang/v_ruang';
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_user()
	{
		$data['t_user'] = $this->modelku->tampil_data('t_user')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/user/v_user';
		$this->load->view('admin/tampil/main', $data);
	}

	public function input_barang_masuk()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_barang_masuk';
		$this->load->view('admin/tampil/main', $data);
	}

	public function nginput_barang_pinjam()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_peminjaman';
		$this->load->view('admin/tampil/main', $data);
	}

	public function nginput_barang_pengembalian()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_pengembalian';
		$this->load->view('admin/tampil/main', $data);
	}

	public function nginput_barang_pengembalianRusak()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_pengembalian_barangRusak';
		$this->load->view('admin/tampil/main', $data);
	}

	public function nginput_barang_pengembalianHilang()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_pengembalian_barangHilang';
		$this->load->view('admin/tampil/main', $data);	
	}
	
	public function logout() 
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('utama');
	}
}