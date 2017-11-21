<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Head Libraries For The Project Start -->
        <?php include './libraries/obosHeadLibrary.php'; ?>
        <!-- Head Libraries For The Project End -->

    </head>

    <body>

        <!-- Title And Navigation Panel Start -->
        <?php include './titleAndNavigationPanel.php'; ?>
        <!-- Title And Navigation Panel End -->



        <div class="container">

            <div class="bg-faded p-4 my-4">

                <!-- Image Carousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-100" src="img/bakery_1_1.jpg" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="img/bakery_2_1.jpg" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="img/bakery_3_1.jpg" alt="">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>

                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>

                <!-- Welcome Message -->
                <div class="text-center mt-4">
                    <div class="text-heading text-muted text-lg">
                        Welcome To
                    </div>
                    <h1 class="my-2">
                        Online Bakery Ordering System (OBOS)
                    </h1>
                    <div class="text-heading text-muted text-lg">
                        <strong>By Dsiblingsweetz Sdn. Bhd. Team</strong>
                    </div>
                </div>

            </div>

            <div class="bg-faded p-4 my-4">
                <hr class="divider">
                <h2 class="text-center text-lg text-uppercase my-0">
                    <strong>INTRODUCTION TO OBOS</strong>
                </h2>
                <hr class="divider">
                <p>Please Explain...</p>
            </div>

        </div>
        <!-- /.container -->



        <!-- Footer Panel Start -->
        <?php include './footerPanel.php'; ?>
        <!-- Footer Panel End -->


        <!-- Foot Libraries For The Project Start -->
        <?php include './libraries/obosFootLibrary.php'; ?>
        <!-- Foot Libraries For The Project End -->


    </body>

</html>
