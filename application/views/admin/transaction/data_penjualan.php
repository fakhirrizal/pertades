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
					<table class="table table-hover mb-0" id='data_penjualan'>
                            <thead>
                                <tr>
                                    <th style='text-align:center'>#</th>
                                    <th style='text-align:center'>SPBU</th>
                                    <th style='text-align:center'>Jenis</th>
                                    <th style='text-align:center'>Kapasitas</th>
                                    <th style='text-align:center'>Total</th>
                                    <th style='text-align:center'>Tanggal</th>
                                </tr>
                            </thead>
                        </table>
                        <script type="text/javascript" language="javascript" >
                            $(document).ready(function(){
                                $('#data_penjualan').dataTable({
                                    "order": [[ 0, "asc" ]],
                                    "bProcessing": true,
                                    "ajax" : {
                                        type:"POST",
                                        url:"<?= site_url('admin/Transaction/json_data_penjualan'); ?>",
                                        data: {id_spbu:'<?= $this->uri->segment(3); ?>'}
                                    },
                                    "aoColumns": [
                                                { mData: 'no', sClass: "alignCenter" },
                                                { mData: 'spbu', sClass: "alignCenter" },
                                                { mData: 'jenis', sClass: "alignCenter" },
                                                { mData: 'kapasitas', sClass: "alignCenter" },
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