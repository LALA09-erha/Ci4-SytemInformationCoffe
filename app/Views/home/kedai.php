<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content')?>


<!-- KEDAI -->
<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?= $title ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Cafes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Our Services</h5>
                    <h1 class="mb-5">Explore Our Services</h1>
                </div>
                <div class="row g-4">
                  <?php 
                  // Show Empty Data if data is empty
                  if(empty($kedai)){
                    echo '<div class="alert alert-info text-center" role="alert">
                          Kedai Kosong
                          </div>';
                  }
                  ?>

                  <?php foreach($kedai as $k) : ?>
                    <a href="/kedai/<?=  $k['slug'] ?>"  class="col-lg-4 col-sm-6 wow fadeInUp" style="display:block;">
                    <div data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                            <div class="p-3">
                                <img class="flex-shrink-0 img-fluid rounded" src="<?php
                                if($k['FOTO_KEDAI'] == null){
                                  echo base_url('assets/img/menu-5.jpg');
                                }else{
                                  echo base_url('imgcafe/'.$k['FOTO_KEDAI']);
                                }
                                  ?>" alt="" style="width: 100%;">
                                  
                                <h5><?= $k['NAMA_KEDAI'] ?></h5>
                                <p class="text-success">
                                  <!-- Show Information about open / closed  -->
                                  <?php 
                                    $open = $k['JAM_BUKA'];
                                    $close = $k['JAM_TUTUP'];
                                    $status = 'Close';
                                    if($open == "00:00:00" && $close == "00:00:00"){
                                      $status = 'Open 24 Jam';}
                                    
                                    else if($open <= date('H:i:s') && $close >= date('H:i:s')){
                                      $status = 'Open';
                                    }
                                    echo  $status;
                                    
                                  ?>

                                </p>
                                <p><?= substr(strval($k['DESKRIPSI']),0,20) . "..." ?></p>
                            </div>
                        </div>
                    </div>
                    </a>
                  <?php endforeach; ?>                     
                </div>
            </div>
        </div>
            <?php 
                //make pagination with php native function
                echo $pager->simpleLinks('kedai','coffe_pagination');
                ?>
        <!-- Service End -->

    <?= $this->endSection() ?>