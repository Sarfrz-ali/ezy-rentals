<?php 
$web_url = "localhost/ezy rentals";

function query($sql){
$con = mysqli_connect("localhost","root","","ezy rentals");
return mysqli_query($con , $sql);
}
?>