<?php
include ('conn_mysql.inc.php');

interface BD
{
 public function inserir($nome, $texto, $sentimento, $nome_autor);
 public function consultar();
} // Strategy, do grego Estrategi


abstract class Candidato implements BD
{
 private $nome, $foto, $partido;

 public function Candidato($nome, $foto, $partido)
 {
  $this->$nome = $nome;
  $this->$foto = $foto;
  $this->$partido = $partido;
 }

 public function procurar();
 public function inserir($nome, $texto, $sentimento, $nome_autor);
} // Template Method, do russo Шаблонный метод


class Prefeito extends Candidato
{
 public function Prefeito()
 {
  parent::Candidato();
 }

 public function procurar()
 {

 }

 public function inserir($nome, $texto, $sentimento, $nome_autor)
 {

  if (empty($nome) or empty($texto) or empty($sentimento) or empty($nome_autor))
  {
   //header('location:../index.php?error=candidatovazio');
   //MOSTRA ERRO
   
  }
  else
  {
   $result = mysqli_query($conn, "INSERT INTO Prefeito(nome, texto, sentimento, data_insercao, nome_autor) VALUES('$this->$nome', '$this->$texto', '$this->$sentimento', NOW, '$this->$nomeautor')");
   if ($result)
   {
    //header('location:../index.php');
    //SUCESSO AO INSERIR - VOLTAR PRA INDEX E MOSTRAR MSG OU N FZR NADA
   }
   else
   {
    //header('location:../index.php?error=erroinserircandidato');
    //ERRO_AO_INSERIR_CANDIDATO
   }
  }
 }

 public function consultar(){
 }
}

class Governador extends Candidato
{
 public function Governador()
 {
  parent::Candidato();
 }

 public function procurar()
 {

 }

 public function inserir($nome, $texto, $sentimento, $nome_autor)
 {

  if (empty($nome) or empty($texto) or empty($sentimento) or empty($nome_autor))
  {
   //header('location:../index.php?error=candidatovazio');
   //MOSTRA ERRO
  }
  else
  {
   $result = mysqli_query($conn, "INSERT INTO Governador(nome, texto, sentimento, data_insercao, nome_autor) VALUES('$this->$nome', '$this->$texto', '$this->$sentimento', NOW, '$this->$nomeautor')");
   if ($result)
   {
    //header('location:../index.php');
    //SUCESSO AO INSERIR - VOLTAR PRA INDEX E MOSTRAR MSG OU N FZR NADA
   }
   else
   {
    //header('location:../index.php?error=erroinserircandidato');
    //ERRO_AO_INSERIR_CANDIDATO
   }
  }
 }

 public function consultar(){
}
}

class Presidente extends Candidato
{
 public function Presidente()
 {
  parent::Candidato();
 }

 public function procurar()
 {

 }

 public function inserir($nome, $texto, $sentimento, $nome_autor)
 {

  if (empty($nome) or empty($texto) or empty($sentimento) or empty($nome_autor))
  {
   //header('location:../index.php?error=candidatovazio');
   //MOSTRA ERRO
  }
  else
  {
   $result = mysqli_query($conn, "INSERT INTO Presidente(nome, texto, sentimento, data_insercao, nome_autor) VALUES('$this->$nome', '$this->$texto', '$this->$sentimento', NOW, '$this->$nomeautor')");
   if ($result)
   {
    //header('location:../index.php');
    //SUCESSO AO INSERIR - VOLTAR PRA INDEX E MOSTRAR MSG OU N FZR NADA
   }
   else
   {
    //header('location:../index.php?error=erroinserircandidato');
    //ERRO_AO_INSERIR_CANDIDATO
   }
  }
 }

  public function consultar(){
  }
}