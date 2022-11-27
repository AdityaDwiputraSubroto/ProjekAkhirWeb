<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makanan</title>

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
        $page = "makanan";
        include 'navbar.php' ?>
    </div>
    <div class="container-menu container-calc">
        <div class="grid-2">
            <div class="container-desc">
                <h1>Kalkulator Kalori Makanan</h1>
                <p>Kalkulator kalori makanan adalah alat yang digunakan
                    untuk mengetahui berapa asupan kalori yang telah dikonsumsi berdasarkan
                    jenis makanan dan kuantitasnya.

                </p>
            </div>
            <div class="container-auth width-max clear-border-left clear-shadow">
                <h1>Hitung Kalori</h1><br>
                <?php
                if (isset($_GET['kalori'])) { ?>
                    <h2>Kalori : <?php echo $_GET['kalori']; ?></h2>
                <?php }
                ?>
                <div>
                    <form action="../proses/makanan_proses.php" method="POST">
                        <table class="table-auth">
                            <tr>
                                <td>
                                    <select name="makanan" id="makanan" class="input m-top-10px">
                                        <?php
                                        include '../proses/connect.php';
                                        $sql = "SELECT * FROM makanan";
                                        $result = $connect->query($sql);
                                        while ($data = $result->fetch_assoc()) { ?>
                                            <option class="select" value="<?php echo $data['id_makanan']; ?>" <?php
                                                                                                                if (isset($_GET['id_makanan'])) {
                                                                                                                    if ($_GET['id_makanan'] == $data['id_makanan']) {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>><?php echo $data['nama_makanan'] . " " . $data['ukuran']; ?></option>

                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="jumlah" value="<?php
                                                                                if (isset($_GET['jumlah'])) {
                                                                                    echo $_GET['jumlah'];
                                                                                }
                                                                                ?>" placeholder="Jumlah" required>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input class="input button button-red m-top-10px" type="submit" name="bmi" value="HITUNG KALORI">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>

                <br>

            </div>
        </div>
    </div>


</body>

</html>