<?php
//session_start();
if(isset($_GET["id"])) :
    $id = $_GET["id"];
    require_once "php/meal_db.php";
    $CARD = new Meal_db();
    $card = $CARD->getMealById($id);
    include "include/inc.header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>detail.html</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <script src="Scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</head>

<body>
<main>

    <!---------------------------------------------First Section--------------------------------------------->

    <section class="first-sec" style="margin-top: 5.1rem;">
        <div class="container">

            <div class="row">

                <div class="col-xl-6 col-md-12 col-sm-12">
                    <img src=<?php echo $card["image"];?> class="img-fluid" style="height: 100%;"  alt="meal1">
                </div>
                <div class="col-xl-6 col-md-12 col-sm-12">

                    <h1 class="title"><?php echo $card["title"]; ?></h1>
                    <p> <?php echo $card["price"];?></p>
                    <p><span id="rating-value">0.0</span>&#11088; rating</p>

                    <p> Lorem ipsum dolor adipisicing elit. Expecturi labore
                        eos delectus, porro eveniet maiores
                        repellendus! Iusto eos illo, nisi fugiat delectus
                        nostrum harum aliquid rerum nobis tempora nulla sit.</p>

                    <div class="row justify-content-sm-between justify-content-md-between justify-content-between">
                        <div>
                            <span class="borders" id="add" onclick="decrement()">-</span>
                            <span class="borders" id="output">1</span>
                            <span class="borders" id="subtract" onclick="increment()">+</span>
                        </div>

                    <form method="post" action="php/cart.php">
                        <input type="hidden" name="id" value="<?php echo $card["id"]?>">
                        <a href="php/cart.php?id=<?php echo $card["id"]?>&back=<?php echo "../detail.php?id="?><?php echo $card["id"]?>">
                            <button type="submit" onclick="addItem();" class="addToCart" >add to cart</button></a>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--------------------------------------First Section End--------------------------------------->


    <!------------------------------------------Description pill start--------------------------->

    <ul class="nav nav-pills mb-3 mt-1" id="pills-tab" role="tablist">
        <li class="nav-item" style="margin-left: 10rem;">
            <a class="nav-link active btn-lg" style="color: #a80e0e;" id="pills-description-tab"
               data-toggle="pill" href="#pills-description" role="tab"
               aria-controls="pills-description" aria-selected="true">description</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-lg" style="color: #a80e0e ;" id="pills-reviews-tab"
               data-toggle="pill" href="#pills-reviews"
               role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</a>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent" >
        <div class="tab-pane fade show active" style="margin-left: 10rem; margin-right: 10rem;" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">


            <article>
                <h3 class="title">description</h3>

                <p><?php  echo $card["description"];  ?>  </p>

            </article>
            <div class="container pl-0">
                <p class="text-justify lead"><strong>nutrition facts</strong></p>
            </div>
            <div class="container pl-0">
                <div class="table-responsive">

                    <!-- <table class="table table-bordered table-striped table-hover mb-0">
                        <tr>

                            <td><strong>Supplement Facts</strong></td>
                        </tr>
                        <tr class="grayHover">
                            <td><strong>Serving Size: </strong><?php echo $card["nutrition"]["serving_size"];?></td>

                        </tr>
                        <tr>
                            <td><strong>Serving Per Container:</strong><?php echo $card["nutrition"]["serving_per_container"];?></td>
                        </tr>
                    </table>

                    <table class="table table-bordered table-striped table-hover mt-0 mb-0" >

                        <tr >
                            <td></td>
                            <td><strong>Amount Per Serving</strong></td>
                            <td><strong>%Daily Value*</strong></td>
                        </tr>


                        <tr>
                            <td><?php echo $card["nutrition"]["facts"][0]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][0]["amount_per_serving"]." ".$card["nutrition"]["facts"][0]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][0]["daily_value"];?></td>
                        </tr>
                        <tr>
                            <td><?php echo $card["nutrition"]["facts"][1]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][1]["amount_per_serving"]." ".$card["nutrition"]["facts"][1]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][1]["daily_value"];?></td>
                        </tr>
                        <tr>
                            <td><?php echo $card["nutrition"]["facts"][2]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][2]["amount_per_serving"]." ".$card["nutrition"]["facts"][2]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][2]["daily_value"];?></td>
                        </tr>
                        <tr>
                            <td><?php echo $card["nutrition"]["facts"][3]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][3]["amount_per_serving"]." ".$card["nutrition"]["facts"][3]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][3]["daily_value"];?></td>
                        </tr>
                        <tr>
                            <td>Trans Fat</td>
                            <td>0 g</td>
                            <td></td>
                        </tr>
                        <tr >
                            <td><?php echo $card["nutrition"]["facts"][4]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][4]["amount_per_serving"]." ".$card["nutrition"]["facts"][4]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][4]["daily_value"];?></td>
                        </tr>
                        <tr>
                            <td><?php echo $card["nutrition"]["facts"][5]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][5]["amount_per_serving"]." ".$card["nutrition"]["facts"][5]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][5]["daily_value"];?></td>
                        </tr>
                        <tr >
                            <td><?php echo $card["nutrition"]["facts"][6]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][6]["amount_per_serving"]." ".$card["nutrition"]["facts"][6]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][6]["daily_value"];?></td>
                        </tr>
                        <tr>
                            <td>Dietary Fiber</td>
                            <td>5 g</td>
                            <td>20%</td>
                        </tr>
                        <tr >
                            <td>Sugars</td>
                            <td>12 g</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sugar Alcohol</td>
                            <td>0 g</td>
                            <td></td>
                        </tr>
                        <tr >
                            <td>Protein</td>
                            <td>8 g</td>
                            <td>8%</td>
                        </tr>
                        <tr>
                            <td><?php echo $card["nutrition"]["facts"][7]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][7]["amount_per_serving"]." ".$card["nutrition"]["facts"][7]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][7]["daily_value"];?></td>
                        </tr>
                        <tr >
                            <td>Vitamin C</td>
                            <td></td>
                            <td>0%</td>
                        </tr>
                        <tr>
                            <td><?php echo $card["nutrition"]["facts"][8]["item"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][8]["amount_per_serving"]." ".$card["nutrition"]["facts"][8]["unit"];?></td>
                            <td><?php echo $card["nutrition"]["facts"][8]["daily_value"];?></td>
                        </tr>
                        <tr >
                            <td>Iron</td>
                            <td></td>
                            <td>10%</td>
                        </tr>
                    </table> -->

                    <table class="table table-bordered table-hover mt-0">
                        <tr class="grayHover">
                            <td  >* Present Daily Values are based on a 2,000 calorie diet. Your daily values may be higher or
                                lower depending on your calorie needs</td>
                        </tr>

                    </table>
                </div>

            </div>

        </div>
        <!-------------------------------------------Description pill End------------------------------->

        <!-----------------------------------------Review pill start---------------------------------------------->
        <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">

            <section id="Reviews">

                <div class="container">
                    <h3 id="review-title" class="title">Users' Review</h3>

                    <div class="carousel slide" data-ride="carousel">

                        
                        <!-- The slideshow -->
                        <div id="review-item" class="carousel-inner">
                            
                            
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#review" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#review" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>

                    <div class="row">


                        <div class="mt-4 ml-3">
                            <button type="button" class="btn
                                        btn-lg openUserEditBox" id="addYourReview" onclick="display()">Add Your Review</button>
                        </div>

                    </div>

                </div>


                <!--#############################Form Begin###############################-->

                <div id="fff" class="container userForm">
                    <form name="formReview" method="post" onsubmit="return addReview(event)" id="reviewForm">
                        <div class="form-group">
                            <label class="space">Image <br></label>

                            <input type="file"  value="Choose File" accept="image/*" name="Image">
                            <br><br>

                            <label for="Rate">Rate the Food <br></label>
                            <input type="range"  id="Rate" name="Rate" list="tickmarks" step="20">
                            <datalist id="tickmarks">
                                <option value="20"></option>
                                <option value="40"></option>
                                <option value="60"></option>
                                <option value="80"></option>
                                <option value="100"></option>
                            </datalist>

                            <br><br>
                            <label for="Name1" class="space">Name <br></label>
                            <input type="text" class="form-control" id="Name1" name="Name" placeholder=" First and Last name">
                            <br><br>
                            
                            <label for="city" class="space">City <br></label>
                            <input type="text" class="form-control" id="city" name="City" placeholder=" city">
                            <br><br>
                            <div>
                                <label for="Review" id="marg">Review </label>

                                <p id="warning">Please type your review</p>

                                <textarea name="Review" class="form-control" id="Review" cols="30" rows="10"
                                          placeholder=" Type your review here max 500 characters"
                                          onkeyup="count(this)" maxlength="500"></textarea>

                                <span id="countChar">0/500</span>

                            </div>

                            <input type="hidden" name="Meal_id" value="<?php echo $card["id"]?>">
                            <input type="submit" value="Submit" name="" id="submit">
                        </div>
                    </form>
                </div>

            </section>


        </div>

    </div>

    <!--------------------------------------------Review pill End ---------------------------------------------->

