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
                <h2><center>Pengembalian</center></h2>
                <?php echo form_open("guest\Barang\barang/input_barang_pengembalian"); ?>
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
                    <?php
                    echo form_label('Jumlah yang dikembalikan','jumlah_kembali');
                    ?>
                    <input type="number" min="1" name="jumlah_kembali" id="jumlah_kembali" class="form-control" min="1" required>
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
    <script src="<?php echo base_url('_tamplate/plugins/select2/select2.js') ?>"></script>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('.kmblianBtn').attr('disabled',true);
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
        var pnggungjwb = $("#penanggung_jawab").val().length;
        var tglkmbli = $("#tgl_kembali").val();

        if (error_inv == true && idbrangklr < 7 && pnggungjwb < 3 && idpnjm < 7 && tglkmbli == "") 
        {
            $('.kmblianBtn').attr('disabled',true);
        }
        else if (error_inv == false && idbrangklr >= 7 && pnggungjwb >= 3 && idpnjm >= 7 && tglkmbli != "")
        {
            $('.kmblianBtn').attr('disabled',false);
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

        $(".select2-selection__rendered").focusout(function() {

            check_inv();
            njajal();
                
        });

        $("#jumlah_kembali").focusout(function() {

            check_inv();
            njajal();
                
        });

        function check_inv() 
        {
            jml = $("#jumlah_kembali").val();
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
</html>