<?= $this->extend('admin\home\template\basea') ?>

<?= $this->section('content') ?>
<!-- Begin Page Content -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Information Cafe</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
            <div class="text-center">
                            <form class="user" action="/prosesinfo" method="POST">
                                <?= csrf_field() ?>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Name" value="<?= $kedai['NAMA_KEDAI'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="<?= ($kedai['ALAMAT']==null)? 'Alamat belum Diatur' : $kedai['ALAMAT'] ?>" value="<?= $kedai['ALAMAT'] ?>" >                                            
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input  class="form-control form-control-user"  name="deskripsi" id="deskripsi" placeholder="<?= ($kedai['DESKRIPSI']==null)? 'Deskripsi belum Diatur' : $kedai['DESKRIPSI'] ?>" value="<?= $kedai['DESKRIPSI'] ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="jambuka">Jam Buka</label>
                                        <input type="time" id="jambuka" name="jambuka" >
                                        <input type="text" class="form-control form-control-user"   placeholder="<?= ($kedai['JAM_BUKA']==null)? 'Jam belum Diatur' : $kedai['JAM_BUKA'] ?>" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="jamtutup">Jam Tutup</label>
                                        <input type="time"id="jamtutup" name="jamtutup" >
                                        <input type="text" class="form-control form-control-user"
                                         placeholder="<?= ($kedai['JAM_TUTUP']==null)? 'Jam belum Diatur' : $kedai['JAM_TUTUP'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input  class="form-control form-control-user"  name="telepon" id="telepon" placeholder="<?= ($kedai['TELP']==null)? 'No Telepon belum Diatur' : $kedai['TELP'] ?>" value="<?= $kedai['TELP'] ?>">                                                                         
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
