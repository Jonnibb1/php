<?php


    include_once ('config.php');


    if (isset($_POST['uptade'])) {
        $id=
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email']; 




        $sql = "UPTADE users SET username=:username, name=:name, email=:email WHERE id=:id";
    
        $sqlQuery = $connect->prepare($sql);
        $sqlQuery->bindParam(':id', $id);
        $sqlQuery->bindParam(':name', $name);
        $sqlQuery->bindParam(':username', $username);
        $sqlQuery->bindParam(':email', $email);
    
        $sqlQuery->execute();
    
        header("Location:index.php");
    }
    




?>