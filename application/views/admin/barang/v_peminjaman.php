<!DOCTYPE html>
<html>
<head>
	<title>Barang</title>
</head>
<body>
	<div class="container">
        <div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Peminjaman</center></h2>
                    <div class="the-msg">
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>')?>
                        <?=$this->session->flashdata('notif')?>
                    </div>
                    <?php echo form_open("admin\Barang\barang/input_barang_pinjaman", "id='pnjman'"); ?>
                    <div class="form-group">
                        <label class="">ID Barang Keluar</label><br>
                        <div class="">
                            <input type="text" class="forme" name="id_barang_keluar" id="id_barang_keluare">
                            <input type="button" id="btn_id_barang_keluar" value="Get" onclick="GetRandomID('id_barang_keluare');">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">ID Peminjaman</label><br>
                        <div class="">
                            <input type="text" class="forme" name="id_peminjaman" id="id_peminjamane">
                            <input type="button" id="btn_id_peminjaman" value="Get" onclick="GetRandomID('id_peminjamane');">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">ID Barang</label><br>
                        <div class="">
                            <select name="id_barang" id="id_barang" class="form-control">
                                <?php $idBarang = $this->modelku->select_idBrang() ?>
                                <?php foreach($idBarang->result() as $idBr){ ?>
                                    <option value="<?php echo $idBr->id_barang ?>"><?php echo $idBr->id_barang ?></option>
                                <?php } ?>
                            </select required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">Jumlah</label>
                        <div class="">
                            <input type="number" min="0" name="no_inve" id="no_inve" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">No Inventaris</label>
                        <td><div class="alert alert-danger" id="noInv_error_message"></div></td>
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
                                            + '<select id="field_' + count + '" name="fields[]' + '"  class="form-control no_inv" ><?php $noInv = $this->modelku->select_inv() ?> <option value="" selected="selected" disabled>Pilih no inventaris</option> <?php foreach($noInv->result() as $inv){ ?> <option value="<?php echo $inv->no_inv ?>"><?php echo $inv->no_inv ?></option><?php } ?></select><br>' );
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
                        <label class="">Tanggal Peminjaman</label>
                        <div class="">
                            <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="">Tanggal Kembali</label>
                        <div class="">
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <?php?>
                        <div class=""><?php echo form_label('Kondisi','kondisi');?></div>
                        <?php
                            echo form_error('kondisi', '<div class="text-danger">', '</div>');
                            echo form_input('kondisi', set_value('kondisi') ,'class="form-control" id="kondisi" placeholder="Kondisi" required')
                        ?>
                        <td><div class="alert alert-danger" id="kondisi_error_message"></div></td>
                        
                    </div>
                    <div class="form-group">
                        <?php?>
                        <div class=""><?php echo form_label('Keterangan','keterangan');?></div>
                        <div class="">
                            <?php
                                echo form_input('keterangan','','class="form-control" id="keterangan" placeholder="Keterangan" required')
                            ?>
                            <td><div class="alert alert-danger" id="keterangan_error_message"></div></td>
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <?php?>
                        <div class=""><?php echo form_label('Satuan','satuan');?></div>
                        <div class="">
                            <?php
                                echo form_input('satuan','','class="form-control" id="satuan" placeholder="Satuan" required')
                            ?>
                            <td><div class="alert alert-danger" id="satuan_error_message"></div></td>
                        </div>
                        
                    </div>
                    <div class="form-group nyobane">
                        <label class="">Pinjam barang di ruang</label><br>
                        <div class="">
                            <select name="id_ruang" id="id_ruang" class="form-control">
                                <?php $idRuang = $this->modelku->select_idR() ?>
                                <?php foreach($idRuang->result() as $idRu){ ?>
                                    <option value="<?php echo $idRu->id_ruang ?>"><?php echo $idRu->id_ruang ?></option>
                                <?php } ?>
                            </select required>
                        </div>
                    </div>
                    <div class="">
                        <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary pnjmBtn"') ?>
                        <?php echo form_close() ?>
                    </div>
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


$(document).ready(function() {
    var count =0;
    var previous;
    var selectedData = [];
    $('body').on('click','.no_inv',function(){
          previous = this.value;
         
    });


    $('body').on('change','.no_inv',function(){
        var val = this.value;
        var id = $(this).attr('id');
        
        if(val != ''){
        
            $(".no_inv").each(function(){
               var newID = $(this).attr('id');
               if(id != newID){
                  $('#'+newID).children('option[value="' + val + '"]').prop('disabled',true);
                   $('#'+newID).children('option[value="' + previous + '"]').prop('disabled',true);
                   
                   selectedData.splice($.inArray(val, selectedData),1);
               }else{
                  selectedData.push(val);
               
               }
            
            });

            
        }else{

          $(".no_inv").each(function(){
               var newID = $(this).attr('id');
               if(id != newID){
                $('#'+newID).children('option[value="' + val + '"]').prop('disabled',true);
                  $('#'+newID).children('option[value="' + previous + '"]').prop('disabled',true);
                  
               }
            
            });
        
        }
    });
});
</script>
</html>