<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezy Rentals - Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
        <center>
            <div id="logo"><span class="logo main-color">Ezy</span><span class="logo"> Rentals</span></div>
        </center>
        <input type="text" placeholder="Full Name" name="name" required>
        <input type="text" placeholder="Phone NO" name="phone_no" required>
        <input type="email" placeholder="Email" name="email" required>
        <input type="password" placeholder="Password" name="password" required>
        <button type="submit" class="x-large" name="sign_up">Sign Up</button>
        <p>If you already have an account, <a href="sign in.php">Sign In</a></p>
    </form>


    <?php

        $users_sql = "SELECT * FROM user";
        $user_result = query($users_sql);
    
        if(isset($_POST["sign_up"])){
            $flag = 0;
            $name = $_POST["name"];
            while($user_name = mysqli_fetch_assoc($user_result)){
                if($name == $user_name["user_name"]){
                    $flag = 1;
                }
            }
            if($flag){
                echo "<script>alert('username already exist.')</script>";
            }else{
                $phone_no = $_POST["phone_no"];
                $email = $_POST["email"];
                $password = $_POST["password"];

                $sign_up_query = "INSERT INTO user(user_name,user_phone,user_email,user_password)VALUES('{$name}','{$phone_no}','{$email}','{$password}')";
                query($sign_up_query);
                header("Location: sign in.php");
            }
        }





        


        // 
        // query($sign_up_query);
        // // mysqli_query($conn , $sign_up_query) or die("wrong query");
        // header("Location: http://localhost/ezy rentals/index.php/sign in.php");
    ?>
</body>

</html>