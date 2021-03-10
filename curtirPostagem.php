<?php
 require_once 'conexao.php';
 session_start();

  if(!empty($_GET['idPostagem'])) {

    $r = $db->prepare("SELECT idPostagem FROM usuario_postagem WHERE idPostagem=?");
    $r->execute(array($_GET['idPostagem']));
    if($r->rowCount()==0) {
      $r = $db->prepare("INSERT INTO usuario_postagem(idUsuario,idPostagem) VALUES (?,?)");
      $r->execute(array($_SESSION['id'],$_GET['idPostagem']));
    } else {
      $_SESSION['msg'] = "<br><div class='alert alert-danger alert-dismissible fade show' role='alert'>Postagem ".$_GET['idPostagem']." já curtida!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }
  }

  header("location: painel.php");
?>