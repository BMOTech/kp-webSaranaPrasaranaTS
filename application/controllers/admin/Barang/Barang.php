<?php
/**
* 
*/
class Barang extends CI_Controller
{
	function __construct()
	{
		parent:: __construct();
		$this->load->model('modelku');
		$this->load->helper('url');
		$this->load->library('session');

		if ($this->session->userdata('level') == 'member')
		{
			redirect('index.html');
		}
		elseif ($this->session->userdata('level') == '') 
		{
			redirect('index.html');
		}
	}

	//For Barang
	public function ndeleng_barang()
	{
		$data['t_barang'] = $this->modelku->tampil_data('t_barang')->result();
		$this->load->view('admin/barang/v_barang', $data);
	}

	public function ngedit_barang($id)
	{
		$where = array('id_barang' => $id);
		$data['t_barang'] = $this->modelku->edit_data($where, 't_barang')->result();
		$this->load->view('admin/barang/v_edit_barang', $data);

	}

	public function ajax_edit_barang($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_barang', $where);
		echo json_encode($data);
	}

	public function ajax_edit_barangMsk($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_barang_masuk', $where);
		echo json_encode($data);
	}

	public function ajax_edit_barangKlr($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_barang_keluar', $where);
		echo json_encode($data);
	}

	public function ajax_edit_kehilangan($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_kehilangan', $where);
		echo json_encode($data);
	}

	public function ajax_edit_rusak($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_kerusakan', $where);
		echo json_encode($data);
	}

	public function ajax_edit_pinjam($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_peminjaman', $where);
		echo json_encode($data);
	}

	public function ajax_edit_histori($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_histori_pinjam', $where);
		echo json_encode($data);
	}

	public function ajax_edit_pengembalian($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_pengembalian', $where);
		echo json_encode($data);
	}

