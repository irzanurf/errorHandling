<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ingin melakukan Log Out?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Log Out" apabila Anda ingin mengakhiri season.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('welcome/logout');?>">Log Out</a>
                </div>
            </div>
        </div>
    </div>

<footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Universitas Diponegoro 2021</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

    <script src="<?= base_url('assets/main/vendor/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/main/js/demo/datatables-demo.js');?>"></script>
    <script src="<?= base_url('assets/searchable/docsupport/jquery-3.2.1.min.js');?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/searchable/chosen.jquery.js');?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/searchable/docsupport/prism.js');?>" type="text/javascript" charset="utf-8"></script>
    <script src="<?= base_url('assets/searchable/docsupport/init.js');?>" type="text/javascript" charset="utf-8"></script>

    <script src="<?= base_url('assets/main/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery-easing/jquery.easing.min.js');?>"></script>
    

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/main/js/sb-admin-2.min.js');?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/main/vendor/chart.js/Chart.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/main/js/demo/chart-area-demo.js');?>"></script>
    <script src="<?= base_url('assets/main/js/demo/chart-pie-demo.js');?>"></script>


    
</body>

</html>