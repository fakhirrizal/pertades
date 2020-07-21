<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<script type="text/javascript">
	$(function(){
		$.ajaxSetup({
			type:"POST",
			url: "<?php echo site_url('/admin/Master/ajax_function')?>",
			cache: false,
		});
		$("#id_provinsi").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_kabupaten_by_id_provinsi'},
				success: function(respond){
					$("#id_kabupaten").html(respond);
				}
			})
		});
		$("#id_kabupaten").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_kecamatan_by_id_kabupaten'},
				success: function(respond){
					$("#id_kecamatan").html(respond);
				}
			})
		});
        $("#id_kecamatan").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'get_desa_by_id_kecamatan'},
				success: function(respond){
					$("#id_desa").html(respond);
				}
			})
		});
	})
</script>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
				<h3>Catatan</h3>
                <span><b>1.</b> Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.<br>
                        <b>2.</b> Jika suatu wilayah tidak ditemukan, silahkan hubungi pengelola aplikasi.</span>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-block">Form Tambah Data
            </div>
            <div class="card-body">
                <form class="forms-sample" action='<?= base_url().'admin_side/simpan_data_spbu'; ?>' method='post' enctype='multipart/form-data'>
                    <div class="form-group">
                        <label>Kode SPBU <font color='red'>*</font></label>
                        <input type="text" class="form-control" name='kode_spbu' required>
                    </div>
                    <div class="form-group">
                        <label>Alamat <font color='red'>*</font></label>
                        <textarea class="form-control" name="alamat" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Provinsi <font color='red'>*</font></label>
                        <select class="form-control" name='id_provinsi' id='id_provinsi' required>
                            <option value=''>-- Pilih --</option>
                            <?php
                            foreach ($provinsi as $key => $value) {
                                echo'<option value="'.$value->id_provinsi.'">'.$value->nm_provinsi.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kabupaten/ Kota <font color='red'>*</font></label>
                        <select class="form-control" name='id_kabupaten' id='id_kabupaten' required>
                            <option value=''>-- Pilih --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan <font color='red'>*</font></label>
                        <select class="form-control" name='id_kecamatan' id='id_kecamatan' required>
                            <option value=''>-- Pilih --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Desa/ Kelurahan <font color='red'>*</font></label>
                        <select class="form-control" name='id_desa' id='id_desa' required>
                            <option value=''>-- Pilih --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan Tambahan</label>
                        <textarea class="form-control" name="keterangan" rows="2" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button type='reset' class="btn btn-light">Batal</button>
                </form>
            </div>
		</div>
	</div>
</div>