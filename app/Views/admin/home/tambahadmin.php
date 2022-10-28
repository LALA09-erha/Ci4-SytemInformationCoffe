<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Menu</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
            <div class="text-center">
                            <form class="user" action="/prosesaddadmin" method="POST">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Admin" required>
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <input  class="form-control form-control-user" type="password" name="password" id="password" placeholder="Password Admin" required>
                                </div>
                                                               
                                <div class="form-group">
                                    <!-- submit -->
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Save
                                    </button>

                                </div>
                            </form>        
            </div>                
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection() ?>
