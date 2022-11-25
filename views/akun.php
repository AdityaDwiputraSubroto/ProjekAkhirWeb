<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("location:loginpage.php?pesan=belum_login");
}

include '../proses/connect.php';
$id_user = $_SESSION['id_user'];
$gender = $_SESSION['gender'];

$sql = "SELECT * FROM user INNER jOIN badan ON user.id_user = badan.id_user INNER JOIN exercise ON badan.id_exercise = exercise.id_exercise WHERE badan.id_user = $id_user AND badan.status = 'active';";
$query = $connect->query($sql);
$data_badan = $query->fetch_assoc();

//mencari umur
$dateOfBirth = $data_badan['tanggal_lahir'];
$today = date("d-m-Y");
$age = date_diff(date_create($dateOfBirth), date_create($today));


$usia = (int)$age->format('%y');
$tinggi = $data_badan['tinggi'] / 100;
$berat = $data_badan['berat'];
$bmi = $berat / ($tinggi * $tinggi);
$bmi = number_format($bmi, 2);

if ($gender == 'Male') {
    $bmr = 66.5 + (13.7 * $berat) + (5 * $tinggi) - (6.8 * $usia);
} else {
    $bmr = 655 + (9.6 * $berat) + (1.8 * $tinggi) - (4.7 * $usia);
}

$tdee = $bmr * $data_badan['poin'];
$tdee = number_format($tdee, 0);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Roboto:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../styles/default.css">
    <link rel="stylesheet" href="../styles/container.css">
    <link rel="stylesheet" href="../styles/grid.css">
    <link rel="stylesheet" href="../styles/margin.css">
    <link rel="stylesheet" href="../styles/shape.css">
    <link rel="stylesheet" href="../styles/size.css">
    <link rel="stylesheet" href="../styles/button.css">
    <link rel="stylesheet" href="../styles/input.css">
    <link rel="stylesheet" href="../styles/text.css">
</head>

<body>

    <div>
        <?php
        $page = "akun";
        include 'navbar.php' ?>
    </div>

    <div class="container-akun">
        <div class="grid-2-akun">
            <div class="container-border-gray">
                <div class="container-border-gray-profile">
                    <div class="underline">
                        <img class="icon-navbar m-right-20px" src="<?php if ($_SESSION['gender'] == 'Male') {
                                                                        echo "https://cdn-icons-png.flaticon.com/128/149/149071.png";
                                                                    } else {
                                                                        echo "https://cdn-icons-png.flaticon.com/128/727/727393.png";
                                                                    } ?>" alt="">
                        <?php echo $_SESSION['username'] ?>
                        <a href="edit_profile.php"><img class="icon-profile" src="https://cdn-icons-png.flaticon.com/128/2356/2356780.png" alt=""></a>

                        <table class="table-akun-desc v-align-top m-top-20px">
                            <tr>
                                <td>
                                    Gender
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $data_badan['gender']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal lahir
                                </td>
                                <td> : </td>
                                <td>
                                    <?php echo $data_badan['tanggal_lahir']; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Usia
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $age->format('%y tahun'); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Tinggi
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $data_badan['tinggi'] . " cm"; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Berat
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $data_badan['berat'] . " kg"; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    Aktivitas
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $data_badan['aktivitas']; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    BMI
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $bmi . " ";
                                    if ($bmi >= 16 && $bmi < 18.5) {
                                        echo "(Berat badan kurang)";
                                    } else if ($bmi < 16) {
                                        echo "(Berat badan kurang berat)";
                                    } else if ($bmi >= 18.5 && $bmi < 25) {
                                        echo "(Berat badan normal)";
                                    } else if ($bmi >= 25 && $bmi < 30) {
                                        echo "(Berat badan berlebih)";
                                    } else if ($bmi >= 30) {
                                        echo "(Obesitas)";
                                    } ?>

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    TDEE
                                </td>
                                <td>:</td>
                                <td>
                                    <?php echo $tdee . " kalori"; ?>
                                </td>
                            </tr>

                        </table>
                        <br>
                        <a href="update_badan.php"><button class="button-akun">Update</button></a>

                    </div>

                </div>
                <div>
                    <a href="">
                        <div class="container-menu-akun">
                            Makanan hari ini
                        </div>
                    </a>
                    <a href="">
                        <div class="container-menu-akun">
                            Riwayat
                        </div>
                    </a>
                    <a href="">
                        <div class="container-menu-akun">
                            Logout
                        </div>
                    </a>
                </div>

            </div>
            <div class="container-border-gray container-pad-20">
                <div class="underline title">Makanan hari ini <br> <span class="date"><?php echo $today; ?></span></div>
                <div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Makanan</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td> <a href="delete_makanan.php"><button class="button-akun">Delete</button></a></td>
                                </tr>

                            </tbody>
                        </table>
                        <a href="tambah_makanan.php"><button class="button-akun">Tambah Makanan</button></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>


</body>

</html>