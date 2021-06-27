<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<style>
.hide {
    visibility: hidden;
}
</style>
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
                                    <label>Program Studi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <div class="input-group control-group after-add-more">
                                    <select class="form-control form-control-user" id="selectpicker" name="prodi[]" >
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($prodi as $p) {
                                            ?>
                                           <option value="<?php echo $p->id; ?>"><?php echo $p->prodi; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-success add-more" id="btnadd" type="button"><i class="fa fa-plus"></i> Add</button>
                                </div>
                                </div>
                                <?php 
                        foreach($nilai_prodi as $n=>$val){?>
                            <div class="control-group input-group" style="margin-top:10px">
                                <input class="form-control id-prodi" type="hidden" name="prodi[]" value="<?=$val->prodi?>" >
                                <input class="form-control nama-prodi" value="<?=$val->prod?>" readonly>
                            
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"> Remove</button>
                                    </div>
                                </div>

                    <?php }?>

                                <div class="copy hide" >
                                <div class="control-group input-group" style="margin-top:10px">
                                <input type="hidden" class="form-control id-prodi" name="prodi[]" hidden>
                                <input class="form-control nama-prodi"  readonly>
                                
                                    <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"> Remove</button>
                                    </div>
                                </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>

   
    <!-- /.row -->
                                </div>
</div>
        </div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#selectpicker1').on('change', function(){
            $('#btnadd').prop('disabled', false);
            
     
    });

    $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });

    $("#btnadd").on('click',function(){ 
                var temp = $(".copy.hide").clone(true); 
                $('.nama-prodi', temp).val($('#selectpicker option:selected').text());
                $('.id-prodi', temp).val($('#selectpicker').val());
                $(temp).removeClass("hide");
          $(".after-add-more").after(temp);
          $('#selectpicker').val(""); 
      });
        })
      
    </script>