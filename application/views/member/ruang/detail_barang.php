<!-- Bootstrap modal Detail -->
	  <div class="modal fade" id="modal_detail">
		<div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		          <h3 class="modal-title">Detail Barang</h3>
		        </div>
		        <div class="modal-body">
		          <table class="table table-striped" id="table_id">
		            <thead id="tblHead">
		              <tr>
		                <th>ID Barang</th>
		                <th>No Inv</th>
		                <th>Kondisi</th>
		              </tr>
		            </thead>
		            <tbody>
						<?php
						foreach($detail_barang as $detil)
						{?>
							<tr>
								<td><?php echo $detil->id_barang ?></td>
								<td><?php echo $detil->no_inv ?></td>
								<td><?php echo $detil->kondisi ?></td>
							</tr>
						<?php } ?>
		            </tbody>
		          </table>
				</div>
		        <div class="modal-footer">
		        	<p class="text-left" style="font-size: 10px;">*Silahkan cek id barang di menu list barang</p>
		          <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
		        </div>
						
		      </div><!-- /.modal-content -->
		    </div><!-- /.modal-dialog -->
		  </div><!-- /.modal -->
	  <!-- End Bootstrap modal -->

	  <script type="text/javascript">
	  	$(document).ready( function () {
		      $('#table_id').DataTable();
		  } );
	  </script>