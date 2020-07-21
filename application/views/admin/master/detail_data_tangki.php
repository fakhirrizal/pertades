<div class="row">
    <!-- product and new customar start -->
    <div class="col-xl-4 col-md-6">
        <div class="card new-cust-card">
            <div class="card-header">
                <h3>Data Tangki</h3>
            </div>
            <div class="card-block">
                <table width='100%'>
                    <thead>
                        <tr>
                            <th style='text-align:left' width='50%'>Nomor Tangki</th>
                            <td style='text-align:left' width='50%'><?= $data_utama->id_tangki; ?></td>
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
                            <td style='text-align:left' width='50%'><?= $data_utama->kapasitas.' Liter'; ?></td>
                        </tr>
                        <tr>
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
                        </tr>
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
                    <h6 class="fw-700"><a href='#' data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data Investor"><i class="fas fa-plus text-green ml-10"></i></a></h6>
                </div>
            </div>
            <div class="card-block">
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
    <div class="col-xl-6 col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h3>Data Penjualan</h3>
            </div>
            <div class="card-block">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id='data_penjualan'>
                        <thead>
                            <tr>
                                <th style='text-align:center'>#</th>
                                <th style='text-align:center'>Kapasitas</th>
                                <th style='text-align:center'>Total</th>
                                <th style='text-align:center'>Tanggal</th>
                                <th style='text-align:center'>Aksi</th>
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
                                    data: {id_tangki:'<?= $this->uri->segment(3); ?>'}
                                },
                                "aoColumns": [
                                            { mData: 'no', sClass: "alignCenter" },
                                            { mData: 'kapasitas', sClass: "alignCenter" },
                                            { mData: 'total', sClass: "alignCenter" },
                                            { mData: 'tanggal', sClass: "alignCenter" }
                                            { mData: 'aksi', sClass: "alignCenter" }
                                        ]
                            });

                        });
                    </script>
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
                <div class="table-responsive">
                    <table class="table table-hover mb-0" id='data_pembelian'>
                        <thead>
                            <tr>
                                <th style='text-align:center'>#</th>
                                <th style='text-align:center'>Kapasitas</th>
                                <th style='text-align:center'>Harga/ Liter</th>
                                <th style='text-align:center'>Total</th>
                                <th style='text-align:center'>Tanggal</th>
                            </tr>
                        </thead>
                        <!-- <tbody>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <img src="../img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <h6>Shirley  Hoe</h6>
                                            <p class="text-muted mb-0">Sales executive , NY</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Pinterest</td>
                                <td>223</td>
                                <td>19-11-2018</td>
                                <td>
                                    <label class="badge badge-primary">Sketch</label>
                                    <label class="badge badge-primary">Ui</label>
                                </td>
                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <img src="../img/users/2.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <h6>James Alexander</h6>
                                            <p class="text-muted mb-0">Sales executive , EL</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Facebook</td>
                                <td>268</td>
                                <td>19-11-2018</td>
                                <td>
                                    <label class="badge badge-primary">Ux</label>
                                    <label class="badge badge-danger">Ui</label>
                                    <label class="badge badge-danger">php</label>
                                </td>
                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <img src="../img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <h6>Shirley  Hoe</h6>
                                            <p class="text-muted mb-0">Sales executive , NY</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Twitter</td>
                                <td>293</td>
                                <td>16-03-2018</td>
                                <td>
                                    <label class="badge badge-danger">Sketch</label>
                                    <label class="badge badge-primary">Ui</label>
                                </td>
                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <img src="../img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <h6>Shirley  Hoe</h6>
                                            <p class="text-muted mb-0">Sales executive , NY</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Pinterest</td>
                                <td>223</td>
                                <td>19-11-2018</td>
                                <td>
                                    <label class="badge badge-primary">Ux</label>
                                    <label class="badge badge-success">Ui</label>
                                    <label class="badge badge-warning">php</label>
                                </td>
                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <img src="../img/users/2.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <h6>James Alexander</h6>
                                            <p class="text-muted mb-0">Sales executive , EL</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Facebook</td>
                                <td>268</td>
                                <td>19-11-2018</td>
                                <td>
                                    <label class="badge badge-primary">Sketch</label>
                                    <label class="badge badge-primary">Ui</label>
                                </td>

                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-inline-block align-middle">
                                        <img src="../img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <h6>Shirley  Hoe</h6>
                                            <p class="text-muted mb-0">Sales executive , NY</p>
                                        </div>
                                    </div>
                                </td>
                                <td>Twitter</td>
                                <td>293</td>
                                <td>16-03-2018</td>
                                <td>
                                    <label class="badge badge-danger">Sketch</label>
                                    <label class="badge badge-primary">Ui</label>
                                </td>
                                <td><a href="#!"><i class="ik ik-edit f-16 mr-15 text-green"></i></a><a href="#!"><i class="ik ik-trash-2 f-16 text-red"></i></a></td>
                            </tr>
                        </tbody> -->
                    </table>
                    <script type="text/javascript" language="javascript" >
                        $(document).ready(function(){
                            $('#data_pembelian').dataTable({
                                "order": [[ 0, "asc" ]],
                                "bProcessing": true,
                                "ajax" : {
                                    type:"POST",
                                    url:"<?= site_url('admin/Master/json_data_pembelian'); ?>",
                                    data: {id_tangki:'<?= $this->uri->segment(3); ?>'}
                                },
                                "aoColumns": [
                                            { mData: 'no', sClass: "alignCenter" },
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