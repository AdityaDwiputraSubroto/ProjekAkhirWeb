<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Roboto:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/default.css">
    <link rel="stylesheet" href="styles/container.css">
    <link rel="stylesheet" href="styles/grid.css">
    <link rel="stylesheet" href="styles/margin.css">
    <link rel="stylesheet" href="styles/shape.css">
    <link rel="stylesheet" href="styles/size.css">
    <link rel="stylesheet" href="styles/button.css">
    <link rel="stylesheet" href="styles/text.css">


</head>

<body>

    <div>
        <?php
        $page = "home";
        include 'views/navbar.php' ?>
    </div>

    <div class="container-menu">
        <h1 class="m-bot-50px">Silahkan Pilih Menu</h1>
        <div class="grid-3 width-70 m-auto m-top-80px">
            <a href="views/bmipage.php" class="circle-base">
                <div class="circle-base circle-1">
                    <div>
                        BMI <br>
                        <img src="https://cdn-icons-png.flaticon.com/128/3213/3213786.png" class="max-width-50 m-top-10px" alt="">
                    </div>
                </div>
            </a>

            <a href="views/tdeepage.php" class="circle-base">
                <div class="circle-base circle-1">
                    <div>
                        TDEE <br>
                        <img src="https://cdn-icons-png.flaticon.com/128/2738/2738856.png" class="max-width-50 m-top-10px" alt="">
                    </div>
                </div>
            </a>

            <a href="views/makananpage.php" class="circle-base">
                <div class="circle-base circle-1">
                    <div>
                        Kalori Makanan
                        <img src="https://cdn-icons-png.flaticon.com/128/851/851554.png" class="max-width-50 m-top-10px" alt="">
                    </div>
                </div>
            </a>

        </div>
</body>

</html>