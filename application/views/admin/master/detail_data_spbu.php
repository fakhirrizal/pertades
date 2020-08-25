<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card new-cust-card">
            <div class="card-header">
                <h3>Data SPBU</h3>
                <div class="card-header-right">
                    <h6 class="fw-700"><a href='<?= base_url().'admin_side/ubah_data_spbu/'.$this->uri->segment(3); ?>' data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Data SPBU"><i class="fas fa-edit text-green ml-10"></i></a></h6>
                </div>
            </div>
            <div class="card-block">
                <table width='100%'>
                    <thead>
                        <tr>
                            <th style='text-align:left' width='50%'>Kode SPBU</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->kode_spbu; ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Jumlah Tangki</th>
                            <td style='text-align:left' width='50%'><?= number_format($data_utama->jml_tangki,0); ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Alamat</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->alamat; ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Desa</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->nm_desa; ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Kecamatan</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->nm_kecamatan; ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Kabupaten</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->nm_kabupaten; ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Provinsi</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->nm_provinsi; ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Kapasitas</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->total_kapasitas.' Liter'; ?></td>
                        </tr>
                        <!-- <tr>
                            <th style='text-align:left' width='50%'>Harga/ Liter</th>
                            <td style='text-align:left' width='50%'><?= 'Rp '.number_format($data_utama->current_price,2); ?></td>
                        </tr>
                        <tr>
                            <th style='text-align:left' width='50%'>Sisa</th>
                            <td style='text-align:left' width='50%'>
                            <?php
                            if($data_utama->sisa==NULL OR $data_utama->sisa==''){
                                echo 'Belum ada pemakaian';
                            }else{
                                echo $data_utama->sisa.' Liter';
                            }
                            ?>
                            </td>
                        </tr> -->
                        <tr>
                            <th style='text-align:left' width='50%'>Tanggal Daftar</th>
                            <td style='text-align:left' width='50%'><?= $this->Main_model->convert_tanggal($data_utama->tanggal_daftar); ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h3>Data Investor</h3>
                <div class="card-header-right">
                    <h6 class="fw-700"><a href='<?= base_url().'admin_side/ubah_data_investor_spbu/'.$this->uri->segment(3); ?>' data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Investor"><i class="fas fa-plus text-green ml-10"></i></a></h6>
                </div>
            </div>
            <div class="card-block">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id='tabel_investor'>
                            <thead>
                                <tr>
                                    <th style='text-align:center'>#</th>
                                    <th style='text-align:center'>Nama</th>
                                    <th style='text-align:center'>Alamat</th>
                                    <th style='text-align:center'>No. HP</th>
                                    <th style='text-align:center'>Persentase</th>
                                    <th style='text-align:center'>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                        <script type="text/javascript" language="javascript" >
                            $(document).ready(function(){
                                $('#tabel_investor').dataTable({
                                    "order": [[ 0, "asc" ]],
                                    "bProcessing": true,
                                    "ajax" : {
                                        type:"POST",
                                        url:"<?= site_url('admin/Master/json_data_investor_spb'); ?>",
                                        data: {id_tangki:'<?= $this->uri->segment(3); ?>'}
                                    },
                                    "aoColumns": [
                                                { mData: 'no', sClass: "alignCenter" },
                                                { mData: 'nama' },
                                                { mData: 'alamat', sClass: "alignCenter" },
                                                { mData: 'no_hp', sClass: "alignCenter" },
                                                { mData: 'persentase', sClass: "alignCenter" },
                                                { mData: 'aksi', sClass: "alignCenter" }
                                            ]
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h3>Data Penjualan</h3>
            </div>
            <div class="card-block">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id='data_penjualan'>
                            <thead>
                                <tr>
                                    <th style='text-align:center'>#</th>
                                    <th style='text-align:center'>Jenis</th>
                                    <th style='text-align:center'>Kapasitas</th>
                                    <th style='text-align:center'>Total</th>
                                    <th style='text-align:center'>Tanggal</th>
                                </tr>
                            </thead>
                        </table>
                        <script type="text/javascript" language="javascript" >
                            $(document).ready(function(){
                                $('#data_penjualan').dataTable({
                                    "order": [[ 0, "asc" ]],
                                    "bProcessing": true,
                                    "ajax" : {
                                        type:"POST",
                                        url:"<?= site_url('admin/Master/json_data_penjualan'); ?>",
                                        data: {id_spbu:'<?= $this->uri->segment(3); ?>'}
                                    },
                                    "aoColumns": [
                                                { mData: 'no', sClass: "alignCenter" },
                                                { mData: 'jenis', sClass: "alignCenter" },
                                                { mData: 'kapasitas', sClass: "alignCenter" },
                                                { mData: 'total', sClass: "alignCenter" },
                                                { mData: 'tanggal', sClass: "alignCenter" }
                                            ]
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h3>Data Pembelian</h3>
            </div>
            <div class="card-block">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id='data_pembelian'>
                            <thead>
                                <tr>
                                    <th style='text-align:center'>#</th>
                                    <th style='text-align:center'>Jenis</th>
                                    <th style='text-align:center'>Kapasitas</th>
                                    <th style='text-align:center'>Harga/ Liter</th>
                                    <th style='text-align:center'>Total</th>
                                    <th style='text-align:center'>Tanggal</th>
                                </tr>
                            </thead>
                        </table>
                        <script type="text/javascript" language="javascript" >
                            $(document).ready(function(){
                                $('#data_pembelian').dataTable({
                                    "order": [[ 0, "asc" ]],
                                    "bProcessing": true,
                                    "ajax" : {
                                        type:"POST",
                                        url:"<?= site_url('admin/Master/json_data_pembelian'); ?>",
                                        data: {id_spbu:'<?= $this->uri->segment(3); ?>'}
                                    },
                                    "aoColumns": [
                                                { mData: 'no', sClass: "alignCenter" },
                                                { mData: 'jenis', sClass: "alignCenter" },
                                                { mData: 'kapasitas', sClass: "alignCenter" },
                                                { mData: 'harga', sClass: "alignCenter" },
                                                { mData: 'total', sClass: "alignCenter" },
                                                { mData: 'tanggal', sClass: "alignCenter" }
                                            ]
                                });

                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h3>Riwayat Servis</h3>
            </div>
            <div class="card-block">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id='data_servis'>
                            <thead>
                                <tr>
                                    <th style='text-align:center'>#</th>
                                    <th style='text-align:center'>Nama Barang</th>
                                    <th style='text-align:center'>Merk</th>
                                    <th style='text-align:center'>Jumlah</th>
                                    <th style='text-align:center'>Harga</th>
                                    <th style='text-align:center'>Tanggal Pengajuan</th>
                                </tr>
                            </thead>
                        </table>
                        <script type="text/javascript" language="javascript" >
                            $(document).ready(function(){
                                $('#data_servis').dataTable({
                                    "order": [[ 0, "asc" ]],
                                    "bProcessing": true,
                                    "ajax" : {
                                        type:"POST",
                                        url:"<?= site_url('admin/Master/json_data_servis'); ?>",
                                        data: {id_spbu:'<?= $this->uri->segment(3); ?>'}
                                    },
                                    "aoColumns": [
                                                { mData: 'no', sClass: "alignCenter" },
                                                { mData: 'barang', sClass: "alignCenter" },
                                                { mData: 'merk', sClass: "alignCenter" },
                                                { mData: 'jumlah', sClass: "alignCenter" },
                                                { mData: 'harga', sClass: "alignCenter" },
                                                { mData: 'tanggal', sClass: "alignCenter" }
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