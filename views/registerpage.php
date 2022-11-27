<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
        $page = "register";
        include 'navbar.php' ?>
    </div>

    <div class="container-menu container-long-center">
        <div class="container-auth">
            <h1>Sign Up</h1>
            <div class="container-pesan">
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "akun-double") {
                        echo "Email dan Password Sudah Terpakai ";
                    } else if ($_GET['pesan'] == 'daftar-gagal') {
                        echo "Daftar Gagal";
                    }
                } else {
                    echo "Silahkan buat akun terlebih dahulu";
                }
                ?>
            </div>
            <div>
                <form action="../proses/register_proses.php" method="POST">
                    <table class="table-auth">
                        <tr>
                            <td>
                                <div class="label">Username</div>
                                <input class="input m-top-10px" type="text" name="username" required placeholder="Masukkan username">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="label">Password</div>
                                <input class="input m-top-10px" type="password" name="password" required placeholder="Masukkan password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="label">Gender</div>
                                <select name="gender" id="gender" class="input m-top-10px" required>
                                    <option class="select" value="" disabled hidden selected>Gender</option>
                                    <option class="select" value="Male">Male</option>
                                    <option class="select" value="Female">Female</option>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="label">Tanggal Lahir</div>
                                <input id="birthday" class="input m-top-10px" type="date" name="tanggal_lahir" required>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="label">Berat badan (kg)</div>
                                <input class="input m-top-10px" type="number" name="berat" placeholder="Masukkan berat badan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="label">Tinggi badan (cm)</div>
                                <input class="input m-top-10px" type="number" name="tinggi" placeholder="Masukkan tinggi badan" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="label">Aktivitas</div>
                                <select name="exercise" id="exercise" class="input m-top-10px">
                                    <?php
                                    include '../proses/connect.php';
                                    $sql = "SELECT * FROM exercise";
                                    $result = $connect->query($sql);
                                    while ($data = $result->fetch_assoc()) { ?>
                                        <option class="select" value="<?php echo $data['id_exercise']; ?>"><?php echo $data['aktivitas']; ?></option>

                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="input button button-red m-top-10px" type="submit" name="signup" value="Sign Up">
                            </td>
                        </tr>

                    </table>
                </form>
            </div>
            <br>
            <div>Sudah punya akun? <a href="loginpage.php">Login di sini.</a></div>
        </div>
    </div>
</body>

</html>