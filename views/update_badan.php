<?php
session_start();
if (empty($_SESSION['id_user'])) {
    header("location:loginpage.php?pesan=belum_login");
}

include '../proses/connect.php';
$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM user INNER jOIN badan ON user.id_user = badan.id_user WHERE badan.id_user = $id_user AND badan.status = 'active';";
$query = $connect->query($sql);
$data_badan = $query->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>

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

    <div class="container-akun-edit">

        <div class="container-border-gray m-auto container-pad-20">
            <div class="underline">
                <div>Update</div>
            </div>
            <form action="../proses/update_badan_proses.php" method="POST">
                <table class="table-akun-desc-edit m-top-20px">
                    <tr>
                        <td>
                            Tinggi (cm)
                        </td>
                        <td>:</td>
                        <td>
                            <input class="input m-top-10px" type="number" name="tinggi" placeholder="Masukkan tinggi badan" value="<?php echo $data_badan['tinggi']; ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Berat (kg)
                        </td>
                        <td>:</td>
                        <td>
                            <input class="input m-top-10px" type="number" name="berat" placeholder="Masukkan berat badan" value="<?php echo $data_badan['berat']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="label">Aktivitas</div>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="exercise" id="exercise" class="input m-top-10px">
                                <?php
                                include '../proses/connect.php';
                                $sql = "SELECT * FROM exercise";
                                $result = $connect->query($sql);
                                while ($data = $result->fetch_assoc()) { ?>
                                    <option class="select" value="<?php echo $data['id_exercise']; ?>" <?php
                                                                                                        if ($data_badan['id_exercise'] == $data['id_exercise']) {
                                                                                                            echo "selected";
                                                                                                        } ?>><?php echo $data['aktivitas']; ?></option>

                                <?php } ?>
                            </select>
                        </td>
                    </tr>

                </table>
                <br>
                <div>
                    <center>
                        <input type="submit" name="submit" class="button-akun button-akun-edit" value="Update">
                    </center>
                </div>
            </form>



        </div>

    </div>

    </div>


</body>

</html>