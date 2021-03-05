<?php
require_once 'conexao.php';
$r = $db->prepare("DELETE FROM usuario WHERE id=?");
$r->execute(array($_SESSION['id']));
header("location: logout.php");