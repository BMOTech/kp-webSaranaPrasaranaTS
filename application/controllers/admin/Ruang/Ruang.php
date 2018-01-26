<?php
/**
* 
*/
class Ruang extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('modelku');
		$this->load->helper('url');

		if ($this->session->userdata('level') == 'member') 
		{
			redirect('index.html');
		}
		elseif ($this->session->userdata('level') == '') 
		{
			redirect('index.html');
		}
	}

	//For Ruang
	public function ndeleng_ruang()
	{
		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$this->load->view('admin/ruang/v_ruang', $data);
	}
	public function ngedit_ruang($id)
	{
		$where = array('id_ruang' => $id);
		$data['t_ruang'] = $this->modelku->edit_data($where, 't_ruang')->result();
		$this->load->view('admin/ruang/v_edit_ruang', $data);
	}
	public function update_ruang()
	{
		$id = $this->input->post('id');
		$id_ruang = $this->input->post('id_ruang');
		$nama_ruang = $this->input->post('nama_ruang');
		$keterangan = $this->input->post('keterangan');

		$data = array
		(
			'id_ruang' => $id_ruang,
			'nama_ruang' => $nama_ruang,
			'keterangan' => $keterangan
		);

		$where = array('id' => $id);

		$this->modelku->barang_update($where, $data, 't_ruang');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}
	public function ngapus_ruang($id)
	{
		$where = array('id_ruang' => $id);
		$this->modelku->delete_by_id($where, 't_ruang');
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
	}
	public function nginput_ruang()
	{
		$this->load->view('admin/ruang/v_input_ruang');
	}
	public function input_ruang()
	{
		$id_ruang = $this->input->post('id_ruang');
		$nama_ruang = $this->input->post('nama_ruang');
		$keterangan = $this->input->post('keterangan');

		$data = array
		(
			'id_ruang' => $id_ruang,
			'nama_ruang' => $nama_ruang,
			'keterangan' => $keterangan
		);

		$this->modelku->input_data($data, 't_ruang');
		$data['t_ruang'] = $this->modelku->tampil_data('t_ruang')->result();
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		echo json_encode(array("status" => TRUE));
	}
	//EOF For Ruang

	//For Barang
	public function ndeleng_barang()
	{
		$data['detail_barang'] = $this->modelku->tampil_data('detail_barang')->result();
		$this->load->view('admin/ruang/v_ndeleng_barang', $data);
	}

	public function ajax_edit_ruang($id)
	{
		$where = array
		(
			'id' => $id,
		);

		$data = $this->modelku->get_by_id('t_ruang', $where);
		echo json_encode($data);
	}
}