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

<body class=" main-body " style="background-color:  rgb(235, 228, 232);">


    <?php
    include "header.php";
    if (isset($_SESSION["u"])) {

    ?>


        <div class="container-fluid">
            <div class="row ">


                <!-- content -->

                <div class="col-12 bg-white" style="height: 5px;"></div>


                <div class="col-12 main-body " style="width: 100vw; height: 100vh;  background-color:  rgb(235, 228, 232);">


                    <div class="col-12 row  p-3 d-flex justify-content-center align-items-center align-items-lg-start">
                        <h1 class="text-center  mb-5  fw-bold ">Profile Settings</h1>

                        <div class="col-12 col-lg-4 text-center mb-4 ">

                            <div class="col-12 p-3  d-flex justify-content-center align-items-center mt-5 mb-5 " style="height: 100px;">

                                <?php

                                $email = $_SESSION["u"]["email"];

                                $profile_rs =  Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $email . "'");
                                $profile_data = $profile_rs->fetch_assoc();

                                if ($profile_rs->num_rows == 1) {
                                ?>
                                    <input type="file" class="d-none" id="profileimage" />
                                    <img src="<?php echo ($profile_data["path"])  ?>" id="img" class=" d-flex position-absolute" style="height: 150px; width: 150px; border: white; border-radius: 50%;background-color:  rgb(237, 10, 139);  " />

                                <?php

                                } else {
                                ?>
                                    <input type="file" class="d-none" id="profileimage" />
                                    <img src="resources/person-circle.svg" id="img" class=" d-flex position-absolute" style="height: 150px; width: 150px; border: white; border-radius: 50%;background-color:  rgb(237, 10, 139);  " />

                                <?php
                                }

                                ?>

                                <div class="col-12 profilepic d-flex position-absolute " style="height: 150px; width: 150px; border: white; border-radius: 50%;  ">
                                    <div class="dfd " style="height: 150px; width: 150px; border: white; border-radius: 50%;  ">

                                        <label class="" for="profileimage" onclick="updateProfileimage();">
                                            <div class=" col-12 profilepictext d-flex justify-content-center align-items-center " style="cursor: pointer; ">
                                                <i class="bi bi-camera  col-11  text-center " style="height: 150px; width: 150px; border: white; border-radius: 50%; font-size: 28px;  "></br>Change picture</i>

                                            </div>

                                        </label>

                                    </div>

                                </div>

                            </div>

                            <?php

                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' ");
                            $user_data = $user_rs->fetch_assoc();

                            ?>

                            <div class="col-12 mt-5   col-lg-12 fw-bold text-center">
                                <div class="col-12">
                                    <?php echo ($user_data["fname"] . " " . $user_data["lname"])  ?>
                                </div>
                                <div class="col-12" style="color:  rgb(237, 10, 139);">
                                    <?php echo ($user_data["email"]) ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-lg-6 p-3 row">

                            <div class="col-6 mb-2">
                                <label>First Name</label>
                                <input value="<?php echo ($user_data["fname"])  ?>" type="text" class="form form-control" id="fname" />

                            </div>

                            <div class="col-6 mb-2">
                                <label>Last Name</label>
                                <input type="text" class="form form-control" value="<?php echo ($user_data["lname"])  ?>" id="lname" />

                            </div>

                            <div class="col-12 mb-2">
                                <label>Email</label>
                                <input type="email" class=" form-control" style="background-color: rgba(129, 41, 91, 0.218)" readonly value="<?php echo ($user_data["email"])  ?>" />

                            </div>

                            <div class="col-11 col-lg-11 mb-2">
                                <label>Password</label>
                                <input type="password" id="f1password" class=" form-control" readonly style="background-color: rgba(129, 41, 91, 0.218)" value="<?php echo ($user_data["password"])  ?>" />
                            </div>
                            <div class="col-1 col-lg-1  mt-2">
                                <i class="bi bi-eye-slash col-1 cursor  d-flex mt-4" id="eye1" onclick="p1show();"></i>
                            </div>

                            <div class="col-12 mb-2">
                                <label>Registered Date</label>
                                <input type="text" class="form form-control" readonly style="background-color: rgba(129, 41, 91, 0.218)" value="<?php echo ($user_data["joined_date"])  ?>" />

                            </div>

                            <div class="col-12 mb-2">
                                <label>Mobile Number</label>
                                <input type="text" class="form form-control" value="<?php echo ($user_data["mobile"])  ?>" id="mobile" />

                            </div>

                            <!-- Address table -->

                            <?php

                            $address_rs = Database::search("SELECT * FROM `address` INNER JOIN `province` ON `province_id` = `province`.`id` 
                                INNER JOIN `district` ON `address`.`district_id` = `district`.`id` WHERE `user_email` = '" . $email . "' ");
                            $address_num = $address_rs->num_rows;
                            $address_data = $address_rs->fetch_assoc();

                            if ($address_num == 1) {

                                $province_rs = Database::search("SELECT * FROM `province`");

                            ?>

                                <div class="col-12 mb-2">
                                    <label>Address Line</label>
                                    <input type="text" class="form form-control" id="address" value="<?php echo ($address_data["address_line"]) ?>" />

                                </div>

                                <div class="col-6 mb-2">
                                    <labe>Province</labe>
                                    <select class="form form-select" onchange="district_load();" id="province">
                                        <option value="<?php echo ($address_data["province_id"]) ?>"><?php echo ($address_data["province_name"]) ?></option>

                                        <?php

                                        $province_num = $province_rs->num_rows;

                                        for ($x = 0; $province_num > $x; $x++) {
                                            $province_data = $province_rs->fetch_assoc();

                                        ?>

                                            <option value="<?php echo ($province_data["id"]) ?>"><?php echo ($province_data["province_name"]) ?></option>

                                        <?php


                                        }

                                        ?>

                                    </select>

                                </div>


                                <div class="col-6 mb-2">
                                    <labe>District</labe>
                                    <select class="form form-select" id="district">

                                        <option value="<?php echo ($address_data["district_id"]) ?>"><?php echo ($address_data["district_name"]) ?></option>

                                    </select>

                                </div>

                                <div class="col-6 mb-3">
                                    <label>City</label>
                                    <input type="text" class="form form-control" id="city" value="<?php echo ($address_data["city"]) ?>" />

                                </div>

                                <div class="col-6 mb-3">
                                    <label>Postal Code</label>
                                    <input type="text" class="form form-control" id="postalCode" value="<?php echo ($address_data["postal_code"]) ?>" />

                                </div>
                            <?php

                            } else {

                                $province_rs = Database::search("SELECT * FROM `province`");

                            ?>
                                <div class="col-12 mb-2">
                                    <label>Address Line</label>
                                    <input type="text" class="form form-control" id="address" />

                                </div>

                                <div class="col-6 mb-2">
                                    <labe>Province</labe>
                                    <select class="form form-select" onchange="district_load();" id="province">
                                        <option value="0">Select Province</option>

                                        <?php


                                        $province_num = $province_rs->num_rows;

                                        for ($x = 0; $province_num > $x; $x++) {
                                            $province_data = $province_rs->fetch_assoc();

                                        ?>

                                            <option value="<?php echo ($province_data["id"]) ?>"><?php echo ($province_data["province_name"]) ?></option>

                                        <?php


                                        }

                                        ?>

                                    </select>

                                </div>


                                <div class="col-6 mb-2">
                                    <labe>District</labe>
                                    <select class="form form-select" id="district">

                                        <option value="0">Select District</option>

                                    </select>

                                </div>

                                <div class="col-6 mb-3">
                                    <label>City</label>
                                    <input type="text" class="form form-control" id="city" />

                                </div>

                                <div class="col-6 mb-3">
                                    <label>Postal Code</label>
                                    <input type="text" class="form form-control" id="postalCode" />

                                </div>

                            <?php

                            }

                            ?>

                            <!-- Address table -->


                            <div class="col-12 d-grid mb-2">
                                <button class="btn btn-primary" onclick="updateProfile();">Update Profile</button>
                            </div>

                            <div class="col-12 d-grid mb-2">
                                <button class="btn btn-danger" onclick="logout();">Log out</button>
                            </div>



                        </div>



                    </div>

                    <!-- content -->


                </div>
            </div>

        <?php

    } else {

        ?>
            <script>
                alert("Please login!");
                window.location = "index.php";
            </script>
        <?php
    }

        ?>


        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="bootstrap.js"></script>
        <script src="script.js"></script>
</body>

</html>