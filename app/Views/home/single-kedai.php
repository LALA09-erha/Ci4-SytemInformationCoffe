<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content') ?>
<!-- About Start -->
<div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown"><?= $title ?></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/kedai">Cafes</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Cafe Details</li>
                        </ol>
                    </nav>
					<span class="subheading"><?php if (session()->getFlashdata('pesan')) {
         echo '<div class="alert alert-primary" role="alert">' .
             session()->getFlashdata('pesan') .
             '</div>';
     } ?></span>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

<div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="<?= base_url(
                                    'assets/img/about-1.jpg'
                                ) ?>">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="<?= base_url(
                                    'assets/img/about-2.jpg'
                                ) ?>" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="<?= base_url(
                                    'assets/img/about-3.jpg'
                                ) ?>">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="<?= base_url(
                                    'assets/img/about-4.jpg'
                                ) ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Cafe</h1>
                        <p class="mb-4"><?= $kedai['DESKRIPSI'] ?></p>
                        <p class="mb-4"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?= $kedai[
                            'ALAMAT'
                        ] ?></p>
                        <p class="price"><span><?php
                        //make open/close time with $k=>JAM_BUKA & $k=>JAM_TUTUP
                        $open = $kedai['JAM_BUKA'];
                        $close = $kedai['JAM_TUTUP'];
                        $status = 'Close';
                        if ($open == '00:00:00' && $close == '00:00:00') {
                            $status = 'Open 24 Jam';
                        } elseif (
                            $open <= date('H:i:s') &&
                            $close >= date('H:i:s')
                        ) {
                            $status = 'Open';
                        }
                        echo '<div><a href="/kedai/' .
                            $kedai['slug'] .
                            '">' .
                            $status .
                            '</a></div>';
                        ?></span></p>
						<h6 class="ftco-heading-2 text-dark">No Telepon</h6>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
								<h1 class="mb-1"><i class="fa fa-phone text-primary me-2"></i></h1>
								    <div class="ps-4">
                                        <p class="mb-0">Our Phone</p>
                                        <h6 class="text-uppercase mb-0"><?= $kedai[
                                            'TELP'
                                        ] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
								<h1 class="mb-1"><i class="fa fa-motorcycle text-primary me-2"></i></h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Delivery</p>
                                        <h6 class="text-uppercase mb-0"><?= $kedai[
                                            'TELP'
                                        ] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Details</h5>
                    <h1 class="mb-5">Our Cafe</h1>
                </div>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Food and Drink</small>
                                    <h6 class="mt-n1 mb-0">Menu</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-bookmark fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Review</small>
                                    <h6 class="mt-n1 mb-0">About Us</h6>
                                </div>
                            </a>
                        </li>
						<li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-comments fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Make a</small>
                                    <h6 class="mt-n1 mb-0">Review</h6>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
								<div class="owl-carousel testimonial-carousel">
                                    <?php
                                    // jika data menu kosong
                                    if(empty($menu)){
                                        echo '<div class="text-center">Data menu kosong</div>';
                                    }
                                    ?>
								<?php foreach ($menu as $m): ?>
                                    <div class="testimonial-item  d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded-circle" src="
                                        <?php 
                                        if($m['FOTO_MENU'] == null){
                                            echo base_url('assets/img/menu-1.jpg');
                                        }else{
                                           echo base_url('imgmenu/'.$m['FOTO_MENU']);} ?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?= $m[
                                                    'NAMA_MENU'
                                                ] ?></span>
                                                <span class="text-primary">Rp<?= $m[
                                                    'HARGA'
                                                ] ?></span>
                                            </h5>
											<p><?php if ($m['ID_KATEGORI'] == 1) {
               echo 'Makanan';
           } else {
               echo 'Minuman';
           } ?></p>
                                        </div>
                                    </div>       
								<?php endforeach; ?>									                             
                            	</div>
                        </div>

                        <div id="tab-2" class="tab-pane fade show p-0">
                            <?php 
                             // jika tidak ada review
                                if (empty($komen)) {
                                    echo '<div class="text-center">
                                    <h1 class="mb-5">Belum ada review</h1>
                                    </div>';
                                }
                             ?>
							<div class="owl-carousel testimonial-carousel">
							<?php foreach ($komen as $ko): ?>

								<div class="testimonial-item bg-transparent border rounded p-4">
									<i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
									<p><?= $ko['KOMEN'] ?></p>
										<div class="ps-1 align-items-center">
											<h5 class="mb-1"><?= $ko['NAMA_KOMENTATOR'] ?></h5>
											<small><?= $ko['EMAIL_KOMENTATOR'] ?></small><br>
											<small style="font-size: 9px;"><?= $ko['TANGGAL'] ?></small>
										</div>
									
								</div>
							<?php endforeach; ?>
							</div>
                        </div>
						<div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-12  align-items-center">
									<div class="col bg-dark  justify-content-center">
										<div class="p-5">
											<h5 class="section-title ff-secondary text-start text-primary fw-normal">Review</h5>
											<h1 class="text-white mb-4">Form A Table Online</h1>
											<form action="/prosesreview" method="POST">
												<?= csrf_field() ?>
												<div class="row g-3">
													<div class="col-md-6">
														<div class="form-floating">
															<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
															<label for="name">Your Name</label>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-floating">
															<input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
															<label for="email">Your Email</label>
														</div>
													</div>													
													<div class="col-12">
														<div class="form-floating">
															<textarea class="form-control" placeholder="Special Request" id="message" name="komen" style="height: 100px" required></textarea>
															<label for="message">Special Request</label>
														</div>
													</div>
													<input type="hidden" name="id_kedai" value="<?= $kedai['ID_KEDAI'] ?>">
													<div class="col-12">
														<button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
													</div>
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
        </div>
        <!-- Menu End -->
	<?= $this->endSection() ?>
