<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("location:loginpage.php?pesan=belum_login");
}

include '../proses/connect.php';
$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM user INNER jOIN badan ON user.id_user = badan.id_user INNER JOIN exercise ON badan.id_exercise = exercise.id_exercise WHERE badan.id_user = $id_user AND badan.status = 'active';";
$query = $connect->query($sql);
$data_badan = $query->fetch_assoc();

//mencari umur
$dateOfBirth = $data_badan['tanggal_lahir'];
$today = date("Y-m-d");
$age = date_diff(date_create($dateOfBirth), date_create($today));

$bmi = $data_badan['berat'] / $data_badan['tinggi'] / 100;


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
                                    <?php echo $age->format('%y'); ?>
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

                        </table>
                        <br>
                        <a href="update_badan.php"><button class="button-akun">Update</button></a>
                        <a href="../proses/logout.php"><button class="button-akun">Logout</button></a>
                    </div>

                </div>
                <div>
                    <a href="">
                        <div class="container-menu-akun">
                            Hari ini
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
                <div class="underline title">Hari ini</div>
                <div>

                </div>
            </div>
        </div>

    </div>

    </div>


</body>

</html>