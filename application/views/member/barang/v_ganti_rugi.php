<!DOCTYPE html>
<html>
<head>
	<title>Ganti Rugi</title>
    <link href="<?php echo base_url('_tamplate/plugins/select2/select2.css') ?>" rel="stylesheet" />
</head>
<body>
    <div class="the-msg">
        <?=$this->session->flashdata('notif')?>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>')?>
    </div>
	<div class="container">
        <div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Ganti Rugi</center></h2>
                <br>
                    <form action="<?php echo base_url('member\Barang\barang/input_ganti_rugi') ?>" id="pnjman" method="post">
                    <div class="form-group">
                    	<label>Mengganti Rugi Barang yang:</label>
                    	<select name="choice" id="choice" class="form-control">
                    		<option value="Hilang">Hilang</option>
                    		<option value="Rusak">Rusak</option>
                    	</select>
                    </div>
                    <div class="form-group">
	                    <?php
	                    echo form_label('ID Barang Keluar','id_barang_keluar');
	                    echo form_input('id_barang_keluar', set_value('id_barang_keluar'),'class="form-control" id="id_barang_keluar" placeholder="ID Barang Keluar" required')
	                    ?>
	                </div>
                    <div class="form-group">
                        <label>ID Barang</label><br>
                        <select class="form-control id_barang" id="id_barang" name="id_barang">
                            <option data-foo="" selected="selected" disabled="disabled">Pilih ID Barang</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="">Jumlah</label>
                        <select class="form-control jumlah" name="jumlah" id="jumlah">
	                        <option value="" disabled="true"></option>
	                    </select>
                    </div>
                    <div class="form-group">
                        <label class="">Tanggal Ganti Rugi</label>
                        <div class="">
                            <input type="date" name="tgl_ganti_rugi" id="tgl_ganti_rugi" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
	                    <label>Total Harga</label><br>
	                    <select class="form-control totharga" name="totharga" id="totharga">
	                        <option value="" disabled="true"></option>
	                    </select>
	                </div>
                    <div class="">
                        <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary pnjmBtn" />
                        </form>
                    </div>
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

    $(document).ready(function(){
        $('.pnjmBtn').attr('disabled',true);
    });

function njajal() 
{
    var idbrangklr = $("#id_barang_keluar").val().length;
    var tgl_ganti_rugi = $("#tgl_ganti_rugi").val();

    if (idbrangklr < 7 && tgl_ganti_rugi == "") 
    {
        $('.pnjmBtn').attr('disabled',true);
    }
    else if (idbrangklr >= 7 && tgl_ganti_rugi != "")
    {
        $('.pnjmBtn').attr('disabled',false);
    }
}


$(function() {

	$("#choice").focusout(function() {
        njajal();
    });

    $("#id_barang").focusout(function() {
        njajal();
    });

    $("#jumlah").focusout(function() {
        njajal();
    });

    $("#totharga").focusout(function() {
        njajal();
    });

    $("#id_barang_keluar").focusout(function() {
        njajal();
    });

    $("#tgl_ganti_rugi").focusout(function() {
        njajal();
    });

});

$('#submitBtn').click(function() {
	 $('#choicee').text($('#choice').val());
     $('#id_barang_keluare').text($('#id_barang_keluar').val());
     $('#idbarang').text($('#id_barang').val());
     $('#jml').text($('#jumlah').val());
     $('#tgl_gnti').text($('#tgl_ganti_rugi').val());
     $('#tot').text($('#totharga').val());
     $('#atas_nama').text("<?php echo $this->session->userdata('fullname'); ?>");
});


 $(document).ready(function(){
    $("#loading").hide();
    
    $("#choice").change(function(){
      $("#loading").show();
    
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("member/member/listJml"); ?>",
        data: {id_barang_keluar : $("#id_barang_keluar").val(), choice : $("#choice").val()},
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){
          $("#jumlah").html(response.list_jml).show();
          $("#id_barang").html(response.list_idbarang).show();
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $("#id_barang_keluar").change(function(){
      $("#loading").show();
    
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("member/member/listJml"); ?>",
        data: {id_barang_keluar : $("#id_barang_keluar").val(), choice : $("#choice").val()},
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){
          $("#jumlah").html(response.list_jml).show();
          $("#id_barang").html(response.list_idbarang).show();
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $("#id_barang").change(function(){
      $("#loading").show();
    
      $.ajax({
        type: "POST",
        url: "<?php echo base_url("member/member/listTotHarga"); ?>",
        data: {id_barang : $("#id_barang").val(), id_barang_keluar : $("#id_barang_keluar").val(),
		choice : $("#choice").val(), jumlah : $("#jumlah").val()},
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){
          $("#totharga").html(response.list_inv).show();
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
                    <h4>Konfirmasi Ganti Rugi<h4>
                </div>
                <div class="modal-body">
                    <p>Anda akan mengganti rugi barang dengan data sebagai berikut:</p>
                    <table class="table">
                        <tr>
                            <th>Atas Nama</th>
                            <td id="atas_nama"></td>
                        </tr>
                        <tr>
                            <th>Ganti Rugi Barang yang:</th>
                            <td id="choicee"></td>
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
                            <th>Tanggal Ganti Rugi</th>
                            <td id="tgl_gnti"></td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td id="tot"></td>
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