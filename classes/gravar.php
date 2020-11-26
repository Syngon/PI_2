<?php
include('connection.php');
session_start();

$imagem = $_FILES["imagem"];
$nome = $_POST['nome'];
$partido = $_POST['partido'];
$local = $_POST['local'];
$pin = $_POST['pin'];
$tipo_candidato = $_POST['tipo_candidato'];
$tipo_candidato_insercao = -1;

if ($imagem != NULL and $pin == 777) {
  $nomeFinal = time() . '.jpg';
  if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
    $tamanhoImg = filesize($nomeFinal);
    $mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg));

    if ($tipo_candidato == "Presidente")
      $tipo_candidato_insercao = 1;
    else if ($tipo_candidato == "Governador")
      $tipo_candidato_insercao = 2;
    else
      $tipo_candidato_insercao = 3;

    $sql = "INSERT INTO candidatos VALUES(default, '$nome', '$mysqlImg', '$local', '$partido', '$tipo_candidato_insercao')";
    $_SESSION['conn']->query($sql);

    unlink($nomeFinal);

    header("location:inserir_candidato.php?aviso=ok");
  }
} else {
  header("location:inserir_candidato.php?aviso=nao");
}
