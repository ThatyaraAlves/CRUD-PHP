<?php
include "crud-pdo.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    
    <h1>Cadastrar Pessoa</h1>
    <?php

    if (!isset($_POST["bt_sub"])) {
      
    ?>
      <form  action="" method="POST">
        <label for="nome">Nome</label>
        <input type="text" name="ds_nome" id="nome">
        <br>
        <input type="radio" name="cd_sexo" id="masc" value="M">
        <label for="masc">Masculino</label>
        <input type="radio" name="cd_sexo" id="fem" value="F">
        <label for="fem">Feminino</label>
        <input type="radio" name="cd_sexo" id="ndef" value="N">
        <label for="ndef">Prefiro não informar</label>
        <br>
        <label for="dtnasc">Data Nascimento</label>
        <input type="date" name="dt_nasc" id="dtnasc">
        <br>
        <label for="email">E-mail</label>
        <input type="text" name="ds_email" id="email">
        <br>
        <label for="telefone">Telefone</label>
        <input type="text" name="nr_telefone" id="telefone">
        <br>
        <input type="submit" name="bt_sub" value="Inserir">
      </form>

    <?php

    } else {
      $ds_nome = $_POST["ds_nome"];
      $cd_sexo = $_POST["cd_sexo"];
      $dt_nasc = $_POST["dt_nasc"]; 
      $nr_telefone = $_POST["nr_telefone"];
      $ds_email = $_POST["ds_email"];
     

  
      try {
          $sql = 'INSERT INTO `agenda`.`tb_pessoa` (`ds_nome`,`cd_sexo`,`dt_nasc`,`nr_telefone`,`ds_email`)  VALUES (:ds_nome,:cd_sexo,:dt_nasc,:nr_telefone,:ds_email);';
          
          $stmt = $pdo->prepare($sql);
          $stmt->bindParam(':ds_nome', $ds_nome);
          
          $stmt->bindParam(':cd_sexo', $cd_sexo);
          $stmt->bindParam(':dt_nasc', $dt_nasc);
          $stmt->bindParam(':nr_telefone', $nr_telefone);
          $stmt->bindParam(':ds_email', $ds_email);
          $stmt->execute();
        
          if ($stmt->rowCount()>0) {
            echo "<p>Registro inserido com sucesso</p>"; 
          }
        } catch(PDOException $e) {
          echo 'Erro: ' . $e->getMessage();
        }
    }

    ?>
    <p><a href="index.php">Página principal</a></p>
</body>
</html>