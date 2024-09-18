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

<body>

    <div class="col-1">
        <a class="text-bg-light" href="javascript:window.history.back();">
            <div class=" text-center homeIcon  rounded-5" style="height: 70px; width: 70px;">
                <i class="bi bi-house-door-fill " style="font-size:50px; "></i>
            </div>
        </a>

    </div>


    <div class="container-fluid ">

        <div class="row p-5 mb5 d-flex justify-content-center justify-content-lg-start align-items-lg-end align-items-center bg-warning">

            <div class="col-11 col-lg-4 mt-1 card bg-danger">

                <?php

                session_start();
                include "connection.php";

                $pid = $_GET["pid"];

                $product_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_image` ON `product`.`product_id` = `product_image`.`product_img_id`
                INNER JOIN `size` ON `product`.`size_id` = `size`.`id` WHERE `product_id` = '" . $pid . "'");
                $product_num = $product_rs->num_rows;
                ?>

                <div id="carouselExampleFade" class="carousel slide carousel-dark ">
                    <div class="carousel-inner ">
                        <?php

                        for ($x = 0; $product_num > $x; $x++) {
                            $product_data = $product_rs->fetch_assoc();

                            if ($x == 0) {

                        ?>
                        <div class="carousel-item active">
                            <img src="<?php echo ($product_data["product_image_path"]) ?>" class="d-block w-100 "
                                style="height: 400px;" alt="...">
                        </div>
                        <?php

                            } else {
                            ?>
                        <div class="carousel-item ">
                            <img src="<?php echo ($product_data["product_image_path"]) ?>" class="d-block w-100"
                                style="height: 400px;" alt="...">
                        </div>
                        <?php
                            }
                        }

                        ?>

                    </div>
                    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bg-black rounded-2" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon bg-black rounded-2" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>

            <div class="col-12 col-lg-4 mt-4 ms-lg-2 bg-info">

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
                <p class="card-text fs-5 text-success fw-bold mb-3"><?php echo ($product_data["qty"]) ?> Items Available
                </p>

                <?php
                if ($product_data["qty"] == 0) {
                ?>
                <div class="btn d-grid bg-danger text-white ">Out of Stock</div> <?php
                                                                                    } else {
                                                                                        ?>
                <div class="btn btn d-grid col-lg-6" style="background-color: rgb(237, 10, 139); color: white;">Buy Now
                </div>
                <?php
                                                                                    }
                ?>

            </div>

        </div>

        <?php

        include "footer.php";

        ?>

    </div>



    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>