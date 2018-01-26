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
		                <th>ID Peminjaman</th>
		                <th>No Inv</th>
		                <th>Keterangan</th>
		              </tr>
		            </thead>
		            <tbody>
						<?php
						foreach($detail_pengembalian as $detil)
						{?>
							<tr>
								<td><?php echo $detil->id_peminjaman ?></td>
								<td><?php echo $detil->no_inv ?></td>
								<td><?php echo $detil->keterangan ?></td>
							</tr>
						<?php } ?>
		            </tbody>
		          </table>
				</div>
		        <div class="modal-footer">
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