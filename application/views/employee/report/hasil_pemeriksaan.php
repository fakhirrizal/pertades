<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="alert alert-light alert-elevate" role="alert">
        <div class="alert-text">
            <h3>Catatan</h3>
            <p>1. Data yang tersaji adalah data pemeriksaan yang dilakukan oleh Anda.</p>
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
                        <button type="button" onclick="window.location.href='<?= base_url().'employee_side/pemeriksaan'; ?>'" class="btn btn-brand btn-icon-sm" >
                            <i class="flaticon2-plus"></i> Tambah Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="tbl">
                <thead>
                    <tr>
                        <th style="text-align: center;" width="1%"> # </th>
                        <th style="text-align: center;"> Fisioterapi </th>
                        <th style="text-align: center;"> Nomor Pasien </th>
                        <th style="text-align: center;"> Nama Pasien </th>
                        <th style="text-align: center;"> Tanggal Pemeriksaan </th>
                        <th style="text-align: center;" width="1%"> Aksi </th>
                    </tr>
                </thead>
            </table>
            <script type="text/javascript" language="javascript" >
                $(document).ready(function(){
                    $('#tbl').dataTable({
                        "order": [[ 0, "asc" ]],
                        "bProcessing": true,
                        "ajax" : {
                            url:"<?= site_url('employee/Report/json_data_pemeriksaan'); ?>"
                        },
                        "aoColumns": [
                                    { mData: 'no', sClass: "alignCenter" },
                                    { mData: 'fisioterapi' },
                                    { mData: 'nomor_pasien', sClass: "alignCenter" },
                                    { mData: 'pasien' },
                                    { mData: 'waktu', sClass: "alignCenter" },
                                    { mData: 'aksi', sClass: "alignCenter" }
                                ]
                    });

                });
            </script>
        </div>
    </div>
</div>