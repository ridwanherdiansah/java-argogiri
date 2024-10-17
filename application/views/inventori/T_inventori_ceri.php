

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
                                                <th>Jumlah Ceri</th>
                                                <th>Rendeman</th>
                                                <th>Jumlah Gabah</th>
                                                <th>Rendeman</th>
                                                <th>Jumlah Beras</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach($inventori_ceri as $ic): 
                                                $selisih_ceri = $ic['ceri'] - $ic['gabah'];
                                                $rendeman_ceri = round($selisih_ceri / $ic['ceri']*100) ;
                                                
                                                $selisih_gabah = $ic['gabah'] - $ic['beras'];
                                                $rendeman_gabah = round($selisih_gabah / $ic['gabah']*100) ;
                                            ?>

                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $ic['id_inventori_ceri']; ?></td>
                                                <td><?= $ic['jenis_kopi']; ?></td>
                                                <td><?= $ic['ceri']; ?> KG</td>
                                                <td><?= $rendeman_ceri; ?>%</td>
                                                <td>
                                                    <?php if ($ic['gabah'] == 0 ):?>
                                                        <a 
                                                            href="javascript:;"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#gabah<?= $ic['id_inventori_ceri']; ?>"
                                                            class="btn btn-sm btn-info">+
                                                        </a>
                                                    <?php else : ?>
                                                        <?= $ic['gabah']; ?> KG
                                                    <?php endif;?>
                                                </td>
                                                <td><?= $rendeman_gabah; ?>%</td>
                                                <td>
                                                    <?php if ($ic['beras'] == 0 ):?>
                                                        <a 
                                                            href="javascript:;"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#beras<?= $ic['id_inventori_ceri']; ?>"
                                                            class="btn btn-sm btn-info">+
                                                        </a>
                                                    <?php else : ?>
                                                        <?= $ic['beras']; ?> KG
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
<?php foreach($inventori_ceri as $ic): ?>
<div class="modal fade" id="gabah<?= $ic['id_inventori_ceri']; ?>" tabindex="-1" role="dialog"
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
                            <form class="form" action="<?= base_url(); ?>P_inventori/T_inventori_ceri_gabah/<?= $ic['id_inventori_ceri']; ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="country-floating">Masukan Jumlah Gabah</label>
                                            <input type="number" id="gabah" class="form-control"
                                                name="gabah" placeholder="" required="">
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

<!--scrolling content Modal -->
<?php foreach($inventori_ceri as $ic): ?>
<div class="modal fade" id="beras<?= $ic['id_inventori_ceri']; ?>" tabindex="-1" role="dialog"
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
                            <form class="form" action="<?= base_url(); ?>P_inventori/T_inventori_ceri_beras/<?= $ic['id_inventori_ceri']; ?>" method="post">
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