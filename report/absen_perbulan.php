<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Peminjaman Arsip Perbulan</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $ambilbln=$_POST['bulan'];
        $ambilthn=$_POST['tahun'];
        $bulanNama;
        if ($ambilbln==12) {
          $bulanNama="DESEMBER";
        } elseif ($ambilbln==11) {
          $bulanNama="NOVEMBER";
        } elseif ($ambilbln==10) {
          $bulanNama="OKTOBER";
        } elseif ($ambilbln==9) {
          $bulanNama="SEPTEMBER";
        } elseif ($ambilbln==8) {
          $bulanNama="AGUSTUS";
        } elseif ($ambilbln==7) {
          $bulanNama="JULI";
        } elseif ($ambilbln==6) {
          $bulanNama="JUNI";
        } elseif ($ambilbln==5) {
          $bulanNama="MEI";
        } elseif ($ambilbln==4) {
          $bulanNama="APRIL";
        } elseif ($ambilbln==3) {
          $bulanNama="MARET";
        } elseif ($ambilbln==2) {
          $bulanNama="FEBRUARI";
        } elseif ($ambilbln==1) {
          $bulanNama="JANUARI";
        }

        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Absensi Honorer <br> Dinas Pendidikan Kabupaten Asahan</h2>
                        <h4>Jalan Jend. Ahmad Yani, Kisaran Naga, Kec. Kisaran Tim., <br> Kabupaten Asahan, Sumatera Utara</h4>
                        <hr>
                        <h3>REKAP DATA ABSEN BULAN   <?php echo "$bulanNama $ambilthn"; ?></h3>
                        <table class="table table-bordered table-striped table-hover">
                        <tbody>
                <thead>
                  <th><center>No</center></th>
                  <th><center>Nama</center></th>
                  <th><center>Hadir</center></th>
                  <th><center>Tidak Hadir</center></th>
                  <th><center>Alfa</center></th>
                  <th><center>Izin</center></th>
                  <th><center>Sakit</center></th>
                  <th><center>Cuti</center></th>
                  <th><center>Ket</center></th>
								</thead>
                <tbody>
                  <!--ambil data dari database, dan tampilkan kedalam tabel-->
                  <?php
                    //buat sql untuk tampilan data, gunakan kata kunci select
                    $sql = "SELECT * FROM pegawai";
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
                    <!-- menghitung jumlah hadir -->
                    <?php
                      $id_pegawai = $data['id_pegawai'];
                      $sql1 = "SELECT hadir FROM absen WHERE id_pegawai='$id_pegawai' AND month(tanggal)='$ambilbln' AND year(tanggal)='$ambilthn' AND hadir='Hadir'";
                      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
                      $hadir = mysqli_num_rows($query1);
                    ?>
                    <td><?= $hadir ?></td>
                    <!-- menghitung jumlah tidak hadir -->
                    <?php
                      $id_pegawai = $data['id_pegawai'];
                      $sql1 = "SELECT hadir FROM absen WHERE id_pegawai='$id_pegawai' AND month(tanggal)='$ambilbln' AND year(tanggal)='$ambilthn' AND hadir='Tidak Hadir'";
                      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
                      $tidakhadir = mysqli_num_rows($query1);
                    ?>
                    <td><?= $tidakhadir ?></td>
                    <!-- menghitung jumlah alfa -->
                    <?php
                      $id_pegawai = $data['id_pegawai'];
                      $sql1 = "SELECT hadir FROM absen WHERE id_pegawai='$id_pegawai' AND month(tanggal)='$ambilbln' AND year(tanggal)='$ambilthn' AND ket='Alfa'";
                      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
                      $alfa = mysqli_num_rows($query1);
                    ?>
                    <td><?= $alfa ?></td>
                    <!-- menghitung jumlah izin -->
                    <?php
                      $id_pegawai = $data['id_pegawai'];
                      $sql1 = "SELECT hadir FROM absen WHERE id_pegawai='$id_pegawai' AND month(tanggal)='$ambilbln' AND year(tanggal)='$ambilthn' AND ket='Izin'";
                      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
                      $izin = mysqli_num_rows($query1);
                    ?>
                    <td><?= $izin ?></td>
                    <!-- menghitung jumlah sakit -->
                    <?php
                      $id_pegawai = $data['id_pegawai'];
                      $sql1 = "SELECT hadir FROM absen WHERE id_pegawai='$id_pegawai' AND month(tanggal)='$ambilbln' AND year(tanggal)='$ambilthn' AND ket='Sakit'";
                      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
                      $sakit = mysqli_num_rows($query1);
                    ?>
                    <td><?= $sakit ?></td>
                    <!-- menghitung jumlah cuti -->
                    <?php
                      $id_pegawai = $data['id_pegawai'];
                      $sql1 = "SELECT hadir FROM absen WHERE id_pegawai='$id_pegawai' AND month(tanggal)='$ambilbln' AND year(tanggal)='$ambilthn' AND ket='Cuti'";
                      $query1 = mysqli_query($koneksi, $sql1) or die("SQL Anda Salah");
                      $cuti = mysqli_num_rows($query1);
                    ?>
                    <td><?= $cuti ?></td>
                    <td></td>
                  </tr>
                  <!--Tutup Perulangan data-->
                  <?php } ?>
                </tbody>

                            <tfoot>
                              <tr>
                                <td colspan="8" class="text-right">
                                        Kisaran,  &nbsp <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>KEPALA DINAS PENDIDIKAN<strong></u><br>
                                        NIP.102871291416712
									             </td>
								</tr>
							</tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>
