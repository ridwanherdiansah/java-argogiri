

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Data Suplier</h3>
                <p class="text-subtitle text-muted"><i>Id Suplier </i>tidak bisa di ubah karena mewakili suatu data</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- Button trigger for BorderLess Modal -->
                            <a href="<?= base_url(); ?>Suplier/T_suplier" class="btn btn-outline-warning block">
                                Kembali
                            </a>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
        <div class="row match-height container">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah data suplier</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="<?= base_url(); ?>P_Suplier/E_suplier/<?= $suplier['id_suplier']; ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Nama</label>
                                            <input type="text" id="nama" name="nama" class="form-control"
                                                placeholder="Masukan Nama" required="" value="<?= $suplier['nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Jenis Suplier</label>
                                            <div class="form-group">
                                                <select id="jenis_suplier" name="jenis_suplier" class="choices form-select" required="">
                                                    <option selected value="<?= $suplier['jenis_suplier']; ?>"><?= $suplier['jenis_suplier']; ?></option>
                                                    <option>Pilihan ...</option>
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
                                                name="nik" required="" value="<?= $suplier['nik']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">KK</label>
                                            <input type="number" id="kk" class="form-control"
                                                name="kk" placeholder="KK" required="" value="<?= $suplier['kk']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Jenis Kelamin</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="male" value="laki_laki" <?php if($suplier['jenis_kelamin']=='laki_laki') echo 'checked'?>>
                                                <label class="form-check-label" for="jenis_kelamin">
                                                    Laki - Laki
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="famale" value="perempuan" <?php if($suplier['jenis_kelamin']=='perempuan') echo 'checked'?>>
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
                                                name="email" placeholder="Email" required="" value="<?= $suplier['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Whatsapp</label>
                                            <input type="number" id="whatsapp" class="form-control"
                                                placeholder="Whatsapp" name="whatsapp" required="" value="<?= $suplier['whatsapp']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Alamat</label>
                                           <div class="form-floating">
                                                <textarea class="form-control" placeholder="Alamat"
                                                    id="alamat" name="alamat" required=""><?= $suplier['alamat']; ?></textarea>
                                                <label for="alamat">Alamat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="city-column">Kelompok</label>
                                            <input type="text" id="kempok" name="kelompok" class="form-control" placeholder="Kelompok"
                                               required="" value="<?= $suplier['kelompok']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Luas Lahan</label>
                                            <input type="text" id="luas_lahan" class="form-control"
                                                name="luas_lahan" placeholder="Luas lahan" required="" value="<?= $suplier['luas_lahan']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="company-column">Jumlah Pohon</label>
                                            <input type="text" id="jumlah_pohon" class="form-control"
                                                name="jumlah_pohon" placeholder="Jumlah pohon" required="" value="<?= $suplier['jumlah_pohon']; ?>">
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
    </section>
    <!-- // Basic Horizontal form layout section end -->
</div
