

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Suplier</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- Button trigger for BorderLess Modal -->
                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                data-bs-target="#exampleModalScrollable">
                                Tambah Suplier
                            </button>
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
                                        <h6 class="text-muted font-semibold">Suplier</h6>
                                        <h6 class="font-extrabold mb-0"><?= $jumlah_suplier; ?> Orang</h6>
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
                                    Tabel Suplier
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="tabel_suplier">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Suplier</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Whatsapp</th>
                                                <th>Kelompok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($suplier as $s): ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $s['id_suplier']; ?></td>
                                                <td><?= $s['nama']; ?></td>
                                                <td><?= $s['email']; ?></td>
                                                <td><?= $s['whatsapp']; ?></td>
                                                <td><?= $s['kelompok']; ?></td>
                                                <td>
                                                    <a href="<?= base_url(); ?>Suplier/L_suplier/<?= $s['id_suplier']; ?>" class="btn btn-sm btn-info">Lihat</a>
                                                    <a href="<?= base_url(); ?>Suplier/E_suplier/<?= $s['id_suplier']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="<?= base_url(); ?>P_suplier/H_suplier/<?= $s['id_suplier']; ?>" class="btn btn-sm btn-danger">Hapus</a>
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
                        <h4 class="card-title">Tambah data suplier</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?= base_url(); ?>P_Suplier/T_suplier" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama</label>
                                            <input type="text" id="nama" name="nama" class="form-control"
                                                placeholder="Masukan Nama" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Suplier</label>
                                            <div class="form-group">
                                                <select id="jenis_suplier" name="jenis_suplier" class="choices form-select" required="">
                                                    <option id="jenis_suplier" value="petani">Petani</option>
                                                    <option id="jenis_suplier" value="pengepul">Pengepul</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column">NIK</label>
                                            <input type="number" id="nik" class="form-control" placeholder="Nik"
                                                name="nik" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">KK</label>
                                            <input type="number" id="kk" class="form-control"
                                                name="kk" placeholder="KK" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="male" value="laki_laki">
                                                <label class="form-check-label" for="jenis_kelamin">
                                                    Laki - Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="famale" value="perempuan">
                                                <label class="form-check-label" for="jenis_kelamin">
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email-id-column">Email</label>
                                            <input type="email" id="email" class="form-control"
                                                name="email" placeholder="Email" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Whatsapp</label>
                                            <input type="number" id="whatsapp" class="form-control"
                                                placeholder="Whatsapp" name="whatsapp" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Alamat</label>
                                           <div class="form-floating">
                                                <textarea class="form-control" placeholder="Alamat"
                                                    id="alamat" name="alamat" required=""></textarea>
                                                <label for="alamat">Alamat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Kelompok</label>
                                            <input type="text" id="kempok" name="kelompok" class="form-control" placeholder="Kelompok"
                                               required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Luas Lahan</label>
                                            <input type="text" id="luas_lahan" class="form-control"
                                                name="luas_lahan" placeholder="Luas lahan" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Jumlah Pohon</label>
                                            <input type="text" id="jumlah_pohon" class="form-control"
                                                name="jumlah_pohon" placeholder="Jumlah pohon" required="">
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