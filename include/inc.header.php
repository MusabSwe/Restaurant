<?php


?>

<header>

    <div id="home"></div>

    <!-----------------------------------------NavBar---------------------------------------------------->

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #281923;
        opacity: 61%;">
        <div class="container">

            <img class="navbar-brand img-fluid" src="logo-White.svg" style="width: 5rem; margin-left: 5rem">
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler"
                    data-target="#navbarSupportedContent" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto" style="margin-left: 7rem;">
                    <li class="nav-item active ">
                        <a class="nav-link p-3 black_bar" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link p-3 black_bar" href="index.php#menu">Menue</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link p-3 black_bar" href="index.php#gallery">Gallery</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link p-3 black_bar" href="index.php#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link p-3 black_bar" href="#contact us">contact us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link p-3 red_bar" href="index.php">Search</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link p-3 red_bar" href="index.php">Profile</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link p-3 red_bar" data-toggle="modal" data-target="#myModal" href="index.php">Cart<h6 align="center" id="outputCart" >0</h6>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!---------------------------------------------------HEADER END HERE-------------------------------------------------->

    <!---------------------------------------------------MODAL START-------------------------------------------------->

    <div class="modal fade" id="myModal">
        <!--dialog-->
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <!--header-->
                <div class="modal-header">
                    <h5 class="modal-title">Cart Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!------------------------------ modal body------------------------------------------>

                <div class="modal-body">
                    <div class="container">
                        <div class="row justify-content-between mr-0">
                            <p>Item</p>
                            <p>Price</p>
                        </div>

                        <div class="row justify-content-between mr-4" id="div1">

                            <p id="outputCardName1"></p>
                            <p id="outputCardPrice1"></p>

                        </div>

                        <div class="row justify-content-between mr-4" id="div2">

                            <p id="outputCardName2"></p>
                            <p id="outputCardPrice2"></p>

                        </div>

                        <div class="row justify-content-between mr-4" id="div3">

                            <p id="outputCardName3"></p>
                            <p id="outputCardPrice3"></p>

                        </div>

                        <div class="row justify-content-between mr-4" id="div4">

                            <p id="outputCardName4"></p>
                            <p id="outputCardPrice4"></p>

                        </div>

                        <div class="row justify-content-between mr-4" id="div5">

                            <p id="outputCardName5"></p>
                            <p id="outputCardPrice5"></p>

                        </div>

                        <div class="row justify-content-between mr-4" id="div6">

                            <p id="outputCardName6"></p>
                            <p id="outputCardPrice6"></p>

                        </div>

                        <div class="row justify-content-between mr-0">
                            <p>Total</p>
                            <p style="margin-right: 1.5rem;" id="TotalPrice">0</p>
                        </div>


                    </div>

                </div>
                <!-----------------------------modal body End of modal------------------------------------->

                <!--            footer buttons location-->
                <div class="modal-footer">
                    <button type="button" class="Modal_close_btn" data-dismiss="modal">Close</button>
                    <button type="button" class="Modal_order_btn" data-dismiss="modal" onclick="reset()">Order Now</button>
                </div>
            </div>

        </div>

    </div>


    <!---------------------------------------------------Modal END -------------------------------------------------->

</header>