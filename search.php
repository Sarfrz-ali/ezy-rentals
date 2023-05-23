<?php 
session_start();
if (isset($_SESSION['email']) && $_SESSION['password']) {
    $conn = mysqli_connect("localhost","root","","ezy rentals") or die("connection falied");
    $id = $_SESSION['id'];
$serarch =  $_GET['search'];
    $profile_sql = "SELECT * FROM user where id = {$id}";
    $profile_result = mysqli_query($conn , $profile_sql) or die("wrong query");
    $name;
    while($row = mysqli_fetch_assoc($profile_result)){
        $name = $row['user_name'];
    }

    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezy Rentals</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    /* input[type="number"] {
} */


    

</style>

<body>
<?php include "common_header.php" ?>
   


<?php
$car_sql = "SELECT * FROM car where car_make = '$serarch'";
$car_result = mysqli_query($conn,$car_sql) or die("query failed");
?>
    <main>


        <div class="container p main">
<?php
while($row = mysqli_fetch_assoc($car_result)){
 ?>
            <div class="car">
                <div class="image">
                    <a href="post.php?car_id=<?php echo $row['car_id'] ?>"><img src="upload/<?php echo $row['car_img'] ?>" alt="honda"></a>
                </div>
                <div class="car-info">
                    <div class="flex">
                        <h2><a href="post.php?car_id=<?php echo $row['car_id'] ?>"><?php echo $row['car_make'] ?></a></h2>
                        <h4><?php echo $row['car_color'] ?></h4>
                    </div>
                    <h5>Model: <?php echo $row['car_model'] ?></h5>
                    <h5 class="car_book"><?php echo $row['book'] ?></h5>
                </div>

            </div>
<?php } ?>
            
        </div>
        </div>


        
    </main>
    <footer>

    </footer>
</body>
<script>
        let cars_book = document.querySelectorAll(".car_book");
    cars_book.forEach(car => {
        if(car.innerText === "1"){
            car.innerText="not avaiable";
            car.style.color = "grey";
        }
        else{
            car.innerText="available"
            car.style.color = "green";
        }
    })
</script>
</html>
<?php 



        }else{
            header("Location: http://localhost/ezy%20rentals/home.html");
        }

        ?>