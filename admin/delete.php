<?php 
$conn = mysqli_connect("localhost","root","","ezy rentals") or die("connection falied");
$req_id = $_GET['car_id'];
?>

<?php 
session_start();
if( $_SESSION['admin_session']){
?>


<?php 
    $car = "SELECT * FROM car where car_id = $req_id"; 
    $result = mysqli_query($conn,$car) or die("query 1 faild");  
    while($row = mysqli_fetch_assoc($result)){
    $pre_img = "../upload/".$row['car_img'];

        if(file_exists($pre_img)){
            if(!unlink($pre_img)){
            echo "image not update";
        }else{
            echo "image delete";
        }
        }else{
            echo "<br>not exist";
        }
}



echo  $car = "DELETE  FROM car where car_id = $req_id";
$delete_car = mysqli_query($conn , $car) or die("wrong query"); 
header("Location: http://localhost/ezy%20rentals/admin/"); 

        }else{
            header("Location: http://localhost/ezy%20rentals/admin/log in.php");
        }

        ?>