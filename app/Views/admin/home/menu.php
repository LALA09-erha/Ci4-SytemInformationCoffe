<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Menu</h1>

    <?php if(!session()->get('idadmin')) :?>
    <div class="mb-4"><a onclick="location.href = '/add-menu'" class="btn btn-primary">Add Menu</a></div>
    <?php endif;?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <?php if(session()->get('idadmin')) :?>
                                <th>ID Kedai</th>                            
                            <?php endif; ?>
                            <th>Image</th>
                            <th>Menu</th>

                            <th>Category</th>
                            <th>Price</th>                           
                            <th>Action</th>                           
                        </tr>
                    </thead>
                    
                    <tbody>
                            <?php foreach ($menu as $m): ?>
                        <tr>
                             
                            <?php if(session()->get('idadmin')) :?>
                                <th><?= $m['ID_KEDAI'] ?></th>                            
                            <?php endif; ?>
                            <td><img src="imgmenu/<?= $m['FOTO_MENU'] ?>" style="width: 100px;" alt=""></td>
                            <td><?= $m['NAMA_MENU'] ?></td>
                            <td><?php if ($m['ID_KATEGORI'] == 1) {
                                echo 'Food';
                            } else {
                                echo 'Drink';
                            } ?></td>
                            <td><?= $m['HARGA'] ?></td>       
                            <td>
                            <?php if(!session()->get('idadmin')) :?>

                                <a href="/editmenu/<?= $m['ID_MENU']?>" class="btn btn-success">Edit</a>
                            <?php endif; ?>
                                <a onclick="deleteconfirm(<?= $m['ID_MENU']?>)" class="btn btn-danger">Delete</a>
                            </td>       
                            
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
