<script>
function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('berat').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {
         document.getElementById('total').value = result;
         document.getElementById('total2').textContent = result;
      }
}
</script>




<div class="content-wrapper container">

    <!-- alert -->
    <?= $this->session->flashdata('message'); ?>
    
    <div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pembelian</h3>
            </div>
            <!-- <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb"> -->
                        <!-- Button trigger for BorderLess Modal -->
                            <!-- <a href="<?= base_url(); ?>Pembelian/Pembelian" type="button" class="btn btn-outline-primary block"  >
                                Simpan
                            </a> -->
                    <!-- </ol>
                </nav>
            </div> -->
        </div>
    </div>
    </div>
    <div class="page-content">

        <section class="section">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="Produk" data-bs-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Keranjang</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="Suplier" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Suplier</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        
                        <div class="tab-content" id="myTabContent">
                            <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="Produk"> -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="Produk">
                                <div class="col-12 col-lg-12">
                                    <div class="row">

                                        <?php foreach($jenis_pembelian as $jp): ?>
                                        <div class="col-xl-4 col-md-6 col-sm-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <h4 class="card-title"><?= $jp['nama']; ?></h4>
                                                    </div>
                                                    <img class="img-fluid w-100" src="<?= base_url(); ?>assets/images/samples/banana.jpg" alt="Card image cap">
                                                </div>
                                                <div class="card-footer d-flex justify-content-between">
                                                    <a class="btn btn-light-primary" 
                                                    href="javascript:;"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#pembelian<?= $jp['id']; ?>">
                                                        Keranjang
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach;?>
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
                                                                    <th>Jenis Pembelian</th>
                                                                    <th>Jenis Kopi</th>
                                                                    <th>Berat/KG</th>
                                                                    <th>Harga</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 1; ?>
                                                                <?php 
                                                                    $total_berat = 0;
                                                                    $total_harga = 0;
                                                                    $total_pembayaran = 0;
                                                                    if(isset($_SESSION['keranjang'])){ 

                                                                    foreach($_SESSION['keranjang'] as $key => $val):

                                                                    $total_berat = $total_berat + $_SESSION['keranjang'][$key]['berat'];
                                                                    $total_harga = $total_harga + $_SESSION['keranjang'][$key]['harga'];
                                                                    $total_pembayaran = $total_pembayaran + $_SESSION['keranjang'][$key]['total'];

                                                                  ?>
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td><?= $_SESSION['keranjang'][$key]['jenis_pembelian'] ?></td>
                                                                    <td><?= $_SESSION['keranjang'][$key]['jenis_kopi'] ?></td>
                                                                    <td><?= $_SESSION['keranjang'][$key]['berat'] ?></td>
                                                                    <td>Rp <?=number_format($_SESSION['keranjang'][$key]['harga'],2)?></td>
                                                                    <td>Rp <?=number_format($_SESSION['keranjang'][$key]['total'],2) ?></td>
                                                                    <td>

                                                                        <a 
                                                                            href="javascript:;"
                                                                            data-bs-toggle="modal" 
                                                                            data-bs-target="#edit<?= $key ?>"
                                                                            class="btn btn-warning rounded-pill">Edit
                                                                        </a>
                                                                        <a href="<?= base_url(); ?>P_pembelian/H_keranjang/<?= $key ?>" class="btn btn-danger rounded-pill">Hapus</a>


                                                                    </td>
                                                                </tr>
                                                                <?php $i++; ?>
                                                                <?php endforeach; }?>
                                                                <tr>
                                                                    <th colspan="3">Total Jumlah</th>
                                                                    <th><?= $total_berat; ?></th>
                                                                    <th>Rp <?=number_format($total_harga,2) ?></th>
                                                                    <th>Rp <?=number_format($total_pembayaran,2) ?></th>
                                                                    <th></th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </section>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="Produk"> -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="Suplier">
                        
                                <!-- // Basic multiple Column Form section start -->
                                <section id="multiple-column-form">
                                    <div class="row match-height">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Form Suplier</h4>
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
                                                                        <textarea type="text" id="memo" name="memo" class="form-control" required=""></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                    <div class="col-12 d-flex justify-content-end">
                                                                        <button type="submit" id="success" class="btn btn-primary me-1 mb-1">Masukan Ke keranjang</button>
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
                                <!-- // Basic multiple Column Form section end -->
                            </div>
                        </div>
                    
                    </div>
                    <div class="card-content">
                    </div>
                        
                </div>
            </div>
        </div>
    </section>
    </div>
</div>


<?php foreach($jenis_pembelian as $jp): ?>
<!--scrolling content pembelian Modal -->
<div class="modal fade" id="pembelian<?= $jp['id']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="ceriTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <form class="form" action="<?= base_url(); ?>P_pembelian/T_keranjang" method="post">
                        <div class="card-header">
                            <h4 class="card-title"><?= $jp['nama']; ?></h4>
                        </div>
                        <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Jenis Pembelian</label>
                                        <input type="text" id="jenis_pembelian" name="jenis_pembelian" class="form-control"
                                            placeholder="Jenis Pembelian" value="<?= $jp['nama']; ?>" required="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
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
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" id="success" class="btn btn-primary me-1 mb-1">Masukan Ke keranjang</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?>


<?php 
    if(isset($_SESSION['keranjang'])){ 

    foreach($_SESSION['keranjang'] as $key => $val):

?>
<!--scrolling content pembelian Modal -->
<div class="modal fade" id="edit<?= $key; ?>" tabindex="-1" role="dialog"
    aria-labelledby="ceriTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <form class="form" action="<?= base_url(); ?>P_pembelian/E_keranjang/<?= $key ?>" method="post">
                        <div class="card-header">
                            <h4 class="card-title"><?= $_SESSION['keranjang'][$key]['jenis_pembelian']; ?></h4>
                        </div>
                        <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Jenis Pembelian</label>
                                        <input type="text" id="jenis_pembelian" name="jenis_pembelian" class="form-control"
                                            placeholder="Jenis Pembelian" value="<?= $_SESSION['keranjang'][$key]['jenis_pembelian']; ?>" required="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
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
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="city-column">Harga</label>
                                        <input type="number" id="harga" class="form-control" placeholder="Harga/KG"
                                            name="harga" required="" value="<?= $_SESSION['keranjang'][$key]['harga']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Berat</label>
                                        <input type="number" id="berat" class="form-control"
                                            name="berat" placeholder="Berat" required="" value="<?= $_SESSION['keranjang'][$key]['berat']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" id="success" class="btn btn-primary me-1 mb-1">Masukan Ke keranjang</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; }?>

