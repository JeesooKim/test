<?php

$host= "localhost";
$username = "root";
$password = "";
$db="cdcol";
$dsn ="mysql:host=localhost;dbname=cdcol";

// we try to connec to db, alwasy use try and catch
try{
    $dbcon = new PDO($dsn, $username, $password);
         //echo "connected";
    $t="Glee";
    
    $sql = "SELECT * FROM cds where titel = ':titel'";
    //$sql = "SELECT * FROM cds where titel = ':ttt'";
    //$sql = "SELECT * FROM mproducts";

    $stm =$dbcon->prepare($sql);
    
    $stm ->bindParam(':titel', $t, PDO::PARAM_STR);
    //$stm ->bindParam(':ttt', $t, PDO::PARAM_STR);
    $result=$stm->execute();
    
    $result -> setFetchMode(PDO::FETCH_NUM);
    //var_dump($result ->fetchAll());   
    
    foreach($result as $cd){
        echo $cd[0] . ":" . $cd[1]. "<br/>'";
    }
    
//    echo "<hr/>";
//    $t="JAVA";
//    $result = $stm -> execute();
//    foreach($result as $cd){
//        echo $cd[0] . ":" . $cd[1]. "<br/>'";
//    } 
        
        
}
catch(PDOException $e){
    echo $e->getMessage();
}