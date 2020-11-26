<?php
include('connection.php');
$_SESSION['conn'] = new Database();

interface BD
{
  public function inserir();
  public function consultar();
  public function acoes();
} // Strategy, do grego Estrategi

abstract class Candidato implements BD
{
  public $nome, $foto, $partido, $local, $resultado;
  const URL = 'http://localhost/PI_TESTE/', CLASSE = 'search', METODO = 'show';

  public function set_variables($nome, $foto, $partido, $local)
  {
    $this->nome = $nome;
    $this->foto = $foto;
    $this->local = $local;
    $this->partido = $partido;
  }

  public abstract function consultar();
  public abstract function acoes();
  public abstract function inserir();
} // Template Method, do russo Шаблонный метод


class Prefeito extends Candidato
{
  function consultar()
  {
  }
  function inserir()
  {
  }
  function acoes()
  {
  }
}

class Governador extends Candidato
{
  function consultar()
  {
  }
  function inserir()
  {
  }
  function acoes()
  {
  }
}

class Presidente extends Candidato
{
  public function procurar()
  {
    $montar = parent::URL . '/' . parent::CLASSE . '/' . parent::METODO . '/' . $this->nome;

    $retorno = file_get_contents($montar);
    $obj = json_decode($retorno);

    $sentimentos = $obj->{'dados'}->{'sentimento'};
    $resultado = json_decode(json_encode($obj->{'dados'}->{'resultados'}), true);
    $nome = $obj->{'dados'}->{'nome'};


    $_SESSION[$this->nome]['novo']['nome'] = $nome;
    $_SESSION[$this->nome]['novo']['resultado'] = $resultado;
    $_SESSION[$this->nome]['novo']['sentimentos'] = $sentimentos;

    $_SESSION[$this->nome]['antigo'] = array();
  }

  public function inserir()
  {
    foreach ($_SESSION[$this->nome]['novo']['resultado'] as $resultado) {
      $userAUX = $resultado['user'];
      $textAUX = $resultado['text'];
      $sentimentAUX = $resultado['sentiment'];
      $nomeAUX = $this->nome;

      $sql = "INSERT INTO presidentes VALUES (default, '$userAUX', '$textAUX', NOW(), '$nomeAUX', '$sentimentAUX')";

      $result = $_SESSION['conn']->query($sql);

      if ($result == false) break;
    }
  }

  public function consultar()
  {
    $nomeAUX = $_SESSION[$this->nome]['nome'];
    $sql = "SELECT * FROM presidentes WHERE candidato = '$nomeAUX' LIMIT 50";
    $result = $_SESSION['conn']->query($sql);

    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_object($result)) {
        array_push($_SESSION[$this->nome]['antigo'], $row);
      }
    }
  }

  public function acoes()
  {
    $this->procurar();
    $this->inserir();
    $this->consultar();
  }
}
