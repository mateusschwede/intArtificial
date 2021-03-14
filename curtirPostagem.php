<?php
 require_once 'conexao.php';

  if(!empty($_GET['cards'])) {
    $cards = explode('.', $_GET['cards'], -1);
    foreach ($cards as $key => $value) {

      $r = $db->prepare("SELECT idPostagem FROM usuario_postagem WHERE idPostagem=? AND idUsuario=?");
      $r->execute(array($_GET['idPostagem'],$_SESSION['id']));
      if($r->rowCount()==0) {
        $r = $db->prepare("INSERT INTO usuario_postagem(idUsuario,idPostagem) VALUES (?,?)");
        $r->execute(array($_SESSION['id'],$_GET['idPostagem']));
      } 
      
    }

  }

 # header("location: painel.php");
?>