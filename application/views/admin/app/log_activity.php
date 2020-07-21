<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
				<h3>Catatan</h3>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-block">
				<button type="button" class="btn btn-warning" onclick="window.location.href='<?= base_url().'admin_side/cleaning_log'; ?>'"><i class="fa fa-trash"></i>Kosongkan Log</button>
			</div>
			<div class="card-body table-border-style">
				<div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap" id="tbl">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="1%"> # </th>
                                <th style="text-align: center;"> Tipe Aktifitas </th>
                                <th style="text-align: center;"> Aktifitas </th>
                                <th style="text-align: center;"> Pengguna </th>
                                <th style="text-align: center;"> Waktu </th>
                                <th style="text-align: center;" width="1%"> Aksi </th>
                            </tr>
                        </thead>
                    </table>
                    <script type="text/javascript" language="javascript" >
                        $(document).ready(function(){
                            $('#tbl').dataTable({
                                "order": [[ 0, "asc" ]],
                                "bProcessing": true,
                                "ajax" : {
                                    url:"<?= site_url('admin/App/json_log_activity'); ?>"
                                },
                                "aoColumns": [
                                            { mData: 'no', sClass: "alignCenter" },
                                            { mData: 'tipe', sClass: "alignCenter" },
                                            { mData: 'aktifitas', sClass: "alignCenter" },
                                            { mData: 'nama', sClass: "alignCenter" },
                                            { mData: 'waktu', sClass: "alignCenter" },
                                            { mData: 'aksi', sClass: "alignCenter" }
                                        ],
                                "drawCallback": function(data) {
                                                $('.detaildata').click(function(){
                                                var id = $(this).attr("id");
                                                var modul = 'modul_detail_log_aktifitas';
                                                $.ajax({
                                                    type:"POST",
                                                    url: "<?php echo site_url(); ?>admin/App/ajax_function",
                                                    cache: false,
                                                    data: {id:id,modul:modul},
                                                    success:function(data){
                                                    $('#formdetaildata').html(data);
                                                    $('#detaildata').modal("show");
                                                    }
                                                });
                                                });
                                            }
                            });
                        });
                    </script>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="detaildata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Data Aktifitas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="box box-primary" id='formdetaildata' >
                </div>
            </div>
        </div>
    </div>
</div>