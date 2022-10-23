<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content')?>

<section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?= base_url('assets/images/bg_3.jpg') ?>);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread"><?= $title ?></h1>							
	            <p class="breadcrumbs"><span class="mr-2"><a href="/kedai">Cafe</a></span> <span>Cafe Detail</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?= base_url('assets/images/menu-2.jpg') ?>" class="image-popup"><img src="<?= base_url('assets/images/menu-2.jpg') ?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?= $kedai['NAMA_KEDAI'] ?></h3>
    				<p class="price"><span><?php 
                  		//make open/close time with $k=>JAM_BUKA & $k=>JAM_TUTUP
                  		$open = $kedai['JAM_BUKA'];
                  		$close = $kedai['JAM_TUTUP'];
                  		$status = 'Close';
                  		if($open == "00:00:00" && $close == "00:00:00"){
                  		  $status = 'Open 24 Jam';}
						
                  		else if($open <= date('H:i:s') && $close >= date('H:i:s')){
                  		  $status = 'Open';
                  		}
                  		echo '<div><a href="/kedai/'.$kedai['slug']. '">'. $status .'</a></div>';
					
                  	?></span></p>
              		<h6 class="ftco-heading-2 text-light">Deskripsi</h6>
					  <p><?= $kedai['DESKRIPSI'] ?></p>
					  <h6 class="ftco-heading-2 text-light">Alamat</h6>
					  <p><?= $kedai['ALAMAT'] ?></p>
					  <h6 class="ftco-heading-2 text-light">No Telepon</h6>
					  <p><?= $kedai['TELP'] ?></p>
					  <h6 class="ftco-heading-2">Untuk Pemesan Delivery</h6>
					  <p><?= $kedai['TELP'] ?></p>
					
					
	          	</div>
			</div>
    	</div>
    </section>

	<section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Details</span>
            <h2 class="mb-4">Our Cafe</h2>
            <p>Menu - Menu dan Review tentang Cafe Kita</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Menu</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Review</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
							<?php foreach ($menu as $m) : ?>
		              		<div class="col text-center">
		              			<div class="menu-wrap justify-content-center">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(<?=base_url('assets/images/dish-1.jpg') ?> ); width:250px"></a>
		              				<div class="text-center justify-content-center">
		              					<h3><a href="#"><?= $m['NAMA_MENU'] ?></a></h3>
										  <p><?php 
										 		if($m['ID_KATEGORI'] == 1){
										 			echo "Makanan";
												}else{
													echo "Minuman";
												}
										  ?></p>
		              					<p class="price"><span><?= $m['HARGA'] ?></span></p>
		              					<p><a href="#" class="btn btn-primary btn-outline-primary">Add to cart</a></p>
		              				</div>
		              			</div>
		              		</div>
							<?php endforeach; ?>


		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab" >
						<div class="row">
							<div class="col">
								<?php foreach ($komen as $ko): ?>
								<div class="blog-entry ">
									<div class="text">
										<div class="meta">
											<div><a><?= $ko['EMAIL_KOMENTATOR'] ?></a></div>
											<div><a><?= $ko['TANGGAL'] ?></a></div>
										</div>
										<h3 class="heading mt-2"><a><?= $ko['NAMA_KOMENTATOR'] ?></a></h3>
										<p class="text-light"><?= $ko['KOMEN'] ?></p>
										<hr class="bg-light">
									</div>
								</div>
								<?php endforeach; ?>				
							</div>					
							</div>				
		              </div>

		              
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>
	<?= $this->endSection() ?>