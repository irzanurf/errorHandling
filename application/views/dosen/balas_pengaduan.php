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
    <form action="<?= base_url('Dosen/balas');?>" method="post" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" value=<?= $view->id?>  >
                            </div>

                            <div class="form-group">
                                    <label>Kategori</label>
                                    <input class="form-control" value="<?= $view->kategori?>" readonly>
                            </div>
                                
                            <div class="form-group">
                                    <label>Pengirim</label>
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
                            
                            <br><h4>Balas Pesan Pengaduan</h4>
                            
                            <div class="form-group">
                                <label>Balas</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <textarea name="balas" id="editor1" rows="20" required=""></textarea>
                            </div>

                            <div class="form-group"> 
								<label for="exampleInputFile">File Lampiran</label><br> 
								<input type="file" name="file" > <br>
                                <label style="color:red; font-size:12px;">maks 10mb</label>
                            </div> 

                            <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>

            <script>
                        CKEDITOR.replace( 'editor' );
            </script>

            <script>
                        CKEDITOR.replace( 'editor1' );
            </script>