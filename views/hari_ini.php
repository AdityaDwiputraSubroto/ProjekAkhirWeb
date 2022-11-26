<div class="underline title">Makanan hari ini <br> <span class="date"><?php echo $today; ?></span></div>
<div>
    <div>
        <h5>Kalori Total : <?php echo $data_riwayat['kalori_makanan']; ?></h5>
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
                        <td> <a href="../proses/delete_makanan.php?id=<?php echo $data_makanan['id_makanan_harian']; ?>"><button class="button-akun">Delete</button></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="tambah_makanan.php?id=<?php echo $id_riwayat; ?>"><button class="button-akun">Tambah Makanan</button></a>
    </div>
</div>