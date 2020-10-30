<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "PI";

$con = mysqli_connect($servidor, $usuario, $senha, $dbname);

if(!$con) die("Falha". mysqli_connect_error());

?>