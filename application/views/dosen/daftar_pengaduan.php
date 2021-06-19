                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">List Daftar Pengaduan</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tgl Pengaduan</th>
                                            <th>Pengirim</th>
                                            <th>Subjek</th>
                                            <th style="text-align:center">status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    foreach($view as $v) { 
                                        $tgl_kirim = date('d-m-Y', strtotime($v->tgl_kirim));?>
                                        <tr>
                                            <td><?= $tgl_kirim ?></td>
                                            <td><?= $v->nama ?></td>
                                            <td><?= $v->subjek ?></td>
                                            <td style="text-align:center">
                                                <?php if(($v->status==0)): ?>
                                                    <img src="<?= base_url('assets/new.png');?>" alt="new" width="30" height="30"/>
                                                <?php elseif(($v->status==1)): ?>
                                                    <img src="<?= base_url('assets/open.png');?>" alt="open" width="30" height="30"/>
                                                <?php elseif(($v->status==2)): ?>
                                                    <img src="<?= base_url('assets/received.png');?>" alt="received" width="30" height="30"/>
                                                <?php else : ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                
                                            <?php if (($v->balasan)=="" || ($v->balasan)==0 || ($v->balasan)==NULL) :?> 
                                                <form style="display:inline-block;" method="post" action="<?= base_url('Dosen/balas_pengaduan');?>">
                                                <input type='hidden' name="id" value="<?= $v->id ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                Balas
                                                </button>
                                                </form>
                                            <?php else : ?>
                                                <form style="display:inline-block;" method="post" action="<?= base_url('Dosen/detail_pengaduan');?>">
                                                <input type='hidden' name="id" value="<?= $v->id ?>">
                                                <button type="Submit" class="btn btn-success">
                                                Detail
                                                </button>
                                                </form>
                                            <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
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

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/main/js/sb-admin-2.min.js');?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/main/vendor/datatables/jquery.dataTables.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/datatables/dataTables.bootstrap4.min.js');?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/main/js/demo/datatables-demo.js');?>"></script>

</body>

</html>