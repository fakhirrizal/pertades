<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<script type="text/javascript">
	$(function(){
		$.ajaxSetup({
			type:"POST",
			url: "<?php echo base_url().'admin/Master/ajax_page';?>",
			cache: false,
		});
		$("#role").change(function(){
			var value=$(this).val();
			$.ajax({
				data:{id:value,modul:'form_tambah_data_pengguna'},
				success: function(respond){
					$("#form_tambah_data_pengguna").html(respond);
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
				<span><b>1.</b> Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.</span>
			</div>
		</div>
		<div class="card">
			<div class="card-header d-block">Form Tambah Data
            </div>
            <div class="card-body">
                <form class="forms-sample" action='<?= base_url().'admin_side/simpan_data_pengguna'; ?>' method='post' enctype='multipart/form-data'>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name='role' id='role' required>
                            <option value=''>-- Pilih --</option>
                            <option value='2'>General Manager</option>
                            <option value='3'>Team Leader</option>
                            <option value='4'>Tim Site Acuisition</option>
                            <option value='5'>Investor</option>
                            <option value='6'>Admin BUMDesa</option>
                            <option value='7'>Admin SPB Desa</option>
                        </select>
                    </div>
                    <hr size='3'>
                    <div id='form_tambah_data_pengguna'></div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button type='reset' class="btn btn-light">Batal</button>
                </form>
            </div>
		</div>
	</div>
</div>