<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    echo "not connected";
} else {
    echo "connected";
}

$name = $_POST['name'];
$email = $_POST["email"];
$phone = $_POST["phone"];
$city = $_POST["city"];
$country = $_POST["country"];
$password = $_POST["password"];

$sql = "INSERT INTO `usersdata`(`name`, `email`, `phone`, `city`, `country`, `password`) VALUES ('$name','$email','$phone','$city','$country','$password')";

$result = mysqli_query($con, $sql);

if($result){
    echo "data submitted";
}else{
    echo "query failed....!";
}

?>