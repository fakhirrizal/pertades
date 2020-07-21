<form class="forms-sample" action='<?= base_url().'admin_side/perbarui_persentase_investor'; ?>' method='post' enctype='multipart/form-data'>
    <input type="hidden" name="user_id" value='<?= md5($investor->user_id); ?>'>
    <input type="hidden" name="id_spbu" value='<?= md5($investor->id_spbu); ?>'>
    <div class="form-group">
        <label>Nama <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nama' placeholder="Nama lengkap sesuai dengan KTP" value='<?= $investor->nama; ?>' required readonly>
    </div>
    <div class="form-group">
        <label>NIK <font color='red'>*</font></label>
        <input type="text" class="form-control" name='nik' value='<?= $investor->nik; ?>' required readonly>
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <textarea class="form-control" name="alamat" rows="4" readonly><?= $investor->alamat; ?></textarea>
    </div>
    <div class="form-group">
        <label>Nomor HP</label>
        <input type="number" class="form-control" name="no_hp" value='<?= $investor->no_hp; ?>' readonly>
    </div>
    <div class="form-group">
        <label>Persentase <font color='red'>*</font></label>
        <input type="number" class="form-control" name='persentase' value='<?= $investor->persentase; ?>' required>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
    <button type='reset' class="btn btn-light">Batal</button>
</form>