<?php

include_once('config.php');

$id = $GET['id'];
 $sql = "DELETE FROM users WHERE id = :id";

 $prep = $conn->prepare($sql);
 $prep->blindParam(':id', $id);
 $prep->execute();

 header("Location: dashboard.php");
 ?>