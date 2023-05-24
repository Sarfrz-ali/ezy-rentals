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
        $result = mysqli_query($conn , $car) or die("wrong query");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<body>
<?php 
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
?>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Car Name" id="" value="<?php echo $row['car_make'] ?>">
        <input type="text" name="model" placeholder="Car Model" id="" value="<?php echo $row['car_model'] ?>">
        <input type="text" name="color" placeholder="Car Color" id="" value="<?php echo $row['car_color'] ?>">
        <input type="number" name="price" placeholder="Car Price" id="" value="<?php echo $row['price_per_day'] ?>">
        <img src="<?php echo "http://localhost/ezy%20rentals/upload/".$row['car_img'] ?>" alt="">

        <?php $pre_img = "../upload/".$row['car_img'] ?>
        <input type="file" name="new_img" id="" value="<?php echo "http://localhost/ezy%20rentals/upload/".$row['car_img'] ?>">
        <button type="submit" name="update">Update</button>
    </form>

<?php  }
} ?>
</body>
</html>

<?php 


$pre_img;echo "<br>";
if(isset($_POST["update"])){
    $date =  date("y-m-d");
    $name = $_POST["name"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $price = $_POST["price"];

    if($_FILES['new_img']['name'] == ""){
        $file_name = $pre_img;
    }else{
        echo $file_name =  $name . ' ' . $model . ' ' . $color . ' ' . $date . ' ' .$_FILES['new_img']["name"];
        $file_tmp =  $_FILES['new_img']['tmp_name'];
        move_uploaded_file($file_tmp,"../upload/".$file_name);
        if(file_exists($pre_img)){
            if(!unlink($pre_img)){
                echo "image not update";
            }else{
                echo "image update";
            }
            }else{
                echo "<br>not exist";
            } 
}
$edit_car_sql = "UPDATE car SET car_make = '{$name}',car_model = '{$model}', car_color = '{$color}', car_img = '{$file_name}',price_per_day = '{$price}' WHERE car_id = $req_id";
mysqli_query($conn,$edit_car_sql)or die("Wrong query");
header("Location: http://localhost/ezy%20rentals/admin/");
}


?>



<?php 
    
        }else{
            header("Location: http://localhost/ezy%20rentals/admin/log in.php");
        }

        ?>