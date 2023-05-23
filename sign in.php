<?php 
include "config.php";
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
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
        <center>
            <div id="logo"><span class="logo main-color">Ezy</span><span class="logo"> Rentals</span></div>
        </center>

        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="x-large" name="sign_in">Sign In</button>
        <p>If you have not an account, <a href="sign up.php">Sign Up</a></p>
    </form>

    <?php 
    if(isset($_POST["sign_in"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $sign_in_query = "SELECT * FROM user";
        $result = query($sign_in_query);

        $flag = 0;
        $id;
        $user_email;
        $user_password;
        while($row = mysqli_fetch_assoc($result)){
            if($row["user_email"] == $email && $row["user_password"] == $password){
                $flag = 1;
                $id = $row['id'];
                $user_email = $row["user_email"];
                $user_password = $row["user_password"];
            }
        }
        if($flag){
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['email'] = $user_email;
                $_SESSION['password'] = $password;

            header("Location: http://localhost/ezy rentals");
       
        }else{
            echo "<script>alert('Try again.')</script>";
        }
    }
    ?>
    <footer>

    </footer>
</body>

</html>