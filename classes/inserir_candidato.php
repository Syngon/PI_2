<html>

<head>
  <title>Upload de imagens com PHP</title>
  <meta charset="utf-8" />
</head>

<body>
  <form action="gravar.php" method="POST" enctype="multipart/form-data">
    <label>NOME</label>
    <input type="text" name="nome" required="required" /><br><br>

    <label>PARTIDO</label>
    <input type="text" name="partido" required="required" /><br><br>

    <label>LOCAL</label>
    <input type="text" name="local" required="required" /><br><br>

    <label>PIN</label>
    <input type="text" name="pin" required="required" /><br><br>

    <label for="tipo_candidato">Escolha o tipo de candidato:</label>
    <select id="tipo_candidato" name="tipo_candidato">
      <option value="Presidente">Presidente</option>
      <option value="Governador">Governador</option>
      <option value="Prefeito">Prefeito</option>
    </select>

    <br><br>
    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem" required="required"/>

    <br><br><br>
    <input type="submit" value="Enviar" />

  </form>

  <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if(strpos($fullUrl, "aviso=ok") == true)
      echo '<p>INSERIDO COM SUCESSO!</p>';
    if(strpos($fullUrl, "aviso=nao") == true)
      echo '<p>ERRO!</p>';

  ?>
</body>

</html>