<?php 
session_start();
if (isset($_SESSION['email']) && $_SESSION['password']) {
    $conn = mysqli_connect("localhost","root","","ezy rentals") or die("connection falied");
    $id = $_SESSION['id'];

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
    img {
        width: 100%;
        /* height: 100% */
    }
</style>


<body>
    <?php include "common_header.php" ?>
   

    <?Php
    $car_id = $_GET["car_id"];
    $car_sql = "SELECT * FROM car where car_id = {$car_id}";
    $car_result = mysqli_query($conn , $car_sql) or die("car query");

    while($row = mysqli_fetch_assoc($car_result)){
?>

    <style>
        .form{
            position: relative;
            margin:0;
        }
        .main-left {
            width: 60%;
        }

        .main-right {
            width:30%;
        }

        main img {
            width: 60%
        }

        .car-color {
            margin-left: 20px;
        }

        .car_book {
            margin-left: 30%;
        }

        .main_right {
            display: block;
        }
        input[type="number"]:nth-child(1),input[type="number"]:nth-child(2){
            visibility:hidden;
        }
        strong{
            display:inline-block;
            padding:10px 0;
        }
    </style>


    <main>
        <div class="container p main">
            <div class="main-left">
                <img src="upload/<?php echo $row['car_img'] ?>" alt="honda">
                <div class="flex">
                    <h1>
                        <?php echo $row['car_make'] ?>
                    </h1>
                    <h5 class="car_book">
                        <?php echo $row['book'] ?>
                    </h5>
                </div>
                <div>
                    <span><strong>Car Model: </strong>
                        <?php echo $row['car_model'] ?>
                    </span>
                    <span class="car-color"><strong>Color: </strong>
                        <?php echo $row['car_color'] ?>
                    </span>
                </div>
                <div>
                    <span><strong>Price: </strong>
                        <?php echo '$'.$row['price_per_day'] ?>
                    </span>
                </div>
                <div id="book_now">
                    <button onclick="booking_info()">book Now</button>
                </div>
            </div>
            <div class="main-right">
                <form action="booking.php" class="form">
                    <input type="number" name="user_id" value="<?php echo $id; ?>" id="">
                    <input type="number" name="car_id" value="<?php echo $row['car_id']; ?>" id="">
                    <label for="starting date">Starting Date</label>
                    <input type="date" name="start_date" id="start_date">

                    <label for="starting date">Ending Date</label>
                    <input type="date" name="end_date" id="end_date">
                    <div id="t-days"></div>
                    <!-- <div id="t-price"></> -->
                    <input type="number" name="total_Price" id="t-price" disabled>
                    
                    <button type="reset" onclick="reset_data()" class="teriary-btn">Reset</button>
                    <button type="submit" id="book_status" class="x-large">Book Now</button>

                    <script>
                        let current_date = new Date;
                        let starting_date = document.querySelector("#start_date");
                        let ending_date = document.querySelector("#end_date");
                        let c_d = current_date.getDate(), c_m = current_date.getMonth()+1, c_y = current_date.getFullYear();
                        let s_d,  s_m,  s_y,  e_d,  e_m,  e_y;

                        let total_days =0;
                        let total_price = 0;

                        function reset_data(){
                            document.querySelector("#t-days").innerText = "";
                            document.querySelector("#t-price").innerText = "";
                        }  

                        function ext_d(dat, f) {
                            let inputDate = dat.value;   
                            let date = new Date(inputDate);
                            let extractedDate;
                            if (f === 'd') {
                                extractedDate = date.getDate();
                                extractedDate++;
                            }

                            if (f === 'm') {
                                extractedDate = date.getMonth();
                                extractedDate++;
                            }
                            if( f === 'y'){
                                extractedDate = date.getFullYear(); 
                            }

                            return(extractedDate);
                        }    


                        starting_date.addEventListener("input", function () {
                            s_d = ext_d(starting_date,'d') ,s_m = ext_d(starting_date,'m'),s_y = ext_d(starting_date,'y');
                            // console.log(y);

                            if(s_y >= c_y && s_m >= c_m && s_d >= c_d){
                                ending_date.focus();
                            }else{
                                alert("invalid date.");
                                starting_date.value = starting_date.defaultValue;
                            }
                            
                        })

                        ending_date.addEventListener("input", function () {
                            e_d = ext_d(ending_date,'d') ,e_m = ext_d(ending_date,'m'),e_y = ext_d(ending_date,'y');
                            if(e_y >= s_y && e_m >= s_m && e_d >= s_d){
                                const diffYears = e_y - s_y;
                                const diffMonths = e_m - s_m;
                                const diffDays = e_d - s_d;
                                
                                total_days = days(diffYears,diffMonths,diffDays);
                                document.querySelector("#t-days").innerText = "Days: " +total_days;
                                document.querySelector("#t-price").value = total_days * <?php echo $row['price_per_day'] ?>;                    
                            }else{
                                alert("invalid date.");
                                ending_date.value = ending_date.defaultValue;
                            }

                            
                        })
                      

                        function days(y,m,d){
                            let months = [31,28,31,30,31,30,31,31,30,31,30,31];
                            let month_days = 0;
                            for(let i = 0;i<m;i++){
                            month_days = months[i] + month_days;
                        }
                        d = d + month_days;
                        y = y*365;
                            return d+y;
                        }

                    </script>


                </form>


            </div>
        </div>
    </main>

    <?php } ?>
    <footer>

    </footer>
</body>
<script>
    let cars_book = document.querySelectorAll(".car_book");
    let book_now_btn = document.querySelector("#book_now");
    let book_btn = document.querySelector("#book_status");
    cars_book.forEach(car => {
        if (car.innerText === "1") {
            car.innerText = "not avaiable";
            car.style.color = "grey";
            book_now_btn.innerHTML = "<button disabled>Book Now</button>";
            book_btn.disabled = true;
        }
        else {
            car.innerText = "available"
            car.style.color = "green";
        }
    })


</script>

</html>
<?php 

header("Location: http://localhost/ezy%20rentals");

        }else{
            header("Location: http://localhost/ezy%20rentals/sign%20in.php");
        }

        ?>