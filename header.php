<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teddy Fashon</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="">


    <div class="loader">
        <img src="resources/cartload.png" alt="Loading...." />
    </div>

    <?php

    session_start();
    include "connection.php";

    ?>

    <div class="container-fluid">
        <div class="row ">


                <div class="headerbox col-12 col-lg-12 d-flex headertop" id="">




                    <div class="col-12 col-lg-12 justify-content-center row p-3">

                        <div class="col-12 ms-lg-1 justify-content-end mb-2 ms-1 col-lg-12 row b1 align-items-end ">

                            <div class="col-3 mb-2  col-md-2 col-lg-1 hlogo "></div>
                            <div class="col-2  col-lg-3 fs-1 fw-bold mb-2 teddyfashon">Teddy Fashon</div>

                            <div class="col-4 text-center ms-5 d-flex justify-content-lg-end mb-2 ms-lg-4 col-lg-3 mt-2">
                                <div class="col-12 col-lg-10 ">

                                    <div class="col-12 col-lg-9 offset-lg-4">
                                        <div class="col-12">


                                            <?php

                                            if (isset($_SESSION["u"])) {
                                                $semail = $_SESSION["u"]["email"];

                                                $profile_rs =  Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $semail . "'");
                                                $profile_data = $profile_rs->fetch_assoc();

                                                if ($profile_rs->num_rows == 1) {
                                            ?>
                                                    <img src="<?php echo ($profile_data["path"]) ?>" style="height: 60px; border: white; border-radius: 50px;" class="" />

                                                <?php

                                                } else {
                                                ?>
                                                    <img src="resources/person-circle.svg " style="height: 60px; border: white; border-radius: 50px;" class="" />

                                                <?php
                                                }
                                            } else {

                                                ?>
                                                <img src="resources/person-circle.svg " style="height: 60px; border: white; border-radius: 50px;" class="" />
                                            <?php
                                            }

                                            ?>


                                        </div>
                                        <?php

                                        if (isset($_SESSION["u"])) {

                                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $semail . "'");
                                            $user_data = $user_rs->fetch_assoc();

                                        ?>


                                            <div class="col-12 mt-2 ms-lg-3 col-lg-10 fw-bold text-center">
                                                <div class="col-12">
                                                    <?php echo ($user_data["fname"] . " " . $user_data["lname"])  ?>
                                                </div>
                                            </div>
                                        <?php

                                        } else {

                                        ?>
                                            <div class="col-12 mt-2 ms-lg-3 col-lg-10 text-center">
                                                <div class="col-12">
                                                    <a class="text-decoration-none text-center" style="color:  blue;" href="http://localhost/teddyfashon/signin.php">Log In</a>
                                                </div>
                                            </div>
                                        <?php
                                        }

                                        ?>
                                    </div>

                                </div>

                            </div>

                        </div>




                        <div class="col-12 row  col-lg-12">

                            <div class="col-1 col-lg-1 btn btn-outline-dark border-0 " onclick="headermanu();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list " viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </div>

                            <div class="d-flex position-fixed row col-3 col-lg-2 menubox d-none" id="menubox">

                                <div class="col-6 btn btn-outline-dark border-0" onclick="headermanu();">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                    </svg>
                                </div>

                                <ul class="row p-3 ms- mt-5 ">
                                    <il class=" mb-2 mt-3 text-decoration-none text-center">
                                        <a class="text-decoration-none btn border-0 headermanuli" href="http://localhost/teddyfashon/index.php">Home</a>
                                    </il>
                                    <il class=" mb-2 mt-3 text-decoration-none text-center">
                                        <a class="text-decoration-none btn border-0 headermanuli" href="http://localhost/teddyfashon\profile.php">Profile</a>
                                    </il>
                                    <il class="headermanuli btn mb-2 mt-3">My Oder</il>
                                    <il class="headermanuli btn mb-2 mt-3">Watchlist</il>
                                    <il class="headermanuli btn mb-2 mt-3">Purchase History</il>
                                    <il class="headermanuli btn mb-5 mt-3">Contact Admin</il>
                                </ul>

                            </div>

                            <?php

                            if ($_SERVER['REQUEST_URI'] == "/teddyfashon/index.php") {
                            ?>
                                <div class="col-5  col-lg-5 offset-lg-2 ">
                                    <input class="form-control btn border-0 bg-white" />
                                </div>

                                <div class="col-4 col-lg-2 ">
                                    <select class="form-select ">
                                        <option value="0">All Categories</option>
                                        <?php

                                        $category_rs = Database::search("SELECT * FROM `category`");
                                        $category_num = $category_rs->num_rows;

                                        for ($x = 0; $category_num > $x; $x++) {
                                            $category_data = $category_rs->fetch_assoc();
                                        ?>
                                            <option style="text-transform: capitalize;" value="<?php echo ($category_data["id"]) ?>"><?php echo ($category_data["name"]) ?></option>

                                        <?php

                                        }


                                        ?>

                                    </select>
                                </div>

                                <button class=" col-1 border-0  col-lg-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search link-primary" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </button>
                            <?php
                            } else {
                            ?>
                                <div class="col-5  col-lg-5 offset-lg-2 " style="cursor: not-allowed;">
                                    <input class="form-control btn border-0 bg-white disabled" />
                                </div>

                                <div class="col-4 col-lg-2 ">
                                    <select class="form-select ">
                                        <option value="0">All Categories</option>
                                        <?php

                                        $category_rs = Database::search("SELECT * FROM `category`");
                                        $category_num = $category_rs->num_rows;

                                        for ($x = 0; $category_num > $x; $x++) {
                                            $category_data = $category_rs->fetch_assoc();
                                        ?>
                                            <option style="text-transform: capitalize;" value="<?php echo ($category_data["id"]) ?>"><?php echo ($category_data["name"]) ?></option>

                                        <?php

                                        }


                                        ?>

                                    </select>
                                </div>

                                <button class=" col-1 border-0  col-lg-1 disabled" style="cursor: not-allowed;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search link-primary" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </button>

                            <?php
                            }

                            ?>



                            <div class="col-1 col-lg-1 text-end"><a href="http://localhost/teddyfashon/cart.php" style="color: black;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16" class="" style="cursor: pointer;">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                                    </svg></a>
                            </div>

                        </div>

                    </div>

                    </div>


                </div>
        </div>




        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
</body>

</html>