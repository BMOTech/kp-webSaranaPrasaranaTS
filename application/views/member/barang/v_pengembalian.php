<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Barang</title>
    <link href="<?php echo base_url('_tamplate/plugins/select2/select2.css') ?>" rel="stylesheet" />
</head>
<body>
    <?=$this->session->flashdata('notif')?>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Pengembalian</center></h2><br>
                <form action="<?php echo base_url('member\Barang\barang/input_barang_pengembalian') ?>" id="kmblian" method="post">
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
                    <label>Jumlah Kembali</label>
                    <input type="number" min="1" name="jumlah_kembali" id="jumlah_kembali" class="form-control">
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
                    <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary pnjmBtn" />
                    </form>
                    
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
        var tglkmbli = $("#tgl_kembali").val();
        var invene = $(".no_inv").val().length;

        if (error_inv == true && idbrangklr < 7 && idpnjm < 7 && tglkmbli == "") 
        {
            $('.kmblianBtn').attr('disabled',true);
        }
        else if (error_inv == false && idbrangklr >= 7 && idpnjm >= 7 && tglkmbli != "")
        {
            $('.kmblianBtn').attr('disabled',false);
        }
    }

    $(function() 
    {
        $("#noInv_error_message").hide();
        error_inv = false;

        $(".select2-selection__rendered").focusout(function() {

            check_inv();
            njajal();
                
        });

        $("#jumlah_kembali").focusout(function() {

            check_inv();
            njajal();
                
        });

        $("#id_peminjaman").focusout(function() {
            njajal();    
        });

        $("#id_barang_keluar").focusout(function() {
            njajal();    
        });

        $("#tgl_kembali").focusout(function() {
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
                $('.kmblianBtn').attr('disabled',true);
                error_inv = true;
            }
            else if (invTerselect < jml) 
            {
                $("#noInv_error_message").html("<p class='errInv'>No Inventaris yang dipilih terlalu sedikit dari jumlah yang akan dipinjam.</p>");
                $("#noInv_error_message").show();
                $('.kmblianBtn').attr('disabled',true);
                error_inv = true;
            }
            else
            {
                $("#noInv_error_message").hide();
                error_inv = false;
            }

        }
    })

    $('#submitBtn').click(function() {
         $('#id_barang_keluare').text($('#id_barang_keluar').val());
         $('#id_peminjamane').text($('#id_peminjaman').val());
         $('#idbarang').text($('#id_barang').val());
         $('#jml').text($('#jumlah_kembali').val());
         $('#inventarise').text($('.no_inv').val());
         if ($('#atas_nama').val() == "" || $('#atas_nama').val() == null) 
         {
            $('#atas_namae').text('<?php echo $this->session->userdata('fullname'); ?>');
         }
         else
         {
            $('#atas_namae').text($('#atas_nama').val());
         }
         $('#tgl_kembalie').text($('#tgl_kembali').val());
    });

    $(document).ready(function(){
        $("#loading").hide();
        
        $("#id_barang").change(function(){
          $(".no_inv").hide();
          $("#loading").show();
        
          $.ajax({
            type: "POST",
            url: "<?php echo base_url("member/member/listInvKmbli"); ?>",
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
            url: "<?php echo base_url("member/member/listInvKmbli"); ?>",
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
            url: "<?php echo base_url("member/member/listInvKmbli"); ?>",
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


    function kembalikan_barang()
     {
        $('#kmblian').submit();
     }
</script>
</html>

<!-- Bootstrap modal Confirm -->
    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Konfirmasi Pengembalian<h4>
                </div>
                <div class="modal-body">
                    <p>Anda akan mengembalikan barang dengan data sebagai berikut:</p>
                    <table class="table">
                        <tr>
                            <th>ID Peminjaman</th>
                            <td id="id_peminjamane"></td>
                        </tr>
                        <tr>
                            <th>ID Barang Keluar</th>
                            <td id="id_barang_keluare"></td>
                        </tr>
                        <tr>
                            <th>ID Barang</th>
                            <td id="idbarang"></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td id="jml"></td>
                        </tr>
                        <tr>
                            <th>No Inventaris</th>
                            <td id="inventarise"></td>
                        </tr>
                        <tr>
                            <th>Atas Nama</th>
                            <td id="atas_namae"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td id="tgl_kembalie"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" id="btnSave" onclick="kembalikan_barang()" class="btn btn-primary">Terima</button>
                </div>
            </div>
        </div>
    </div>
<!-- End Bootstrap modal -->