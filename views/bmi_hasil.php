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
                <h1>Hasil BMI</h1>
                <div class="container-pesan container-pesan-hasil">
                    <?php
                    if (isset($_GET['bmi'])) {

                        $bmi = $_GET['bmi'];
                        $tinggi = $_GET['tinggi'];
                        $berat = $_GET['berat'];
                        $tinggi = $tinggi * 100;

                        if ($bmi >= 16 && $bmi < 18.5) {
                            echo "Berat badan kurang";
                        } else if ($bmi < 16) {
                            echo "Berat badan kurang berat";
                        } else if ($bmi >= 18.5 && $bmi < 25) {
                            echo "Berat badan normal";
                        } else if ($bmi >= 25 && $bmi < 30) {
                            echo "Berat badan berlebih";
                        } else if ($bmi >= 30) {
                            echo "Obesitas";
                        }
                    } else {
                        header("Location:bmipage.php?");
                    }
                    ?>
                </div>
                <div>
                    <p>BMI : <?php echo $bmi; ?></p>
                </div>
                <div class="grid-2-even width-70 m-auto m-top-10px">
                    <div>
                        <p>Tinggi (cm) : <span class="bold"><?php echo $tinggi; ?></span></p>
                    </div>
                    <div>
                        <p>Berat (kg) : <span class="bold"><?php echo $berat; ?></span></p>
                    </div>
                </div>

                <div class="width-70 m-auto">
                    <div class="bar-bmi m-top-10px grid-bar-bmi">
                        <div class="bg-red border-radius-20px"></div>
                        <div class="bg-yellow"></div>
                        <div class="bg-green"></div>
                        <div class="bg-yellow"></div>
                        <div class="bg-red border-radius-20px"></div>
                    </div>
                    <div class="container-bmi" style="margin-left: calc(<?php
                                                                        if ($bmi > 40) {
                                                                            $mleft = 96;
                                                                        } else {
                                                                            $mleft = $bmi * 100 / 40;
                                                                        }
                                                                        echo $mleft; ?>% - 10px);">
                        <img src="https://cdn-icons-png.flaticon.com/512/3838/3838683.png" alt="" class="width-arrow">

                    </div>
                    <div style="width: 50px; margin-left: calc(<?php echo $mleft; ?>% - 25px);"><?php echo $bmi; ?></div>
                </div>


                <br>
                <div class="width-70 m-auto">
                    <a href="bmipage.php"><button class="input button-red ">Ulangi</button></a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>