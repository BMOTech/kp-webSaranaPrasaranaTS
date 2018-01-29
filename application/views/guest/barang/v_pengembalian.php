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
                <h2><center>Pengembalian</center></h2>
                <?php echo form_open("guest\Barang\barang/input_barang_pengembalian"); ?>
                <div class="form-group">
                    <?php
                    echo form_label('ID Barang Keluar','id_barang_keluar');
                    echo form_input('id_barang_keluar','','class="form-control" id="id_barang_keluar" placeholder="ID Barang Keluar" required')
                    ?>
                    <p><i>*Id peminjaman dari barang yang anda pinjam.</i></p>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('ID Peminjaman','id_peminjaman');
                    echo form_input('id_peminjaman','','class="form-control" id="id_peminjaman" placeholder="ID Peminjaman" required')
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
                    <?php
                    echo form_label('Jumlah yang dikembalikan','jumlah_kembali');
                    ?>
                    <input type="number" min="1" name="jumlah_kembali" id="jumlah_kembali" class="form-control" min="1" required>
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
                                        + '<select id="field_' + count + '" name="fields[]' + '"  class="form-control no_inv" ><?php $noInv = $this->modelku->select_invPinjam() ?> <option value="" selected="selected" disabled>Pilih no inventaris</option> <?php foreach($noInv->result() as $inv){ ?> <option value="<?php echo $inv->no_inv ?>"><?php echo $inv->no_inv ?></option><?php } ?></select><br>' );
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
                    <?php
                    echo form_label('Penanggung Jawab','penanggung_jawab');
                    echo form_input('penanggung_jawab','','class="form-control" id="penanggung_jawab" placeholder="Penanggung Jawab" required')
                    ?>
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
        var pnggungjwb = $("#penanggung_jawab").val().length;
        var tglkmbli = $("#tgl_kembali").val();
        var invene = $(".no_inv").val().length;

        if (invene < 6 && idbrangklr < 7 && pnggungjwb < 3 && idpnjm < 7 && tglkmbli == "") 
        {
            $('.kmblianBtn').attr('disabled',true);
        }
        else if (invene >= 6 && idbrangklr >= 7 && pnggungjwb >= 3 && idpnjm >= 7 && tglkmbli != "")
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

    $("#penanggung_jawab").focusout(function() {
        njajal();    
    });

    $("#tgl_kembali").focusout(function() {
        njajal();    
    });

    $(".no_inv").focusout(function() {
        njajal();    
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