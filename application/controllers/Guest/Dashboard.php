	<?php
/**
* 
*/
class Dashboard extends My_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('modelku');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['side']='guest/tampil/side';
		$data['content']='welcome';
		$this->load->view('guest/tampil/main', $data);
	}

	public function ndeleng_barang()
	{
		$data['t_barang'] = $this->modelku->tampil_data('t_barang')->result();
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_barang';
		$this->load->view('guest/tampil/main', $data);
	}

	public function ndeleng_barangMasuk()
	{
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/l_barang_masuk';
		$this->load->view('guest/tampil/main', $data);
	}

	public function ndeleng_barang_keluar()
	{
		$data['t_barang_keluar'] = $this->modelku->tampil_data('t_barang_keluar')->result();
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_barang_keluar';
		$this->load->view('guest/tampil/main', $data);
	}

	public function ndeleng_data_pengembalian()
	{
		$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_data_pengembalian';
		$this->load->view('guest/tampil/main', $data);
	}

	public function ndeleng_ruang()
	{
		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$data['side']='guest/tampil/side';
		$data['content']='guest/ruang/v_ruang';
		$this->load->view('guest/tampil/main', $data);
	}

	public function nampil_detail($id)
	{
		$where = array
		(
			'id_barang' => $id,
			'kondisi' => 'Ada' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('guest/barang/detail_barang', $data);
	}

	public function nampil_detailMsk($id)
	{
		$where = array
		(
			'id_barang' => $id
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('guest/barang/detail_barang', $data);
	}

	public function nampil_detailKlr($id)
	{
		$where = array
		(
			'id_barang_keluar' => $id,
			'keterangan' => 'barang keluar'
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('guest/barang/detail_barang', $data);
	}

	public function nampil_detailPnjm($id)
	{
		$where = array
		(
			'id_peminjaman' => $id,
			'kondisi' => 'Dipinjam' 
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('guest/barang/detail_barang', $data);
	}

	public function nampil_detailPngmblian($id)
	{
		$where = array
		(
			'id_peminjaman' => $id
		);
		$data['detail_pengembalian'] = $this->modelku->tampil_detail($where, 'detail_pengembalian')->result();
		$this->load->view('guest/barang/detail_pngmblian', $data);
	}

	public function ndeleng_barang_pinjam()
	{
		$data['t_peminjaman'] = $this->modelku->tampil_data('t_peminjaman')->result();
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_t_peminjaman';
		$this->load->view('guest/tampil/main', $data);
	}

	public function nampil_detailBrangRuang($id)
	{
		$where = array
		(
			'id_ruang' => $id
		);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('guest/ruang/detail_barang', $data);
	}

	public function nginput_barang_pinjam()
	{
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_peminjaman';
		$this->load->view('guest/tampil/main', $data);
	}

	public function nginput_barang_pengembalian()
	{
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_pengembalian';
		$this->load->view('guest/tampil/main', $data);
	}

	public function nginput_barang_pengembalianRusak()
	{
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_pengembalian_barangRusak';
		$this->load->view('guest/tampil/main', $data);
	}

	public function nginput_barang_pengembalianHilang()
	{
		$data['side']='guest/tampil/side';
		$data['content']='guest/barang/v_pengembalian_barangHilang';
		$this->load->view('guest/tampil/main', $data);
	}
}