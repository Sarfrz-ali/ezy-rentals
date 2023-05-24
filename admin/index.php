<?php 
$conn = mysqli_connect("localhost","root","","ezy rentals") or die("connection falied");
?>

<?php 
session_start();
if( $_SESSION['admin_session']){
    ?>


<?php 
        $car = "SELECT * FROM car";
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

<style>
    table img{
        width:200px;
    }td{
        padding: 5px 25px;
    }
    span.logo {
     font-weight: 800;
     font-size: x-large;
 }

 .main-color {
     color: var(--primary-color);
 }

 * {
     margin: 0;
     box-sizing: border-box;
 }

 :root {
     --primary-color: #f43600;
     /* --secondary-color:; */
 }

 body {
     font: 15px sans-serif;
 }

 .container-fluid {
     width: 100%;
 }

 .container {
     max-width: 1440px;
     margin: auto;
     /* min-width: 100%; */
 }

 .wrapper {
     padding: 0px 50px;
 }

 .flex {
     display: flex;
     align-items: center;
 }


 #logo {
     display: inline-block;
 }

 header.flex {
     justify-content: space-between;
     align-items: center;
 }

 .profile-img {
     width: 40px;
     height: 40px;
     background-color: purple;
     text-align: center;
     color: #fff;
     border-radius: 50%;
     padding: 11px;
     text-transform: capitalize;
 }

 #profile {
     position: relative;
     padding-right: 15px;
     cursor: pointer;
 }

 .profile-info {
     border: 1px solid black;
     padding: 10px;
     padding: 4px 0;
     border-radius: 4px;
     position: absolute;
background-color: #fff;
     right: -50%;
     z-index: 1;
     width: 125px;

 }

 .profile-info li {
     /* position: absolute; */

     list-style: none;
     margin-top: 5px;

 }

 .profile-info li:hover {
     background-color: silver;
 }

 .profile-info a {
     padding: 5px 15px;
     text-decoration: none;
     color: #121212;
     background-color: silve;
     display: block;
 }

 svg {
     width: 40px;
 }

 .p {
     padding: 10px 50px;
 }
 
</style>
<div class="container-fluid">
        <header class="container flex p">
            <div id="logo"><span class="logo main-color">Ezy</span><span class="logo"> Rentals</span></div>
            <nav>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="add.php">Add</a></li>

                </ul>
            </nav>
           
        </header>
        <script>
            let profile = document.querySelector("#profile");
            let profile_info = document.querySelector("#profile-info");
            profile.addEventListener("click", function () {
                profile_info.classList.toggle("display-block");
            })

        </script>

    </div>
<table>
    
    <thead>
        <tr>
        <th>NO.</th>
        <th>car</th>
        <th>name</th>
        <th>model</th>
        <th>price</th>
        <th>Car Status</th>
        <th>Action</th>
    </thead>


    <tbody>
    <?php 
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['car_id'];
?>
<tr>
    <td class="row_no"></td>
    <td><img src="<?php echo "http://localhost/ezy%20rentals/upload/".$row['car_img'] ?>" alt=""></td>
    <td><?php echo $row['car_make'] ?></td>
    <td><?php echo $row['car_model'] ?></td>
    <td><?php echo $row['car_color'] ?></td>
    <td><?php echo $row['price_per_day'] ?></td>
    <td class="car_book"><?php echo $row['book'] ?></td>
    <td>
            <a href="edit.php?car_id=<?php echo  $id ?>">Update</a>
            <a href="delete.php?car_id=<?php echo  $id ?>">Delete</a>
       
    </td>
</tr>



</tr>
<?php  }
        } ?>
    </tbody>
</table>
<script>
    let cars_book = document.querySelectorAll(".car_book");
    cars_book.forEach(car => {
        if(car.innerText === "1"){
            car.innerText="booked";
            car.style.color = "red";
        }
        else{
            car.innerText="not book"
            car.style.color = "green";
        }
    })



    let no = document.querySelectorAll(".row_no");
    let c =1;
    no.forEach(num => {
        num.innerText = c;
        c++;
    })
</script>
</body>
</html>



<?php 

        }else{
            header("Location: http://localhost/ezy%20rentals/admin/log in.php");
        }

        ?>