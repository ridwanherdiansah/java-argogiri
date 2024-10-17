

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Penjualan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- Button trigger for BorderLess Modal -->
                            <a href="<?= base_url(); ?>Penjualan/Penjualan" type="button" class="btn btn-outline-primary block"  >
                                Tambah Penjualan
                            </a>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Ceri</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_ceri; ?> KG</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Gabah</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_gabah; ?> KG</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Beras</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_beras; ?> KG</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <section class="section">
                            
                            <div class="card">
                                <div class="card-header">
                                    Tabel Penjualan
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="tabel_suplier">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Buyers</th>
                                                <th>Total pembayaran</th>
                                                <th>Total Berat</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($penjualan as $p): ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $p['id_buyers']; ?></td>
                                                <td>Rp <?=number_format($p['total_pembayaran'],2) ?></td>
                                                <td><?= $p['total_berat']; ?></td>
                                                <td><?= $p['status']; ?></td>
                                                <td><?= $p['tanggal']; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>Penjualan/L_penjualan/<?= $p['id_penjualan']; ?>" class="btn btn-sm btn-info">Lihat</a>
                                                    <!-- <a href="<?= base_url(); ?>Suplier/E_suplier/<?= $p['id_suplier']; ?>" class="btn btn-sm btn-warning">Edit</a> -->
                                                    <a href="<?= base_url(); ?>P_penjualan/H_penjualan/<?= $p['id_penjualan']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
