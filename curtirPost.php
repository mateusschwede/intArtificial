<?php

  $db = new PDO('mysql:host=localhost;dbname=recomendaia;charset=utf8','root','');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(!empty($_POST['nome'])) {
      $r = $db->prepare("INSERT INTO usuario_postagem(idPostagem) VALUES (?)");
      $r->execute(array($_POST['idPostagem']));
  }

  header("location: painel.php");

?>