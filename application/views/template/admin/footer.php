            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                    href="http://ahmadsaugi.com">A. Saugi</a></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= base_url(); ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="<?= base_url(); ?>assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/dashboard.js"></script>

    <script src="<?= base_url(); ?>assets/js/pages/ui-apexchart.js"></script>

    <script src="<?= base_url(); ?>assets/js/pages/horizontal-layout.js"></script>

    <script src="<?= base_url(); ?>assets/vendors/simple-datatables/simple-datatables.js"></script>

    <script>
        // Simple Datatable
        let tabel_suplier = document.querySelector('#tabel_suplier');
        let dataTable = new simpleDatatables.DataTable(tabel_suplier);
    </script>

    <!-- Include Choices JavaScript -->
    <script src="<?= base_url(); ?>assets/vendors/choices.js/choices.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/form-element-select.js"></script>

    <script src="<?= base_url(); ?>assets/js/extensions/sweetalert2.js"></script>
    <script src="<?= base_url(); ?>assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

</body>

</html>
