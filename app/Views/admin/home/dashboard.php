<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Cafe</h1>
    <?php if(!session()->get('idadmin')) :?>
    <button  onclick="location.href = '/info'" class="btn btn-primary">Click to change Information Cafe!</button>
    <?php endif;?>

</div>

<!-- Content Row -->
<div class="row">

    <!-- JUMLAH MENU -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Menu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            //menghitung jumlah menu
                            $jumlahMenu = count($menu);
                            echo $jumlahMenu . ' Menu';
                            ?>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hamburger fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JUMLAH SEMUA REVIEW -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Review</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            //menghitung jumlah review
                            $jumlahReview = count($pesan);
                            echo $jumlahReview . ' Review';
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-comment fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JUMLAH KEDAI -->
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Jumlah Kedai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                            //menghitung jumlah review
                            $jumlahKedai = count($kedai);
                            echo $jumlahKedai . ' Kedai';
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-home fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

<!-- Content Row -->

<div class="row">

    <!-- Pie Chart -->
    
                <?php 
                     if(!session()->get('idadmin')):
                     ?>
        <div class="col-lg-4">          
            <!-- Basic Card Example -->
            <div class="card shadow mb-4 justify-content-center text-center align-items-center">
                <div class="card-body">
                <img class="justify-content-center" width="200px" src="<?php 
                if($kedai['FOTO_KEDAI'] == null){
                    echo base_url('assets/img/undraw_rocket.svg');
                }else{
                    echo base_url('imgcafe/'.$kedai['FOTO_KEDAI']);} ?>" >
                </div>
                <div class="card-header py-2">
                    <!-- BUTTON MODAL -->
                    <a class="btn btn-primary" data-toggle="modal" data-target="#file">Click to change image!</a>
                </div>
            </div>
        </div>
        <?php endif; ?>

         <!-- MODAL LOGOUT -->
         <div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload File?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/imagecafe" id="upload" method="POST" enctype="multipart/form-data">
                                <?php csrf_field() ?>
                                <input type="file" required name="gambarcafe" id="gambarcafe">

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" for='upload' type="submit" >Submit</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
                <!-- END MODAl -->
                    <?php 
                     if(!session()->get('idadmin')):
                     ?>
        <div class="col-lg-8">          
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-2 bg-gradient-warning">
                    <h6 class="m-0 font-weight-bold text-primary ">Information About Cafe</h6>
                </div>
                <div class="card-body">
                    <h6 class="font-weight-bold">Cafe Name</h6>
                    <p><?= $kedai['NAMA_KEDAI'] ?></p>
                    <h6 class="font-weight-bold">Deskripsi</h6>
                    <p><?php if ($kedai['DESKRIPSI'] == null) {
                        echo 'Belum ada deskripsi';
                    } else {
                        echo $kedai['DESKRIPSI'];
                    } ?></p>
                    <h6 class="font-weight-bold">Alamat</h6>
                    <p><?php if ($kedai['ALAMAT'] == null) {
                        echo 'Belum ada alamat';
                    } else {
                        echo $kedai['ALAMAT'];
                    } ?></p>
                    <h6 class="font-weight-bold">jam</h6>
                    <p><a><?php if ($kedai['JAM_BUKA'] == null) {
                        echo 'Jam Buka dan Tutup Belum diatur';
                    } else {
                        echo $kedai['JAM_BUKA'] .
                            ' </a> | <a> ' .
                            $kedai['JAM_TUTUP'];
                    } ?></a></p>
                    <h6 class="font-weight-bold">Telepon</h6>
                    <p><?php if ($kedai['TELP'] == null) {
                        echo 'Belum ada nomor telepon';
                    } else {
                        echo $kedai['TELP'];
                    } ?></p>
                </div>
            </div>
        </div>
                    <?php 
                        endif;
                    ?>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    <?= $this->endSection() ?>
