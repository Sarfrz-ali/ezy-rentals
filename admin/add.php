<?php 
session_start();
if( $_SESSION['admin_session']){
    
    echo $_SESSION['admin_session'];
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
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Car Name" id="">
        <input type="text" name="model" placeholder="Car Model" id="">
        <input type="text" name="color" placeholder="Car Color" id="">
        <input type="number" name="price" placeholder="Car Price" id="">
        <input type="file" name="car_img" id="">
        <button type="submit" name="add">Add</button>
    </form>
</body>
</html>
<?php 
if(isset($_POST["add"])){
    $date =  date("y-m-d");
    // print_r($_POST);
    $name = $_POST["name"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $price = $_POST["price"];
    
    $file_name =  $name . ' ' . $model . ' ' . $color . ' ' . $date . ' ' .$_FILES['car_img']["name"];
     $file_tmp =  $_FILES['car_img']['tmp_name'];

    move_uploaded_file($file_tmp,"../upload/".$file_name);
    $book = 0;

    $car_conn = mysqli_connect("localhost","root","","ezy rentals") or die("connection falied");
    $add_car_sql = "INSERT INTO car (car_make,car_model,car_color,car_img,price_per_day,book) VALUES('{$name}','{$model}','{$color}','{$file_name}','{$price}','{$book}')";
    mysqli_query($car_conn,$add_car_sql)or die("Wrong query");

    header("Location: http://localhost/ezy%20rentals/admin/");
}
?>



<?php 

        }else{
            header("Location: http://localhost/ezy%20rentals/admin/log in.php");
        }

        ?>