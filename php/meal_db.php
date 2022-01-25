<?php

class Meal_db
{
    private $connect;
    protected $db_name = 'meals';
	protected $db_user = 'root';
	protected $db_pass = '';
	protected $db_host = 'localhost';
	
	public function __construct() {
	
		$this->connect = new mysqli( $this->db_host, $this->db_user, $this->db_pass, $this->db_name );
		
		if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
            ", mysqli_connect_error());
			exit();
		}
		
	}

    public function getAllMeals(){

        $result = $this->connect->query("SELECT * FROM meal");
		$meals = array();
		if ($result->num_rows > 0 ) {
            while($row = $result->fetch_assoc()) {
                array_push($meals, $row);
            }
            return $meals;
		} else {
            return 0;
        }

    }

    public function getMealById($id){
        $result = $this->connect->query("SELECT * FROM meal WHERE id = '$id' ");

        if ( $result->num_rows == 1 ) {
			$row = $result->fetch_assoc();
			return $row;
		} else {
            return 0;
        }
    }

    public function getMealReviews($meal_id){
        $result = $this->connect->query("SELECT * FROM reviews WHERE meal_id = '$meal_id' ");
            
        $reviews = array();
		if ( $result->num_rows > 0 ) {
            while($row = $result->fetch_assoc()) {
                array_push($reviews, $row);
            }
            return $reviews;
		} else {
            return 0;
        }
    }

    public function addMealReview($name, $city, $rating, $image, $review, $meal_id) {

        $sql = "INSERT INTO reviews (reviewer_name, city, rating, image, review, meal_id) VALUES ('$name', '$city', '$rating', '$image', '$review', '$meal_id')";
            
        if ( $this->connect->query($sql) == TRUE ) {
			
			return true;

		} else {
            return "Error: " . $sql . "<br>" . $this->connect->error;
        }
    }
}
