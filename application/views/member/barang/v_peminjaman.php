<!DOCTYPE html>
<html>
<head>
	<title>Pinjam Barang</title>
    <link href="<?php echo base_url('_tamplate/plugins/select2/select2.css') ?>" rel="stylesheet" />
</head>
<body>
    <?=$this->session->flashdata('notif')?>
	<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Peminjaman Barang</center></h2><br>
                <form action="<?php echo base_url('member\Barang\barang/masuk_barang_pinjaman') ?>" id="pnjman" method="post">
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
                    <label>ID Ruang</label><br>
                    <select class="form-control id_ruang" id="id_ruang" name="id_ruang">
                        <option selected="selected" disabled="disabled">Pilih ID Ruang</option>
                        <?php 
                            foreach($idruang as $ruang)
                            { 
                              echo '<option value="'.$ruang->id_ruang.'">'.$ruang->id_ruang.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>ID Barang</label><br>
                    <select class="form-control id_barang" id="id_barang" name="id_barang">
                        <option data-foo="" selected="selected" disabled="disabled">Pilih ID Barang</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" min="0" name="no_inve" id="no_inve" class="form-control">
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
                    <p><i>*Pilih no inventaris sebanyak jumlah yang akan di pinjam.</i></p>
                </div>
                <div class="form-group">
                    <label>Tanggal Peminjaman</label>
                    <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" onchange="validasitgl()">
                    <td><div class="alert alert-danger" id="tgl_error_message"></div></td>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Keterangan','keterangan');
                    echo form_input('keterangan','','class="form-control" id="keterangan" placeholder="Keterangan" required')
                    ?>
                    <td><div class="alert alert-danger" id="keterangan_error_message"></div></td>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Satuan','satuan');
                    ?>
                    <select name="satuan" class="form-control" id="satuan" placeholder="Satuan" required="true">
                        <option value="Unit">Unit</option>
                        <option value="Buah">Buah</option>
                    </select>
                    <td><div class="alert alert-danger" id="satuan_error_message"></div></td>
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
    <script type="text/javascript">
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
    </script>
</body>
<script type="text/javascript">

    var error_inv;
    var error_tgl;

    $(document).ready(function(){
    $('.pnjmBtn').attr('disabled',true);
});


function njajal() 
{
    var satuane = $("#satuan").val().length;
    var keterangan_lengthe = $("#keterangan").val().length;
    var idbrangklr = $("#id_barang_keluare").val().length;
    var idpnjm = $("#id_peminjamane").val().length;
    var tglpnjm = $("#tgl_peminjaman").val();
    var tglkmbli = $("#tgl_kembali").val();

    if (satuane < 4 && keterangan_lengthe < 5 && error_inv == true && idbrangklr < 7 && idpnjm < 7 && tglpnjm == "" && tglkmbli == "" && error_tgl == true) 
    {
        $('.pnjmBtn').attr('disabled',true);
    }
    else if (satuane >= 4 && keterangan_lengthe >= 5 && error_inv == false && idbrangklr >= 7 && idpnjm >= 7 && tglpnjm != "" && tglkmbli != "" && error_tgl == false)
    {
        $('.pnjmBtn').attr('disabled',false);
    }
}


    function validasitgl()
    {
        var tglpnjm = $('#tgl_peminjaman').val();
        var tglkmbli = $('#tgl_kembali').val();

        if (tglpnjm > tglkmbli) 
        {
            $("#tgl_error_message").html("<p class='errTgl'>Tanggal kembali tidak valid!</p>");
            $("#tgl_error_message").show();
            $('.pnjmBtn').attr('disabled',true);
            error_tgl = true;
        }
        else
        {
            $("#tgl_error_message").hide();
            $('.pnjmBtn').attr('disabled',false);
            error_tgl = false;
        }
    }


$(function() {
    $("#kondisi_error_message").hide();
    $("#keterangan_error_message").hide();
    $("#satuan_error_message").hide();
    $("#noInv_error_message").hide();
    $("#tgl_error_message").hide();

    var error_kondisi = false;
    var error_keterangan = false;
    var error_satuan = false;
    error_inv = false;

    $(".select2-selection__rendered").focusout(function() {

        check_inv();
        njajal();
        
    });

    $("#no_inve").focusout(function() {

        check_inv();
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
        jml = $("#no_inve").val();
        invTerselect = $('.no_inv option:selected').size();

        if (invTerselect > jml) 
        {
            $("#noInv_error_message").html("No Inventaris yang dipilih melebihi jumlah yang akan dipinjam!");
            $("#noInv_error_message").show();
            $('.pnjmBtn').attr('disabled',true);
            error_inv = true;
        }
        else if (invTerselect < jml) 
        {
            $("#noInv_error_message").html("No Inventaris yang dipilih terlalu sedikit dari jumlah yang akan dipinjam.");
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

    $("#pnjman").submit(function() {
                                            
        error_kondisi = false;
        error_keterangan = false;
        error_satuan = false;
        error_inv = false;
                                        
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

$('#submitBtn').click(function() {
     $('#id_barang_keluar').text($('#id_barang_keluare').val());
     $('#id_peminjaman').text($('#id_peminjamane').val());
     $('#idbarang').text($('#id_barang').val());
     $('#jml').text($('#no_inve').val());
     $('#inventarise').text($('.no_inv').val());
     $('#tgl_peminjamane').text($('#tgl_peminjaman').val());
     $('#tgl_kembalie').text($('#tgl_kembali').val());
     $('#id_ruange').text($('#id_ruang').val());
});

$(document).ready(function(){
    $("#loading").hide();
    
    $("#id_ruang").change(function(){
      $(".no_inv").hide();
      $("#id_barang").hide();
      $("#loading").show();
    
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("member/member/listIDBarang"); ?>",
        data: {id_ruang : $("#id_ruang").val()},
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){
          $("#loading").hide();
          $("#id_barang").html(response.list_inv).show();
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });
    
    $("#id_barang").change(function(){
      $(".no_inv").hide();
      $("#loading").show();
    
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("member/member/listInv"); ?>",
        data: {id_barang : $("#id_barang").val()},
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

function pinjam_barang()
{
    $('#pnjman').submit();
}
</script>
</html>
<!-- Bootstrap modal Confirm -->
    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Konfirmasi Peminjaman<h4>
                </div>
                <div class="modal-body">
                    <p>Anda akan meminjam barang dengan data sebagai berikut:</p>
                    <table class="table">
                        <tr>
                            <th>ID Barang Keluar</th>
                            <td id="id_barang_keluar"></td>
                        </tr>
                        <tr>
                            <th>ID Peminjaman</th>
                            <td id="id_peminjaman"></td>
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
                            <th>Tanggal Peminjaman</th>
                            <td id="tgl_peminjamane"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td id="tgl_kembalie"></td>
                        </tr>
                        <tr>
                            <th>Pinjam di Ruang</th>
                            <td id="id_ruange"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" id="btnSave" onclick="pinjam_barang()" class="btn btn-primary">Terima</button>
                </div>
            </div>
        </div>
    </div>
<!-- End Bootstrap modal -->