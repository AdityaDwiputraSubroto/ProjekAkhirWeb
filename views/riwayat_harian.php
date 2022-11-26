<div class="underline title">Riwayat</div>
<div>
    <div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">BMI</th>
                    <th scope="col">Kondisi Berat Badan</th>
                    <th scope="col">TDEE</th>
                    <th scope="col">Kalori Makanan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM riwayat_harian INNER JOIN badan ON riwayat_harian.id_badan = badan.id_badan INNER JOIN exercise ON exercise.id_exercise = badan.id_exercise WHERE badan.id_user = $id_user;";
                $query = $connect->query($sql);
                $i = 1;
                while ($data_history = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i;
                                        $i++; ?></th>
                        <td><?php echo $data_history['date_riwayat']; ?></td>
                        <td><?php echo $data_history['bmi'];
                            ?></td>
                        <td><?php $bmi = $data_history['bmi'];
                            if ($bmi >= 16 && $bmi < 18.5) {
                                echo "Kurang";
                            } else if ($bmi < 16) {
                                echo "Kurang parah";
                            } else if ($bmi >= 18.5 && $bmi < 25) {
                                echo "Normal";
                            } else if ($bmi >= 25 && $bmi < 30) {
                                echo "Berlebih";
                            } else if ($bmi >= 30) {
                                echo "Obesitas";
                            }; ?></td>
                        <td><?php echo $data_history['tdee']; ?></td>
                        <td><?php echo $data_history['kalori_makanan']; ?></td>
                        <td> <a href="../proses/delete_riwayat.php?id=<?php echo $data_history['id_riwayat']; ?>"><button class="button-akun">Delete</button></a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
</div>