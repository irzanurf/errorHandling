<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dosen</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <?= form_open_multipart('Admin/updateDosen');?>
                                
                                <div class="form-group">
                                    <label>NIP/Username</label>
                                    <input class="form-control" name="nip" value="<?= $dosen->username ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <input class="form-control" name="nama" value="<?= $dosen->nama ?>" required="">
                                </div>

                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input class="form-control" name="jabatan" value="<?= $dosen->jabatan ?>">
                                </div>

                                <div class="form-group">
                                    <label>Status Kepegawaian</label>
                                    <input class="form-control" name="status" value="<?= $dosen->status_pegawai ?>">
                                </div>

                                <div class="form-group">
                                    <label>Program Studi</label>
                                    <input class="form-control" name="prodi" value="<?= $dosen->prodi ?>">
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>