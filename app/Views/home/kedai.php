<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content')?>


<!-- KEDAI -->
<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(assets/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread"><?= $title ?></h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span><?= $title ?></span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
        <?php 
        // if kedai is empty
        if(empty($kedai)){
          echo '<div class="alert alert-info text-center" role="alert">
                Kedai Kosong
                </div>';
        }
        ?>

          <?php foreach($kedai as $k) : ?>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry align-self-stretch">
              <a href="/kedai/<?= $k['slug'] ?>" class="block-20" style="background-image: url('assets/images/image_1.jpg'); width:300px;">
              </a>
              
              <div class="text py-4 d-block">
              	<div class="meta">
                  <?php 
                  //make open/close time with $k=>JAM_BUKA & $k=>JAM_TUTUP
                  $open = $k['JAM_BUKA'];
                  $close = $k['JAM_TUTUP'];
                  $status = 'Close';
                  if($open == "00:00:00" && $close == "00:00:00"){
                    $status = 'Open 24 Jam';}
                  
                  else if($open <= date('H:i:s') && $close >= date('H:i:s')){
                    $status = 'Open';
                  }
                  echo '<div><a href="/kedai/'.$k['slug']. '">'. $status .'</a></div>';
                  
                  ?>
                </div>
                <h3 class="heading mt-2"><a href="/kedai/<?= $k['slug'] ?>"><?= $k['NAMA_KEDAI'] ?></a></h3>
                <p><?= substr(strval($k['DESKRIPSI']),0,20) . "..." ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <?php 
                //make pagination with php native function
                echo $pager->simpleLinks('kedai','kopi_pagination');
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?= $this->endSection() ?>