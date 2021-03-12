<?php
require_once 'conexao.php';
$r = $db->query("UPDATE linguagem SET popularidade=0");
$_SESSION['msg'] = "<br><div class='alert alert-warning alert-dismissible fade show' role='alert'>Dados removidos!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
header("location: painel.php");