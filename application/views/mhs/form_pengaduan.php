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
                                    <label>Kategori</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="chosen-select-width" name="kategori" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($kategori as $k) {
                                            ?>
                                           <option value="<?php echo $k->id; ?>"><?php echo $k->kategori; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                    <label>Dosen</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="chosen-select-width" name="dosen" required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($dosen as $ds) {
                                            ?>
                                           <option value="<?php echo $ds->username; ?>"><?php echo $ds->nama; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                    <label>Subjek</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <textarea class="form-control" name="subjek" row="2" required=""></textarea>
                                </div>

                            <div class="form-group">
                            <label>Pengaduan</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                <textarea name="pengaduan" id="editor" rows="20" required=""></textarea><br/>
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