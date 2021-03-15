<?php
 require_once 'conexao.php';

  if(!empty($_GET['cardes'])) {
    $cards = explode('a', $_GET['cardes']);
  
    foreach ($cards as $key => $value) {
      echo $value;
      $r = $db->prepare("SELECT idPostagem FROM usuario_postagem WHERE idPostagem=? AND idUsuario=?");
      $r->execute(array( $value,$_SESSION['id']));
      if($r->rowCount()==0) {
        $r = $db->prepare("INSERT INTO usuario_postagem(idUsuario,idPostagem) VALUES (?,?)");
        $r->execute(array($_SESSION['id'],$value));
      } 
      
    }

  }

?><a href=" listarResultados.php">listar</a>