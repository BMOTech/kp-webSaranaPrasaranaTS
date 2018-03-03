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
			'id_barang_masuk' => $id
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
		$data['idbarang'] = $this->modelku->select_idBrang();
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
		$data['idbarang'] = $this->modelku->select_idBrang();
		$this->load->view('guest/tampil/main', $data);
	}

	public function listInv()
	{
	    // Ambil data ID Provinsi yang dikirim via ajax post
	    $id_barang = $this->input->post('id_barang');
    
	    $inv = $this->modelku->select_inv($id_barang);
	    
	    // Buat variabel untuk menampung tag-tag option nya
	    // Set defaultnya dengan tag option Pilih
	    $lists = "<option value='' disabled='true'>Pilih No Inventaris</option>";
	    
	    foreach($inv as $data){
	      $lists .= "<option value='".$data->no_inv."'>".$data->no_inv."</option>"; // Tambahkan tag option ke variabel $lists
	    }
	    
	    $callback = array('list_inv'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  	}

  	public function listInvKmbli()
  	{
  		$id_peminjaman = $this->input->post('id_peminjaman');
  		$id_barang_keluar = $this->input->post('id_barang_keluar');
  		$id_barang = $this->input->post('id_barang');

  		$inv = $this->modelku->select_invKmbli($id_peminjaman, $id_barang_keluar, $id_barang);
	    
	    // Buat variabel untuk menampung tag-tag option nya
	    // Set defaultnya dengan tag option Pilih
	    $lists = "<option value='' disabled='true'>Pilih No Inventaris</option>";
	    
	    foreach($inv as $data){
	      $lists .= "<option value='".$data->no_inv."'>".$data->no_inv."</option>"; // Tambahkan tag option ke variabel $lists
	    }
	    
	    $callback = array('list_inv'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  	}

  	public function bantuan()
  	{
  		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$data['side']='guest/tampil/side';
		$data['content']='guest/v_help';
		$this->load->view('guest/tampil/main', $data);
  	}
}