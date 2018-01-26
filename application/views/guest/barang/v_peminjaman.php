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
                <h2><center>Peminjaman</center></h2>
                <?php echo form_open("guest\Barang\barang/input_barang_pinjaman"); ?>
                <div class="form-group">
                    <label>ID Barang Keluar</label><br>
                    <input type="text" class="forme" name="id_barang_keluar" id="id_barang_keluare">
                    <input type="button" id="btn_id_barang_keluar" value="Get" onclick="GetRandomID('id_barang_keluare');">
                    
                </div>
                <div class="form-group">
                    <label>ID Peminjaman</label><br>
                    <input type="text" class="forme" name="id_peminjaman" id="id_peminjamane">
                    <input type="button" id="btn_id_peminjaman" value="Get" onclick="GetRandomID('id_peminjamane');">
                </div>
                <div class="form-group">
                    <label>ID Barang</label><br>
                    <select name="id_barang" id="id_barang" class="form-control">
                        <?php $idBarang = $this->modelku->select_idBrang() ?>
                        <?php foreach($idBarang->result() as $idBr){ ?>
                            <option value="<?php echo $idBr->id_barang ?>"><?php echo $idBr->id_barang ?></option>
                        <?php } ?>
                    </select required>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" min="0" name="no_inve" id="no_inve" class="form-control">
                </div>
                <div class="form-group">
                    <label class="">No Inventaris</label>
                    <div id="container" class="">
                        <input type="button" name="noInv" class="form-control" id="add_field" value="Klik untuk membuat text field baru"><br>
                        <p><i>*Klik kemudian pilih no inventaris barang yang akan dikembalikan.</i></p>
                        <script type="text/javascript">
                        var count = 0;
                        $(function(){
                            $('#add_field').click(function(){
                                jml = $("#no_inve").val();
                                count += 1;
                                if (count <= jml)
                                {
                                    $('#container').append(
                                        '<strong >No Inv Barang Ke ' + count + '</strong><br />' 
                                        + '<select id="field_' + count + '" name="fields[]' + '"  class="form-control no_inv" ><?php $noInv = $this->modelku->select_inv() ?> <option value="" selected="selected">Pilih no inventaris</option> <?php foreach($noInv->result() as $inv){ ?> <option value="<?php echo $inv->no_inv ?>"><?php echo $inv->no_inv ?></option><?php } ?></select><br>' );
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
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Kondisi','kondisi');
                    echo form_input('kondisi','','class="form-control" id="kondisi" placeholder="Kondisi" required')
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Keterangan','keterangan');
                    echo form_input('keterangan','','class="form-control" id="keterangan" placeholder="Keterangan" required')
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Satuan','satuan');
                    echo form_input('satuan','','class="form-control" id="satuan" placeholder="Satuan" required')
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
                    <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary pnjmBtn"') ?>
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
    $('.pnjmBtn').attr('disabled',true);
});


function njajal() 
{
    var satuane = $("#satuan").val().length;
    var keterangan_lengthe = $("#keterangan").val().length;
    var kondisi_lengthe = $("#kondisi").val().length;
    var invene = $(".no_inv").val().length;
    var idbrangklr = $("#id_barang_keluare").val().length;
    var idpnjm = $("#id_peminjamane").val().length;
    var tglpnjm = $("#tgl_peminjaman").val();
    var tglkmbli = $("#tgl_kembali").val();

    if (satuane < 4 && keterangan_lengthe < 5 && kondisi_lengthe < 3 && invene < 6 && idbrangklr < 7 && idpnjm < 7 && tglpnjm == "" && tglkmbli == "") 
    {
        $('.pnjmBtn').attr('disabled',true);
    }
    else if (satuane >= 4 && keterangan_lengthe >= 5 && kondisi_lengthe >= 3 && invene >= 6 && idbrangklr >= 7 && idpnjm >= 7 && tglpnjm != "" && tglkmbli != "")
    {
        $('.pnjmBtn').attr('disabled',false);
    }
}


$(function() {
    $("#kondisi_error_message").hide();
    $("#keterangan_error_message").hide();
    $("#satuan_error_message").hide();
    $("#noInv_error_message").hide();

    var error_kondisi = false;
    var error_keterangan = false;
    var error_satuan = false;
    var error_inv = false;

    $(".no_inv").focusout(function() {
        njajal();    
    });

    $("#kondisi").focusout(function() {

        check_kondisi();
        njajal();
        
    });

    $("#keterangan").focusout(function() {

        check_keterangan();
        njajal();
        
    });

    $("#satuan").focusout(function() {

        check_satuan();
        njajal();
    });

    $("#tgl_peminjaman").focusout(function() {
        njajal();
    });

    $("#tgl_kembali").focusout(function() {
        njajal();
    });

    function check_kondisi() {
    
        var kondisi_length = $("#kondisi").val().length;
        
        if(kondisi_length < 3) {
            $("#kondisi_error_message").html("Isikan kondisi! contoh: Ada, jika barang yang anda pinjam ada. Jadi pastikan anda meminjam barang yang kondisinya ada.");
            $("#kondisi_error_message").show();
            $('.pnjmBtn').attr('disabled',true);      
            error_kondisi = true;
        } else {
            $("#kondisi_error_message").hide();
     
        }
    
    }

    function check_keterangan() {
    
        var keterangan_length = $("#keterangan").val().length;
        
        if(keterangan_length < 5) {
            $("#keterangan_error_message").html("Isikan keterangan anda meminjam barang tersebut.");
            $("#keterangan_error_message").show();
            $('.pnjmBtn').attr('disabled',true);
            error_keterangan = true;
        } else {
            $("#keterangan_error_message").hide();
        }
    
    }

    function check_satuan() {
    
        var satuan = $("#satuan").val().length;
        
        if(satuan < 4) {
            $("#satuan_error_message").html("Isikan satuan: Unit, Buah dll.");
            $("#satuan_error_message").show();
            $('.pnjmBtn').attr('disabled',true);
            error_satuan = true;
        } else {
            $("#satuan_error_message").hide();
        }
    
    }

    function check_inv() 
    {
        var inv = $(".no_inv").val().length;
        
        if(inv <  6) {
            $("#noInv_error_message").html("Isikan satuan: Unit, Buah dll.");
            $("#noInv_error_message").show();
            $('.pnjmBtn').attr('disabled',true);
            error_inv = true;
        } else {
            $("#noInv_error_message").hide();
            $('.pnjmBtn').attr('disabled',false);
        }
    
    }

    $("#pnjman").submit(function() {
                                            
        error_kondisi = false;
        error_keterangan = false;
        error_satuan = false;
        error_inv = false;
                                            
        check_kondisi();
        check_keterangan();
        check_satuan();
        check_inv();
        
        if(error_kondisi == false && error_keterangan == false && error_satuan == false && error_inv == false) {
            return true;
        } else {
            return false;   
        }

    });

});
</script>
</html>