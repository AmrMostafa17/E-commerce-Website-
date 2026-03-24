<?php 

try{
    $pdo=new PDO("mysql:host=localhost;dbname=ecommerce","root","");
    
}catch(PDOException $e){  //Handling Errors
    echo "Error Connection". $e->getMessage();
}
?>