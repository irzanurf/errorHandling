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
                                    <label>Pengirim</label>
                                    <input class="form-control" value="<?= $view->nama?>" readonly>
                            </div>

                            <div class="form-group">
                                    <label>Subjek</label>
                                    <textarea class="form-control" name="subjek" row="2" readonly><?= $view->subjek?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Pengaduan</label>
                                <textarea name="pengaduan" id="editor" rows="20" readonly><?= $view->pesan?></textarea><br/>
                                </div>
                            
                            <h4>Balas Pesan Pengaduan</h4>
                            
                            <div class="form-group">
                                <label>Balas</label>
                                <textarea name="balas" id="editor1" rows="20" readonly><?= $view->balasan?></textarea><br/>
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