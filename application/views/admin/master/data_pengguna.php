<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
				<h3>Catatan</h3>
				<span><b>1.</b> Ketika mengklik <b>Atur Ulang Kata Sandi</b>, maka kata sandi otomatis menjadi "<b>1234</b>"</span>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-block">
				<button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url().'admin_side/tambah_data_pengguna'; ?>'"><i class="ik ik-plus"></i>Tambah Data</button>
            </div>
            <div class="card-header d-block">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true">General Manager</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false">Team Leader</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false">Tim Site Acuisition</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false">Investor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-5-tab" data-toggle="pill" href="#pills-5" role="tab" aria-controls="pills-5" aria-selected="false">Admin BUMDes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-6-tab" data-toggle="pill" href="#pills-6" role="tab" aria-controls="pills-6" aria-selected="false">Admin SPB Desa</a>
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
                                        <th style="text-align: center;"> Nama </th>
                                        <th style="text-align: center;"> Alamat </th>
                                        <th style="text-align: center;"> No. HP </th>
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
                                            url:"<?= site_url('admin/Master/json_data_pengguna_role_1'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'alamat', sClass: "alignCenter" },
                                                    { mData: 'no_hp', sClass: "alignCenter" },
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
                                        <th style="text-align: center;"> Nama </th>
                                        <th style="text-align: center;"> Alamat </th>
                                        <th style="text-align: center;"> No. HP </th>
                                        <th style="text-align: center;"> Regional </th>
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
                                            url:"<?= site_url('admin/Master/json_data_pengguna_role_2'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'alamat', sClass: "alignCenter" },
                                                    { mData: 'no_hp', sClass: "alignCenter" },
                                                    { mData: 'regional', sClass: "alignCenter" },
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
                                        <th style="text-align: center;"> Nama </th>
                                        <th style="text-align: center;"> Alamat </th>
                                        <th style="text-align: center;"> No. HP </th>
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
                                            url:"<?= site_url('admin/Master/json_data_pengguna_role_3'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'alamat', sClass: "alignCenter" },
                                                    { mData: 'no_hp', sClass: "alignCenter" },
                                                    { mData: 'aksi', sClass: "alignCenter" }
                                                ]
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width: 100%;" id="tbl4">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="1%"> # </th>
                                        <th style="text-align: center;"> Nama </th>
                                        <th style="text-align: center;"> NIK </th>
                                        <th style="text-align: center;"> Alamat </th>
                                        <th style="text-align: center;"> No. HP </th>
                                        <th style="text-align: center;" width="1%"> Aksi </th>
                                    </tr>
                                </thead>
                            </table>
                            <script type="text/javascript" language="javascript" >
                                $(document).ready(function(){
                                    $('#tbl4').dataTable({
                                        "order": [[ 0, "asc" ]],
                                        "bProcessing": true,
                                        "ajax" : {
                                            url:"<?= site_url('admin/Master/json_data_pengguna_role_4'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'nik', sClass: "alignCenter" },
                                                    { mData: 'alamat', sClass: "alignCenter" },
                                                    { mData: 'no_hp', sClass: "alignCenter" },
                                                    { mData: 'aksi', sClass: "alignCenter" }
                                                ]
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-5" role="tabpanel" aria-labelledby="pills-5-tab">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width: 100%;" id="tbl5">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="1%"> # </th>
                                        <th style="text-align: center;"> Nama </th>
                                        <th style="text-align: center;"> Alamat </th>
                                        <th style="text-align: center;"> No. HP </th>
                                        <th style="text-align: center;" width="1%"> Aksi </th>
                                    </tr>
                                </thead>
                            </table>
                            <script type="text/javascript" language="javascript" >
                                $(document).ready(function(){
                                    $('#tbl5').dataTable({
                                        "order": [[ 0, "asc" ]],
                                        "bProcessing": true,
                                        "ajax" : {
                                            url:"<?= site_url('admin/Master/json_data_pengguna_role_5'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'alamat', sClass: "alignCenter" },
                                                    { mData: 'no_hp', sClass: "alignCenter" },
                                                    { mData: 'aksi', sClass: "alignCenter" }
                                                ]
                                    });

                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-6" role="tabpanel" aria-labelledby="pills-6-tab">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" style="width: 100%;" id="tbl6">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" width="1%"> # </th>
                                        <th style="text-align: center;"> Nama </th>
                                        <th style="text-align: center;"> Alamat </th>
                                        <th style="text-align: center;"> No. HP </th>
                                        <th style="text-align: center;" width="1%"> Aksi </th>
                                    </tr>
                                </thead>
                            </table>
                            <script type="text/javascript" language="javascript" >
                                $(document).ready(function(){
                                    $('#tbl6').dataTable({
                                        "order": [[ 0, "asc" ]],
                                        "bProcessing": true,
                                        "ajax" : {
                                            url:"<?= site_url('admin/Master/json_data_pengguna_role_6'); ?>"
                                        },
                                        "aoColumns": [
                                                    { mData: 'no', sClass: "alignCenter" },
                                                    { mData: 'nama' },
                                                    { mData: 'alamat', sClass: "alignCenter" },
                                                    { mData: 'no_hp', sClass: "alignCenter" },
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