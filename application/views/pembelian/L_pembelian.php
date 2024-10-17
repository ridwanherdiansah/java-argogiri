

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
            <div class="col-12 col-md-8 offset-md-2">
                <div class="pricing">
                    <div class="row align-items-center">
                        <div class="col-md-4 px-0">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title">Giri Senang</h4>
                                    <p class="text-center">A standart features you can get</p>
                                </div>
                                <ul>
                                    <li>No</li>
                                    <li>Nama</li>
                                    <li>Jenis Pembayaran</li>
                                    <li>Status Pembelian</li> 
                                </ul>
                                <hr>
                                <ul>
                                <?php foreach($pembelian as $p): ?>
                                    <li><?= $p['jenis_pembelian']; ?>,<?= $p['harga']; ?>,<?= $p['jenis_kopi']; ?>,<?= $p['berat']; ?>,<?= $p['total']; ?></li>
                                <?php endforeach;?>
                                </ul>
                                <hr>
                                <ul>
                                    <li>Sub total</li>
                                    <li>Tanggal</li>
                                </ul>
                                <div class="card-footer">
                                    <button class="btn btn-primary btn-block">Cetak</button>
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
