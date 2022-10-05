<?php
   try{
        $conexao = new PDO('mysql: host=localhost; dbname=minhaloja; charset=utf8;', 'root', '',
        array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES UTF8'));
        $conexao->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch(PDOException $e){
        echo "Error:" .$e->getMessage();
        echo "Code Error:" .$e->getCode();
   }
?>