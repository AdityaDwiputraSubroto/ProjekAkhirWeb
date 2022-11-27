<?php
$id_riwayat = $_GET['id'];
$sql = "SELECT * FROM riwayat_harian INNER JOIN badan ON badan.id_badan = riwayat_harian.id_badan WHERE riwayat_harian.id_riwayat = $id_riwayat; ";
$query = $connect->query($sql);
$data_detail = $query->fetch_assoc();
$date_riwayat = $data_detail['date_riwayat'];
$date_riwayat = date("d-m-Y", strtotime($date_riwayat));

?>

<div class="underline title">Riwayat <br> <span class="date"><?php echo $date_riwayat; ?></span></div>
<div>
    <div>
        <h5>Kalori Total : <?php echo $data_detail['kalori_makanan']; ?></h5>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Makanan</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Kalori</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM makanan INNER JOIN makanan_harian ON makanan.id_makanan = makanan_harian.id_makanan INNER JOIN riwayat_harian ON riwayat_harian.id_riwayat = makanan_harian.id_riwayat WHERE makanan_harian.id_riwayat = $id_riwayat;";
                $query = $connect->query($sql);
                $i = 1;
                while ($data_makanan = $query->fetch_assoc()) {
                    $kalori_makanan = $data_makanan['jumlah'] * $data_makanan['kalori'];
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data_makanan['nama_makanan'] . " " . $data_makanan['ukuran']; ?></td>
                        <td><?php echo $data_makanan['jumlah']; ?></td>
                        <td><?php echo $kalori_makanan; ?></td>
                        <td> <a href="../proses/delete_makanan_riwayat.php?id=<?php echo $data_makanan['id_makanan_harian']; ?>"><button class="button-akun">Delete</button></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>