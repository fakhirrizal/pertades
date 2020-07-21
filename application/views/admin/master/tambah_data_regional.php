<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
				<h3>Catatan</h3>
                <span><b>1.</b> Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.</span>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-block">Form Tambah Data
            </div>
            <div class="card-body">
                <form class="forms-sample" action='<?= base_url().'admin_side/simpan_data_regional'; ?>' method='post' enctype='multipart/form-data'>
                    <div class="form-group">
                        <label>Regional <font color='red'>*</font></label>
                        <input type="text" class="form-control" name='regional' required>
                    </div>
                    <div class="form-group">
                        <label>Provinsi <font color='red'>*</font></label>
                        <select class="form-control" name='id_provinsi' required>
                            <option value=''>-- Pilih --</option>
                            <?php
                            foreach ($provinsi as $key => $value) {
                                echo'<option value="'.$value->id_provinsi.'">'.$value->nm_provinsi.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button type='reset' class="btn btn-light">Batal</button>
                </form>
            </div>
		</div>
	</div>
</div>