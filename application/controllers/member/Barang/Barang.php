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

		if ($this->session->userdata('level') == 'admin') 
		{
			redirect('admin/admin');
		}
		elseif ($this->session->userdata('level') == '') 
		{
			redirect('index.html');
		}
	}

	public function ndeleng_barang()
	{
		$data['t_barang'] = $this->modelku->tampil_data('t_barang')->result();
		$this->load->view('member/barang/v_barang', $data);
	}

	public function ndeleng_barang_masuk()
	{
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();
		$this->load->view('member/barang/v_barang_masuk', $data);
	}

	public function detail_barang($id)
	{
		$where = array('id_barang' => $id, 'kondisi' => 'Ada');
		$data['detail_barang'] = $this->modelku->tampil_data($where, 'detail_barang')->result();
		$this->load->view('member/barang/l_detail_barang', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function detail_barangMsk($id)
	{
		$where = array('id_barang_masuk' => $id);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/l_detail_barang_masuk', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function detail_barangKlr($id)
	{
		$where = array('id_barang_keluar' => $id);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/l_detail_barang_keluar', $data);
		$this->session->set_userdata("idbrange", $id);
	}

	public function detail_barangPinjam($idPinjam)
	{
		$where = array('kondisi' => 'Dipinjam', 'id_peminjaman' => $idPinjam);
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('member/barang/l_detail_barang', $data);
	}

	public function ndeleng_barang_keluar()
	{
		$data['t_barang_keluar'] = $this->modelku->tampil_data('t_barang_keluar')->result();
		$this->load->view('member/barang/v_barang_keluar', $data);
	}

	public function ndeleng_barang_dipinjam()
	{
		$where = array('peminjam' => $_SESSION['id']);
		$data['t_peminjaman'] = $this->modelku->tampil_pinjam($where, 't_peminjaman')->result();
		$this->load->view('member/barang/v_barang_pinjaman', $data);
	}

	public function nginput_barang_pinjam()
	{
		$this->load->view('member/barang/v_peminjaman');
	}

	public function barang_pengembalian()
	{
		$this->load->view('member/barang/v_kembali_barang');
	}

	public function ndeleng_barang_rusak()
	{
		$data['t_kerusakan'] = $this->modelku->tampil_data('t_kerusakan')->result();
		$this->load->view('member/barang/v_t_kerusakan', $data);
	}

	public function ndeleng_barang_ilang()
	{
		$data['t_kehilangan'] = $this->modelku->tampil_data('t_kehilangan')->result();
		$this->load->view('member/barang/v_t_kehilangan', $data);
	}

	public function masuk_barang_pinjaman()
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
				$this->load->view('member/barang/v_barang_pinjaman', $data);
				$this->modelku->input_data($data2, 't_barang_keluar');

				foreach ($no_inv as $inv) 
				{
					$sess = $_SESSION['id'];
					$this->modelku->update_Detail($sess, $id_barang_keluar, $id_peminjaman, $inv);
				}
			}
			else if($jml <= 0 || $jml < $jumlah)
			{
				echo "Tidak dapat menginput, karena jumlah barang saat ini masih kosong!";
			}
		}
	}

	public function nginput_barang_pengembalian()
	{
		$this->load->view('member/barang/v_pengembalian');
	}

	public function nginput_barangRusak_pengembalian()
	{
		$this->load->view('member/barang/v_kembalian_barangRusak');
	}

	public function input_barang_pengembalian()
	{
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$jml_kmbli = $this->input->post('jumlah_kembali');
		$no_inv = $this->input->post('fields');

		$data = array
		(
			'tgl_kembali' => $tgl_kembali,
			'id_peminjaman' => $id_peminjaman,
			'id_barang' => $id_barang,
			'jumlah_kembali' => $jml_kmbli,
			'penanggung_jawab' => $_SESSION['id'],
			'keterangan' => 'Dikembalikan tanpa ada masalah'
		);

		$qryIdPinjam = $this->db->query("select id_peminjaman from t_peminjaman where id_peminjaman='$id_peminjaman'");
		if (empty($qryIdPinjam->result_array())) 
		{
			echo "Data tidak dipinjam!";
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
					$this->modelku->increase_jumlah($jml_kmbli, $id_barang);
					$this->modelku->penghapusan_data_keluar($id_barang_keluar);
					$this->modelku->penghapusan_data_peminjaan($id_peminjaman);

					foreach ($no_inv as $inv) 
					{
						$ket = "";
						$this->modelku->update_DetailKembalian($ket, $inv);
					}
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
						$ket = "";
						$this->modelku->update_DetailKembalian($ket, $inv);
					}
				}
				else if ($jml === $jml_kmbli) 
				{
					$this->modelku->input_data($data, 't_pengembalian');
					$this->modelku->increase_jumlah($jml_kmbli, $id_barang);
					$this->modelku->penghapusan_data_peminjaan($id_peminjaman);
					$this->modelku->decrease_keluar($jml_kmbli, $id_barang_keluar);

					foreach ($no_inv as $inv) 
					{
						$ket = "";
						$this->modelku->update_DetailKembalian($ket, $inv);
					}
				}
				else if($jml_kmbli > $jml)
				{
					echo "Terjadi Kesalahan! Karena data yang anda kembalikan melebihi data yang anda pinjam!";
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

	public function pengembalian_barang_rusak()
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
			'penanggung_jawab' => $_SESSION['username'],
			'solusi' => $solusi,
			'keterangan' => "Dikembalikan dalam keadaan rusak"
		);

		$data2 = array
		(
			'id_barang_keluar' => $id_barang_keluar,
			'tgl_rusak' => $tgl_rusak,
			'jml_rusak' => $jml_kmbli,
			'id_barang' => $id_barang,
			'penanggung_jawab' => $_SESSION['username'],
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
	}

	public function nginput_barang_pengembalianHilang()
	{
		$this->load->view('member/barang/v_pengembalian_barangHilang');
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
	}

	public function ngapus_barang_pengembalian()
	{
		$where = array('id_pengembalian' => $id );
		$this->modelku->hapus_data($where, 't_pengembalian');
		redirect('admin\barang/barang/ndeleng_data_pengembalian');	
	}
}