<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')=="") 
		{
			redirect('error');
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
			'id_barang_masuk' => $id
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
			'id_peminjaman' => $id
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
	
	public function nonton_ganti_rugi()
	{
		$data['t_barang'] = $this->modelku->tampil_data('t_ganti_rugi')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/ndeleng_ganti_rugi';
		$this->load->view('admin/tampil/main', $data);
	}	

	public function ndeleng_barangMasuk()
	{
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/l_barang_masuk';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_keluar()
	{
		$data['t_barang_keluar'] = $this->modelku->tampil_data('t_barang_keluar')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_barang_keluar';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_ilang()
	{
		$data['t_kehilangan'] = $this->modelku->tampil_data('t_kehilangan')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_t_kehilangan';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_rusak()
	{
		$data['t_kerusakan'] = $this->modelku->tampil_data('t_kerusakan')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_t_kerusakan';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_barang_pinjam()
	{
		$data['t_peminjaman'] = $this->modelku->tampil_data('t_peminjaman')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_t_peminjaman';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_histori_pinjam()
	{
		$data['t_histori_pinjam'] = $this->modelku->tampil_data('t_histori_pinjam')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_histori_pinjam';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$this->load->view('admin/tampil/main', $data);
	}

	public function ndeleng_data_pengembalian()
	{
		$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_data_pengembalian';
		$data['idbarang'] = $this->modelku->select_idBrang();
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
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
	}

	public function nginput_barang_pinjam()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_peminjaman';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
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

  	public function listJml()
	{
	    // Ambil data ID Provinsi yang dikirim via ajax post
	    $id_barang_keluar = $this->input->post('id_barang_keluar');
	    $id_barang = $this->input->post('id_barang');
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

  	public function listInvKmbli()
  	{
  		$id_peminjaman = $this->input->post('id_peminjaman');
  		$id_barang_keluar = $this->input->post('id_barang_keluar');
  		$id_barang = $this->input->post('id_barang');

  		$inv = $this->modelku->select_invKmbli($id_peminjaman, $id_barang_keluar, $id_barang);
  		$idbarang = $this->modelku->IdBrngKmbli($id_peminjaman);
	    
	    // Buat variabel untuk menampung tag-tag option nya
	    // Set defaultnya dengan tag option Pilih
	    $lists = "<option value='' disabled='true'>Pilih No Inventaris</option>";
	    $lists2 = "<option value='' disabled='true' data-foo='' selected>Pilih ID Barang</option>";

	    
	    foreach($inv as $data){
	      $lists .= "<option value='".$data->no_inv."'>".$data->no_inv."</option>"; // Tambahkan tag option ke variabel $lists
	    }

	    foreach ($idbarang as $key) 
	    {
	    	$lists2 .= "<option value='".$key->id_barang."' data-foo='".$key->nama_barang."'>".$key->id_barang."</option>"; // Tambahkan tag option ke variabel $lists
	    }
	    
	    $callback = array('list_inv'=>$lists, 'list_idBrang' => $lists2); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
	    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  	}

	public function nginput_barang_pengembalian()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_pengembalian';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
	}

	public function nginput_barang_pengembalianRusak()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_pengembalian_barangRusak';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);
	}

	public function nginput_barang_pengembalianHilang()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_pengembalian_barangHilang';
		$data['idbarang'] = $this->modelku->select_idBrang();
		$data['idruang'] = $this->modelku->select_idR();
		$this->load->view('admin/tampil/main', $data);	
	}

	public function bantuan()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/v_help';
		$this->load->view('admin/tampil/main', $data);	
	}

	public function njajale()
	{
		$count = 0;
		$add = $this->input->post("add");
		if (!empty($add)) 
		{
			$subject = $this->input->post("subject", true);
			$comment = $this->input->post("comment", true);

			$data = array
			(
				'subject' => $subject,
				'comment' => $comment
			);

			$this->modelku->input_data($data, 'comments');

			$where = array('status' => 0 );

			$result=$this->modelku->tampil_detail($where, 'comments');
			$jj = $result->num_rows();
			$count=$jj;
		}
	}

	// public function view_notif()
	// {
	// 	$data = array
	// 	(
	// 		'status' => 1
	// 	);
	// 	$where = array('status' => 0 );

	// 	$result=$this->modelku->update_data($where, $data, 'comments');


	// 	$result=$this->modelku->tampil_data('comments');

	// 	$response = "";

	// 	while($row=mysqli_fetch_array($result)->result()) {
	// 	$response = $response . "<div class='notification-item'>" .
	// 	"<div class='notification-subject'>". $row["subject"] . "</div>" . 
	// 	"<div class='notification-comment'>" . $row["comment"]  . "</div>" .
	// 	"</div>";
	// 	}
	// 	if(!empty($response)) {
	// 		print $response;
	// 	}
	// }

	public function ndeleng_ganti_rugi()
	{
		$data['side']='admin/tampil/side';
		$data['content']='admin/barang/v_ganti_rugi';
		$data['idbarang'] = $this->modelku->select_idBrang();
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