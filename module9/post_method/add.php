<?php

include_once("db.php");

//isset 
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'INSERT INTO users(username, email, password)VALUES (:username, :email, :password)';

    $sqlQuery = $connect->prepare($sql);
    $sqlQuery->bindParam(':username', $username);
    $sqlQuery->bindParam(':email', $email);
    $sqlQuery->bindParam(':password', $password);
    echo "The user was added sucessfully!!!!";
}
?>