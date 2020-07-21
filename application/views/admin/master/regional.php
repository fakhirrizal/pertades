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
				<button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url().'admin_side/tambah_data_regional'; ?>'"><i class="ik ik-plus"></i>Tambah Data</button>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap" id="tbl">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="1%"> # </th>
                                <th style="text-align: center;"> Regional </th>
                                <th style="text-align: center;"> Provinsi </th>
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
                                    url:"<?= site_url('admin/Master/json_data_regional'); ?>"
                                },
                                "aoColumns": [
                                            { mData: 'no', sClass: "alignCenter" },
                                            { mData: 'regional', sClass: "alignCenter" },
                                            { mData: 'provinsi', sClass: "alignCenter" },
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