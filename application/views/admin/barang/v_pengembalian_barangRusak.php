<!DOCTYPE html>
<html>
<head>
    <title>Barang</title>
    <link href="<?php echo base_url('_tamplate/plugins/select2/select2.css') ?>" rel="stylesheet" />
</head>
<body>
    <?=$this->session->flashdata('notif')?>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h2><center>Pengembalian Barang Rusak</center></h2>
                <form action="<?php echo base_url('admin\Barang\barang/input_barang_pengembalianRusak') ?>" id="kmblian" method="post">
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
                    <label>Jumlah Rusak</label>
                    <input type="number" min="0" name="jumlah_rusak" id="jumlah_rusak" class="form-control">
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
                    <label>Tanggal Rusak</label>
                    <input type="date" name="tgl_rusak" id="tgl_rusak" class="form-control">
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Kerusakan','kerusakan');
                    echo form_input('kerusakan','','class="form-control" id="kerusakan" placeholder="Kerusakan"')
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo form_label('Penyebab Kerusakan','penyebab_kerusakan');
                    echo form_input('penyebab_kerusakan','','class="form-control" id="penyebab_kerusakan" placeholder="Penyebab Kerusakan"')
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
                    ?>
                    <select name="satuan" class="form-control" id="satuan" placeholder="Satuan">
                        <option value="Unit">Unit</option>
                        <option value="Buah">Buah</option>
                    </select>
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
                </div>
                <div class="form-group pjawab">
                    <?php
                    echo form_label('Penanggung Jawab','penanggung_jawab');?><br><?php
                    echo form_label('Atas Nama:','atas_nama');
                    ?>
                    <input type="text" name="atas_nama" class="form-control" id="atas_nama" placeholder="Atas Nama" required="true">
                    <?php
                    echo form_label('ID Penanggung Jawab:','penanggung');
                    ?>
                    <input type="text" name="penanggung_jawab" class="form-control" id="penanggung_jawab" placeholder="ID Penanggung Jawab" required="true">
                </div>
                <p><input type="checkbox" id="AsAdmin">Gunakan penanggung jawab sebagai admin?</p>
                <p><i>*Centang Gunakan penanggung jawab sebagai admin, jika yang akan bertanggung jawab adalah admin.</i></p>
                    <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-primary njajale" />
                    </form>
                    </form>

                    <br>
                    <p><i>*Pastikan semua field terisi</i></p>
            </div>
        <div class="col-md-4"></div>
      </div>
    </div>
    <script type="text/javascript">
        var error_inv;

        $(document).ready(function(){
            $('.njajale').attr('disabled',true);
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
            var tglrsk = $("#tgl_rusak").val();
            var krusakan = $("#kerusakan").val().length;
            var penyebab = $("#penyebab_kerusakan").val().length;
            var solusi = $("#solusi").val().length;
            var satuan = $("#satuan").val().length;

            if (error_inv == true && idbrangklr < 7 && idpnjm < 7 && tglkmbli == "" && tglrsk == "" && satuan < 4 && solusi < 5 && krusakan < 5 && penyebab < 5) 
            {
                $('.njajale').attr('disabled',true);
            }
            else if (error_inv == false && idbrangklr >= 7 && idpnjm >= 7 && tglkmbli != "" && tglrsk != "" && satuan >= 4 && solusi >= 5 && krusakan >= 5 && penyebab >= 5)
            {
                $('.njajale').attr('disabled',false);
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

            $("#jumlah_rusak").focusout(function() {
                check_inv();
                njajal();
                
            });

            $("#kerusakan").focusout(function() {
                njajal();    
            });

            $("#penyebab_kerusakan").focusout(function() {
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
                jml = $("#jumlah_rusak").val();
                invTerselect = $('.no_inv option:selected').size();

                if (invTerselect > jml) 
                {
                    $("#noInv_error_message").html("<p class='errInv'>No Inventaris yang dipilih melebihi jumlah yang akan dikembalikan!</p>");
                    $(".errInv").css('color', 'red');
                    $("#noInv_error_message").show();
                    $('.njajale').attr('disabled',true);
                    error_inv = true;
                }
                else if (invTerselect < jml) 
                {
                    $("#noInv_error_message").html("<p class='errInv'>No Inventaris yang dipilih terlalu sedikit dari jumlah yang akan dikembalikan.</p>");
                    $(".errInv").css('color', 'red');
                    $("#noInv_error_message").show();
                    $('.njajale').attr('disabled',true);
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
             $('#id_peminjamane').text($('#id_peminjaman').val());
             $('#id_barang_keluare').text($('#id_barang_keluar').val());
             $('#idbarang').text($('#id_barang').val());
             $('#jml').text($('#jumlah_rusak').val());
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
             $('#tgl_rusake').text($('#tgl_rusak').val());
             $('#kerusakane').text($('#kerusakan').val());
             $('#alasanRsk').text($('#penyebab_kerusakan').val());
             $('#solusine').text($('#solusi').val());
             $('#id_ruange').text($('#id_ruang').val());
        });

        $(document).ready(function(){
        $("#loading").hide();
        
        $("#id_barang").change(function(){
          $(".no_inv").hide();
          $("#loading").show();
        
          $.ajax({
            type: "POST",
            url: "<?php echo base_url("admin/admin/listInvKmbli"); ?>",
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
            url: "<?php echo base_url("admin/admin/listInvKmbli"); ?>",
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
            url: "<?php echo base_url("admin/admin/listInvKmbli"); ?>",
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

        $('#AsAdmin').change(function() 
        {
            if ($(this).is(':checked')) 
            {
                $('.pjawab').hide();
                $('#atas_nama').prop('required', false);
                $('#penanggung_jawab').prop('required', false);
                $('#atas_nama').val("");
                $('#penanggung_jawab').val("");
            } 
            else 
            {
                $('.pjawab').show();
                $('#atas_nama').prop('required', true);
                $('#penanggung_jawab').prop('required', true);
            }
        });


        function kembalikan_barang()
         {
            $('#kmblian').submit();
         }
    </script>
    <script src="<?php echo base_url('_tamplate/plugins/select2/select2.js') ?>"></script>
</body>
</html>

<!-- Bootstrap modal Confirm -->
    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Konfirmasi Pengembalian Barang Hilang<h4>
                </div>
                <div class="modal-body">
                    <p>Anda akan mengembalikan barang hilang dengan data sebagai berikut:</p>
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
                        <tr>
                            <th>Tanggal Rusak</th>
                            <td id="tgl_rusake"></td>
                        </tr>
                        <tr>
                            <th>Kerusakan</th>
                            <td id="kerusakane"></td>
                        </tr>
                        <tr>
                            <th>Penyebab Kerusakan</th>
                            <td id="alasanRsk"></td>
                        </tr>
                        <tr>
                            <th>Solusi</th>
                            <td id="solusine"></td>
                        </tr>
                        <tr>
                            <th>Pinjam di Ruang</th>
                            <td id="id_ruange"></td>
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