<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=db1", "root", "");


    //Table alteration SQL
    $sql = "DROP TABLE users";

    //Execute the statement

    $pdo -> exec($sql);
    echo "Table dropped sucessfully";
    
    
}catch(PDOException $e){
     $e->getmessage();

}
?>