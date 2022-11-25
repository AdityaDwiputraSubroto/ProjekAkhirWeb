<?php

$navlink = array(
    'akun' => 'akun.php',
    'home' => 'index.php',
    'tdee' => 'tdeepage.php',
    'bmi' => 'bmipage.php',
)
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light f-weight-light">
    <div class="container-fluid width-80">

        <a class="navbar-brand" href="<?php if ($page != 'home') {
                                            echo "../";
                                        } ?>index.php"><img class="icon-navbar" src="https://cdn-icons-png.flaticon.com/128/4425/4425016.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'home') {
                                            echo "active";
                                        } ?>" aria-current="page" href="<?php if ($page != 'home') {
                                                                            echo "../";
                                                                        } ?>index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?php if ($page == 'tdee' || $page == 'bmi' || $page == 'makanan') {
                                                            echo "active";
                                                        } ?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hitung
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php if ($page == 'home') {
                                                                echo "";
                                                                echo "views/";
                                                            } ?>bmipage.php"><img class="icon-navbar-dropdown" src="https://cdn-icons-png.flaticon.com/128/3213/3213786.png" alt=""> BMI</a></li>
                        <li><a class="dropdown-item" href="<?php if ($page == 'home') {
                                                                echo "";
                                                                echo "views/";
                                                            } ?>tdeepage.php"><img class="icon-navbar-dropdown" src="https://cdn-icons-png.flaticon.com/128/2738/2738856.png" alt=""> TDEE</a></li>
                        <li><a class="dropdown-item" href="<?php if ($page == 'home') {
                                                                echo "";
                                                                echo "views/";
                                                            } ?>makananpage.php"><img class="icon-navbar-dropdown" src="https://cdn-icons-png.flaticon.com/128/851/851554.png" alt=""> Kalori Makanan</a></li>
                    </ul>
                </li>


            </ul>
            <?php if (empty($_SESSION['id_user'])) { ?>
                <div class="nav-item"><a class="nav-link" href="<?php
                                                                if ($page == 'home') {
                                                                    echo "views/loginpage.php";
                                                                } else {
                                                                    echo "loginpage.php";
                                                                }
                                                                ?>">Login</a></div>
            <?php } else { ?>
                <div class="nav-item"><a class="nav-link <?php if ($page == 'akun') {
                                                                echo "active";
                                                            } ?>" href="<?php
                                                                        if ($page == 'home') {
                                                                            echo "views/akun.php";
                                                                        } else {
                                                                            echo "akun.php";
                                                                        }
                                                                        ?>"><img class="icon-navbar m-right-20px" src="<?php if ($_SESSION['gender'] == 'Male') {
                                                                                                                            echo "https://cdn-icons-png.flaticon.com/128/149/149071.png";
                                                                                                                        } else {
                                                                                                                            echo "https://cdn-icons-png.flaticon.com/128/727/727393.png";
                                                                                                                        } ?>" alt=""><?php echo "Hi, " . $_SESSION['username'] ?>!</a></div>
            <?php  } ?>
        </div>
    </div>
</nav>