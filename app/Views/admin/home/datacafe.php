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
                            <th>ID Kedai</th>
                            <th>Email Cafe</th>                     
                            <th>Name Cafe</th>
                            <th>Telp Cafe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                            <?php foreach ($kedai as $k): ?>
                        <tr>
                             
                            <th><?= $k['ID_KEDAI'] ?></th>                            
                            <td>
                            <?php
                            // cari user berdasarkan id_kedai dengan query builder
                            $db = \Config\Database::connect();
                            $user = $db->table('user')->where('id_kedai', $k['ID_KEDAI'])->get()->getRowArray();
                            // apakah idkedai sama dengan idkedai di tabel user
                            if($k['ID_KEDAI'] == $user['id_kedai']) {
                                echo $user['email'];
                            }
                            ?>
                            
                            </td>
                            <td><?= $k['NAMA_KEDAI'] ?></td>                            
                            <td><?= $k['TELP'] ?></td>       
                            <td>
                                <a onclick="deletekedaiconfirm(<?= $k['ID_KEDAI']?>)" class="btn btn-danger">Delete</a>
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
