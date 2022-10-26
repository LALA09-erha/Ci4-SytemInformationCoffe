<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Cafe</h1>
    <a  class="btn btn-primary">Click to change Information Cafe!</a>

</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-lg-6 col-md-6 mb-4">
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

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-lg-6 col-md-6 mb-4">
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
    
</div>

<!-- Content Row -->

<div class="row">

    <!-- Pie Chart -->
    
        <div class="col-lg-4">          
            <!-- Basic Card Example -->
            <div class="card shadow mb-4 justify-content-center text-center align-items-center">
                <div class="card-body">
                <img class="justify-content-center" width="200px" src="<?= base_url(
                    'assets/img/undraw_rocket.svg'
                ) ?>" alt="...">
                </div>
                <div class="card-header py-2">
                    <button id="clickme" class="btn btn-primary" onclick="changeImage();">Click to change image!</button>
                </div>
            </div>
        </div>
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
                    <p><?= $kedai['DESKRIPSI'] ?></p>
                    <h6 class="font-weight-bold">Alamat</h6>
                    <p><?= $kedai['ALAMAT'] ?></p>
                    <h6 class="font-weight-bold">jam</h6>
                    <p><a><?= $kedai['JAM_BUKA'] ?></a> | <a><?= $kedai[
    'JAM_TUTUP'
] ?></a></p>
                    <h6 class="font-weight-bold">Telepon</h6>
                    <p><?= $kedai['TELP'] ?></p>
                </div>
            </div>
        </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
    <?= $this->endSection() ?>
