<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Lang" content="en">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <title>Análise de popularidade política baseado em tweets</title>
    <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Montserrat" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include('classes/Candidatos.php');
    session_start();

    $sql = "SELECT * FROM candidatos";
    $result = $_SESSION['conn']->query($sql);
    $_SESSION['candidatos']['presidentes'] = array();
    $_SESSION['candidatos']['governadores'] = array();
    $_SESSION['candidatos']['prefeitos'] = array();


    while ($row = mysqli_fetch_object($result)) {
        if($row->tipo_candidato == 1){
            $aux = new Presidente();
            $aux->set_variables($row->nome, $row->foto, $row->partido, $row->local);
            array_push($_SESSION['candidatos']['presidentes'], $aux);
        }
        if($row->tipo_candidato == 2){
            $aux = new Governador();
            $aux->set_variables($row->nome, $row->foto, $row->partido, $row->local);
            array_push($_SESSION['candidatos']['governadores'], $aux);
        }
        if($row->tipo_candidato == 3){
            $aux = new Prefeito();
            $aux->set_variables($row->nome, $row->foto, $row->partido, $row->local);
            array_push($_SESSION['candidatos']['prefeitos'], $aux);
        }


        //echo "</br>".$row->nome;
        //echo "</br>".$row->local;
        //echo "</br>".$row->partido;
        //echo "</br>".$row->tipo_candidato;
        echo "</br><img src=\"classes/getImagem.php?PicNum=$row->id_candidatos\"  height=\"50px\" width=\"50px\"  >";
    }

    ?>




    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    <h1 class="heading">Análise de popularidade política baseado em tweets
        <!-- <i class="fa fa-twitter" aria-hidden="true"> -->

        <form method="GET" action="show.php">
            <input type="text" name="keyword" required="required" /> <br>
            <input type="submit" value="Procurar Tweets" />
        </form>
</body>

</html>