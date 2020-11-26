<?php
include('connection.php');
session_start();

$PicNum = $_GET["PicNum"];

$sql = "SELECT * FROM candidatos WHERE id_candidatos = $PicNum";
$result = $_SESSION['conn']->query($sql);

$row = mysqli_fetch_object($result);
Header("Content-type: image/gif");
echo $row->foto;