	public function update_barang()
	{
		$id = $this->input->post('id');
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$spesifikasi = $this->input->post('spesifikasi');
		$merk = $this->input->post('merk');
		$jumlah = $this->input->post('jumlah');
		$harga = $this->input->post('harga');
		$satuan = $this->input->post('satuan');

		$data = array
		(
			'id_barang' => $id_barang,
			'nama_barang' => $nama_barang,
			'spesifikasi' => $spesifikasi,
			'merk' => $merk,
			'jumlah' => $jumlah,
			'harga' => $harga,
			'satuan' => $satuan
		);

		$where = array
		(
			'id' => $id
		);

		$this->modelku->barang_update($where, $data, 't_barang');
		echo json_encode(array("status" => TRUE));
		// $this->modelku->update_data($where, $data, 't_barang');
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}
	public function ngapus_barang($id)
	{
		$where = array('id_barang' => $id);
		$this->modelku->delete_by_id($where, 't_barang');
		$this->modelku->delete_by_id($where, 'detail_barang');
		$this->modelku->delete_by_id($where, 't_barang_masuk');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function nginput_barang()
	{
		$this->load->view('admin/barang/v_input_barang');
	}
	public function input_barang()
	{
		$id_barang = $this->input->post('id_barang');
		$nama_barang = $this->input->post('nama_barang');
		$spesifikasi = $this->input->post('spesifikasi');
		$merk = $this->input->post('merk');
		$harga = $this->input->post('harga');
		$satuan = $this->input->post('satuan');

		$data = array
		(
			'id_barang' => $id_barang,
			'nama_barang' => $nama_barang,
			'spesifikasi' => $spesifikasi,
			'merk' => $merk,
			'jumlah' => 0,
			'harga' => $harga,
			'satuan' => $satuan
		);

		$idBrang = $this->db->query("select id_barang from t_barang where id_barang='$id_barang'");
		if (empty($idBrang->result_array())) 
		{
			$this->modelku->input_data($data, 't_barang');
			echo json_encode(array("status" => TRUE));
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("Maaf data dengan id '$id_barang' telah terdaftar!");
				</script>
			<?php
		}
	}
	//EOF For Barang


	//For Barang Keluar
	public function ndeleng_barang_keluar()
	{
		$data['t_barang_keluar'] = $this->modelku->tampil_data('t_barang_keluar')->result();
		$this->load->view('admin/barang/v_barang_keluar', $data);
	}
	public function ngedit_barang_keluar($id)
	{
		$where = array('id_barang_keluar' => $id);
		$data['t_barang_keluar'] = $this->modelku->edit_data($where, 't_barang_keluar')->result();
		$this->load->view('admin/barang/v_edit_barang_keluar', $data);
	}

	public function ngapus_barang_keluar($id)
	{
		$where = array('id_barang_keluar' => $id);
		$this->modelku->increase_jumlah_keluar($id);
		$this->modelku->ngapus_dataPinjam_soko_keluar($id);
		$this->modelku->ngapus_dataRusak_soko_rusak($id);
		$this->modelku->ngapus_dataHilang_soko_keluar($id);
		$this->modelku->delete_by_id($where, 't_barang_keluar');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function update_barang_keluar()
	{
		$id = $this->input->post('id');
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$tgl_keluar = $this->input->post('tgl_keluar');
		$jumlah_keluar = $this->input->post('jumlah_keluar');
		$keterangan = $this->input->post('keterangan');
		$satuan = $this->input->post('satuan');
		$id_ruang = $this->input->post('id_ruang');

		$data = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'id_barang' => $id_barang,
			'tgl_keluar' => $tgl_keluar,
			'jumlah_keluar' => $jumlah_keluar,
			'keterangan' => $keterangan,
			'satuan' => $satuan,
			'id_ruang' => $id_ruang
		);

		$where = array
		(
			'id' => $id
		);

		$this->modelku->barang_update($where, $data, 't_barang_keluar');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		
	}
	//EOF Barang Keluar



	//For Barang Masuk
	public function ngapus_barang_masuk($id)
	{
		$where = array('id_barang_masuk' => $id);
		$this->modelku->decrease_jumlah($id);
		$this->modelku->delete_by_id($where, 't_barang_masuk');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}
	public function ngedit_barang_masuk($id)
	{
		$where = array('id_barang_masuk' => $id);
		$data['t_barang_masuk'] = $this->modelku->edit_data($where, 't_barang_masuk')->result();
		$this->load->view('admin/barang/v_edit_barang_masuk', $data);

	}
	public function update_barang_masuk()
	{
		$id = $this->input->post('id');
		$id_barang_masuk = $this->input->post('id_barang_masuk');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$id_barang = $this->input->post('id_barang');
		$jml_masuk = $this->input->post('no_inve');
		$id_ruang = $this->input->post('id_ruang');
		$satuan = $this->input->post('satuan');

		$data = array
		(
			'id_barang_masuk' => $id_barang_masuk,
			'tgl_masuk' => $tgl_masuk,
			'id_barang' => $id_barang,
			'jumlah_masuk' => $jml_masuk,
			'id_ruang' => $id_ruang,
			'satuan' => $satuan
		);

		$where = array('id' => $id);
		$this->modelku->update_barang_jumlah($jml_masuk, $id_barang);

		$this->modelku->barang_update($where, $data, 't_barang_masuk');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

	}
	public function v_barang_masuk()
	{
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();
		$this->load->view('admin/barang/l_barang_masuk', $data);
	}
	public function ndeleng_input_barang()
	{
		$this->load->view('admin/barang/v_barang_masuk');
	}

	public function input_barang_masuk()
	{
		$id_barang_masuk = $this->input->post('id_barang_masuk');
		$id_barang = $this->input->post('id_barang');
		$jml_masuk = $this->input->post('no_inve');
		$no_inv = $this->input->post('fields');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$id_ruang = $this->input->post('id_ruang');
		$satuan = $this->input->post('satuan');

		$data = array 
		(
			'id_barang_masuk' => $id_barang_masuk,
			'tgl_masuk' => $tgl_masuk,
			'id_barang' => $id_barang,
			'jumlah_masuk' => $jml_masuk,
			'id_ruang' => $id_ruang,
			'satuan' => $satuan
		);

		$this->modelku->input_data($data, 't_barang_masuk');
		$this->modelku->increase_jumlah($jml_masuk, $id_barang);

		$this->session->set_userdata('Firstformdata',$data);
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();

		foreach ($no_inv as $inv) 
		{
			$data = array 
			(
				'id_barang' => $id_barang,
				'id_barang_masuk' => $id_barang_masuk,
				'id_ruang' => $id_ruang,
				'no_inv' => $inv,
				'kondisi' => "Ada"
			);

			$this->modelku->input_data($data, 'detail_barang');
			$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan, Silahkan cek pada menu lihat barang masuk. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			$this->session->set_userdata("aja",$data);
		}

		redirect("admin/admin/input_barang_masuk");
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan, Silahkan cek pada menu lihat barang masuk. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}
	//EOF For barang masuk



	//For Detail barang

	public function ndeleng_tampil_detail_barang()
	{
		$this->load->view('admin/barang/l_detail_barang');
	}

	public function detail_barang($id)
	{

		$where = array('id_barang' => $id, 'kondisi' => 'Ada');
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/l_detail_barang', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function input_detail_barang()
	{
		$id_barang = $this->input->post('id_barang');
		$no_inv = $this->input->post('fields');

		foreach ($no_inv as $inv) 
		{
			$amount = $this->session->userdata("Firstformdata");
			$data = array 
			(
				'id_barang' => $id_barang,
				'id_barang_masuk' => $amount['id_barang_masuk'],
				'id_ruang' => $amount['id_ruang'],
				'no_inv' => $inv,
				'kondisi' => "Ada"
			);

			$this->modelku->input_data($data, 'detail_barang');

			$this->session->set_userdata("aja",$data);
		}

		$amount = $this->session->userdata("Firstformdata");
		
		$data3 = array
		(
			'id_barang_masuk' => $amount['id_barang_masuk'],
		 	'tgl_masuk' => $amount['tgl_masuk'],
		 	'id_barang' => $amount['id_barang'],
		 	'jumlah_masuk' => $amount['jumlah_masuk'],
		 	'id_ruang' => $amount['id_ruang'],
		 	'satuan' => $amount['satuan']
		 );

		$this->modelku->input_data($data3, 't_barang_masuk');
		$this->modelku->increase_jumlah($amount['jumlah_masuk'], $amount['id_barang']);

		redirect("admin/Barang/barang/v_barang_masuk");
		
	}

	public function ngedit_detail_barang($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$data['detail_barang'] = $this->modelku->edit_data($where, 'detail_barang')->result();
		$this->load->view('admin/barang/v_edit_detail_barang', $data);

	}

	public function update_detail_barang()
	{
		$id_barang = $this->input->post('id_barang');
		$no_inv = $this->input->post('no_inv');
		$kondisi = $this->input->post('kondisi');

		$data = array
		(
			'id_barang' => $id_barang,
			'no_inv' => $no_inv,
			'kondisi' => $kondisi
		);

		$where = array('no_inv' => $no_inv);
		$this->modelku->update_data($where, $data, 'detail_barang');

		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barang/'.$id);
	}

	public function ngapus_detail_barang($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$this->modelku->hapus_data($where, 'detail_barang');
		$id2 = $this->session->userdata("idbrange");
		$this->modelku->decrease_Detail($id2);
		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barang/'.$id);
	}
	//EOF Detail barang


	//For detail barang masuk

	public function detail_barangMsk($id)
	{

		$where = array('id_barang_masuk' => $id);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/l_detail_barang_masuk', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function ngedit_detail_barangMsk($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$data['detail_barang'] = $this->modelku->edit_data($where, 'detail_barang')->result();
		$this->load->view('admin/barang/v_edit_detail_barangMsk', $data);

	}

	public function update_detail_barangMsk()
	{
		$id_barang_masuk = $this->input->post('id_barang_masuk');
		$no_inv = $this->input->post('no_inv');
		$kondisi = $this->input->post('kondisi');

		$data = array
		(
			'id_barang_masuk' => $id_barang_masuk,
			'no_inv' => $no_inv,
			'kondisi' => $kondisi
		);

		$where = array('no_inv' => $no_inv);
		$this->modelku->update_data($where, $data, 'detail_barang');

		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangMsk/'.$id);
	}

	public function ngapus_detail_barangMsk($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$this->modelku->hapus_data($where, 'detail_barang');
		$id2 = $this->session->userdata("idbrange");
		$this->modelku->decrease_Detail($id2);
		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangMsk/'.$id);
	}
	//EOF Detail Barang Masuk


	//For detail barang keluars

	public function detail_barangKlr($id)
	{

		$where = array('id_barang_keluar' => $id, 'keterangan' => 'barang keluar');
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/l_detail_barang_keluar', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function ngedit_detail_barangKlr($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$data['detail_barang'] = $this->modelku->edit_data($where, 'detail_barang')->result();
		$this->load->view('admin/barang/v_edit_detail_barangKlr', $data);

	}

	public function update_detail_barangKlr()
	{
		$id_barang_masuk = $this->input->post('id_barang_masuk');
		$no_inv = $this->input->post('no_inv');
		$kondisi = $this->input->post('kondisi');

		$data = array
		(
			'id_barang_masuk' => $id_barang_masuk,
			'no_inv' => $no_inv,
			'kondisi' => $kondisi
		);

		$where = array('no_inv' => $no_inv);
		$this->modelku->update_data($where, $data, 'detail_barang');

		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangKlr/'.$id);
	}

	public function ngapus_detail_barangKlr($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$this->modelku->hapus_data($where, 'detail_barang');
		$id2 = $this->session->userdata("idbrange");
		$this->modelku->decrease_Detail($id2);
		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangMsk/'.$id);
	}
	//EOF Detail barang keluar


	//For detail barang rusak

	public function detail_barangRsk($id)
	{

		$where = array('id_barang_keluar' => $id, 'kondisi' => 'Rusak');
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/l_detail_barang_rusak', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function ngedit_detail_barangRsk($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$data['detail_barang'] = $this->modelku->edit_data($where, 'detail_barang')->result();
		$this->load->view('admin/barang/v_edit_detail_barangRsk', $data);

	}

	public function update_detail_barangRsk()
	{
		$id_barang_masuk = $this->input->post('id_barang_masuk');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$no_inv = $this->input->post('no_inv');
		$kondisi = $this->input->post('kondisi');

		$data = array
		(
			'id_barang_masuk' => $id_barang_masuk,
			'id_peminjaman' => $id_peminjaman,
			'no_inv' => $no_inv,
			'kondisi' => $kondisi
		);

		$where = array('no_inv' => $no_inv);
		$this->modelku->update_data($where, $data, 'detail_barang');

		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangRsk/'.$id);
	}

	public function ngapus_detail_barangRsk($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$this->modelku->hapus_data($where, 'detail_barang');
		$id2 = $this->session->userdata("idbrange");
		$this->modelku->decrease_Detail($id2);
		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangRsk/'.$id);
	}
	//EOF Detail barang rusak


	//For detail barang hilang

	public function detail_barangHlng($id)
	{

		$where = array('id_barang_keluar' => $id, 'kondisi' => 'Hilang');
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/l_detail_barang_hilang', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function ngedit_detail_barangHlng($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$data['detail_barang'] = $this->modelku->edit_data($where, 'detail_barang')->result();
		$this->load->view('admin/barang/v_edit_detail_barangHlng', $data);

	}

	public function update_detail_barangHlng()
	{
		$id_barang_masuk = $this->input->post('id_barang_masuk');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$no_inv = $this->input->post('no_inv');
		$kondisi = $this->input->post('kondisi');

		$data = array
		(
			'id_barang_masuk' => $id_barang_masuk,
			'id_peminjaman' => $id_peminjaman,
			'no_inv' => $no_inv,
			'kondisi' => $kondisi
		);

		$where = array('no_inv' => $no_inv);
		$this->modelku->update_data($where, $data, 'detail_barang');

		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangHlng/'.$id);
	}

	public function ngapus_detail_barangHlng($no_inv)
	{
		$where = array('no_inv' => $no_inv);
		$this->modelku->hapus_data($where, 'detail_barang');
		$id2 = $this->session->userdata("idbrange");
		$this->modelku->decrease_Detail($id2);
		$id = $this->session->userdata("idbrange");
		redirect('admin\barang/barang/detail_barangHlng/'.$id);
	}
	//EOF Detail barang hilang

	//For Barang Hilang


	public function ndeleng_barang_ilang()
	{
		$data['t_kehilangan'] = $this->modelku->tampil_data('t_kehilangan')->result();
		$this->load->view('admin/barang/v_t_kehilangan', $data);
	}

	public function nginput_barang_ilang()
	{
		$this->load->view('admin/barang/v_hilang');
	}

	public function input_barang_hilang()
	{
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$tgl_hilang = $this->input->post('tgl_hilang');
		$alasan_hilang = $this->input->post('alasan_hilang');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$solusi = $this->input->post('solusi');
		$jumlah_hilang = $this->input->post('jumlah_hilang');
		$satuan = $this->input->post('satuan');
		$id_ruang = $this->input->post('id_ruang');

		$data = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'id_barang' => $id_barang,
			'tgl_hilang' => $tgl_hilang,
			'alasan_hilang' => $alasan_hilang,
			'penanggung_jawab' => $penanggung_jawab,
			'solusi' => $solusi,
			'jumlah_hilang' => $jumlah_hilang
		);

		$data2 = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'tgl_keluar' => $tgl_hilang,
			'id_barang' => $id_barang,
			'jumlah_keluar' => $jumlah_hilang,
			'keterangan' => 'Hilang',
			'satuan' => $satuan,
			'id_ruang' => $id_ruang 
		);

		$this->db->select('jumlah')->where('id_barang',$id_barang);
		$query = $this->db->get('t_barang');
		foreach($query->result_array() as $row)
		{
    		$jml = $row['jumlah'];
    		if ($jml> 0 && $jml >= $jumlah_hilang) 
			{
				$this->modelku->input_data($data, 't_kehilangan');
				$this->modelku->decrease_jumlah_drKeluar($jumlah_hilang, $id_barang);
				$this->modelku->input_data($data2, 't_barang_keluar');
				echo json_encode(array("status" => TRUE));
				$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			else if($jml <= 0 || $jml < $jumlah_hilang)
			{
				echo "Tidak dapat menginput, karena jumlah barang saat ini masih kosong!";
			}
		}
	}

	public function ngapus_barang_ilang($id)
	{
		$where = array('id_barang_keluar' => $id);
		$this->modelku->increase_jumlah_hilang($id);
		$this->modelku->ngapus_dataKeluar_soko_hilang($id);
		$this->modelku->delete_by_id($where, 't_kehilangan');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}		

	public function ngedit_barang_ilang($id)
	{
		$where = array('id_barang_keluar' => $id);
		$data['t_kehilangan'] = $this->modelku->edit_data($where, 't_kehilangan')->result();
		$this->load->view('admin/barang/v_edit_barang_hilang', $data);

	}
	
	public function update_barang_ilang()
	{
		$id = $this->input->post('id');
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$tgl_hilang = $this->input->post('tgl_hilang');
		$alasan_hilang = $this->input->post('alasan_hilang');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$solusi = $this->input->post('solusi');
		$jumlah_hilang = $this->input->post('jumlah_hilang');
		
		$data = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'id_barang' => $id_barang,
			'tgl_hilang' => $tgl_hilang,
			'alasan_hilang' => $alasan_hilang,
			'penanggung_jawab' => $penanggung_jawab,
			'solusi' => $solusi,
			'jumlah_hilang' => $jumlah_hilang 
		);

		$where = array
		(
			'id' => $id
		);

		$this->modelku->barang_update($where, $data, 't_kehilangan');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	//EOF Barang Ilang


	//For Barang Rusak

	public function ndeleng_barang_rusak()
	{
		$data['t_kerusakan'] = $this->modelku->tampil_data('t_kerusakan')->result();
		$this->load->view('admin/barang/v_t_kerusakan', $data);
	}

	public function nginput_barang_rusak()
	{
		$this->load->view('admin/barang/v_rusak');
	}

	public function ngapus_barang_rusak($id)
	{
		$where = array('id_barang_keluar' => $id);
		$this->modelku->increase_jumlah_rusak($id);
		$this->modelku->ngapus_dataKeluar_soko_rusak($id);
		$this->modelku->delete_by_id($where, 't_kerusakan');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function ngedit_barang_rusak($id)
	{
		$where = array('id_barang_keluar' => $id);
		$data['t_kerusakan'] = $this->modelku->edit_data($where, 't_kerusakan')->result();
		$this->load->view('admin/barang/v_edit_barang_rusak', $data);

	}
	public function update_barang_rusak()
	{
		$id = $this->input->post('id');
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$tgl_rusak = $this->input->post('tgl_rusak');
		$jml_rusak = $this->input->post('jml_rusak');
		$id_barang = $this->input->post('id_barang');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$tindakan = $this->input->post('tindakan');
		
		$data = array
		(
			'tgl_rusak' => $tgl_rusak,
			'jml_rusak' => $jml_rusak,
			'id_barang' => $id_barang,
			'penanggung_jawab' => $penanggung_jawab,
			'tindakan' => $tindakan
		);

		$where = array('id' => $id);

		$this->modelku->barang_update($where, $data, 't_kerusakan');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function input_barang_rusak()
	{
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$tgl_rusak = $this->input->post('tgl_rusak');
		$jml_rusak = $this->input->post('jml_rusak');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$tindakan = $this->input->post('tindakan');
		$satuan = $this->input->post('satuan');
		$id_ruang = $this->input->post('id_ruang');

		$data = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'id_barang' => $id_barang,
			'tgl_rusak' => $tgl_rusak,
			'jml_rusak' => $jml_rusak,
			'penanggung_jawab' => $penanggung_jawab,
			'tindakan' => $tindakan
		);

		$data2 = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'tgl_keluar' => $tgl_rusak,
			'id_barang' => $id_barang,
			'jumlah_keluar' => $jml_rusak,
			'keterangan' => 'Rusak',
			'satuan' => $satuan,
			'id_ruang' => $id_ruang 
		);

		$this->db->select('jumlah')->where('id_barang',$id_barang);
		$query = $this->db->get('t_barang');
		foreach($query->result_array() as $row)
		{
    		$jml = $row['jumlah'];
    		if ($jml> 0 && $jml >= $jml_rusak) 
			{
				$this->modelku->input_data($data, 't_kerusakan');
				$this->modelku->decrease_jumlah_drKeluar($jml_rusak, $id_barang);
				$this->modelku->input_data($data2, 't_barang_keluar');
				echo json_encode(array("status" => TRUE));
				$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			}
			else if($jml <= 0 || $jml < $jml_rusak)
			{
				echo "Tidak dapat menginput, karena jumlah barang saat ini masih kosong!";
			}
		}

		
	}

	//EOF Barang Rusak



	//For Barang Pinjam
	public function ndeleng_barang_pinjam()
	{
		$data['t_peminjaman'] = $this->modelku->tampil_data('t_peminjaman')->result();
		$this->load->view('admin/barang/v_t_peminjaman', $data);
	}

	public function ndeleng_histori_pinjam()
	{
		$data['t_histori_pinjam'] = $this->modelku->tampil_data('t_histori_pinjam')->result();
		$this->load->view('admin/barang/v_histori_pinjam', $data);
	}

	public function ngapus_semua_histori()
	{
		$this->modelku->hapusHistoriPinjam('t_histori_pinjam');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function ngapus_semua_pengembalian()
	{
		$this->modelku->hapusSemuaDataPengembalian('t_pengembalian');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}	

	public function nginput_barang_pinjam()
	{
		$this->load->view('admin/barang/v_peminjaman');
	}

	public function ngapus_barang_pinjaman($id)
	{
		$where = array('id_peminjaman' => $id );
		$this->modelku->increase_jumlah_pinjam($id);
		$this->modelku->ngapus_dataKeluar_soko_pinjam($id);
		$this->modelku->delete_by_id($where, 't_peminjaman');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
	}

	public function ngapus_historipinjam($id)
	{
		$where = array('id_peminjaman' => $id );
		$this->modelku->delete_by_id($where, 't_histori_pinjam');
		$this->modelku->delete_by_id($where, 'detail_histori_pinjam');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');	
	}

	public function detail_barangPinjam($idPinjam)
	{
		$where = array('kondisi' => 'Dipinjam', 'id_peminjaman' => $idPinjam);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('admin/barang/l_detail_barangPnjm', $data);
	}

	public function ngedit_detail_barangPnjm($id)
	{
		$where = array('id_peminjaman' => $id);
		$data['t_peminjaman'] = $this->modelku->edit_data($where, 't_peminjaman')->result();
		$this->load->view('admin/barang/v_edit_barang_peminjaman', $data);

	}
	public function update_barang_peminjamanPnjm()
	{
		$id = $this->input->post('id');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$peminjam = $this->input->post('peminjam');
		$kondisi = $this->input->post('kondisi');
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');
		
		$data = array
		(
			'id_peminjaman' => $id_peminjaman,
			'id_barang_keluar' => $id_barang_keluar,
			'id_barang' => $id_barang,
			'tgl_peminjaman' => $tgl_peminjaman,
			'tgl_kembali' => $tgl_kembali,
			'peminjam' => $peminjam,
			'kondisi' => $kondisi,
			'jumlah' => $jumlah,
			'keterangan' => $keterangan
		);

		$where = array('id' => $id);

		$this->modelku->barang_update($where, $data, 't_peminjaman');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		
	}

	public function update_barang_historiPnjm()
	{
		$id = $this->input->post('id');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$peminjam = $this->input->post('peminjam');
		$kondisi = $this->input->post('kondisi');
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');
		
		$data = array
		(
			'id_peminjaman' => $id_peminjaman,
			'id_barang_keluar' => $id_barang_keluar,
			'id_barang' => $id_barang,
			'tgl_peminjaman' => $tgl_peminjaman,
			'tgl_kembali' => $tgl_kembali,
			'peminjam' => $peminjam,
			'kondisi' => $kondisi,
			'jumlah' => $jumlah,
			'keterangan' => $keterangan
		);

		$where = array('id' => $id);

		$this->modelku->barang_update($where, $data, 't_histori_pinjam');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		
	}

	public function input_barang_pinjaman()
	{
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang = $this->input->post('id_barang');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$kondisi = $this->input->post('kondisi');
		$jumlah = $this->input->post('no_inve');
		$no_inv = $this->input->post('fields');
		$keterangan = $this->input->post('keterangan');
		$satuan = $this->input->post('satuan');
		$id_ruang = $this->input->post('id_ruang');

		$data = array
		(
			'id_peminjaman' => $id_peminjaman,
			'id_barang_keluar' => $id_barang_keluar,
			'id_barang' => $id_barang,
			'tgl_peminjaman' => $tgl_peminjaman,
			'tgl_kembali' => $tgl_kembali,
			'peminjam' => $_SESSION['id'],
			'kondisi' => $kondisi,
			'jumlah' => $jumlah,
			'keterangan' => $keterangan
		);

		$data2 = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'tgl_keluar' => $tgl_peminjaman,
			'id_barang' => $id_barang,
			'jumlah_keluar' => $jumlah,
			'keterangan' => 'Dipinjam',
			'satuan' => $satuan,
			'id_ruang' => $id_ruang 
		);
		
    	$this->db->select('jumlah')->where('id_barang',$id_barang);
		$query = $this->db->get('t_barang');
		foreach($query->result_array() as $row)
		{
    		$jml = $row['jumlah'];
    		if ($jml> 0 && $jml >= $jumlah) 
			{
				$this->modelku->input_data($data, 't_peminjaman');
				$this->modelku->input_data($data, 't_histori_pinjam');
				$data['t_peminjaman'] = $this->modelku->tampil_data('t_peminjaman')->result();
				$this->modelku->decrease_jumlah_drKeluar($jumlah, $id_barang);
				$this->modelku->input_data($data2, 't_barang_keluar');
				$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Selamat anda berhasil meminjam barang! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

				foreach ($no_inv as $inv) 
				{
					$sess = $_SESSION['id'];
					$this->modelku->update_Detail($sess, $id_barang_keluar, $id_peminjaman, $inv);
					$data3 = array
					(
						'id_peminjaman' => $id_peminjaman,
						'no_inv' => $inv
					);

					$this->modelku->input_data($data3, 'detail_histori_pinjam');
				}

				redirect('admin/admin/nginput_barang_pinjam');
				echo json_encode(array("status" => TRUE));
				
			}
			else if($jml <= 0 || $jml < $jumlah)
			{
				echo "Tidak dapat menginput, karena jumlah barang saat ini masih kosong!";
			}
		}
	}

	//EOF Barang Pinjam


	//For Barang Kembali

	public function ndeleng_data_pengembalian()
	{
		$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();
		$this->load->view('admin/barang/v_data_pengembalian', $data);
	}

	public function nginput_barang_pengembalian()
	{
		$this->load->view('admin/barang/v_pengembalian');
	}

	public function nginput_barang_pengembalianRusak()
	{
		$this->load->view('admin/barang/v_pengembalian_barangRusak');
	}	

	public function input_barang_pengembalian()
	{
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$jml_kmbli = $this->input->post('jumlah_kembali');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$no_inv = $this->input->post('fields');

		$data = array
		(
			'id_barang' => $id_barang,
			'id_peminjaman' => $id_peminjaman,
			'tgl_kembali' => $tgl_kembali,
			'jumlah_kembali' => $jml_kmbli,
			'penanggung_jawab' => $penanggung_jawab,
			'keterangan' => 'Dikembalikan tanpa ada masalah'
		);

		$qryIdPinjam = $this->db->query("select id_peminjaman from t_peminjaman where id_peminjaman='$id_peminjaman'");
		$qryIdKlr = $this->db->query("select id_barang_keluar from t_peminjaman where id_barang_keluar='$id_barang_keluar'");
		$qryTgl = $this->db->query("select tgl_kembali from t_peminjaman where tgl_kembali='$tgl_kembali'");
		if (empty($qryIdPinjam->result_array())) 
		{
			$this->load->view("404nf");
			?>
			<script type="text/javascript">
				alert("Data tidak dipinjam! Silahkan cek id peminjaman dan id barang keluar anda.");
			</script>
			<?php
		}
		else if (empty($qryIdKlr->result_array())) 
		{
			$this->load->view("404nf");
			?>
			<script type="text/javascript">
				alert("Data tidak dipinjam! Silahkan cek id peminjaman dan id barang keluar anda.");
			</script>
			<?php
		}
		else if (empty($qryTgl->result_array())) 
		{
			$this->load->view("404nf");
			?>
			<script type="text/javascript">
				alert("Maaf tanggal yang anda kirimkan tidak cocok dengan data kami, pastikan tanggal yang anda kirimkan sama dengan tanggal kembali anda.");
			</script>
			<?php
		}
		else 
		{
			$this->db->select('jumlah')->where('id_peminjaman',$id_peminjaman);
			$query = $this->db->get('t_peminjaman');
			foreach($query->result_array() as $row)
			{
	    		$jml = $row['jumlah'];
	    		if ($jml == 0) 
				{
					$this->modelku->input_data($data, 't_pengembalian');
					$this->modelku->penghapusan_data_peminjaan($id_peminjaman);
					$this->modelku->increase_jumlah($jml_kmbli, $id_barang);
					$this->modelku->penghapusan_data_keluar($id_barang_keluar);

					foreach ($no_inv as $inv) 
					{
						$ket = "Ada";
						$this->modelku->update_DetailKembalian($ket, $inv);

						$data2 = array
						(
							'id_peminjaman' => $id_peminjaman,
							'no_inv' => $inv,
							'keterangan' => 'Dikembalikan tanpa ada masalah'
						);

						$this->modelku->input_data($data2, 'detail_pengembalian');
					}
					$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Anda berhasil mengembalikan barang! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/admin/nginput_barang_pengembalian');
					echo json_encode(array("status" => TRUE));
				}
				else if($jml > $jml_kmbli) 
				{
					$this->modelku->input_data($data, 't_pengembalian');
					$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();
					$this->modelku->decrease_peminjaman($jml_kmbli, $id_peminjaman);
					$this->modelku->decrease_keluar($jml_kmbli, $id_barang_keluar);
					$this->modelku->increase_jumlah($jml_kmbli, $id_barang);

					foreach ($no_inv as $inv) 
					{
						$ket = "Ada";
						$this->modelku->update_DetailKembalian($ket, $inv);

						$data2 = array
						(
							'id_peminjaman' => $id_peminjaman,
							'no_inv' => $inv,
							'keterangan' => 'Dikembalikan tanpa ada masalah'
						);

						$this->modelku->input_data($data2, 'detail_pengembalian');
					}
					$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Anda berhasil mengembalikan barang! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/admin/nginput_barang_pengembalian');
					echo json_encode(array("status" => TRUE));
				}
				else if ($jml == $jml_kmbli) 
				{
					$this->modelku->input_data($data, 't_pengembalian');
					$this->modelku->increase_jumlah($jml_kmbli, $id_barang);
					$this->modelku->decrease_keluar($jml_kmbli, $id_barang_keluar);
					$this->modelku->penghapusan_data_peminjaan($id_peminjaman);

					foreach ($no_inv as $inv) 
					{
						$ket = "Ada";
						$this->modelku->update_DetailKembalian($ket, $inv);

						$data2 = array
						(
							'id_peminjaman' => $id_peminjaman,
							'no_inv' => $inv,
							'keterangan' => 'Dikembalikan tanpa ada masalah'
						);

						$this->modelku->input_data($data2, 'detail_pengembalian');
					}

					$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Anda berhasil mengembalikan barang! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					redirect('admin/admin/nginput_barang_pengembalian');
					echo json_encode(array("status" => TRUE));

				}
				else if($jml_kmbli > $jml)
				{
					$this->load->view("404nf");
					?>
					<script type="text/javascript">
						alert("Terjadi Kesalahan! Karena data yang anda kembalikan melebihi data yang anda pinjam!");
					</script>
					<?php
				}
			}

			$this->db->select('jumlah_keluar')->where('id_barang_keluar',$id_barang_keluar);
			$query = $this->db->get('t_barang_keluar');
			foreach($query->result_array() as $row)
			{
				$jml = $row['jumlah_keluar'];

				if ($jml == 0) 
				{
					$this->modelku->penghapusan_data_keluar($id_barang_keluar);
				}
			}

			$this->db->select('jml_rusak')->where('id_barang_keluar',$id_barang_keluar);
			$query2 = $this->db->get('t_kerusakan');
			foreach ($query2->result_array() as $row2) 
			{
				$jml2 = $row2['jml_rusak'];
				if($jml == $jml2)
				{
					$this->modelku->editKet_barang_keluar("Rusak", $id_barang_keluar);
				}
			}
		}
	}

	public function update_barang_pengembalian()
	{
		$id = $this->input->post('id_pengembalian');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang = $this->input->post('id_barang');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$jumlah_kembali = $this->input->post('jumlah_kembali');
		$penanggung_jawab = $this->input->post('penanggung_jawab');

		$data = array
		(
			'id_peminjaman' => $id_peminjaman,
			'id_barang' => $id_barang,
			'tgl_kembali' => $tgl_kembali,
			'jumlah_kembali' => $jumlah_kembali,
			'penanggung_jawab' => $penanggung_jawab
		);

		$where = array
		(
			'id_pengembalian' => $id
		);

		$this->modelku->barang_update($where, $data, 't_pengembalian');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function ngapus_barang_kembali($id)
	{
		$where = array('id_peminjaman' => $id);
		$this->modelku->delete_by_id($where, 't_pengembalian');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}

	public function input_barang_pengembalianRusak()
	{
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$no_inv = $this->input->post('fields');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$kerusakan = $this->input->post('kerusakan');
		$jml_kmbli = $this->input->post('jumlah_rusak');
		$tgl_rusak = $this->input->post('tgl_rusak');
		$penyebab_kerusakan = $this->input->post('penyebab_kerusakan');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$solusi = $this->input->post('solusi');
		$satuan = $this->input->post('satuan');
		$id_ruang = $this->input->post('id_ruang');

		$data = array
		(
			'tgl_kembali' => $tgl_kembali,
			'id_peminjaman' => $id_peminjaman,
			'kerusakan' => $kerusakan,
			'id_barang' => $id_barang,
			'jumlah_kembali' => $jml_kmbli,
			'tgl_rusak' => $tgl_rusak,
			'penyebab_kerusakan' => $penyebab_kerusakan,
			'penanggung_jawab' => $_SESSION['id'],
			'solusi' => $solusi,
			'keterangan' => "Dikembalikan dalam keadaan rusak"
		);

		$data2 = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'tgl_rusak' => $tgl_rusak,
			'jml_rusak' => $jml_kmbli,
			'id_barang' => $id_barang,
			'penanggung_jawab' => $_SESSION['id'],
			'tindakan' => $solusi
		);

		$qryIdPinjam = $this->db->query("select id_peminjaman from t_peminjaman where id_peminjaman='$id_peminjaman'");
		$qryIdKeluar = $this->db->query("select id_barang_keluar from t_peminjaman where id_barang_keluar='$id_barang_keluar'");
		$qryIdBrang= $this->db->query("select id_barang from t_peminjaman where id_barang='$id_barang'");
		if (empty($qryIdPinjam->result_array() && $qryIdKeluar->result_array() && $qryIdBrang->result_array())) 
		{
			echo "Data tidak dipinjam!";
		}
		else
		{
			$this->modelku->input_data($data, 't_pengembalian');
			$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();

			$query = $this->db->query("select jumlah from t_peminjaman where id_peminjaman='$id_peminjaman'")->result_array();
			$query3 = $this->db->query("select jml_rusak from t_kerusakan where id_barang_keluar='$id_barang_keluar'")->result_array();
			$qryIdBrangKluar = $this->db->query("select id_barang_keluar from t_kerusakan where id_barang_keluar='$id_barang_keluar'");

			foreach($query as $row)
			{	

				if ($row['jumlah'] > $jml_kmbli) 
				{
				 	$this->modelku->decrease_peminjaman($jml_kmbli, $id_peminjaman);
				 	if (empty($qryIdBrangKluar->result_array())) 
				 	{
						$this->modelku->input_data($data2, 't_kerusakan');
						$cc = $row['jumlah'] - $jml_kmbli;
						$this->modelku->editKet_barang_keluar("$jml_kmbli Rusak dan $cc dipinjam",$id_barang_keluar);

						foreach ($no_inv as $inv) 
						{
							$ket = "Rusak";
							$this->modelku->update_DetailKembalian2($ket, $inv);
						}
				 	}
				 	else 
				 	{
						$this->modelku->penambahan_jumlah_barang_rusak($jml_kmbli, $id_barang_keluar);
						foreach ($query3 as $row3)
						{
							//Akan work jika di t_peminjaman dan t_kerusakan ada data, jika salah satu atau keduanya gk ada data maka auto ora dadi.
							$cc = $row['jumlah'] - $jml_kmbli;
							$jmlRusak = $row3['jml_rusak'] + $jml_kmbli;
							$this->modelku->editKet_barang_keluar("$jmlRusak Rusak dan $cc dipinjam",$id_barang_keluar);
						}

						foreach ($no_inv as $inv) 
						{
							$ket = "Rusak";
							$this->modelku->update_DetailKembalian2($ket, $inv);
						}
				 	}	
				}
				else if ($row['jumlah'] === $jml_kmbli) 
				{
					foreach ($no_inv as $inv) 
					{
						$ket = "Rusak";
						$this->modelku->update_DetailKembalian2($ket, $inv);
					}
			  		$this->modelku->penghapusan_data_peminjaan($id_peminjaman);
					$this->modelku->editKet_barang_keluar("Rusak",$id_barang_keluar);
				  	$qryIdRskPnjm = $this->db->query("select id_barang_keluar from t_kerusakan where id_barang_keluar='$id_barang_keluar'");
				  	$idKluarHilang = $this->db->query("select id_barang_keluar from t_kehilangan where id_barang_keluar='$id_barang_keluar'")->result_array();
				  	$jmlHilang = $this->db->query("select jumlah_hilang from t_kehilangan where id_barang_keluar='$id_barang_keluar'")->result_array();
				  	if (empty($qryIdRskPnjm->result_array())) 
				  	{
				  		$this->modelku->input_data($data2, 't_kerusakan');
				  		foreach ($idKluarHilang as $hlng) 
				  		{
				  			foreach ($jmlHilang as $jmlHlng) 
				  			{
				  				if ($hlng['id_barang_keluar'] === $id_barang_keluar) 
					  			{
					  				$hilang = $jmlHlng['jumlah_hilang'];
					  				$this->modelku->editKet_barang_keluar("$hilang Hilang dan $jml_kmbli Rusak",$id_barang_keluar);
					  			}
				  			}
				  		}
				  	}
				  	else
				  	{
				  		$this->modelku->penambahan_jumlah_barang_rusak($jml_kmbli, $id_barang_keluar);
				  	}
				}
				else
				{
				 	echo "Terjadi Kesalahan! Karena data yang anda kembalikan melebihi data yang anda pinjam!";
				}
			}
		}

		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Anda berhasil mengembalikan barang! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/admin/nginput_barang_pengembalianRusak');
		echo json_encode(array("status" => TRUE));
	}

	public function nginput_barang_pengembalianHilang()
	{
		$this->load->view('admin/barang/v_pengembalian_barangHilang');
	}

	public function input_barang_pengembalianHilang()
	{
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$no_inv = $this->input->post('fields');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$jml_kmbli = $this->input->post('jumlah_hilang');
		$tgl_hilang = $this->input->post('tgl_hilang');
		$alasan_hilang = $this->input->post('alasan_hilang');
		$solusi = $this->input->post('solusi');
		$satuan = $this->input->post('satuan');
		$id_ruang = $this->input->post('id_ruang');

		$data = array
		(
			'tgl_kembali' => $tgl_kembali,
			'id_peminjaman' => $id_peminjaman,
			'id_barang' => $id_barang,
			'jumlah_kembali' => $jml_kmbli,
			'tgl_hilang' => $tgl_hilang,
			'penanggung_jawab' => $_SESSION['id'],
			'solusi' => $solusi,
			'keterangan' => "Dikembalikan dalam keadaan hilang"
		);

		$data2 = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'tgl_hilang' => $tgl_hilang,
			'id_barang' => $id_barang,
			'alasan_hilang' => $alasan_hilang,
			'penanggung_jawab' => $_SESSION['id'],
			'solusi' => $solusi,
			'jumlah_hilang' => $jml_kmbli
		);

		$qryIdPinjam = $this->db->query("select id_peminjaman from t_peminjaman where id_peminjaman='$id_peminjaman'");
		$qryIdKeluar = $this->db->query("select id_barang_keluar from t_peminjaman where id_barang_keluar='$id_barang_keluar'");
		$qryIdBrang= $this->db->query("select id_barang from t_peminjaman where id_barang='$id_barang'");
		if (empty($qryIdPinjam->result_array() && $qryIdKeluar->result_array() && $qryIdBrang->result_array())) 
		{
			echo "Data tidak dipinjam!";
		}
		else
		{
			$this->modelku->input_data($data, 't_pengembalian');
			$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();

			$query = $this->db->query("select jumlah from t_peminjaman where id_peminjaman='$id_peminjaman'")->result_array();
			$query3 = $this->db->query("select jumlah_hilang from t_kehilangan where id_barang_keluar='$id_barang_keluar'")->result_array();
			$qryIdBrangKluar = $this->db->query("select id_barang_keluar from t_kehilangan where id_barang_keluar='$id_barang_keluar'");

			foreach($query as $row)
			{	

				if ($row['jumlah'] > $jml_kmbli) 
				{
				 	$this->modelku->decrease_peminjaman($jml_kmbli, $id_peminjaman);
				 	if (empty($qryIdBrangKluar->result_array())) 
				 	{
						 $this->modelku->input_data($data2, 't_kehilangan');
						 $cc = $row['jumlah'] - $jml_kmbli;
						 $this->modelku->editKet_barang_keluar("$jml_kmbli Hilang dan $cc dipinjam",$id_barang_keluar);

						foreach ($no_inv as $inv) 
						{
							$ket = "Hilang";
							$this->modelku->update_DetailKembalian2($ket, $inv);

							$data7 = array
							(
								'id_peminjaman' => $id_peminjaman,
								'no_inv' => $inv,
								'keterangan' => "Dikembalikan dalam keadaan hilang"
							);

							$this->modelku->input_data($data7, 'detail_pengembalian');
						}
				 	}
				 	else 
				 	{
						 $this->modelku->penambahan_jumlah_barang_hilang($jml_kmbli, $id_barang_keluar);
						 foreach ($query3 as $row3)
						 {
							 //Akan work jika di t_peminjaman dan t_kerusakan ada data, jika salah satu atau keduanya gk ada data maka auto ora dadi.
							 $cc = $row['jumlah'] - $jml_kmbli;
							 $jmlRusak = $row3['jumlah_hilang'] + $jml_kmbli;
							 $this->modelku->editKet_barang_keluar("$jmlRusak Hilang dan $cc dipinjam",$id_barang_keluar);
						 }

						foreach ($no_inv as $inv) 
						{
							$ket = "Hilang";
							$this->modelku->update_DetailKembalian2($ket, $inv);
						}
				 	}	
				}
				else if ($row['jumlah'] === $jml_kmbli) 
				{
					foreach ($no_inv as $inv) 
					{
						$ket = "Hilang";
						$this->modelku->update_DetailKembalian2($ket, $inv);
					}
					$this->modelku->penghapusan_data_peminjaan($id_peminjaman);
					$this->modelku->editKet_barang_keluar("Hilang",$id_barang_keluar);
				  	$qryIdHlangPnjm = $this->db->query("select id_barang_keluar from t_kehilangan where id_barang_keluar='$id_barang_keluar'");
				  	$idKluarRusak = $this->db->query("select id_barang_keluar from t_kerusakan where id_barang_keluar='$id_barang_keluar'")->result_array();
				  	$jmlRusak = $this->db->query("select jml_rusak from t_kerusakan where id_barang_keluar='$id_barang_keluar'")->result_array();
				  	if (empty($qryIdHlangPnjm->result_array())) 
				  	{
				  		$this->modelku->input_data($data2, 't_kehilangan');
				  		foreach ($no_inv as $inv) 
						{
							$data7 = array
							(
								'id_peminjaman' => $id_peminjaman,
								'no_inv' => $inv,
								'keterangan' => "Dikembalikan dalam keadaan hilang"
							);

							$this->modelku->input_data($data7, 'detail_pengembalian');
						}
				  		foreach ($idKluarRusak as $rsk) 
				  		{
				  			foreach ($jmlRusak as $jmlRsk) 
				  			{
				  				if ($rsk['id_barang_keluar'] === $id_barang_keluar) 
					  			{
					  				$rusak = $jmlRsk['jml_rusak'];
					  				$this->modelku->editKet_barang_keluar("$rusak Rusak dan $jml_kmbli Hilang",$id_barang_keluar);
					  			}
				  			}
				  		}
				  	}
				  	else
				  	{
				  		$this->modelku->penambahan_jumlah_barang_hilang($jml_kmbli, $id_barang_keluar);
				  	}
				}
				else
				{
				 	echo "Terjadi Kesalahan! Karena data yang anda kembalikan melebihi data yang anda pinjam!";
				}
			}
		}

		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Anda berhasil mengembalikan barang! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin/admin/nginput_barang_pengembalianHilang');
		echo json_encode(array("status" => TRUE));
	}

	public function kembali_barang()
	{
		$this->load->view('admin/barang/v_kembali_barang');
	}

	public function ngapus_barang_pengembalian()
	{
		$where = array('id_pengembalian' => $id );
		$this->modelku->hapus_data($where, 't_pengembalian');
		redirect('admin\barang/barang/ndeleng_data_pengembalian');	
	}
}