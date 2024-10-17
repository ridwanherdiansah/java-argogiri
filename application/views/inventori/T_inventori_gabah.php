

<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Iventori Ceri</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <!-- Button trigger for BorderLess Modal -->
                                <!-- <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalScrollable">
                                    Tambah Iventori Ceri
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
                                        <h6 class="text-muted font-semibold">Ceri</h6>
                                        <h6 class="font-extrabold mb-0"> <?= $jumlah_ceri; ?></h6>
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
                                        <h6 class="text-muted font-semibold">Gabah</h6>
                                        <h6 class="font-extrabold mb-0"> <?= $jumlah_gabah; ?></h6>
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
                                        <h6 class="text-muted font-semibold">Beras</h6>
                                        <h6 class="font-extrabold mb-0"> <?= $jumlah_beras; ?></h6>
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
                                                <th>ID Inventori</th>
                                                <th>Jenis Kopi</th>
                                                <th>Jumlah Gabah</th>
                                                <th>Rendeman</th>
                                                <th>Jumlah Beras</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($inventori_gabah as $ig): 
                                                $selisih_gabah = $ig['gabah'] - $ig['beras'];
                                                $rendeman_gabah = round($selisih_gabah / $ig['gabah']*100) ;
                                            ?>

                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $ig['id_inventori_gabah']; ?></td>
                                                <td><?= $ig['jenis_kopi']; ?></td>
                                                <td><?= $ig['gabah']; ?> KG</td>
                                                <td><?= $rendeman_gabah; ?>%</td>
                                                <td>
                                                    <?php if ($ig['beras'] == 0 ):?>
                                                        <a 
                                                            href="javascript:;"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#beras<?= $ig['id_inventori_gabah']; ?>"
                                                            class="btn btn-sm btn-info">+
                                                        </a>
                                                    <?php else : ?>
                                                        <?= $ig['beras']; ?> KG
                                                    <?php endif;?>
                                                </td>
                                                <td>
                                                    <!-- <a href="" class="btn btn-sm btn-info">Edit</a> -->
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
<?php foreach($inventori_gabah as $ig): ?>
<div class="modal fade" id="beras<?= $ig['id_inventori_gabah']; ?>" tabindex="-1" role="dialog"
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
                            <form class="form" action="<?= base_url(); ?>P_inventori/T_inventori_gabah_beras/<?= $ig['id_inventori_gabah']; ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Masukan Jumlah Beras</label>
                                            <input type="number" id="beras" class="form-control"
                                                name="beras" placeholder="" required="">
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