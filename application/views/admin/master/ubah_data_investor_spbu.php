<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
				<h3>Catatan</h3>
				<p> 1. Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.<br>
                        2. Jumlah harus 100%, agar bisa tersimpan.</p>
			</div>
		</div>
		<div class="card">
			<!-- <div class="card-header d-block">Form Tambah Data
            </div> -->
            <div class="card-body">
                <form class="forms-sample" action='<?= base_url().'admin_side/simpan_data_investor_spbu'; ?>' method='post' enctype='multipart/form-data'>
                    <input type="hidden" name='id_spbu' value='<?= $this->uri->segment(3); ?>'>
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Investor <font color='red'>*</font></label>
                                <select class="form-control" name="investor" required>
                                    <option value=''>-- Pilih --</option>
                                    <?php
                                    foreach ($investor as $key => $value) {
                                        if($value->inves==NULL OR $value->inves==''){
                                            echo'<option value="'.$value->user_id.'">'.$value->nik.' - '.$value->nama.'</option>';
                                        }else{
                                            echo'';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Persentase <font color='red'>*</font></label>
                                <input type="number" class="form-control" name='persentase' minlength='2' required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> <font color='white'>Color White</font></label>
                                <button type='submit' class="btn btn-primary mr-2">Tambahkan</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th style='text-align:center'>#</th>
                            <th style='text-align:center'>Nama</th>
                            <th style='text-align:center'>NIK</th>
                            <th style='text-align:center'>Alamat</th>
                            <th style='text-align:center'>No. HP</th>
                            <th style='text-align:center'>Persentase</th>
                            <th style='text-align:center'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_utama as $key => $value) {
                        ?>
                        <tr>
                            <td style='text-align:center'><?= $no++ ?>.</td>
                            <td><?= $value->nama; ?></td>
                            <td style='text-align:center'><?= $value->nik; ?></td>
                            <td style='text-align:center'><?= $value->alamat; ?></td>
                            <td style='text-align:center'><?= $value->no_hp; ?></td>
                            <td style='text-align:center'><?= $value->persentase.'%'; ?></td>
                            <td style='text-align:center'>
                                <div class="table-actions" style='text-align:center'>
                                    <a class='detaildata' id='<?= md5($value->user_id).'/'.$this->uri->segment(3); ?>'><i class="ik ik-edit-2"></i></a>
                                    <a onclick='return confirm("Anda yakin?")' href="<?= base_url().'admin_side/hapus_data_investor_spbu/'.md5($value->user_id).'/'.$this->uri->segment(3); ?>"><i class="ik ik-trash-2"></i></a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <script type="text/javascript" language="javascript" >
                    $(document).ready(function(){
                        $('.detaildata').click(function(){
                            var id = $(this).attr("id");
                            var modul = 'modul_ubah_data_investor';
                            $.ajax({
                                type:"POST",
                                url: "<?php echo site_url(); ?>admin/Master/ajax_page",
                                cache: false,
                                data: {id:id,modul:modul},
                                success:function(data){
                                $('#formdetaildata').html(data);
                                $('#detaildata').modal("show");
                                }
                            });
                        });
                    });
                </script>
                <button onclick="window.location.href='<?= base_url().'admin_side/perbarui_data_investor_spbu/'.$this->uri->segment(3); ?>'" class="btn btn-primary mr-2">Simpan</button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade" id="detaildata" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Ubah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="box box-primary" id='formdetaildata'>
                </div>
            </div>
        </div>
    </div>
</div>