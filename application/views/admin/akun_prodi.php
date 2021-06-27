<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Akun Dosen</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Admin/changePass');?>
                                
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username" value="<?= $prodi->username ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <input class="form-control" name="nama" value="<?= $prodi->prodi ?>" disabled>
                                </div>
                                
                                
                                <h3>Ganti Password</h3>
                                <div class="form-group"><label>Password Baru</label><input class="form-control" type="password" name="pass" id="txtPassword"  ></div>
                                <div class="form-group"><label>Ulangi Password</label><input class="form-control" type="password" name="re" id="txtConfirmPassword"  ></div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="username" value="<?= $prodi->username ?>">
                                </div>
                                <div class="form-group">
                                <button id="btnSubmit" type="submit" class="btn btn-success" onclick="return Validate()">Submit</button>
                                </div>
                                

                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>

        <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>