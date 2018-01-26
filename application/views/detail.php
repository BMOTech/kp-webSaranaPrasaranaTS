<?php
if($_POST['id']){
  //membuat variabel id berisi post['id']
  $id = $_POST['id'];
  //query standart select where id
  $view = $this->db->query("SELECT * FROM detail_barang WHERE id='$id'");
  //jika ada datanya
  if($view->num_rows){
    //fetch data ke dalam veriabel $row_view
    $row_view = $view->fetch_assoc();
    //menampilkan data dengan table
    echo '
    <table class="table table-bordered">
      <tr>
        <th>ID Barang</th>
        <td>'.$row_view['id_barang'].'</td>
      </tr>
      <tr>
        <th>No Inv</th>
        <td>'.$row_view['no_inv'].'</td>
      </tr>
      <tr>
        <th>Kondisi</th>
        <td>'.$row_view['kondisi'].'</td>
      </tr>
    </table>
    ';
  }
}