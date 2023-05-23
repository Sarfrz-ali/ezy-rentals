<?php 
session_start();
if (isset($_SESSION['email']) && $_SESSION['password']) {
    $conn = mysqli_connect("localhost","root","","ezy rentals") or die("connection falied");
    ?>


<?php 
$user_id = $_GET['user_id'];
$car_id = $_GET['car_id'];
$booking_date = $_GET['start_date'];
$return_date = $_GET['end_date'];
$total_price = $_GET['total_Price'];

$booking_sql = "INSERT INTO booking(user_id,car_id,booking_date,return_date,price) VALUES('{$user_id}','{$car_id}','{$booking_date}','{$return_date}','{$total_price}')";
echo $update_car_sql = "UPDATE car SET book = '1' where car_id = '{$car_id}'";


mysqli_query($conn,$booking_sql) or die("Query failed");
mysqli_query($conn,$update_car_sql) or die("update query failed");

?>
<?php 

            header("Location: http://localhost/ezy%20rentals");


        }else{
            header("Location: http://localhost/ezy%20rentals/sign%20in.php");
        }

        ?>