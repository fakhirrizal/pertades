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
				<button type="button" class="btn btn-primary" onclick="window.location.href='#'"><i class="ik ik-plus"></i>Tambah Data</button>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                </div>
            </div>
		</div>
	</div>
</div>