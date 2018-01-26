<!DOCTYPE html>
<html>
<head>
    <title>Barang</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Pengembalian Barang Hilang</center></h2>
                <?php echo form_open("admin\Barang\barang/input_barang_pengembalianHilang"); ?>
                <?=$this->session->flashdata('notif')?>
                <div class="form-group">
                    <?php
                    echo form_label('ID Peminjaman','id_peminjaman');
                    echo form_input('id_peminjaman','','class="form-control" id="id_peminjaman" placeholder="ID Peminjaman" required')
                    ?>
                    <p><i>*Id peminjaman dari barang yang anda pinjam.</i></p>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('ID Barang Keluar','id_barang_keluar');
                    echo form_input('id_barang_keluar','','class="form-control" id="id_barang_keluar" placeholder="ID Barang Keluar" required')
                    ?>
                    <p><i>*Id barang keluar dari barang yang anda pinjam.</i></p>
                </div>
                <div class="form-group">
                    <label>ID Barang</label><br>
                    <select name="id_barang" id="id_barang" class="form-control">
                        <?php $idBrang = $this->modelku->select_idBrang() ?>
                        <?php foreach($idBrang->result() as $idBr){ ?>
                            <option value="<?php echo $idBr->id_barang?>"><?php echo $idBr->id_barang?></option>
                        <?php } ?>
                    </select required>
                </div>
                <div class="form-group">
                    <label>Jumlah Hilang</label>
                    <input type="number" min="1" name="jumlah_hilang" id="jumlah_hilang" class="form-control">
                </div>
                <div class="form-group">
                    <label>No Inventaris</label>
                    <div id="container">
                        <input type="button" name="noInv" class="form-control" id="add_field" value="Klik untuk membuat text field baru"><br>
                        <p><i>*Klik kemudian pilih no inventaris barang yang akan dikembalikan.</i></p>
                        <script type="text/javascript">
                        var count = 0;
                        $(function(){
                            $('#add_field').click(function(){
                                jml = $("#jumlah_hilang").val();
                                count += 1;
                                if (count <= jml) 
                                {
                                    $('#container').append(
                                        '<strong>No Inv Barang Ke ' + count + '</strong><br />' 
                                        + '<select id="field_' + count + '" name="fields[]' + '"  class="form-control no_inv" ><?php $noInv = $this->modelku->select_invPinjam() ?> <option value="" selected="selected">Pilih no inventaris</option> <?php foreach($noInv->result() as $inv){ ?> <option value="<?php echo $inv->no_inv ?>"><?php echo $inv->no_inv ?></option><?php } ?></select><br>' );
                                }
                                else
                                {
                                    alert("Tidak bisa menambahkan! Silahkan tambah jumlah jika ingin menambahkan lagi!");
                                    location.reload();
                                }
                            
                            });
                        });
                        </script> 

                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Hilang</label>
                    <input type="date" name="tgl_hilang" id="tgl_hilang" class="form-control">
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Alasan Hilang','alasan_hilang');
                    echo form_input('alasan_hilang','','class="form-control" id="alasan_hilang" placeholder="Alasan Hilang"')
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Solusi','solusi');
                    echo form_input('solusi','','class="form-control" id="solusi" placeholder="Solusi"')
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Satuan','satuan');
                    echo form_input('satuan','','class="form-control" id="satuan" placeholder="Satuan"')
                    ?>
                </div>
                <div class="form-group">
                    <label>ID Ruang</label><br>
                    <select name="id_ruang" id="id_ruang" class="form-control">
                        <?php $idRuang = $this->modelku->select_idR() ?>
                        <?php foreach($idRuang->result() as $idRu){ ?>
                            <option value="<?php echo $idRu->id_ruang ?>"><?php echo $idRu->id_ruang ?></option>
                        <?php } ?>
                    </select required>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Penanggung Jawab (ID kamu/user)','penanggung_jawab');
                    echo form_input('penanggung_jawab','','class="form-control" id="penanggung_jawab" placeholder="Penanggung Jawab" required')
                    ?>
                </div>
                    <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary kmbliHlngBtn"') ?>
                    <?php echo form_close() ?>
                    
                    <br>
                    <p><i>*Pastikan semua field terisi.</i></p>
            </div>
        <div class="col-md-4"></div>
      </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.kmbliHlngBtn').attr('disabled',true);
        });

        function njajal()
        {
            var idpnjm = $("#id_peminjaman").val().length;
            var idbrangklr = $("#id_barang_keluar").val().length;
            var pnggungjwb = $("#penanggung_jawab").val();
            var tglkmbli = $("#tgl_kembali").val();
            var tglhlng = $("#tgl_hilang").val();
            var invene = $(".no_inv").val().length;
            var alasan = $("#alasan_hilang").val().length;
            var solusi = $("#solusi").val().length;
            var satuan = $("#satuan").val().length;

            if (invene < 6 && idbrangklr < 7 && pnggungjwb == "" && idpnjm < 7 && tglkmbli == "" && tglhlng == "" && satuan < 4 && solusi < 5 && alasan < 5) 
            {
                $('.kmbliHlngBtn').attr('disabled',true);
            }
            else if (invene >= 6 && idbrangklr >= 7 && pnggungjwb != "" && idpnjm >= 7 && tglkmbli != "" && tglhlng != "" && satuan >= 4 && solusi >= 5 && alasan >= 5)
            {
                $('.kmbliHlngBtn').attr('disabled',false);
            }
        }

        $("#id_peminjaman").focusout(function() {
            njajal();    
        });

        $("#id_barang_keluar").focusout(function() {
            njajal();    
        });

        $("#penanggung_jawab").focusout(function() {
            njajal();    
        });

        $("#tgl_kembali").focusout(function() {
            njajal();    
        });

        $("#tgl_hilang").focusout(function() {
            njajal();    
        });

        $("#field").focusout(function() {
            njajal();    
        });

        $("#alasan").focusout(function() {
            njajal();    
        });

        $("#solusi").focusout(function() {
            njajal();    
        });

        $("#satuan").focusout(function() {
            njajal();    
        });
    </script>
</body>
</html>