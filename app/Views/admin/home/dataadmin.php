<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Menu</h1>
    <div class="mb-4"><a onclick="location.href = '/add-admin'" class="btn btn-primary">Add Admin</a></div>

  
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Admin</th>                     
                            <th>Email Admin</th>                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                            <?php foreach ($admin as $a): ?>
                        <tr>
                             
                            <th><?= $a['ID_ADMIN'] ?></th>                                                       
                            <td><?= $a['email'] ?></td>                            
                            <td>
                                <a onclick="deleteadminconfirm(<?= $a['ID_ADMIN']?>)" class="btn btn-danger">Delete</a>
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
