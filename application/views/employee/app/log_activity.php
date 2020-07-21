<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-text">
            <h3>Catatan</h3>
        </div>
    </div>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-file-2"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Log Aktifitas
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                        <button type="button" onclick="window.location.href='<?=base_url('employee_side/cleaning_log');?>'" class="btn btn-brand btn-icon-sm" >
                            <i class="fa fa-trash"></i> Kosongkan Log
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="tbl">
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
                            url:"<?= site_url('employee/App/json_log_activity'); ?>"
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
											url: "<?php echo site_url(); ?>employee/App/ajax_function",
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