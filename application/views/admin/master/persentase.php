<?= $this->session->flashdata('sukses') ?>
<?= $this->session->flashdata('gagal') ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header d-block">
                <h3>Catatan</h3>
                <p>1. Jika akan menambahkan <i><b>role user</b></i>, silahkan hubungi pengelola aplikasi.<br>
                2. Untuk mengubah aturan saat ini silahkan tekan <b>Tambah Data</b>.</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card new-cust-card">
            <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demoModal"><i class="ik ik-plus"></i> Tambah Data</button>
            </div>
            <div class="card-block">
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container"></div>
                </figure>
                <script>
                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'pie'
                        },
                        credits: {
                            enabled: false
                        },
                        title: {
                            text: 'Persentase Bagi Hasil Keuntungan'
                        },
                        tooltip: {
                            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                        },
                        accessibility: {
                            point: {
                                valueSuffix: '%'
                            }
                        },
                        plotOptions: {
                            pie: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: {
                                    enabled: true,
                                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                                }
                            }
                        },
                        series: [{
                            name: 'Persentase Keuntungan',
                            colorByPoint: true,
                            data: [
                                <?php
                                foreach ($role as $key => $value) {
                                    echo'
                                    {
                                        name: "'.$value->definition.'",
                                        y: '.$value->persentase.'
                                    },
                                    ';
                                }
                                ?>
                                
                                
                            ]
                        }]
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h3>Riwayat Data</h3>
            </div>
            <div class="card-block">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="tbl">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"> General Manager </th>
                                    <th style="text-align: center;"> Team Leader </th>
                                    <th style="text-align: center;"> Tim Site Acuisition </th>
                                    <th style="text-align: center;"> Investor </th>
                                    <th style="text-align: center;"> Admin BUMDesa </th>
                                    <th style="text-align: center;"> Admin SPB Desa </th>
                                    <th style="text-align: center;"> Created At </th>
                                </tr>
                            </thead>
                        </table>
                        <script type="text/javascript" language="javascript" >
                            $(document).ready(function(){
                                $('#tbl').dataTable({
                                    "order": [[ 0, "asc" ]],
                                    "bProcessing": true,
                                    "ajax" : {
                                        url:"<?= site_url('admin/Master/json_data_persentase'); ?>"
                                    },
                                    "aoColumns": [
                                                { mData: 'gm', sClass: "alignCenter" },
                                                { mData: 'tl', sClass: "alignCenter" },
                                                { mData: 'sitac', sClass: "alignCenter" },
                                                { mData: 'investor', sClass: "alignCenter" },
                                                { mData: 'bumdesa', sClass: "alignCenter" },
                                                { mData: 'spb', sClass: "alignCenter" },
                                                { mData: 'tgl', sClass: "alignCenter" }
                                            ]
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Form Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="alert-text">
                    <h5>Catatan</h5>
                    <p> 1. Kolom isian dengan tanda bintang (<font color='red'>*</font>) adalah wajib untuk di isi.<br>
                        2. Jumlah harus 100%, agar bisa tersimpan.</p>
                </div>
                <hr>
                <form class="kt-form" action="<?=base_url('admin_side/simpan_persentase');?>" method="post" enctype='multipart/form-data'>
                    <div class="kt-portlet__body">
                        <?php
                        foreach ($role as $key => $value) {
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <br><br><h6>Role <?= $value->definition; ?></h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Persentase <font color='red'>*</font></label>
                                    <input type="number" class="form-control" name='<?= $value->id; ?>_persentase' placeholder="Dalam bentuk angka" maxlength='2' required>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <hr>
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
</div>