

            <div class="content-wrapper container">
                
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Buyers</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <!-- Button trigger for BorderLess Modal -->
                                    <a href="<?= base_url(); ?>Buyers/T_buyers" class="btn btn-outline-warning block">
                                        Kembali
                                    </a>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="page-content">
                    <section class="row">
                        <div class="col-12 col-lg-3">
                            <div class="card">
                                <div class="card-body py-4 px-5">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-xl">
                                            <img src="<?= base_url(); ?>assets/images/faces/1.jpg" alt="Face 1">
                                        </div>
                                        <div class="ms-3 name">
                                            <h5 class="font-bold"><?= $buyers['nama']; ?></h5>
                                            <h6 class="text-muted mb-0"><?= $buyers['id_buyers']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Keterangan Buyers</h4>
                                </div>
                                <div class="card-content pb-4">
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">JENIS BUYERS</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['jenis_buyers']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">NIK</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['nik']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">KK</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['kk']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Jenis Kelamin</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['jenis_kelamin']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Email</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['email']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Whatsapp</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['whatsapp']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Alamat</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['alamat']; ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Tanggal Registrasi</label>
                                                    <h6 class="text-muted mb-0"><?= $buyers['tanggal']; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <a href="<?= base_url(); ?>Suplier/E_buyers/<?= $buyers['id_buyers']; ?>" class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Edit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card">
                                        <div class="card-header">
                                            <h4>Pembelian</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-primary" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="<?= base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">Ceri</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0"><?= $jumlah_ceri; ?> KG</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-europe"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-success" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="<?= base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">Gabah</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0"><?= $jumlah_gabah; ?> KG</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-america"></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <svg class="bi text-danger" width="32" height="32" fill="blue"
                                                            style="width:10px">
                                                            <use
                                                                xlink:href="<?= base_url(); ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                                        </svg>
                                                        <h5 class="mb-0 ms-3">Beras</h5>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-0"><?= $jumlah_beras; ?> KG</h5>
                                                </div>
                                                <div class="col-12">
                                                    <div id="chart-indonesia"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
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
                                                    <div class="stats-icon red">
                                                        <i class="iconly-boldBookmark"></i>
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
                                    <div class="card">
                                <div class="card-header">
                                    Tabel Penjualan
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="tabel_suplier">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Penjualan</th>
                                                <th>Total Berat</th>
                                                <th>Total Pembayaran</th>
                                                <th>Jenis Pembayaran</th>
                                                <th>Status</th>
                                                <th>Memo</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($penjualan as $p): ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $p['id_penjualan']; ?></td>
                                                <td><?= $p['total_berat']; ?> KG</td>
                                                <td>Rp <?=number_format($p['total_pembayaran'],2) ?></td>
                                                <td><?= $p['jenis_pembayaran']; ?></td>
                                                <td><?= $p['status']; ?></td>
                                                <td><?= $p['memo']; ?></td>
                                                <td><?= $p['tanggal']; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>Penjualan/L_penjualan/<?= $p['id_buyers']; ?>" class="btn btn-sm btn-info">Lihat</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>

            