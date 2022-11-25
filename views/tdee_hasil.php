<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDEE</title>

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
        $page = "tdee";
        include 'navbar.php' ?>
    </div>

    <div class="container-menu container-calc">
        <div class="grid-2">
            <div class="container-desc">
                <h1>TDEE</h1>
                <p>TDEE atau Total Daily Energy Expenditure adalah rata-rata energi yang dibakar dalam satu hari. TDEE tidak selalu sama setiap harinya, karena TDEE bergantung pada beberapa faktor, yaitu:
                    <br>
                    1. Metabolisme Basal (BMR)<br>
                    2. Respon metabolik makanan <br>
                    3. Aktivitas fisik <br>
                    4. Keadaan fisiologis (pertumbuhan, kehamilan, Masa menyusui, dll)
                </p>
            </div>
            <div class="container-auth width-max clear-border-left clear-shadow ">
                <h1>Hasil TDEE</h1>

                <?php
                if (isset($_GET['tdee'])) {

                    $bmr = $_GET['bmr'];
                    $tinggi = $_GET['tinggi'];
                    $berat = $_GET['berat'];
                    $tdee = $_GET['tdee'];
                    $gender = $_GET['gender'];
                    $usia = $_GET['usia'];
                    $exercise = $_GET['exercise'];
                } else {
                    header("Location:tdeepage.php?");
                }
                ?>

                <div class="m-top-20px m-bot-30px">
                    <h2>TDEE : <?php echo $tdee; ?></h2>
                </div>
                <div class="width-70 m-auto align-start line-height-35px m-top-20px table-akun-desc">
                    <table>
                        <tr>
                            <td>
                                BMR
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo $bmr; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Gender
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo $gender; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Usia
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo $usia; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Tinggi (cm)
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo $tinggi; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Berat (kg)
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo $berat; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Aktivitas
                            </td>
                            <td>:</td>
                            <td>
                                <?php echo $exercise; ?>
                            </td>
                        </tr>

                    </table>


                </div>




                <br>
                <div class="width-70 m-auto">
                    <a href="tdeepage.php"><button class="input button-red ">Ulangi</button></a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>