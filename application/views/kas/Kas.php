

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kas</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- Button trigger for BorderLess Modal -->
                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                data-bs-target="#exampleModalScrollable">
                                Tambah Saldo Kas
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
                                        <h6 class="text-muted font-semibold">Saldo</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_saldo; ?></h6>
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
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Pemasukan</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_pemasukan; ?></h6>
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
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Pengeluaran</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_pengeluaran; ?></h6>
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
                                    Tabel transaksi kas
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="tabel_suplier">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Saldo</th>
                                                <th>Nama Pengisi</th>
                                                <th>Nominal</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($kas as $k): ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $k['id_kas']; ?></td>
                                                    <td><?= $k['nama']; ?></td>
                                                    <td>Rp <?=number_format($k['saldo'],2); ?></td>
                                                    <td><?= $k['keterangan']; ?></td>
                                                    <td><?= $k['status']; ?></td>
                                                    <td><?= $k['tanggal']; ?></td>
                                                    <td>
                                                        <a 
                                                            href="javascript:;"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#edit<?= $k['id_kas']; ?>"
                                                            class="btn btn-sm btn-warning">Edit
                                                        </a>
                                                        <a href="<?= base_url(); ?>Kas/E_kas/<?= $k['id_kas']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                        <a href="<?= base_url(); ?>P_kas/H_kas/<?= $k['id_kas']; ?>" class="btn btn-sm btn-danger">Hapus</a>
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


<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <!-- <h4 class="card-title">Tambah data suplier</h4> -->
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?= base_url(); ?>Kas/T_kas" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Masukan Password</label>
                                            <input type="Password" id="password" class="form-control"
                                                name="password" placeholder="Password" required="">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" id="success" class="btn btn-primary me-1 mb-1">Oke</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach($kas as $k): ?>
<!--scrolling edit Modal -->
<div class="modal fade" id="edit<?= $k['id_kas']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <!-- <h4 class="card-title">Tambah data suplier</h4> -->
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?= base_url(); ?>Kas/E_kas/<?= $k['id_kas']; ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Masukan Password</label>
                                            <input type="Password" id="password" class="form-control"
                                                name="password" placeholder="Password" required="">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" id="success" class="btn btn-primary me-1 mb-1">Oke</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>