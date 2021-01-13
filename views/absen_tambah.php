<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Absen</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal row g-3" method="post">
                        <div class="col-auto">
                            <label for="no_rak" class="col-sm-3 control-label">Id Pegawai</label>
                            <div class="col-sm-3">
                                <input type="number" name="id" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Induk Siswa" required>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name='post1' class="btn btn-primary col-sm-1" style="margin-top:0px">Cari</button>
                        </div>
                    </form>
                    <br>
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" method="post">
                                <?php
                                    setlocale(LC_ALL, 'id-ID', 'id_ID');
                                    if(isset($_POST['post1'])){
                                        if(isset($_POST['id'])){
                                            $sql = "SELECT *FROM pegawai WHERE id_pegawai ='" . $_POST['id'] . "'";
                                            //proses query ke database
                                            $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                                            //Merubaha data hasil query kedalam bentuk array
                                            $data = mysqli_fetch_array($query);
                                            if (isset($data)){
                                                $data_siswa = $data['nama'];
                                            }else{
                                                $data_siswa = "Data tidak ditemukan!";
                                            }
                                        }
                                    }
                                ?>
						<div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Nama Pegawai</label>
                            <div class="col-sm-6">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" <?php if(isset($_POST['id'])) echo 'value="'.$data_siswa.'"' ?> readonly placeholder="Nama Pegawai">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="tglPinjam" class="col-sm-3 control-label">Tanggal</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="inputEmail3" value="<?= strftime('%A %d %B %Y') ?>" readonly>
                            </div>
                        </div>

						<div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">Kehadiran</label>
                            <div class="col-sm-3">
                                <p><input type="radio" name="hadir" value="Hadir"> Hadir</p>
                                <p><input type="radio" name="hadir" value="Tidak Hadir"> Tidak Hadir</p>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="ket" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-3">
                                <select name="ket" class="form-control" id="inputEmail3" placeholder="Keterangan">
                                    <option value="">--Pilih Keterangan--</option>
                                    <option value="Alfa">Alfa</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Cuti">Cuti</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-success" name='post2'>
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['post2'])){
                            $nama_pegawai = $_POST['nama'];
                            $tanggal = date('Y-m-d');
                            $hadir = $_POST['hadir'];
                            $ket = $_POST['ket'];

                            $sql1 = "SELECT *FROM pegawai WHERE nama ='$nama_pegawai'";
                            //proses query ke database
                            $query1 = mysqli_query($koneksi, $sql1) or die("SQL Detail error");
                            //Merubaha data hasil query kedalam bentuk array
                            $data = mysqli_fetch_array($query1);
                            $pegawai_id = $data['id_pegawai'];
                            
                            //buat sql
                            $sql="INSERT INTO absen VALUES ('','$pegawai_id','$tanggal','$hadir','$ket')";
                            $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
                            if ($query){
                                echo "<script>alert('Data Berhasil Disimpan');</script>";
                            }else{
                                echo "<script>alert('Simpan Data Gagal');<script>";
                            }
                        }
                    ?>


                </div>
                <div class="panel-footer">
                    <a href="?page=absen&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Absen
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

