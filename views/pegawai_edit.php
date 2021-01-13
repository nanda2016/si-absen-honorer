<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Pegawai</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nama Pegawai</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" value="<?= $data['nama'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-Pilih jenis kelamin</option>
                                    <option value="Laki laki">Laki laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" name="tempat_lahir" class="form-control" id="inputEmail3" value="<?= $data['tempat_lahir'] ?>" required>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label for="tgl_masuk" class="col-sm-3 control-label">Tanggal Lahir</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_lahir" class="form-control" id="inputEmail3" value="<?= $data['tgl_lahir'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" name="alamat" class="form-control" id="inputEmail3" value="<?= $data['alamat'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">No Telepon</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_telpon" class="form-control" id="inputEmail3" value="<?= $data['no_telpon'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Pegawai</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=pegawai&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Pegawai
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
    $nama = $_POST['nama'];
    $jenis_kel = $_POST['jenis_kelamin'];
    $tmp_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $no_telpon = $_POST['no_telpon'];
    //buat sql
    $sql="UPDATE pegawai SET nama='$nama',jenis_kelamin='$jenis_kel',tempat_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',no_telpon='$no_telpon' WHERE id_pegawai ='$id'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=pegawai&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



