<?= $this->session->flashdata('gagal') ?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-text">
            <h3>Catatan</h3>
            <p> 1. Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.</p>
        </div>
    </div>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-file-2"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Tambah Data Fisioterapi
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <form class="kt-form" action="<?=base_url('employee_side/simpan_data_pasien');?>" method="post" enctype='multipart/form-data'>
                <div class="kt-portlet__body">
                    <div class="form-group">
                        <label>Nama Lengkap <font color='red'>*</font></label>
                        <input type="text" class="form-control" name='nama' required>
                    </div>
                    <div class="form-group">
                        <label>Alamat </label>
                        <input type="text" class="form-control" name='alamat'>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin </label>
                        <select class="form-control" name='jenis_kelamin'>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <font color='red'>*</font></label>
                        <input type="date" class="form-control" name='tanggal_lahir' required>
                    </div>
                    <div class="form-group">
                        <label>Nomor HP </label>
                        <input type="text" class="form-control" name='no_hp'>
                    </div>
                    <div class="form-group">
                        <label>Nama Wali </label>
                        <input type="text" class="form-control" name='nama_wali'>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Batal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>