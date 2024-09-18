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

<body class="body">

    <?php
    include "header.php"
    ?>


    <div class="container-fluid " style="margin-top: 160px;">

        <div class="row">


            <div class="row d-flex justify-content-center align-items-center p-3 mt-5 ">

                <!-- product -->

                <?php

                $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_image` ON `product`.`product_id` = `product_image`.`product_img_id`
                INNER JOIN `size` ON `product`.`size_id` = `size`.`id` ORDER BY `date` DESC ");
                $product_num = $product_rs->num_rows;

                for ($x = 0; $product_num > $x; $x++) {

                    $product_data = $product_rs->fetch_assoc();

                    if ($product_data["qty"] == 0) {

                        // disable product
                ?>
                        <div class="card mb-5 ms-5 " style="width: 18rem; background-color: #c6c7c864;" >

                                <div class="row  ">
                                    <div class="col-6">
                                        <button class=" mt-2 btn ">
                                            <i class="bi bi-heart-fill text-danger fs-5"></i>
                                            <!-- <i class="bi bi-heart-fill text-black fs-5" id="heart"></i> -->

                                        </button>
                                    </div>

                                    <div class="col-6 text-end">
                                        <button class=" mt-2 btn">
                                            <!-- <i class="bi bi-cart-plus-fill fs-5 text-balck "></i> -->
                                        </button>
                                    </div>

                                </div>

                                <h1 class="col-12 text-center fw-bold text-capitalize mb-4 pinkcolor" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo ($product_data["product_name"]) ?></h1>


                                <img src="<?php echo ($product_data["product_image_path"])  ?>" class="card card-img-top" style="height: 200px;" width="230px" alt="...">
                                <div class="card-body">
                                    <h2 class="fw-bold">Rs.<?php echo ($product_data["price"]) ?></h2>
                                    <h6 class="fw-bold text-uppercase">&star; <?php echo ($product_data["size"]) ?> size
                                        <?php
                                        if ($product_data["gender_id"] == 1) {
                                            echo ("🚹 ") ?>
                                            &#x2642
                                        <?php
                                        } else {
                                            echo ("︎🚺") ?>
                                            &#9792
                                        <?php
                                        }

                                        ?></h6>
                                    <p class="card-text"><?php echo ($product_data["description"]) ?></p>
                                    <p class="card-text fs-5 text-success fw-bold text-center mb-3"><?php echo ($product_data["qty"]) ?> Items Available</p>
                                    <div class="btn d-grid bg-danger text-white " style="cursor: not-allowed;">Out of Stock</div>
                                </div>

                        </div>


                    <?php
                        // disable product


                    } else {

                    ?>
                        <div class="card mb-5 ms-5 cursor" style="width: 18rem; ">

                            <?php

                            if (isset($_SESSION["u"]["email"])) {

                            ?>
                                <div class="row  ">
                                    <div class="col-6">
                                        <button class=" mt-2 btn ">
                                            <i class="bi bi-heart-fill text-danger fs-5"></i>
                                            <!-- <i class="bi bi-heart-fill text-black fs-5" id="heart"></i> -->

                                        </button>
                                    </div>

                                    <div class="col-6 text-end">
                                        <button class=" mt-2 btn " onclick="addToCard(<?php echo $product_data["product_id"] ?>);">
                                            <i class="bi bi-cart-plus-fill fs-5 text-balck "></i>
                                        </button>
                                    </div>

                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="row  ">
                                    <div class="col-6">
                                        <button class=" mt-2 btn ">
                                            <i class="bi bi-heart-fill text-danger fs-5" onclick="loginFirst();"></i>
                                            <!-- <i class="bi bi-heart-fill text-black fs-5" id="heart"></i> -->

                                        </button>
                                    </div>

                                    <div class="col-6 text-end">
                                        <button class=" mt-2 btn " onclick="loginFirst();">
                                            <i class="bi bi-cart-plus-fill fs-5 text-balck "></i>
                                        </button>
                                    </div>

                                </div>
                            <?php
                            }

                            ?>



                            <a href="http://localhost/teddyfashon/singleProductView.php?pid=<?php echo $product_data["product_id"]; ?>"  class="text-decoration-none text-black" >

                                <h1 class="col-12 text-center fw-bold text-capitalize mb-4 pinkcolor" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo ($product_data["product_name"]) ?></h1>
                                

                                <img src="<?php echo ($product_data["product_image_path"])  ?>" class="card card-img-top" style="height: 200px;" width="230px" alt="...">
                                <div class="card-body">
                                    <h2 class="fw-bold">Rs.<?php echo ($product_data["price"]) ?></h2>
                                    <h6 class="fw-bold text-uppercase">&star; <?php echo ($product_data["size"]) ?> size
                                        <?php
                                        if ($product_data["gender_id"] == 1) {
                                            echo ("🚹 ") ?>
                                            &#x2642
                                        <?php
                                        } else {
                                            echo ("︎🚺") ?>
                                            &#9792
                                        <?php
                                        }

                                        ?></h6>
                                    <p class="card-text mb-3"><?php echo ($product_data["description"]) ?></p>
                                    <p class="card-text fs-5 text-success fw-bold text-center mb-3"><?php echo ($product_data["qty"]) ?> Items Available</p>
                            </a>
                            <a href='singleProductView.php?pid= <?php echo $product_data["product_id"]; ?>' class="btn btn d-grid" style="background-color: rgb(237, 10, 139); color: white;" >Buy Now</a>
                        </div>

            </div>


    <?php


                    }
                }


    ?>

    <!-- product -->

        </div>



    </div>


    <!-- <nav aria-label="Page navigation example " class="d-flex justify-content-center align-items-center">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>

                <?php

                $page_no = 1;
                $page_limit = 2;

                $number_of_page = ceil($product_num / $page_limit);
                echo ($number_of_page);
                for ($y = 1; $y <= $number_of_page; $y++) {
                    if ($y == $page_no) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" ><?php echo $y; ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" ><?php echo $y; ?></a>
                        </li>
                <?php
                    }
                }

                ?>


                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav> -->

    <?php

    include "footer.php";

    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>