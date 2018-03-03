<!DOCTYPE html>
<html>
<head>
	<title>Barang</title>
    <link href="<?php echo base_url('_tamplate/plugins/select2/select2.css') ?>" rel="stylesheet" />
</head>
<body>
    <?=$this->session->flashdata('notif')?>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>')?>
	<div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Input Data Barang Masuk</center></h2><br>
                <?php echo form_open("admin\Barang\barang/input_barang_masuk"); ?>
                <div class="form-group">
                  <label>ID Barang Masuk</label><br>
                    <input name="id_barang_masuk" placeholder="ID Barang Masuk" id="id_barang_masuk" class="form-control" type="text">
                    <td><div class="alert alert-danger" id="idbrangmsuk_error_message"></div></td>
                </div>
                <div class="form-group">
                    <label>ID Barang</label><br>
                    <select name="id_barang" id="id_barang" class="form-control">
                        <option selected="true" data-foo="" disabled="true">Pilih ID Barang</option>
                        <?php 
                            foreach($idbarang as $barang)
                            { 
                              echo '<option value="'.$barang->id_barang.'" data-foo="'.$barang->nama_barang.'">'.$barang->id_barang.'</option>';
                            }
                        ?>
                    </select required>
                </div>
                <div class="form-group">
                    <label>Jumlah Masuk</label>
                    <input type="number" min="0" name="no_inve" id="no_inve" class="form-control" min="1">
                </div>
                <div class="form-group">
                    <label>No Inventaris</label>
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
                                    alert("Tidak bisa menambahkan! Silahkan sesuaikan jumlah!");
                                }
                            
                            });
                        });
                        </script> 
                        
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>ID Ruang</label><br>
                    <select name="id_ruang" id="id_ruang" class="form-control">
                        <?php 
                            foreach($idruang as $ruang)
                            { 
                              echo '<option value="'.$ruang->id_ruang.'">'.$ruang->id_ruang.'</option>';
                            }
                        ?>
                    </select required>
                <div class="form-group">
                    <?php echo form_label('Satuan','satuan');?>
                    <select class="form-control" id="satuan" name="satuan">
                        <option value="Unit">Unit</option>
                        <option value="Buah">Buah</option>
                    </select>
                    
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

        var error_idbrangmsuk;

        $(document).ready(function(){
            $('.inputBtn').attr('disabled',true);
        });

        $(document).ready(function() {
            $('#id_barang').select2({
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
            var idbrangMsk = $("#id_barang_masuk").val().length;
            var tglmsk = $("#tgl_masuk").val();
            var invene = $(".no_inv").val().length;
            var idruang = $("#id_ruang").val();
            var satuan = $("#satuan").val();

            if (invene < 6 && idbrangMsk < 3 && idruang == ""  && satuan == "" && tglmsk == "") 
            {
                $('.inputBtn').attr('disabled',true);
            }
            else if (invene >= 6 && idbrangMsk >= 3 && idruang != "" && satuan != "" && tglmsk != "")
            {
                $('.inputBtn').attr('disabled',false);
            }
        }

        $("#tgl_masuk").focusout(function() {
            njajal();    
        });

        $("#satuan").focusout(function() {
            njajal();    
        });

        $("fields").focusout(function() {
            alert('Jaja');    
        });


        $(function() {
            $("#idbrangmsuk_error_message").hide();

            error_idbrangmsuk = false;

            $("#id_barang_masuk").focusout(function() {
                check_idbrangmasuk();
                njajal();    
            });

            
            function check_idbrangmasuk() {
            
                var idbrangmsuk_length = $("#id_barang_masuk").val().length;
                
                if(idbrangmsuk_length < 5) {
                    $("#idbrangmsuk_error_message").html("<p class='errIdMsk'>ID Barang masuk harus diisi!</p>");
                    $(".errIdMsk").css('color', 'red');
                    $("#idbrangmsuk_error_message").show();
                    $('.pnjmBtn').attr('disabled',true);
                    error_keterangan = true;
                } else {
                    $("#idbrangmsuk_error_message").hide();
                }
            
            }

            $("#pnjman").submit(function() {
                error_keterangan = false;
                error_satuan = false;
                error_inv = false;
                                                    
                check_kondisi();
                check_keterangan();
                check_satuan();
                check_inv();
                
                if(error_inv == false && error_idbrangmsuk == false) {
                    return true;
                } else {
                    return false;   
                }

            });

        });
    </script>
    <script src="<?php echo base_url('_tamplate/plugins/select2/select2.js') ?>"></script>
</body>
</html>