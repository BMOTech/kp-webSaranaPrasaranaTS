<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Barang</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Pengembalian</center></h2><br>
                <?php echo form_open("member\Barang\barang/input_barang_pengembalian"); ?>
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
                    <label>Jumlah Kembali</label>
                    <input type="number" min="1" name="jumlah_kembali" id="jumlah_kembali" class="form-control">
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
                                jml = $("#jumlah_kembali").val();
                                count += 1;
                                if (count <= jml) 
                                {
                                    $('#container').append(
                                        '<strong>No Inv Barang Ke ' + count + '</strong><br />' 
                                        + '<select id="field_' + count + '" name="fields[]' + '"  class="form-control no_inv" ><?php $noInv = $this->modelku->select_invPinjam() ?> <?php foreach($noInv->result() as $inv){ ?> <option value="<?php echo $inv->no_inv ?>"><?php echo $inv->no_inv ?></option><?php } ?></select><br>' );
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
                    <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary kmblianBtn"') ?>
                    <?php echo form_close() ?>
                    
                    <br>
                    <p><i>*Pastikan semua field terisi.</i></p>
            </div>
        <div class="col-md-4"></div>
      </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('.kmblianBtn').attr('disabled',true);
    });

    function njajal()
    {
        var idpnjm = $("#id_peminjaman").val().length;
        var idbrangklr = $("#id_barang_keluar").val().length;
        var tglkmbli = $("#tgl_kembali").val();
        var invene = $(".no_inv").val().length;

        if (invene < 6 && idbrangklr < 7 && idpnjm < 7 && tglkmbli == "") 
        {
            $('.kmblianBtn').attr('disabled',true);
        }
        else if (invene >= 6 && idbrangklr >= 7 && idpnjm >= 7 && tglkmbli != "")
        {
            $('.kmblianBtn').attr('disabled',false);
        }
    }

    $("#id_peminjaman").focusout(function() {
        njajal();    
    });

    $("#id_barang_keluar").focusout(function() {
        njajal();    
    });

    $("#tgl_kembali").focusout(function() {
        njajal();    
    });

    $("#field").focusout(function() {
        njajal();    
    });
</script>
</html>