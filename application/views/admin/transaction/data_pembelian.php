<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
				<h3>Catatan</h3>
				<p> 1. Data yang ada adalah data dari SPBU yang masih aktif.</p>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-block">
				<!-- <button type="button" class="btn btn-primary" onclick="window.location.href='#'"><i class="ik ik-plus"></i>Tambah Data</button> -->
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
					<table class="table table-striped table-bordered nowrap" id="tbl">
                        <thead>
                            <tr>
                                <th style="text-align: center;" width="1%"> # </th>
                                <th style="text-align: center;"> SPBU </th>
                                <th style='text-align:center'>Jenis</th>
								<th style='text-align:center'>Kapasitas</th>
								<th style='text-align:center'>Harga/ Liter</th>
								<th style='text-align:center'>Total</th>
								<th style='text-align:center'>Tanggal</th>
                            </tr>
                        </thead>
                    </table>
                    <script type="text/javascript" language="javascript" >
                        $(document).ready(function(){
                            $('#tbl').dataTable({
                                "order": [[ 0, "asc" ]],
                                "bProcessing": true,
                                "ajax" : {
                                    url:"<?= site_url('admin/Transaction/json_data_pembelian'); ?>"
                                },
                                "aoColumns": [
                                            { mData: 'no', sClass: "alignCenter" },
                                            { mData: 'kode_spbu', sClass: "alignCenter" },
                                            { mData: 'jenis', sClass: "alignCenter" },
                                            { mData: 'kapasitas', sClass: "alignCenter" },
                                            { mData: 'harga', sClass: "alignCenter" },
                                            { mData: 'total', sClass: "alignCenter" },
                                            { mData: 'tanggal', sClass: "alignCenter" }
                                        ]
                            });

                        });
                    </script>
                </div>
            </div>
		</div>
	</div>
</div>