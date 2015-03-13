<?php

$host= "localhost";
$username = "root";
$password = "";
$db="cdcol";
$dsn ="mysql:host=localhost;dbname=cdcol";

//$db="mytestdb";
//$dsn ="mysql:host=localhost;dbname=mytestdb";
        
// we try to connec to db, alwasy use try and catch
try{
    $dbcon = new PDO($dsn, $username, $password);
         //echo "connected";
    $t="Glee";
    $sql = "SELECT * FROM cds where titel = '$t'";
    //$sql = "SELECT * FROM mproducts";

    $result =$dbcon->query($sql);
    //var_dump($result );  
    //var_dump — Dumps information about a variable
    //Output for the above line: object(PDOStatement)#2 (1) { ["queryString"]=> string(38) "SELECT * FROM cds where titel = 'Glee'" } 
    //var_dump($result ->fetchAll());   
    //gives associatvie array as well as numerically indexed array
    //Output:
    //array(1) { [0]=> array(8) { 
    //                 ["titel"]=> string(4) "Glee" [0]=> string(4) "Glee" 
    //                 ["interpret"]=> string(13) "Bran Van 3000" [1]=> string(13) "Bran Van 3000" 
    //                 ["jahr"]=> string(4) "1997" [2]=> string(4) "1997" 
    //                 ["id"]=> string(1) "5" [3]=> string(1) "5" 
    //                 } 
    //          }
    //basically, fetchall() and foreach() below result in the same thing but...if the db is so large and tgere
    
    /*
    $result -> setFetchMode(PDO::FETCH_ASSOC);
    foreach($result as $cd){
       echo $cd['titel'] . ":" . $cd['interpret']. "<br/>";       
    }      
     */    
    
    $result -> setFetchMode(PDO::FETCH_NUM);
    foreach($result as $cd){        
        echo $cd[0] . ":" . $cd[1]. ":" . $cd[2]."<br/>";
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}