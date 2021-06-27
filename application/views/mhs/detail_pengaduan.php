<style>
.ck-editor__editable_inline {
    min-height: 250px;
}
</style>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Detail Pengaduan</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
                            <div class="form-group">
                                    <label>Kategori</label>
                                    <input class="form-control" value="<?= $view->kategori?>" readonly>
                            </div>

                            <div class="form-group">
                                    <label>Dosen</label>
                                    <input class="form-control" value="<?= $view->nama?>" readonly>
                            </div>

                            <div class="form-group">
                                    <label>Subjek</label>
                                    <textarea class="form-control" name="subjek" row="2" readonly><?= $view->subjek?></textarea>
                            </div>

                            <div class="form-group">
                            <label>Pengaduan</label>
                                <textarea name="pengaduan" id="editor" rows="20" readonly><?= $view->pesan?></textarea>
                            </div>

                            <?php if (!empty($view->file_kirim)) : ?>
                            <div class="form-group"> 
								<label for="exampleInputFile">File Lampiran</label><br> 
								<button method="post" onclick=" window.open('<?= base_url('assets/kirim');?>/<?=$view->file_kirim?>', '_blank'); return false;" class="btn btn-primary-outline"><img src="<?= base_url('assets/attach.png');?>" alt="attach" width="50" height="50"/></button>
                            </div> 

                            <?php else : ?>

                            <?php endif; ?>


   
    <!-- /.row -->
                                </div>
</div>
        </div>

            <script>
                        CKEDITOR.replace( 'editor' );
            </script>