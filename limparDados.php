<?php
session_start();
require_once 'conexao.php';
$r = $db->prepare("DELETE FROM usuario_linguagem WHERE idUsuario=?");
$r->execute(array($_SESSION['id']));
$r = $db->prepare("DELETE FROM usuario_postagem WHERE idUsuario=?");
$r->execute(array($_SESSION['id']));
$_SESSION['msg'] = "<br><div class='alert alert-warning alert-dismissible fade show' role='alert'>Dados removidos!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
header("location: painel.php");