
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Program Studi</h1>
                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addForm"> <i class="fa fa-plus"></i> Tambah</button>
                        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Program Studi</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    foreach($dep as $d) { ?>
                                        <tr>
                                            <td><?= $d->prodi ?></td>
                                            <td><?= $d->username ?></td>
                                            <td>
                                                <form style="display:inline-block;" method="post" action="<?= base_url('admin/akun_prodi');?>">
                                                <input type='hidden' name="username" value="<?= $d->username ?>">
                                                <button type="Submit" class="btn btn-primary">
                                                Akun
                                                </button>
                                                </form>

                                                <button type="button" style="display:inline-block;" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $d->username?>">
                                                Edit
                                                </button>

                                                <form style="display:inline-block;" method="post" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?');" action="<?= base_url('admin/delete_prodi');?>">
                                                <input type='hidden' name="username" value="<?= $d->username ?>">
                                                <button type="Submit" class="btn btn-danger">
                                                Hapus
                                                </button>
                                                </form>
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
<!-- modal tambah -->
<div class="modal fade" id="addForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form role="form" method="post" action="<?= base_url('admin/addProdi');?>">
                <div class="modal-body">
                <label>Program Studi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <input class="form-control" name="prodi" required=""><br>
                <label>Username</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <input class="form-control" name="username" required=""><br>
                <label>Password</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <input class="form-control" type="password" name="password" required=""><br>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>

<!-- modal edit -->
<?php 
    foreach ($dep as $d) :
    $id=$d->username;
?>
<div class="modal fade" id="edit<?= $id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form role="form" method="post" action="<?= base_url('admin/updateProdi');?>">
                <div class="modal-body">
                <label>Program Studi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <input class="form-control" type="text" name="prodi" value="<?=$d->prodi?>" required=""><br>
                <label>Username</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                <input class="form-control" name="username" value="<?=$d->username?>" required=""><br>
                <input type="hidden" class="form-control" name="id" value=<?=$id?>  >
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <?php endforeach;?>
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