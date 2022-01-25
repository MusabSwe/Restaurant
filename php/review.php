<?php 
require "meal_db.php";
$m = new Meal_db();



if(isset($_GET['meal']) && !empty($_GET['meal'])) {
    $meal_id = $_GET['meal'];

    $result = $m->getMealReviews($meal_id);
    $result = json_encode($result);

    echo $result;

    exit;
}


if (isset($_POST)) {

    if (isset($_POST['Name']) && !empty($_POST['Name'])) {
        $reviewer_name = $_POST['Name'];

    }

    if (isset($_POST['Rate']) && !empty($_POST['Rate'])) {
        $rating = $_POST['Rate'];
    }
    
    if (isset($_POST['City']) && !empty($_POST['City'])) {
        $city = $_POST['City'];
    }

    if (isset($_POST['Review']) && !empty($_POST['Review'])) {
        $review = $_POST['Review'];

    }


    if(isset($_FILES['Image']['name'])){


        $filename = $_FILES['Image']['name'];
     

        $location = "../reviewImages/".$filename;
        

        if(move_uploaded_file($_FILES['Image']['tmp_name'], $location)){
            $image = $filename;

        } else {
            exit;
        }
    }
    
    $saveReview = $m->addMealReview($reviewer_name, $city, $rating, $image, $review, $_POST['Meal_id']);

    echo $saveReview;

    exit;

} 

?>