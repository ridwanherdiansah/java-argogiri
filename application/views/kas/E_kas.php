

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message_saldo'); ?>
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Saldo Kas</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- Button trigger for BorderLess Modal -->
                           <!--  <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                data-bs-target="#exampleModalScrollable">
                                Tambah Suplier
                            </button> -->
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
                                        <h6 class="font-extrabold mb-0"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <section class="section">
                            
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah kas saldo</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="<?= base_url(); ?>P_kas/E_kas/<?= $kas['id_kas']; ?>" method="post">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nama</label>
                                                        <input type="text" id="nama" name="nama" class="form-control"
                                                            placeholder="Masukan nama pengisi saldo" required="" value="<?= $kas['nama']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nominal Saldo</label>
                                                        <input type="number" id="saldo" name="saldo" class="form-control"
                                                            placeholder="Masukan Nominal saldo" required="" value="<?= $kas['saldo']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="city-column">Keterangan</label>
                                                        <textarea id="keterangan" name="keterangan" class="form-control"><?= $kas['keterangan']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Status Saldo</label>
                                                        <div class="form-group">
                                                            <select id="status" name="status" class="choices form-select" required="">
                                                                <option id="status" value="cash">Cash</option>
                                                                <option id="status" value="debit">Debit</option>
                                                            </select>
                                                        </div>
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

                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>