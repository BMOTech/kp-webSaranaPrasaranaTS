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
	}

	public function ndeleng_barang()
	{
		$data['t_barang'] = $this->modelku->tampil_data('t_barang')->result();
		$this->load->view('guest/barang/v_barang', $data);
	}

	public function v_barang_masuk()
	{
		$data['t_barang_masuk'] = $this->modelku->tampil_data('t_barang_masuk')->result();
		$this->load->view('guest/barang/l_barang_masuk', $data);
	}

	public function detail_barang($id)
	{
		$where = array('id_barang' => $id, 'keterangan' => '');
		$data['detail_barang'] = $this->modelku->tampil_detail($where, 'detail_barang')->result();
		$this->load->view('guest/barang/l_detail_barang', $data);
	}

	public function ndeleng_barang_keluar()
	{
		$data['t_barang_keluar'] = $this->modelku->tampil_data('t_barang_keluar')->result();
		$this->load->view('guest/barang/v_barang_keluar', $data);
	}

	public function nginput_barang_pinjam()
	{
		$this->load->view('guest/barang/v_peminjaman');
	}

	public function input_barang_pinjaman()
	{
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$id_barang = $this->input->post('id_barang');
		$no_inv = $this->input->post('fields');
		$tgl_peminjaman = $this->input->post('tgl_peminjaman');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$kondisi = $this->input->post('kondisi');
		$jumlah = $this->input->post('no_inve');
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
				$this->load->view('admin/barang/v_t_peminjaman', $data);
				$this->modelku->input_data($data2, 't_barang_keluar');

				foreach ($no_inv as $inv) 
				{
					$sess = $_SESSION['id'];
					$this->modelku->update_Detail($sess, $inv);
				}
				
			}
			else if($jml <= 0 || $jml < $jumlah)
			{
				echo "Tidak dapat menginput, karena jumlah barang saat ini masih kosong!";
			}
		}
	}

	public function ndeleng_barang_pinjam()
	{
		$data['t_peminjaman'] = $this->modelku->tampil_data('t_peminjaman')->result();
		$this->load->view('guest/barang/v_t_peminjaman', $data);
	}

	public function ndeleng_data_pengembalian()
	{
		$data['t_pengembalian'] = $this->modelku->tampil_data('t_pengembalian')->result();
		$this->load->view('guest/barang/v_data_pengembalian', $data);
	}

	public function input_barang_pengembalian()
	{
		$id_barang_keluar = $this->input->post('id_barang_keluar');
		$id_barang = $this->input->post('id_barang');
		$id_peminjaman = $this->input->post('id_peminjaman');
		$penanggung_jawab = $this->input->post('penanggung_jawab');
		$tgl_kembali = $this->input->post('tgl_kembali');
		$jml_kmbli = $this->input->post('jumlah_kembali');
		$no_inv = $this->input->post('fields');

		$data = array
		(
			'id_barang' => $id_barang,
			'id_peminjaman' => $id_peminjaman,
			'tgl_kembali' => $tgl_kembali,
			'jumlah_kembali' => $jml_kmbli,
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
					$this->modelku->penghapusan_data_peminjaan($id_peminjaman);
					$this->modelku->increase_jumlah($jml_kmbli, $id_barang);
					$this->modelku->penghapusan_data_keluar($id_barang_keluar);

					foreach ($no_inv as $inv) 
					{
						$this->modelku->update_DetailKembalian($inv);
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
						$this->modelku->update_DetailKembalian($inv);
					}
				}
				else if ($jml == $jml_kmbli) 
				{
					$this->modelku->increase_jumlah($jml_kmbli, $id_barang);
					$this->modelku->penghapusan_data_keluar($id_barang_keluar);
					$this->modelku->penghapusan_data_peminjaan($id_peminjaman);

					foreach ($no_inv as $inv) 
					{
						$this->modelku->update_DetailKembalian($inv);
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
		}
	}

	public function kembali_barang()
	{
		$this->load->view('guest/barang/v_kembali_barang');
	}

	public function nginput_barang_pengembalian()
	{
		$this->load->view('guest/barang/v_pengembalian');
	}

	public function nginput_barang_pengembalianRusak()
	{
		$this->load->view('guest/barang/v_pengembalian_barangRusak');
	}

	public function nginput_barang_pengembalianHilang()
	{
		$this->load->view('guest/barang/v_pengembalian_barangHilang');
	}
}