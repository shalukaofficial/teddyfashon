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

    <?php

    include "header.php";

    if (isset($_SESSION["u"])) {

        $semail = $_SESSION["u"]["email"];

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $semail . "' ");
        $cart_num = $cart_rs->num_rows;

        if ($cart_num >= 1) {

            $cart_data = $cart_rs->fetch_assoc();

    ?>

            <div class="card mb-5 ms-5 cursor" style="width: 18rem; ">

                <div class="row  ">
                    <div class="col-6">
                        <button class=" mt-2 btn ">
                            <i class="bi bi-heart-fill text-danger fs-5"></i>
                            <!-- <i class="bi bi-heart-fill text-black fs-5" id="heart"></i> -->

                        </button>
                    </div>

                    <div class="col-6 text-end">
                        <button class=" mt-2 btn " onclick="addToCard(<?php echo $cart_data["product_id"] ?>);">
                            <i class="bi bi-cart-plus-fill fs-5 text-balck "></i>
                        </button>
                    </div>

                </div>

                <a href="#" class="text-decoration-none text-black">

                    <h1 class="col-12 text-center fw-bold text-capitalize mb-4 pinkcolor" style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"><?php echo ($cart_data["product_name"]) ?></h1>


                    <img src="<?php echo ($cart_data["product_image_path"])  ?>" class="card card-img-top" style="height: 200px;" width="230px" alt="...">
                    <div class="card-body">
                        <h2 class="fw-bold">Rs.<?php echo ($cart_data["price"]) ?></h2>
                        <h6 class="fw-bold text-uppercase">&star; <?php echo ($cart_data["size"]) ?> size
                            <?php
                            if ($cart_data["gender_id"] == 1) {
                                echo ("🚹 ") ?>
                                &#x2642
                            <?php
                            } else {
                                echo ("︎🚺") ?>
                                &#9792
                            <?php
                            }

                            ?></h6>
                        <p class="card-text mb-3"><?php echo ($cart_data["description"]) ?></p>
                        <p class="card-text fs-5 text-success fw-bold text-center mb-3"><?php echo ($cart_data["qty"]) ?> Items Available</p>
                </a>
                <a href="#" class="btn btn d-grid" style="background-color: rgb(237, 10, 139); color: white;" onclick="buy();">Buy Now</a>
            </div>

            </div>



        <?php
        }
        ?>
        <div class=" container-fluid  p-3">

            <h1 class="text-center mt-3  border-bottom border-3 fw-bold">Your Cart</h1>

            <div class="d-flex justify-content-center align-items-center row">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" style="height: 300px; width: 300px;" class="bi mt-4 bi-bag-plus" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5" />
                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                </svg>

                <h3 class="text-center mt-3">You have no items in your Cart yet.</h3>

                <div class="p-3 col-12 col-lg-6">
                    <a href="http://localhost/teddyfashon/index.php"><button class="btn startshopingbtn col-12 fs-3 pinkcolor">Start Shoping</button></a>
                </div>

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



    <div class="container-fluid ">

        <?php

        include "footer.php";

        ?>

    </div>



    <script src="bootstrap.js"></script>
    <script src="script.js"></script>
</body>

</html>