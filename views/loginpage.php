<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
        $page = "login";
        include 'navbar.php' ?>
    </div>
    <div class="container-menu">
        <div class="container-auth">
            <h1>Login</h1>
            <div class="container-pesan">
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "login-gagal") {
                        echo "Username atau Password salah.";
                    } else if ($_GET['pesan'] == 'logout') {
                        echo "Anda Telah Berhasil Logout";
                    } else if ($_GET['pesan'] == 'belum_login') {
                        echo "Silahkan Login Terlebih Dahulu";
                    } else if ($_GET['pesan'] == 'daftar-berhasil') {
                        echo "Daftar Berhasil";
                    }
                }
                ?>
            </div>
            <div>
                <form action="../proses/login_proses.php" method="POST">
                    <table class="table-auth">
                        <tr>
                            <td>
                                <input class="input" type="text" name="username" required placeholder="Masukkan username">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="input" type="password" name="password" required placeholder="Masukkan password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="input button button-red m-top-10px" type="submit" name="login" value="LOGIN">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <br>
            <div>Belum punya akun? <a href="registerpage.php">Daftar di sini.</a></div>
        </div>
    </div>
</body>

</html>