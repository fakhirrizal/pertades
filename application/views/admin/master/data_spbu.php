<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
                <h3>Catatan</h3>
                <p>1. Jika menghapus data maka semua data yang terkait akan hilang.</p>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-block">
				<button type="button" class="btn btn-primary" onclick="window.location.href='<?= base_url().'admin_side/tambah_data_spbu'; ?>'"><i class="ik ik-plus"></i>Tambah Data</button>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered nowrap" id="tbl">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="1%"> # </th>
                                <th style="text-align: center;"> Kode SPBU </th>
                                <th style="text-align: center;"> Alamat </th>
                                <th style="text-align: center;"> Wilayah </th>
                                <th style="text-align: center;"> Investor </th>
                                <th style="text-align: center;"> Status </th>
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
                                    url:"<?= site_url('admin/Master/json_data_spbu'); ?>"
                                },
                                "aoColumns": [
                                            { mData: 'no', sClass: "alignCenter" },
                                            { mData: 'kode_spbu', sClass: "alignCenter" },
                                            { mData: 'alamat', sClass: "alignCenter" },
                                            { mData: 'wilayah', sClass: "alignCenter" },
                                            { mData: 'investor' },
                                            { mData: 'status', sClass: "alignCenter" },
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