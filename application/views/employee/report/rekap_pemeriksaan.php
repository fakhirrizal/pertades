<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-text">
            <h3>Catatan</h3>
        </div>
    </div>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-file-2"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Data Pemeriksaan
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="dropdown dropdown-inline">
                        <button type="button" onclick="window.location.href='<?= base_url().'employee_side/rekap_pemeriksaan'; ?>'" class="btn btn-brand btn-icon-sm" >
                            <i class="flaticon2-refresh"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Berdasarkan penanganan tiap fisioterapi -> ini grafik garis,yg garis fisioterapinya, sumbu x adalah hari sumbu y jumlah pemeriksaan (bisa grafik bisa tabel)
        Berdasarkan kunjungan pasien -> grafik batang, sumbu x hari, sumbu y jumlah pasien (bisa grafik bisa tabel) -->
        <div class="kt-portlet__body">
            <form class="kt-form kt-form--label-right" action="<?=base_url('employee_side/rekap_pemeriksaan');?>" method="post" enctype='multipart/form-data'>
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Jenis data:</label>
                            <select class="form-control" name='jenis_data' required>
                                <option value=''>-- Pilih --</option>
                                <option value='1' <?php if($jenis_data=='1'){echo'selected';}else{echo'';} ?>>Berdasarkan penanganan tiap fisioterapi</option>
                                <option value='2' <?php if($jenis_data=='2'){echo'selected';}else{echo'';} ?>>Berdasarkan kunjungan pasien</option>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="">Tampilan data:</label>
                            <select class="form-control" name='tampilan_data' required>
                                <option value=''>-- Pilih --</option>
                                <option value='1' <?php if($tampilan_data=='1'){echo'selected';}else{echo'';} ?>>Grafik</option>
                                <option value='2' <?php if($tampilan_data=='2'){echo'selected';}else{echo'';} ?>>Tabel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Rentang waktu:</label>
                            <div class="kt-input-icon" id='kt_daterangepicker_2'>
                                <input type='text' class="form-control" name='tanggal' value='<?= $tanggal; ?>' readonly placeholder="Select date range" required/>
                                <span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-calendar"></i></span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">Proses</button>
                                <button type="reset" class="btn btn-secondary">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    if($ajax=='open'){
    ?>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body">
        </div>
    </div>
    <?php }else{
        echo'';
    } ?>
</div>




                                        