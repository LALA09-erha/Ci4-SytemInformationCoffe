<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Review</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Coment</th>                           
                            <th>Date</th>                           
                        </tr>
                    </thead>
                    
                    <tbody>
                            <?php foreach ($pesan as $p): ?>
                        <tr>
                             
                            <td><?= $p['NAMA_KOMENTATOR'] ?></td>
                            <td><?= $p['EMAIL_KOMENTATOR'] ?></td>
                            <td><?= $p['KOMEN'] ?></td>       
                            <td><?= $p['TANGGAL'] ?></td>       
                            
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
