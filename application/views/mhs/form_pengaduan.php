<style>
.ck-editor__editable_inline {
    min-height: 250px;
}
</style>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Pengaduan</h3></div>
                        <div class="row"><br>
        <div class="col-lg-8" style="float:none;margin:auto;">
        </div>
    </div>
    <div class="col-lg-8" style="float:none;margin:auto;">
    <!-- /.row -->
    <form action="<?= base_url('Mhs/add_pengaduan');?>" method="post" enctype="multipart/form-data">
                                
                            <div class="form-group">
                                    <label>Dosen</label>
                                    <select class="chosen-select-width" name="dosen" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?> - <?php echo $ds->prodi; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                    <label>Subjek</label>
                                    <textarea class="form-control" name="subjek" row="2" required=""></textarea>
                                </div>

                            <div class="form-group">
                            <label>Pengaduan</label>
                                <textarea name="pengaduan" id="editor" rows="20" required=""></textarea><br/>
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