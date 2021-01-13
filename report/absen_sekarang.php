<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Absen</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        include '../config/koneksi.php';
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Absensi Honorer <br> Dinas Pendidikan Kabupaten Asahan</h2>
                        <h4>Jalan Jend. Ahmad Yani, Kisaran Naga, Kec. Kisaran Tim., <br> Kabupaten Asahan, Sumatera Utara</h4>
                        <hr>
                        <h3>DATA ABSEN</h3>
                        <h4>Tanggal <?= strftime('%d %B %Y') ?></h4>
                        <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><center>No.</center></th>
                                    <th><center>Nama Pegawai</center></th>
                                    <th><center>Kehadiran</center></th>
                                    <th><center>Keterangan</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--ambil data dari database, dan tampilkan kedalam tabel-->
                                <?php
                                $tgl = date('Y-m-d');
                                //buat sql untuk tampilan data, gunakan kata kunci select
                                $sql = "SELECT * FROM absen JOIN pegawai WHERE absen.id_pegawai=pegawai.id_pegawai AND tanggal='$tgl'";
                                $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                                //Baca hasil query dari databse, gunakan perulangan untuk
                                //Menampilkan data lebh dari satu. disini akan digunakan
                                //while dan fungdi mysqli_fecth_array
                                //Membuat variabel untuk menampilkan nomor urut
                                $nomor = 0;
                                //Melakukan perulangan u/menampilkan data
                                while ($data = mysqli_fetch_array($query)) {
                                    $nomor++; //Penambahan satu untuk nilai var nomor
                                    ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['hadir'] ?></td>
                                        <td><?= $data['ket'] ?></td>
                                    </tr>
                                    <!--Tutup Perulangan data-->
                                <?php } ?>
                            </tbody>
                        </table>
                        <table class="table">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="text-center">
                                                Kisaran,  <?= date("d-m-Y") ?>
                                                <br><br><br><br>
                                                <u><strong>KEPALA DINAS PENDIDIKAN<strong></u><br>
                                                NIP.102871291416712
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>     
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>