</main>

<!----------------------------------------To move div from left to right------------------------->
<script>

$('.openUserEditBox').click(function() {
    $(".userForm").removeClass("hide");
    $(".userForm").addClass("show");
});


function showReview() {
    // Begin ajax call
    var http = new XMLHttpRequest();
    var reviews = {};
    http.open("GET","php/review.php?meal=<?php echo $card["id"]?>",true);

    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let response = this.responseText;

            if (response != 0) {
                reviews = JSON.parse(response);

                document.getElementById('review-item').innerHTML = '' ;
                
                reviews.forEach((review, index) => {

                    var activeClass = '';
                    if (index == '0') {
                        activeClass = 'active';
                    }

                    var rate = review.rating / 20;
                    var ratingStar = '';
                    for (let i = 0; i < rate; i++) {
                        ratingStar += '&#11088;';
                    }                  

                    document.getElementById('review-item').innerHTML += 
                    '<div class="carousel-item row '+ activeClass +'"> <div class="col-xs-12 col-md-4 col-sm-6">'+
                        '<img src="reviewImages/'+ review.image +'" class="img-fluid" alt="">'+
                    '</div>' +
                    '<div class="col-xs-12 col-md-8 col-sm-6 align-self-center mt-1">'+

                        '<h4>' + review.reviewer_name + '</h4>' +
                        '<h5>' + ratingStar + '</h5>' +   
                        '<h5>' + review.city + ', ' + review.date + '</h5>'+
                        '<p>'+ review.review + '</p>'+
                    '</div></div>';

                    var isActive = false;
    
                });


                    var totalRate = 0;
                    var len = 1;

                    for (var i = 0; i < reviews.length; i++) {
                        var totalRate = (totalRate + Number(reviews[i].rating));
                    }
                    totalRate = totalRate / (20 * i);

                    document.getElementById('rating-value').innerHTML = totalRate.toFixed(1);      
                    
            } else {
                document.getElementById('review-title').innerHTML = 'No Reviews';
            }
        }
    }; 
    
    http.send();
}

showReview();

</script>
</body>
<?php  endif; ?>

<?php
include "include/inc.footer.php";
?>

</html>