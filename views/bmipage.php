<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI</title>

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
        $page = "bmi";
        include 'navbar.php' ?>
    </div>
    <div class="container-menu container-calc">
        <div class="grid-2">
            <div class="container-desc">
                <h1>BMI</h1>
                <p> Body Mass Index atau BMI adalah suatu ukuran yang digunakan untuk menunjukkan kategori
                    berat badan seseorang berdasarkan tinggi dan berat orang tersebut.</p>
            </div>
            <div class="container-auth width-max clear-border-left clear-shadow">
                <h1>Hitung BMI</h1>
                <div>
                    <form action="../proses/bmi_proses.php" method="POST">
                        <table class="table-auth">
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
                                    <input class="input button button-red m-top-10px" type="submit" name="bmi" value="Hitung BMI">
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