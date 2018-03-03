<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Member extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
		{
			redirect('error');
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
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('member/tampil/main', $data);
	}

	public function nginput_barang_pengembalian()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_pengembalian';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$this->load->view('member/tampil/main', $data);
	}

	public function nginput_barang_pengembalianRusak()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_kembalian_barangRusak';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$this->load->view('member/tampil/main', $data);
	}

	public function nginput_barang_pengembalianHilang()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_pengembalian_barangHilang';
		$data['idbarang'] = $this->modelku->select_idBrang();
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
			'id_barang_masuk' => $id
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

  	public function ndeleng_ganti_rugi()
	{
		$data['side']='member/tampil/side';
		$data['content']='member/barang/v_ganti_rugi';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$this->load->view('member/tampil/main', $data);
	}

	public function listJml()
	{
	    // Ambil data ID Provinsi yang dikirim via ajax post
	    $id_barang_keluar = $this->input->post('id_barang_keluar');
	    $choice = $this->input->post('choice');

	    if ($choice == "Hilang") 
	    {
	    	$jmlHlng = $this->modelku->jumlahHlng($id_barang_keluar);
	    	$idbarang = $this->modelku->IdBrngHlng($id_barang_keluar);

	    	$lists = "<option value='' disabled='true'></option>";
	    	$lists2 = "<option value='' disabled='true' data-foo='' selected>Pilih ID Barang</option>";
	    
		    foreach($jmlHlng as $data){
		      $lists .= "<option value='".$data->jumlah_hilang."' selected>".$data->jumlah_hilang."</option>"; // Tambahkan tag option ke variabel $lists
		    }

		    foreach ($idbarang as $key) 
		    {
		    	$lists2 .= "<option value='".$key->id_barang."' data-foo='".$key->nama_barang."'>".$key->id_barang."</option>"; // Tambahkan tag option ke variabel $lists
		    }


		    $callback = array('list_jml'=>$lists, 'list_idbarang' => $lists2); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    	echo json_encode($callback); // konversi varibael $callback menjadi JSON
	    }
	    else if ($choice == "Rusak") 
	    {
	    	 $jmlRusak = $this->modelku->jumlahRsk($id_barang_keluar);
	    	 $idbarang = $this->modelku->IdBrngRsk($id_barang_keluar);
	    
		    // Buat variabel untuk menampung tag-tag option nya
		    // Set defaultnya dengan tag option Pilih
		    $lists = "<option value='' disabled='true'></option>";
		    $lists2 = "<option value='' disabled='true' data-foo='' selected>Pilih ID Barang</option>";
		    
		    foreach($jmlRusak as $data){
		      $lists .= "<option value='".$data->jml_rusak."' selected>".$data->jml_rusak."</option>"; // Tambahkan tag option ke variabel $lists
		    }

		    foreach ($idbarang as $key) 
		    {
		    	$lists2 .= "<option value='".$key->id_barang."' data-foo='".$key->nama_barang."'>".$key->id_barang."</option>"; // Tambahkan tag option ke variabel $lists
		    }
		    
		    $callback = array('list_jml'=>$lists, 'list_idbarang'=>$lists2); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
		    echo json_encode($callback); // konversi varibael $callback menjadi JSON
	    }
  	}

  	public function listTotHarga()
	{
	    // Ambil data ID Provinsi yang dikirim via ajax post
	    $id_barang = $this->input->post('id_barang');
	    $id_barang_keluar = $this->input->post('id_barang_keluar');
	    $jumlah = $this->input->post('jumlah');
	    $choice = $this->input->post('choice');
    
	    $inv = $this->modelku->totHarga($id_barang);
	    
	    // Buat variabel untuk menampung tag-tag option nya
	    // Set defaultnya dengan tag option Pilih
	    $lists = "<option value='' disabled='true'></option>";
	    
	    foreach($inv as $data){
	      $lists .= "<option value='".$data->harga * $jumlah."' selected>".$data->harga * $jumlah."</option>"; // Tambahkan tag option ke variabel $lists
	    }
	    
	    $callback = array('list_inv'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  	}

  	public function listIDBarang()
	{
	    // Ambil data ID Provinsi yang dikirim via ajax post
	    $id_ruang = $this->input->post('id_ruang');
    
	    $inv = $this->modelku->select_ruang($id_ruang);
	    
	    // Buat variabel untuk menampung tag-tag option nya
	    // Set defaultnya dengan tag option Pilih
	    $lists = "<option value='' data-foo='' disabled='true' selected>Pilih ID Barang</option>";
	    
	    foreach($inv as $data){
	      $lists .= "<option value='".$data->id_barang."' data-foo='".$data->nama_barang."'>".$data->id_barang."</option>"; // Tambahkan tag option ke variabel $lists
	    }
	    
	    $callback = array('list_inv'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  	}

  	public function bantuan()
  	{
  		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$data['side']='member/tampil/side';
		$data['content']='member/v_help';
		$this->load->view('member/tampil/main', $data);
  	}

	public function logout() 
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('utama');
	}
}