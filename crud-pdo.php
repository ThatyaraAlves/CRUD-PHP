<?php
try{
    $pdo = new PDO("mysql:dbname=agenda;
    host=localhost", "agenda-contatos", "senha123");
    // echo "DEU CERTO";

}
catch(PDOException $erro){
    echo "Erro na conexão com o banco de dados ". $erro->getMessage();

}
catch(Exception $erro){
    
    echo "Erro ". $erro->getMessage();
}
?>