<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Pengaduan</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/main/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/main/css/sb-admin-2.min.css');?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style=" background: url(<?php echo base_url('assets/front.png'); ?>); "></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <div class="text-justify">
                                        <span>Silahkan mengisi form dibawah ini untuk melakukan pengaduan, apabila sudah pernah melakukan pengisian silahakn login <a href="<?= base_url('Welcome/login');?>">disini</a></span>
                                    </div><br>
                                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');}?>
                                    <form action="<?= base_url('Welcome/submit');?>" method="post" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                        <label>Nama</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <input class="form-control form-control-user" name="nama" required="">
                                </div>
    
                                <div class="form-group">
                                        <label>NIM</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <input class="form-control form-control-user" name="nim" required="">
                                </div>

                                <div class="form-group">
                                    <label>Program Studi</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                    <select class="form-control form-control-user" name="prodi"  required="">
                                        <option value="">Please Select</option>
                                        <?php
                                        foreach ($prodi as $p) {
                                            ?>
                                           <option value="<?php echo $p->id; ?>"><?php echo $p->prodi; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
    
                                <div class="form-group">
                                        <label>Email</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <input class="form-control form-control-user" name="email" required="">
                                </div>
    
                                <div class="form-group">
                                        <label>No. HP</label><label style="color:red; font-size:12px;"> (*Wajib diisi)</label>
                                        <input type="number" class="form-control form-control-user" name="hp" required="">
                                </div>
    
                                <div class="form-group text-center">
                                    <button type="submit" id="submit" class="btn btn-success">Submit</button>
                                </div>
                                </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/main/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/main/js/sb-admin-2.min.js');?>"></script>

</body>

</html>