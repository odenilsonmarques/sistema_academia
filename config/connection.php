<?php
 $dsn = "mysql:host=192.168.128.1; dbname=db_sistema_academia";
 $dbuser = "root";
 $dbpass = "o1w2o3o4p5rt";
try{
    $connectionPDO = new PDO($dsn, $dbuser, $dbpass);
    echo "conectado com sucesso";
}catch(PDOException $e){
    echo "Error".$e->getMessage();
}