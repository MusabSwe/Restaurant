<?php
include "include/inc.header.php";
require "php/meal_db.php";
$m = new Meal_db();
$cards = $m->getAllMeals();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!--    below title will show on the tab-->
    <title>index.html</title>
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link href="style.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">
    <script src="Scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</head>

<body>
<main>





    <section ,class="wrap_all_in_middle" class="party_section">

        <div class="container" style="">
            <div class="row">
                <div class="col-xl-12 col-md-6 ">

                    <h1 class="mt-5 ml-5 text-white display-4">Party Time</h1>
                    <div class=" mt-5 mr-5" id="Polygon_Shape">
                <span id="text_Polygon">
                    <div>
                    <h1 class=" text-left pr-5">
                        Buy any 2 burgers and
                        get 1.5L Pepsi Free
                    </h1>
                    </div>
                </span>
                    </div>
                </div>
                <div class="col-xl-12 col-md-6 justify-content-center mt-5 ml-5">
                    <input id="btn_order" type="button" value="Order Now" onclick="showDiv()">
                </div>

            </div>
        </div>
    </section>
    <!--    #################################    want to eat  #####################################-->
    <div id="menu"></div>

    <div class="" style="">
        <div class="row" style="margin-top: 10rem">
            <div class="col-md-12 text-center my-3" >
                <h3 style="color: #b80202 ; margin-top: 5rem">Want to Eat</h3>
                <p>Try our most delicious food and usually take minutes to deliver</p>
            </div>
        </div>
        <div class="row text-center text-justify">
            <div class="col-md-1">
                <a class="food_sections" href="#Pizza">Pizza</a>
            </div>
            <div class="col-md-3">
                <a class="food_sections" href="#fast food">fast food</a>
            </div>
            <div class="col-md-2">
                <a class="food_sections" href="#cupcake">cupcake</a>

            </div>
            <div class="col-md-2">
                 <a class="food_sections" href="#Sandwich">Sandwich</a>
            </div>
            <div class="col-md-2">
                <a class="food_sections" href="#spaghetti">spaghetti</a>

            </div>
            <div class="col-md-2">
                <a class="food_sections" href="#Burgur">Burgur</a>
            </div>
        </div>
    </div>
    <!--    #################################    want to eat end  #####################################-->

    <div class="container-fluid " style="background-color: #ffab05 ; width: 100%;">
        <div class="row" style="background-color: #ffab05 ; width: fit-content">
            <div class=" col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <img alt="delivery" class="img-fluid" src="delivery.png"/>
            </div>
            <div class="col-xl-6  align-self-center  col-lg-6 col-md-12 col-sm-12  ">
                <div class="right-triangle">
                <span class="text_triangle1">
                    <h4> We guarantee 30 minutes <br> delivery</h4>
                </span>

                </div>
                <h5 class="text-justify"
                    style="  float:bottom; display: block; color: white;font-family: 'Montserrat', sans-serif;">if you
                    are
                    having a meeting , working late at night and need an extra push</h5>
            </div>

        </div>
    </div>
    </div>


    <!--################### GALLERY SECTION   #############################-->


    <div id="gallery"></div>
        <br><br><br><br>

        <div class="container">
            <div class="row">
                <div class="col-md-12  text-center">

                    <h2 style="color: #a80e0e;">Our most popular recipes</h2>
                    <h4 style="color: #4e555b">Try our most delicious food and usually take minutes to deliver</h4>
                </div>
            </div>
        </div>

        <div class="container-fluid ">
            <div class="row ">
<!----------------------------------------------------------------cards--------------------------------------->
                <?php if(!empty($cards)): foreach ($cards as $card) :?>
                <div class="col-lg-3 col-md-4">
                    <div class="card" style="box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
                        <a href=<?php echo "detail.php?id=$card[id]";?> class=""><img alt="Card image cap" class="card-img-top" src=<?php echo $card['image']?>></a>
                        <div class="card-body">
                            <p><span id="rating-value<?php echo $card['id'] ?>"></span> &#11088; rating</p>
                            <h5 class="card-title"><?php echo $card['title'] ?></h5>
                            <p class="card-text">Some Description.</p>
                            <input type="button" value="add to cart"
                                   class="btn1 btn1w text-white buton addToCart" onclick="addItem();addModal1();">
                            <span class="text-justify"><?php echo $card['price'] ?> SAR</span>
                        </div>
                    </div>
                </div>
                <script>

                    function getTotalRating<?php echo $card['id'] ?>() {

                        var http = new XMLHttpRequest(); 
                        http.open("GET","php/review.php?meal=<?php echo $card["id"]?>",true);
                        http.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                let response = this.responseText;

                                if (response != 0) {
                                    reviews = JSON.parse(response);
                                    var totalRate = 0;
                                    for (var i = 0; i < reviews.length; i++) {
                                        var totalRate = (totalRate + Number(reviews[i].rating));
                                    }
                                    totalRate = totalRate / (20 * i);
                                    document.getElementById('rating-value<?php echo $card['id'] ?>').innerHTML = totalRate.toFixed(1);
                                }
                            }
                        }; 
                        
                        http.send();
                    }
                    getTotalRating<?php echo $card['id'] ?>();
                </script>
                <?php endforeach; endif; ?>


            <!--################### GALLERY SECTION END  #############################-->

            <!--################### testimonials SECTION   #############################-->
            <div id="testimonials"></div>
            <br><br><br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-12  text-center">

                        <h2 style="color: #a80e0e;margin-top: 4rem;">Clients Testimonals</h2>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="carousel slide" data-ride="carousel" id="carouselExampleIndicators">
                            <ol class="carousel-indicators">
                                <li class="active" data-slide-to="0" data-target="#carouselExampleIndicators"></li>
                                <li data-slide-to="1" data-target="#carouselExampleIndicators"></li>
                                <li data-slide-to="2" data-target="#carouselExampleIndicators"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img alt="First slide" class="d-block w-100" src="meal4.png">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae voluptatibus
                                            sequi perspiciatis
                                            provident ratione sed itaque deleniti quaerat perferendis dignissimos
                                            suscipit
                                            porro laboriosam labore
                                            molestiae, officia consequuntur minima ducimus aliquid? </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img alt="Second slide" class="d-block w-100" src="meal2.png">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae voluptatibus
                                            sequi perspiciatis
                                            provident ratione sed itaque deleniti quaerat perferendis dignissimos
                                            suscipit
                                            porro laboriosam labore
                                            molestiae, officia consequuntur minima ducimus aliquid? </p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img alt="Third slide" class="d-block w-100" src="meal3.png">
                                    <div class="carousel-caption d-none d-md-block">
                                        <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae voluptatibus
                                            sequi perspiciatis
                                            provident ratione sed itaque deleniti quaerat perferendis dignissimos
                                            suscipit
                                            porro laboriosam labore
                                            molestiae, officia consequuntur minima ducimus aliquid? </p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" data-slide="prev" href="#carouselExampleIndicators"
                               role="button">
                                <span aria-hidden="true" class="carousel-control-prev-icon"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" data-slide="next" href="#carouselExampleIndicators"
                               role="button">
                                <span aria-hidden="true" class="carousel-control-next-icon"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

<?php
include "include/inc.footer.php";

?>

</main>
</body>
</html>