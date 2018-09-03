<?php 
 
 /*
 * Created by Belal Khan
 * website: www.simplifiedcoding.net 
 * Retrieve Data From MySQL Database in Android
 */
 
 //database constants
 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASS', '');
 define('DB_NAME', 'db_rentcar');
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT id_car, name_car, years, capacity, price, image,fuel,bag FROM car;");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($id_car, $name_car, $years, $capacity, $price, $image, $fuel,$bag);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['id_car'] = $id_car; 
 $temp['name_car'] = $name_car; 
 $temp['years'] = $years; 
 $temp['capacity'] = $capacity; 
 $temp['price'] = $price; 
 $temp['image'] = $image; 
 $temp['fuel'] = $fuel;
$temp['bag'] = $bag;  
 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);