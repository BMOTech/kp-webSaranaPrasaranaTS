<!DOCTYPE html>
<html>
<head>
    <title>Barang</title>
    <link href="<?php echo base_url('_tamplate/plugins/select2/select2.css') ?>" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Pengembalian Barang Hilang</center></h2>
                <?php echo form_open("guest\Barang\barang/input_barang_pengembalianHilang"); ?>
                <?=$this->session->flashdata('notif')?>
                <div class="form-group">
                    <?php
                    echo form_label('ID Peminjaman','id_peminjaman');
                    echo form_input('id_peminjaman','','class="form-control" id="id_peminjaman" placeholder="ID Peminjaman" required')
                    ?>
                    <p><i>*Id peminjaman dari barang yang anda pinjam. (Bisa di cek di Data Peminjaman.)</i></p>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('ID Barang Keluar','id_barang_keluar');
                    echo form_input('id_barang_keluar','','class="form-control" id="id_barang_keluar" placeholder="ID Barang Keluar" required')
                    ?>
                    <p><i>*Id barang keluar dari barang yang anda pinjam. (Bisa di cek di Data Peminjaman.)</i></p>
                </div>
                <div class="form-group">
                    <label>ID Barang</label><br>
                    <select name="id_barang" id="id_barang" class="form-control id_barang">
                        <option selected="true" disabled="true" data-foo="">Pilih ID Barang</option>
                        <?php
                        foreach ($idbarang as $barang) 
                        {
                            echo '<option value="'.$barang->id_barang.'" data-foo="'.$barang->nama_barang.'">'.$barang->id_barang.'</option>';
                        }
                        ?>
                    </select required>
                </div>
                <div class="form-group">
                    <label>Jumlah Hilang</label>
                    <input type="number" min="1" name="jumlah_hilang" id="jumlah_hilang" class="form-control">
                </div>
                <div class="form-group">
                    <label>No Inventaris</label><br>
                    <select class="form-control no_inv" name="inve[]" id="no_inv" multiple="multiple">
                        <option value="" disabled="true">Pilih No Inventaris</option>
                    </select>

                    <div id="loading" style="margin-top: 15px;">
                        <img src="<?php echo base_url('assets/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                    </div>
                    <div class="alert alert-danger" id="noInv_error_message"></div>
                    <p><i>*Pastikan ID Peminjaman, ID Barang Keluar, dan ID Barang sesuai dengan yang telah dipinjam, untuk menampilkan no inventaris yang sudah dipinjam.</i></p>
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
                    echo form_label('Penanggung Jawab (Atas Nama)','penanggung_jawab');
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

        $(document).ready(function() {
            $('.no_inv').select2();
        });

        $(document).ready(function() {
            $('.id_barang').select2({
                matcher: matchCustom,
                templateResult: formatCustom,
                minimumResultsForSearch: -1
            });
        });

        function matchCustom(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }
            // Do not display the item if there is no 'text' property
            if (typeof data.text === '') {
                return null;
            }
            // Match text of option
            if (stringMatch(params.term, data.text)) {
                return data;
            }
            // Match attribute "data-foo" of option
            if (stringMatch(params.term, $(data.element).attr('data-foo'))) {
                return data;
            }
            // Return `null` if the term should not be displayed
            return null;
        }

        function formatCustom(state) {
            return $(
                '<div><div>' + state.text + '</div><div class="foo">'
                    + $(state.element).attr('data-foo')
                    + '</div></div>'
            );
        }

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

        $(function() 
        {
            $("#noInv_error_message").hide();
            error_inv = false;

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

            $(".select2-selection__rendered").focusout(function() {

                check_inv();
                njajal();
                    
            });

            $("#jumlah_hilang").focusout(function() {

                check_inv();
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

            function check_inv() 
            {
                jml = $("#jumlah_hilang").val();
                invTerselect = $('.no_inv option:selected').size();

                if (invTerselect > jml) 
                {
                    $("#noInv_error_message").html("<p class='errInv'>No Inventaris yang dipilih melebihi jumlah yang akan dipinjam!</p>");
                    $("#noInv_error_message").show();
                    $('.pnjmBtn').attr('disabled',true);
                    error_inv = true;
                }
                else if (invTerselect < jml) 
                {
                    $("#noInv_error_message").html("<p class='errInv'>No Inventaris yang dipilih terlalu sedikit dari jumlah yang akan dipinjam.</p>");
                    $("#noInv_error_message").show();
                    $('.pnjmBtn').attr('disabled',true);
                    error_inv = true;
                }
                else
                {
                    $("#noInv_error_message").hide();
                    error_inv = false;
                }

            }
        });


        $(document).ready(function(){
        $("#loading").hide();
        
        $("#id_barang").change(function(){
          $(".no_inv").hide();
          $("#loading").show();
        
          $.ajax({
            type: "POST",
            url: "<?php echo base_url("guest/dashboard/listInvKmbli"); ?>",
            data: {id_barang : $("#id_barang").val(), id_peminjaman : $("#id_peminjaman").val(), id_barang_keluar : $("#id_barang_keluar").val()},
            dataType: "json",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){
              $("#loading").hide();
              $(".no_inv").html(response.list_inv).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
        });

        $("#id_peminjaman").change(function(){
          $(".no_inv").hide();
          $("#loading").show();
        
          $.ajax({
            type: "POST",
            url: "<?php echo base_url("guest/dashboard/listInvKmbli"); ?>",
            data: {id_barang : $("#id_barang").val(), id_peminjaman : $("#id_peminjaman").val(), id_barang_keluar : $("#id_barang_keluar").val()},
            dataType: "json",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){
              $("#loading").hide();
              $(".no_inv").html(response.list_inv).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
        });

        $("#id_barang_keluar").change(function(){
          $(".no_inv").hide();
          $("#loading").show();
        
          $.ajax({
            type: "POST",
            url: "<?php echo base_url("guest/dashboard/listInvKmbli"); ?>",
            data: {id_barang : $("#id_barang").val(), id_peminjaman : $("#id_peminjaman").val(), id_barang_keluar : $("#id_barang_keluar").val()},
            dataType: "json",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){
              $("#loading").hide();
              $(".no_inv").html(response.list_inv).show();
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
        });
      });
    </script>
    <script src="<?php echo base_url('_tamplate/plugins/select2/select2.js') ?>"></script>
</body>
</html>