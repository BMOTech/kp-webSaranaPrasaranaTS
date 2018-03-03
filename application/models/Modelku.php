<?php
/**
* 
*/
class Modelku extends CI_Model
{

	var $table = 't_barang';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Management user
	public function cek_user($username, $password)
	{
		$query = $this->db->query("select * from t_user where username='$username' AND password='$password' limit 1");
		return $query;
	}

	//Management admin
	public function cek_admin($username, $password)
	{
		$query = $this->db->query("select * from t_admin where username='$username' AND password='$password' limit 1");
		return $query;
	}
	public function input_data($data, $table)
	{
		$this->db->insert($table,$data);
	}
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function cek_idBarang()
	{
		$query = $this->db->query("SELECT id_barang FROM t_barang");
		return $query;
	}

	public function cek_idRuang()
	{
		$query = $this->db->query("SELECT id_ruang FROM t_ruang");
		return $query;
	}

	public function increase_jumlah($param, $param2)
	{
		$this->db->query("update t_barang set jumlah = jumlah + '$param' where id_barang = '$param2'");
	}

	public function decrease_jumlah($id)
	{ 
		$this->db->select('id_barang, jumlah_masuk')->where('id_barang_masuk',$id);
		$query = $this->db->get('t_barang_masuk');
		foreach($query->result_array() as $row)
		{
    		$id_barang = $row['id_barang'];
    		$jumlah_masuk = $row['jumlah_masuk'];
		}

		$qry3 = $this->db->query("update t_barang set jumlah = jumlah - 
      	'$jumlah_masuk' where id_barang = '$id_barang' and jumlah > 0");
	}

	public function decrease_jumlahMsk($id)
	{ 
		$this->db->select('id_barang_masuk, jumlah_masuk')->where('id_barang_masuk',$id);
		$query = $this->db->get('t_barang_masuk');
		foreach($query->result_array() as $row)
		{
    		$id_barang = $row['id_barang'];
    		$jumlah_masuk = $row['jumlah_masuk'];
		}

		$qry3 = $this->db->query("update t_barang set jumlah = jumlah - 
      	'$jumlah_masuk' where id_barang = '$id_barang' and jumlah > 0");
	}

	public function update_barang_jumlah($jumlah, $id)
	{
		$this->db->query("update t_barang set jumlah = '$jumlah' where id_barang = '$id'");
	}

	public function decrease_jumlah_drKeluar($param, $param2)
	{
		$this->db->query("update t_barang set jumlah = jumlah - '$param' where id_barang = '$param2' and jumlah > 0");
	}

	public function konfirmasi_penambahan_barangKeluar($id)
	{
		$this->db->select('jumlah')->where('id_barang',$id);
		$query = $this->db->get('t_barang');
		foreach($query->result_array() as $row)
		{
    		$jumlah = $row['jumlah'];
		}

		$qry3 = $this->db->query("update t_barang set jumlah = jumlah + 
      	'$jumlah_hilang' where id_barang = '$id_barang' and jumlah > 0");
	}

	//Hilang
	// public function increase_jumlah_hilang($id)
	// { 
	// 	$this->db->select('id_barang, jumlah_hilang')->where('id_barang_keluar',$id);
	// 	$query = $this->db->get('t_kehilangan');
	// 	foreach($query->result_array() as $row)
	// 	{
 //    		$id_barang = $row['id_barang'];
 //    		$jumlah_hilang = $row['jumlah_hilang'];
	// 	}

	// 	$qry3 = $this->db->query("update t_barang set jumlah = jumlah + 
 //      	'$jumlah_hilang' where id_barang = '$id_barang'");
	// }

	public function ngapus_dataKeluar_soko_hilang($id)
	{
		$this->db->select('id_barang_keluar')->where('id_barang_keluar',$id);
		$query = $this->db->get('t_kehilangan');
		foreach($query->result_array() as $row)
		{
    		$id_barang_keluar = $row['id_barang_keluar'];
		}

		$qry3 = $this->db->query("delete from t_barang_keluar where id_barang_keluar='$id_barang_keluar'");
	}

	public function ngapus_dataHilang_soko_keluar($id)
	{
		$this->db->select('id_barang_keluar')->where('id_barang_keluar',$id);
		$query = $this->db->get('t_barang_keluar');
		foreach($query->result_array() as $row)
		{
    		$id_barang_keluar = $row['id_barang_keluar'];
		}

		$qry3 = $this->db->query("delete from t_kehilangan where id_barang_keluar='$id_barang_keluar'");
	}

	public function increase_jumlah_keluar($id)
	{ 
		$this->db->select('id_barang, jumlah_keluar')->where('id_barang_keluar',$id);
		$query = $this->db->get('t_barang_keluar');
		foreach($query->result_array() as $row)
		{
    		$id_barang = $row['id_barang'];
    		$jumlah_keluar = $row['jumlah_keluar'];
		}

		$qry3 = $this->db->query("update t_barang set jumlah = jumlah + 
      	'$jumlah_keluar' where id_barang = '$id_barang'");
	}

	//Rusak
	public function increase_jumlah_rusak($id)
	{
		$this->db->select('id_barang, jml_rusak')->where('id_barang_keluar',$id);
		$query = $this->db->get('t_kerusakan');
		foreach($query->result_array() as $row)
		{
    		$id_barang = $row['id_barang'];
    		$jml_rusak = $row['jml_rusak'];
		}

		$qry3 = $this->db->query("update t_barang set jumlah = jumlah + 
      	'$jml_rusak' where id_barang = '$id_barang'");
	}

	public function ngapus_dataKeluar_soko_rusak($id)
	{
		$this->db->select('id_barang_keluar')->where('id_barang_keluar',$id);
		$query = $this->db->get('t_barang_keluar');
		foreach($query->result_array() as $row)
		{
    		$id_barang_keluar = $row['id_barang_keluar'];
		}

		$qry3 = $this->db->query("delete from t_barang_keluar where id_barang_keluar='$id_barang_keluar'");
	}

	public function ngapus_dataRusak_soko_rusak($id)
	{
		$this->db->select('id_barang_keluar')->where('id_barang_keluar',$id);
		$query = $this->db->get('t_barang_keluar');
		foreach($query->result_array() as $row)
		{
    		$id_barang_keluar = $row['id_barang_keluar'];
		}

		$qry3 = $this->db->query("delete from t_kerusakan where id_barang_keluar='$id_barang_keluar'");
	}

	//Pinjam
	public function increase_jumlah_pinjam($id)
	{
		$this->db->select('id_barang, jumlah')->where('id_peminjaman',$id);
		$query = $this->db->get('t_peminjaman');
		foreach($query->result_array() as $row)
		{
    		$id_barang = $row['id_barang'];
    		$jumlah = $row['jumlah'];
		}

		$qry3 = $this->db->query("update t_barang set jumlah = jumlah + 
      	'$jumlah' where id_barang = '$id_barang'");
	}

	public function ngapus_dataKeluar_soko_pinjam($id)
	{
		$this->db->select('id_barang_keluar')->where('id_peminjaman',$id);
		$query = $this->db->get('t_peminjaman');
		foreach($query->result_array() as $row)
		{
    		$id_barang_keluar = $row['id_barang_keluar'];
		}

		$qry3 = $this->db->query("delete from t_barang_keluar where id_barang_keluar='$id_barang_keluar'");
	}

	public function ngapus_dataPinjam_soko_keluar($id)
	{
		$this->db->select('id_barang_keluar')->where('id_barang_keluar',$id);
		$query = $this->db->get('t_barang_keluar');
		foreach($query->result_array() as $row)
		{
    		$id_barang_keluar = $row['id_barang_keluar'];
		}

		$qry3 = $this->db->query("delete from t_peminjaman where id_barang_keluar='$id_barang_keluar'");
	}

	public function penghapusan_data_peminjaan($id)
	{
		$query = $this->db->query("delete from t_peminjaman where id_peminjaman='$id'");
		return $query;
	}

	public function penghapusan_data_keluar($id)
	{
		$query = $this->db->query("delete from t_barang_keluar where id_barang_keluar='$id'");
		return $query;
	}

	public function editKet_barang_keluar($ket, $id)
	{
		$query = $this->db->query("update t_barang_keluar set keterangan='$ket' where id_barang_keluar='$id'");
		return $query;
	}

	public function decrease_peminjaman($jml, $id)
	{
		$query = $this->db->query("update t_peminjaman set jumlah = jumlah - '$jml' where id_peminjaman='$id'");
		return $query;
	}

	public function decrease_kehilangan($jml, $id)
	{
		$query = $this->db->query("update t_peminjaman set jumlah = jumlah - '$jml' where id_peminjaman='$id'");
		return $query;
	}

	public function decrease_keluar($jml, $id)
	{
		$query = $this->db->query("update t_barang_keluar set jumlah_keluar = jumlah_keluar - '$jml' where id_barang_keluar = '$id'");
		return $query;
	}

	public function cekJumlahPinjam($id)
	{
		$query = $this->db->query("select jumlah from t_peminjaman where id_peminjaman='$id'");
		return $query;
	}

	public function cekJumlahKeluar($id)
	{
		$query = $this->db->query("select jumlah_keluar from t_barang_keluar where id_barang_keluar='$id'");
		return $query;
	}

	public function cekIDBrangKluarRusak()
	{ 	
		$query = $this->db->query("SELECT id_barang_keluar FROM t_kerusakan");
		return $query;
	}

	public function penambahan_jumlah_barang_rusak($jml, $id)
	{
		$query = $this->db->query("update t_kerusakan set jml_rusak = jml_rusak + '$jml' where id_barang_keluar='$id'");
		return $query;
	}

	public function penambahan_jumlah_barang_hilang($jml, $id)
	{
		$query = $this->db->query("update t_kehilangan set jumlah_hilang = jumlah_hilang + '$jml' where id_barang_keluar='$id'");
		return $query;
	}

	public function hapusSemuaDataPengembalian($table)
	{
		$query = $this->db->query("delete from ".$table);
	}

	public function jajall($id)
	{
		$qry=$this->db->query("select jml_rusak from t_kerusakan where id_barang_keluar='$id'");
		return $qry;
	}

	public function hapusHistoriPinjam($table)
	{
		$this->db->query("delete from ".$table);
	}

	//For Profile User
	public function select_id()
	{
		$qry1 = $this->db->query("select id from t_user where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $id) 
		{
			echo $id['id'];
		}
	}

	public function select_username()
	{
		$qry1 = $this->db->query("select username from t_user where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $uname) 
		{
			echo $uname['username'];
		}
	}

	public function select_password()
	{
		$qry1 = $this->db->query("select password from t_user where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $pass) 
		{
			echo $pass['password'];
		}
	}

	public function select_email()
	{
		$qry1 = $this->db->query("select email from t_user where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $mail) 
		{
			echo $mail['email'];
		}
	}

	public function select_fullname()
	{
		$qry1 = $this->db->query("select fullname from t_user where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $fullnm) 
		{
			echo $fullnm['fullname'];
		}
	}

	public function tampil_user()
	{
		$qry = $this->db->query("select * from t_user where id=".$_SESSION['id']);
		return $qry;
	}


	//For Profile Admin
	public function select_adm_id()
	{
		$qry1 = $this->db->query("select id from t_admin where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $id) 
		{
			echo $id['id'];
		}
	}

	public function select_adm_username()
	{
		$qry1 = $this->db->query("select username from t_admin where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $uname) 
		{
			echo $uname['username'];
		}
	}

	public function select_adm_password()
	{
		$qry1 = $this->db->query("select password from t_admin where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $pass) 
		{
			echo $pass['password'];
		}
	}

	public function select_adm_email()
	{
		$qry1 = $this->db->query("select email from t_admin where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $mail) 
		{
			echo $mail['email'];
		}
	}

	public function select_adm_fullname()
	{
		$qry1 = $this->db->query("select fullname from t_admin where id=".$_SESSION['id'])->result_array();
		foreach ($qry1 as $fullnm) 
		{
			echo $fullnm['fullname'];
		}
	}

	public function tampil_adm_user()
	{
		$qry = $this->db->query("select * from t_admin where id=".$_SESSION['id']);
		return $qry;
	}

	public function tampil_detail($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function tampil_pinjam($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function select_inv($id_barang)
	{
	    $this->db->where('id_barang', $id_barang);
	    $this->db->where('kondisi', 'Ada');
	    $result = $this->db->get('detail_barang')->result();
	    
	    return $result;
  	}

  	public function select_ruang($id_ruang)
	{
	    $this->db->select('*');
		$this->db->from('t_barang tb');
		$this->db->join('detail_barang db', 'db.id_barang = tb.id_barang', 'left');
		$this->db->where('db.id_ruang', $id_ruang);
		$this->db->group_by('tb.id_barang');
		$query = $this->db->get()->result();

		return $query; 
  	}

  	public function jumlahHlng($id_barang_keluar)
	{
	    $this->db->where('id_barang_keluar', $id_barang_keluar);
	    $result = $this->db->get('t_kehilangan')->result();
	    
	    return $result;
  	}

  	public function jumlahRsk($id_barang_keluar)
	{
	    $this->db->where('id_barang_keluar', $id_barang_keluar);
	    $result = $this->db->get('t_kerusakan')->result();
	    
	    return $result;
  	}

  	public function IdBrngKmbli($id_peminjaman)
	{
	    $this->db->select('*');
		$this->db->from('t_barang tb');
		$this->db->join('t_peminjaman tp', 'tp.id_barang = tb.id_barang', 'left');
		$this->db->where('tp.id_peminjaman', $id_peminjaman);
		$this->db->group_by('tb.id_barang');
		$query = $this->db->get()->result();

		return $query; 
  	}

  	public function IdBrngHlng($id_barang_keluar)
	{
	    $this->db->select('*');
		$this->db->from('t_barang tb');
		$this->db->join('t_kehilangan tk', 'tk.id_barang = tb.id_barang', 'left');
		$this->db->where('tk.id_barang_keluar', $id_barang_keluar);
		$this->db->group_by('tb.id_barang');
		$query = $this->db->get()->result();

		return $query; 
  	}

  	public function IdBrngRsk($id_barang_keluar)
	{
	    $this->db->select('*');
		$this->db->from('t_barang tb');
		$this->db->join('t_kerusakan tk', 'tk.id_barang = tb.id_barang', 'left');
		$this->db->where('tk.id_barang_keluar', $id_barang_keluar);
		$this->db->group_by('tb.id_barang');
		$query = $this->db->get()->result();

		return $query; 
  	}

  	public function select_invKmbli($id_peminjaman, $id_barang_keluar, $id_barang)
  	{
  		$this->db->where('id_peminjaman', $id_peminjaman);
  		$this->db->where('id_barang_keluar', $id_barang_keluar);
  		$this->db->where('id_barang', $id_barang);
  		$this->db->where('keterangan', 'barang keluar');
  		$this->db->where('kondisi', 'Dipinjam');
	    $result = $this->db->get('detail_barang')->result();
	    
	    return $result;
  	}

  	public function totHarga($id_barang)
  	{
  		$this->db->where('id_barang', $id_barang);
	    $result = $this->db->get('t_barang')->result();
	    
	    return $result;
  	}

	public function select_idBrang()
	{
		return $this->db->get('t_barang')->result();
	}

	public function select_idR()
	{
		return $this->db->get('t_ruang')->result();
	}

	public function select_invPinjam()
	{
		$this->db->select("no_inv");
	    $this->db->from('detail_barang');
	    $this->db->where("kondisi = 'Dipinjam'");
	    $query = $this->db->get();
	    return $query;
	}

	//EOF

	public function decrease_Detail($id)
	{
		$this->db->query("update t_barang set jumlah = jumlah - 1 where id_barang = '$id' and jumlah > 0");
	}

	public function update_Detail($sess, $idKeluar, $idPinjam, $inv)
	{
		$this->db->query("update detail_barang set kondisi = 'Dipinjam', peminjam = '$sess' , id_peminjaman = '$idPinjam', id_barang_keluar = '$idKeluar', keterangan = 'barang keluar' where no_inv = '$inv'");
	}

	public function update_DetailKembalian($ket, $inv)
	{
		$this->db->query("update detail_barang set kondisi = '$ket', peminjam = '', id_peminjaman = '', id_barang_keluar = '', keterangan = '' where no_inv = '$inv'");
	}

	public function update_DetailKembalian2($ket, $inv)
	{
		$this->db->query("update detail_barang set kondisi = '$ket', keterangan='barang keluar' where no_inv = '$inv'");
	}

	public function get_by_id($table, $where)
	{
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
 
		return $query->row();
	}

	public function get_id($id)
	{
		$this->db->from('detail_barang');
		$this->db->where('id_barang',$id);
		$query = $this->db->get();
 
		return $query->row();
	}

	public function password_update($id)
	{
		$qry = $this->db->query("select password from t_admin where id='$id'");
		return $qry->row();
	}

	public function barang_update($where, $data, $table)
	{
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function delete_by_id2($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function usernameExist($username)
	{
		$this->db->where('username',$username);
	    $query = $this->db->get('t_user');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function cekpjawab($pjawab)
	{
		$this->db->where('penanggung_jawab(id)',$pjawab);
	    $query = $this->db->get('t_user');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function unameExist($key)
	{
		$this->db->where('username', $key);
		$qry = $this->db->get('t_user');
		if ($qry->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function idkluarExist($key, $choice)
	{
		$this->db->where('id_barang_keluar', $key);
		$this->db->where('mengganti_barang', $choice);
		$qry = $this->db->get('t_ganti_rugi');
		if ($qry->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function idmsukExist($key)
	{
		$this->db->where('id_barang_masuk', $key);
		$qry = $this->db->get('t_barang_masuk');
		if ($qry->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function noinvExist($key)
	{
		$this->db->where('no_inv', $key);
		$qry = $this->db->get('detail_barang');
		if ($qry->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	public function select_totHarga($id_barang_keluar)
	{
		$this->db->where('id_barang_keluar', $id_barang_keluar);
		$qry = $this->db->get('t_ganti_rugi');
		return $qry->result();
	}

	public function DeleteById($id)
	{
    	//$this->db->delete('guestbook', array('id' => $id));
    	$this->db->where('id', $id);
    	$this->db->delete('t_ganti_rugi');
  	} 
}