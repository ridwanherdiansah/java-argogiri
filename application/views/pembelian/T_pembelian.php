

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pembelian</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- Button trigger for BorderLess Modal -->
                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                    data-bs-target="#pembelian">
                                    Tambah Pembelian
                            </button>
                            
                        <!-- <a href="<?= base_url(); ?>Pembelian/Pembelian" type="button" class="btn btn-outline-primary block"  >
                                Tambah Pembelian
                            </a> -->
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
                                    Tabel Pembelian
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="tabel_suplier">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Suplier</th>
                                                <th>Jenis Pembelian</th>
                                                <th>Jenis Kopi</th>
                                                <th>Total pembayaran</th>
                                                <th>Total Berat</th>
                                                <th>Status</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($pembelian as $p): ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $p['id_suplier']; ?></td>
                                                <td><?= $p['jenis_pembelian']; ?></td>
                                                <td><?= $p['jenis_kopi']; ?></td>
                                                <td>Rp <?=number_format($p['total_pembayaran'],2) ?></td>
                                                <td><?= $p['total_berat']; ?> KG</td>
                                                <td><?= $p['status']; ?></td>
                                                <td><?= $p['tanggal']; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>Pembelian/L_pembelian/<?= $p['id_pembelian']; ?>" class="btn btn-sm btn-info">Lihat</a>
                                                    <!-- <a href="<?= base_url(); ?>Suplier/E_suplier/<?= $p['id_suplier']; ?>" class="btn btn-sm btn-warning">Edit</a> -->
                                                    <a href="<?= base_url(); ?>P_pembelian/H_pembelian/<?= $p['id_pembelian']; ?>" class="btn btn-sm btn-danger">Hapus</a>
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
<div class="modal fade" id="pembelian" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah data Pembelian</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?= base_url(); ?>P_pembelian/T_pembelian" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Nama Suplier</label>
                                            <div class="form-group">
                                                <select id="suplier" name="suplier" class="choices form-select" required="">
                                                    <?php foreach ($suplier as $s):?>
                                                        <option id="<?= $s['id_suplier']; ?>" value="<?= $s['id_suplier']; ?>"><?= $s['nama']; ?></option>
                                                    <?php endforeach;?>
                                                    <!-- <option id="jenis_kopi" value="robusta">Robusta</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Pembelian</label>
                                            <div class="form-group">
                                                <select id="jenis_pembelian" name="jenis_pembelian" class="choices form-select" required="">
                                                    <?php foreach ($jenis_pembelian as $jp):?>
                                                        <option id="<?= $jp['nama']; ?>" value="<?= $jp['nama']; ?>"><?= $jp['nama']; ?></option>
                                                    <?php endforeach;?>
                                                    <!-- <option id="jenis_kopi" value="robusta">Robusta</option> -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <label for="last-name-column">Jenis Kopi</label>
                                        <div class="form-group">
                                            <select id="jenis_kopi" name="jenis_kopi" class="choices form-select" required="">
                                                <?php foreach ($jenis_kopi as $jk):?>
                                                    <option id="<?= $jk['id']; ?>" value="<?= $jk['nama']; ?>"><?= $jk['nama']; ?></option>
                                                <?php endforeach;?>
                                                <!-- <option id="jenis_kopi" value="robusta">Robusta</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Harga</label>
                                            <input type="number" id="harga" class="form-control" placeholder="Harga/KG"
                                                name="harga" required="" onkeyup="sum();">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Berat</label>
                                            <input type="number" id="berat" class="form-control"
                                                name="berat" placeholder="Berat" required="" onkeyup="sum();">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Pembayaran</label>
                                            <div class="form-group">
                                                <select id="jenis_pembayaran" name="jenis_pembayaran" class="choices form-select" required="">
                                                    <option id="jenis_pembayaran" value="cash">Cash</option>
                                                    <option id="jenis_pembayaran" value="debit">Debit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Status Pembayaran</label>
                                            <div class="form-group">
                                                <select id="status" name="status" class="choices form-select" required="">
                                                    <option id="status" value="lunas">Lunas</option>
                                                    <option id="status" value="belum lunas">Belum Lunas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Memo</label>
                                            <textarea type="text" id="memo" name="memo" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" id="success" class="btn btn-primary me-1 mb-1">Simpan</button>
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