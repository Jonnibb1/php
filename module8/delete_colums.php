<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=db1", "root", "");


    //Table alteration SQL
    $sql = "ALTER TABLE users DROP COLUMN email";

    //Execute the statement

    $pdo -> exec($sql);
    echo "Colum created sucessfully";
    
    
}catch(PDOException $e){
    echo "fError creating columm :". $e->getmessage();

}
?>