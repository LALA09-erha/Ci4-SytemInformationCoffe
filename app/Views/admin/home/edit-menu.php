<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Menu</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
            <div class="text-center">
                            <form class="user" action="/proseseditmenu" method="POST" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="namamenu" name="namamenu" value="<?= $menu['NAMA_MENU']?>" placeholder="Menu" required>
                                    </div>
                                    <input type="text" id="idkedai" name="idkedai" hidden value="<?= $menu['ID_KEDAI']?>">
                                    <input type="text" id="idmenu" name="idmenu" hidden value="<?= $menu['ID_MENU']?>">
                                    <div class="col-sm-6">
                                        <select class="form-control" id="kategori" name="kategori" required>
                                            <option value="0" >Choose Category</option>
                                            <option value="1" <?= ($menu['ID_KATEGORI'] =='1')? 'selected' :'' ?>>Food</option>
                                            <option value="2" <?= ($menu['ID_KATEGORI'] =='2')? 'selected' :'' ?>>Drink</option>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input  class="form-control form-control-user"  name="harga" id="harga" value="<?= $menu['HARGA']?>" placeholder="Price" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="file" class="form-control form-control-user" id="gambarmenu" name="gambarmenu" placeholder="Foto">
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
