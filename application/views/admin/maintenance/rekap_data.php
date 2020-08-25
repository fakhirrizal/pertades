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
				<!-- <button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url().'admin_side/tambah_data_pengguna'; ?>'"><i class="ik ik-plus"></i>Tambah Data</button> -->
            </div>
            <div class="card-header d-block">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Disetujui</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Ditolak</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width: 100%;" id="tbl1">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="1%"> # </th>
                                        <th style="text-align: center;"> Yang Mengajukan </th>
                                        <th style="text-align: center;"> Kode SPBU </th>
                                        <th style="text-align: center;"> Tanggal Pengajuan </th>
                                        <th style="text-align: center;" width="1%"> Aksi </th>
                                    </tr>
                                </thead>
                            </table>
                            <script type="text/javascript" language="javascript" >
                                $(document).ready(function(){
                                    $('#tbl1').dataTable({
                                        "order": [[ 0, "asc" ]],
                                        "bProcessing": true,
                                        "ajax" : {
                                            url:"<?= site_url('admin/Maintenance/json_pending'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'kode_spbu', sClass: "alignCenter" },
                                                    { mData: 'tanggal', sClass: "alignCenter" },
                                                    { mData: 'aksi', sClass: "alignCenter" }
                                                ]
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width: 100%;" id="tbl2">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="1%"> # </th>
                                        <th style="text-align: center;"> Yang Mengajukan </th>
                                        <th style="text-align: center;"> Kode SPBU </th>
                                        <th style="text-align: center;"> Tanggal Pengajuan </th>
                                        <th style="text-align: center;"> Tanggal Disetujui </th>
                                        <th style="text-align: center;" width="1%"> Aksi </th>
                                    </tr>
                                </thead>
                            </table>
                            <script type="text/javascript" language="javascript" >
                                $(document).ready(function(){
                                    $('#tbl2').dataTable({
                                        "order": [[ 0, "asc" ]],
                                        "bProcessing": true,
                                        "ajax" : {
                                            url:"<?= site_url('admin/Maintenance/json_disetujui'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'kode_spbu', sClass: "alignCenter" },
                                                    { mData: 'tanggal1', sClass: "alignCenter" },
                                                    { mData: 'tanggal2', sClass: "alignCenter" },
                                                    { mData: 'aksi', sClass: "alignCenter" }
                                                ]
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width: 100%;" id="tbl3">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="1%"> # </th>
                                        <th style="text-align: center;"> Yang Mengajukan </th>
                                        <th style="text-align: center;"> Kode SPBU </th>
                                        <th style="text-align: center;"> Tanggal Pengajuan </th>
                                        <th style="text-align: center;"> Tanggal Ditolak </th>
                                        <th style="text-align: center;" width="1%"> Aksi </th>
                                    </tr>
                                </thead>
                            </table>
                            <script type="text/javascript" language="javascript" >
                                $(document).ready(function(){
                                    $('#tbl3').dataTable({
                                        "order": [[ 0, "asc" ]],
                                        "bProcessing": true,
                                        "ajax" : {
                                            url:"<?= site_url('admin/Maintenance/json_ditolak'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'kode_spbu', sClass: "alignCenter" },
                                                    { mData: 'tanggal1', sClass: "alignCenter" },
                                                    { mData: 'tanggal2', sClass: "alignCenter" },
                                                    { mData: 'aksi', sClass: "alignCenter" }
                                                ]
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>