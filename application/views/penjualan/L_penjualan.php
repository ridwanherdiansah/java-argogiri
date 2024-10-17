

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pricing</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12 offset-md-0">
                <div class="pricing">

                        <div class="col-md-9 px-0">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12 col-md-6 order-md-1 order-last">
                                            <h3>Giri Senang</h3>
                                            <p class="text-subtitle text-muted">For user to check they list</p>
                                        </div>
                                        <div class="col-12 col-md-6 order-md-2 order-first">
                                            <h3>SURAT JALAN</h3>
                                            <h5>NO: <?= $surat_jalan['id_surat_jalan']; ?></h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-md-2 order-md-1 order-last">
                                            <p class="text-subtitle text-muted">Kepada : </p>
                                        </div>
                                        <div class="col-12 col-md-4 order-md-2 order-last">
                                            <p class="text-subtitle text-muted"><?= $surat_jalan['id_penjualan']; ?></p>
                                        </div>
                                        <div class="col-12 col-md-2 order-md-3 order-first">
                                            <p class="text-subtitle text-muted">Tanggal  : </p>
                                            <p class="text-subtitle text-muted">Dikirim Dengan  : </p>
                                            <p class="text-subtitle text-muted">No Polisi  : </p>
                                            <p class="text-subtitle text-muted">Nama Pengemudi : </p>
                                        </div>
                                        <div class="col-12 col-md-4 order-md-4 order-first">
                                            <p class="text-subtitle text-muted"><?= $surat_jalan['tanggal']; ?></p>
                                            <p class="text-subtitle text-muted"><?= $surat_jalan['jenis_pengiriman']; ?></p>
                                            <p class="text-subtitle text-muted"><?= $surat_jalan['no_polisi']; ?></p>
                                            <p class="text-subtitle text-muted"><?= $surat_jalan['pengemudi']; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>No</td>
                                            <td>Nomor PO</td>
                                            <td>Nama Barang</td>
                                            <td>Satuan</td>
                                            <td>Jumlah Packing</td>
                                            <td>Jumlah Barang</td>
                                            <td>Keterangan</td>
                                        </tr>
                                        <?php foreach($penjualan as $p): ?>
                                        <tr>
                                            <td>x</td>
                                            <td><?= $p['id_penjualan']; ?></td>
                                            <td><?= $p['jenis_kopi']; ?></td>
                                            <td><?= $p['berat']; ?></td>
                                            <td></td>
                                            <td></td>
                                            <td><?= $p['memo']; ?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </table>
                                    <div class="row">
                                        <div class="col-12 col-md-6 order-md-1 order-last">
                                            <p class="text-subtitle text-muted">Tanda Terima</p>
                                            <p class="text-subtitle text-muted">Ridwan Herdiansah</p>
                                        </div>
                                        <div class="col-12 col-md-2 order-md-2 order-last">
                                            <p class="text-subtitle text-muted">Sopir</p>
                                            <p class="text-subtitle text-muted">Ridwan Herdiansah</p>
                                        </div>
                                        <div class="col-12 col-md-2 order-md-3 order-last">
                                            <p class="text-subtitle text-muted">Manager</p>
                                            <p class="text-subtitle text-muted">Ridwan Herdiansah</p>
                                        </div>
                                        <div class="col-12 col-md-2 order-md-4 order-last">
                                            <p class="text-subtitle text-muted">Bag. Packing</p>
                                            <p class="text-subtitle text-muted">Ridwan Herdiansah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block">Order Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</div>
