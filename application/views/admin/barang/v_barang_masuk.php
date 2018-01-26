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
                <h2><center>Input Data Barang Masuk</center></h2><br>
                <?php echo form_open("admin\Barang\barang/input_barang_masuk"); ?>
                <?=$this->session->flashdata('notif')?>
                <div class="form-group">
                  <label class="">ID Barang Masuk</label><br>
                  <div class="">
                    <input name="id_barang_masuk" placeholder="ID Barang Masuk" id="id_barang_masuk" class="form-control" type="text">
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
                    <label class="">Jumlah Masuk</label>
                    <div class="">
                        <input type="number" min="1" name="no_inve" id="no_inve" class="form-control" min="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="">No Inventaris</label>
                    <div id="container">
                        <input type="button" name="noInv" class="form-control" id="add_field" value="Klik untuk membuat text field baru"><br>
                        <p><i>*Klik kemudian masukan no inventaris.</i></p>
                        <script type="text/javascript">
                        var count = 0;
                        $(function(){
                            $('#add_field').click(function(){
                                jml = $("#no_inve").val();
                                count += 1;
                                if (count <= jml) 
                                {
                                    $('#container').append(
                                        '<strong>No Inv Barang Ke ' + count + '</strong><br />' 
                                        + '<input id="field_' + count + '" name="fields[]' + '" type="text" class="form-control no_inv" /><br>' );
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
                    <br>
                    <label class="">Tanggal Masuk</label>
                    <div class="">
                        <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <br>
                    <label class="">ID Ruang</label><br>
                    <div class="">
                        <select name="id_ruang" id="id_ruang" class="form-control">
                            <?php $idRuang = $this->modelku->select_idR() ?>
                            <?php foreach($idRuang->result() as $idRu){ ?>
                                <option value="<?php echo $idRu->id_ruang ?>"><?php echo $idRu->id_ruang ?></option>
                            <?php } ?>
                        </select required>
                    </div> 
                </div>
                <div class="form-group">
                    <label class="">Satuan</label><br>
                    <div class="">
                        <input name="satuan" id="satuan" placeholder="Satuan" class="form-control" type="text">
                    </div>
                </div>
                <div>
                    <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary inputBtn"') ?>
                    <?php echo form_close() ?>
                </div>
                <br>
                <p><i>*Pastikan semua field terisi.</i></p>
            </div>
        <div class="col-md-4"></div>
      </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.inputBtn').attr('disabled',true);
        });

        function njajal()
        {
            var idbrangMsk = $("#id_barang_masuk").val().length;
            var tglmsk = $("#tgl_masuk").val();
            var invene = $(".no_inv").val().length;
            var satuan = $("#satuan").val().length;

            if (invene < 6 && idbrangMsk < 3 && satuan < 4 && tglmsk == "") 
            {
                $('.inputBtn').attr('disabled',true);
            }
            else if (invene >= 6 && idbrangMsk >= 3 && satuan >= 4 && tglmsk != "")
            {
                $('.inputBtn').attr('disabled',false);
            }
        }

        $("#id_barang_masuk").focusout(function() {
            njajal();    
        });

        $("#tgl_masuk").focusout(function() {
            njajal();    
        });

        $(".no_inv").focusout(function() {
            njajal();    
        });

        $("#satuan").focusout(function() {
            njajal();    
        });
    </script>
</body>
</html>