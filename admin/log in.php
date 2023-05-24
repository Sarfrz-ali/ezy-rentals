<?php 
$conn = mysqli_connect("localhost","root","","ezy rentals") or die("connection falied");
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
    </form>

    <?php 
    if(isset($_POST["sign_in"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $flag = 0;

            if( $email == "admin@email.com" &&  $password == "admin"){
                $flag = 1;
            }
       
        if($flag){
            session_start();
            $_SESSION['admin_session'] = "true";
            echo "session set";
            
            header("Location: http://localhost/ezy rentals/admin");
       
        }else{
            echo "<script>alert('Sorry! Try again')</script>";
        }
    }
    ?>
    <footer>

    </footer>
</body>

</html>