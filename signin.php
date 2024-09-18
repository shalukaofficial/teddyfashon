<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teddy Fashon</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/logo.png">

</head>

<body class="main-body">

<div class="loader">
    <img src="resources/cartload.png" alt="Loading...."/>
</div>

    <div class="container-fluid " >

        <?php

        include "connection.php";

        ?>

        <div class="row ">
            <div class="headerbox col-12 col-lg-12 d-flex p-3">


                <div class="col-12 col-lg-12 justify-content-center row ">

                    <div class="col-12 ms-lg-1 justify-content-end mb-2 col-lg-12 row b1 align-items-end ">

                        <div class="col-3 mb-2  col-md-2 col-lg-1 hlogo "></div>
                        <div class="col-2  col-lg-3 fs-4 fw-bold mb-2 teddyfashon">Teddy Fashon</div>

                        <div class="col-4 text-end  mb-2 ms-lg-4 col-lg-3 mt-2">
                            <div class="col-12 ms-1"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-circle col-md-3 col-sm-3 col-6 col-lg-2" viewBox="0 0 16 16" style="cursor: pointer;">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                </svg></div>

                            <div class="col-12 mt-2 col-lg-12  text-end ">
                                <div class="col-12">
                                    <a class="text-decoration-none text-center" style="color:  rgb(244, 1, 163);" href="http://localhost/teddyfashon/signin.php">Log In</a>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="col-12 row  col-lg-12">

                        <div class="d-flex position-absolute row col-4 col-lg-2 menubox d-none" id="menubox">

                            <div class="col-6 btn btn-outline-dark" onclick="headermanu();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </div>

                            <ul class="row col-12 p-3 ms-3">
                                <il class="headermanuli mb-2 mt-3">
                                    <a class="text-danger text-decoration-none" href="http://localhost/teddyfashon/index.php">Home</a>
                                </il>
                                <il class="headermanuli mb-2 mt-3">Profile</il>
                                <il class="headermanuli mb-2 mt-3">My Oder</il>
                                <il class="headermanuli mb-2 mt-3">Watchlist</il>
                                <il class="headermanuli mb-2 mt-3">Purchase History</il>
                                <il class="headermanuli mb-2 mt-3">Contact Admin</il>
                            </ul>

                        </div>

                        <div class="col-1 col-lg-1 btn btn-outline-dark" onclick="headermanu();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                            </svg>
                        </div>


                        <div class="col-5  col-lg-5 offset-lg-2  disabled">
                            <input class="form-control disabled" />
                        </div>

                        <div class="col-4 col-lg-2 disabled">
                            <select class="form-select disabled ">
                                <option value="0"  class="disabled">All Categories</option>
                            </select>
                        </div>

                        <button class="disabled col-1 border-1 btn btn-outline-primary col-lg-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search link-primary disabled" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>

                        <div class="col-1 col-lg-1 text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12">
                <div class="row col-12 d-flex justify-content-center align-items-center p-3">

                    <!-- Log In Box -->

                    <div class="col-8 col-lg-4 loginbox p-3 mt-lg-5 row " id="loginBox">
                        <h1 class="fw-bold col-12 mb-3">Log in</h1>

                        <div class="col-12 d-none" id="msgdiv2">
                            <div class=" " role="alert" id="msg2">

                            </div>
                        </div>

                        <?php

                        $lemail = "";
                        $lpassword = "";

                        if(isset($_COOKIE["email"])){
                            $lemail = $_COOKIE["email"];
                        }

                        if(isset($_COOKIE["password"])){
                            $lpassword = $_COOKIE["password"];
                        }
                        ?>


                        <div class="col-12 col-lg-12 mb-2">
                            <label for="">Email</label>
                            <input type="email" class="form form-control" id="lemail" value="<?php echo($lemail)  ?>"/>
                        </div>

                        <div class="col-12 col-lg-12 mb-2 ">
                            <label for="">Password</label>
                            <input type="password" class="form form-control" id="lpassword" value="<?php echo($lpassword) ?>" />
                        </div>

                        <div class="col-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberme" />
                                <label class="form-check-label">Remember Me</label>
                            </div>
                        </div>

                        <div class="col-6 text-end mb-3">
                            <a href="http://localhost/teddyfashon/forgotPass.php" class="link-primary text-decoration-none">Forgot Password?</a>
                        </div>

                        <div class="col-12 d-grid col-lg-6 mb-2">
                            <button class="btn btn-primary" onclick="login();">Log In</button>
                        </div>

                        <div class="col-12 d-grid col-lg-6 mb-2">
                            <button class="btn btn-outline-secondary" onclick="changeView();">Create New Account</button>
                        </div>

                    </div>

                    <!-- Log In Box -->

                    <!-- Sign Up box -->

                    <div class="col-8 col-lg-5 loginbox p-3 d  d-none row mb-5 mt-5" id="signupBox">
                        <h1 class="fw-bold col-12 mb-3">Create New Account</h1>

                        <div class="col-12 d-none" id="msgdiv">
                            <div class=" " role="alert" id="msg">

                            </div>
                        </div>

                        <div class="col-12 col-lg-6 mb-2">
                            <label for="">First name</label>
                            <input class="form form-control" placeholder="ex:- Viliam" id="sfname" />
                        </div>

                        <div class="col-12 col-lg-6 mb-3 ">
                            <label for="">Last name</label>
                            <input class="form form-control" id="slname" placeholder="ex:- John" />
                        </div>

                        <div class="col-12 col-lg-12 mb-3 ">
                            <label for="">Email</label>
                            <input type="email" class="form form-control" id="semail" placeholder="ex:- viliam@gmail.com" />
                        </div>

                        <div class="col-12 col-lg-12 mb-3 ">
                            <label for="">Password</label>
                            <input type="password" class="form form-control" id="spassword" placeholder="ex:- * * * * * * " />
                        </div>

                        <div class="col-12 col-lg-6 mb-3 ">
                            <label for="">Mobile Number</label>
                            <input class="form form-control" id="smobile" placeholder="ex:- 07********" />
                        </div>

                        <div class="col-12 col-lg-6 mb-3 ">
                            <label for="">Gender</label>
                            <select class="form form-select form-control" id="sgender">
                                <?php

                                $gender_rs = Database::search("SELECT * FROM `gender`");
                                $gender_num = $gender_rs->num_rows;

                                for ($x = 0; $x < $gender_num; $x++) {
                                    $gender_data = $gender_rs->fetch_assoc();
                                ?>

                                    <option value="<?php echo ($gender_data["id"]) ?>"><?php echo ($gender_data["gender_name"]);  ?></option>

                                <?php


                                }

                                ?>

                            </select>
                        </div>

                        <div class="col-12 d-grid col-lg-6 mb-2">
                            <button class="btn btn-primary " onclick="signup();">Sign Up</button>
                        </div>

                        <div class="col-12 d-grid col-lg-6 mb-2">
                            <button class="btn btn-outline-secondary" onclick="changeView();">Log In To Teddy fashon</button>
                        </div>

                    </div>


                    <!-- Sign Up box -->




                </div>

            </div>


            <?php

            include "footer.php";

            ?>
        </div>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
</body>

</html>