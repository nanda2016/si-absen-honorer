<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Pegawai</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM pegawai WHERE id_pegawai ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Nama</td> <td><?= $data['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Tempat, Tgl Lahir</td> <td><?= $data['tempat_lahir'] ?>, <?= date('d F Y', strtotime($data['tgl_lahir'])) ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td> <td><?= $data['alamat'] ?></td>
                        </tr>
						<tr>
                            <td>No. Telepon</td> <td><?= $data['no_telpon'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=pegawai&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Pegawai </a>
                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

