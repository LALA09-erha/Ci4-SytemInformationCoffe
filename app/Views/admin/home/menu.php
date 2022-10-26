<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Menu</h1>
    <div class="mb-4"><a href="" class="btn btn-primary">Add Menu</a></div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Category</th>
                            <th>Price</th>                           
                            <th>Action</th>                           
                        </tr>
                    </thead>
                    
                    <tbody>
                            <?php foreach ($menu as $m): ?>
                        <tr>
                             
                            <td><?= $m['NAMA_MENU'] ?></td>
                            <td><?php if ($m['ID_KATEGORI'] == 1) {
                                echo 'Food';
                            } else {
                                echo 'Drink';
                            } ?></td>
                            <td><?= $m['HARGA'] ?></td>       
                            <td><?= $m['ID_MENU'] ?></td>       
                            
                        </tr>                    
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?= $this->endSection() ?>
