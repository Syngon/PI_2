<?php
include('classes/Candidatos.php');
session_start();
?>



<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Lang" content="en">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


    <title>Análise de popularidade política baseado em tweets</title>
    <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Montserrat" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">
        body {
            font-family: "Open Sans", sans-serif;
        }

        h2 {
            color: #000;
            font-size: 26px;
            font-weight: 300;
            text-align: center;
            text-transform: uppercase;
            position: relative;
            margin: 30px 0 80px;
        }

        h2 b {
            color: #ffc000;
        }

        h2::after {
            content: "";
            width: 100px;
            position: absolute;
            margin: 0 auto;
            height: 4px;
            background: rgba(0, 0, 0, 0.2);
            left: 0;
            right: 0;
            bottom: -20px;
        }

        .carousel {
            margin: 50px auto;
            padding: 0 70px;
        }

        .carousel .item {
            min-height: 330px;
            text-align: center;
            overflow: hidden;
        }

        .carousel .item .img-box {
            height: 160px;
            width: 100%;
            position: relative;
        }

        .carousel .item img {
            max-width: 100%;
            max-height: 100%;
            display: inline-block;
            position: absolute;
            bottom: 0;
            margin: 0 auto;
            left: 0;
            right: 0;
        }

        .carousel .item h4 {
            font-size: 18px;
            margin: 10px 0;
        }

        .carousel .item .btn {
            color: #333;
            border-radius: 0;
            font-size: 11px;
            text-transform: uppercase;
            font-weight: bold;
            background: none;
            border: 1px solid #ccc;
            padding: 5px 10px;
            margin-top: 5px;
            line-height: 16px;
        }

        .carousel .item .btn:hover,
        .carousel .item .btn:focus {
            color: #fff;
            background: #000;
            border-color: #000;
            box-shadow: none;
        }

        .carousel .item .btn i {
            font-size: 14px;
            font-weight: bold;
            margin-left: 5px;
        }

        .carousel .thumb-wrapper {
            text-align: center;
        }

        .carousel .thumb-content {
            padding: 15px;
        }

        .carousel .carousel-control {
            height: 100px;
            width: 40px;
            background: none;
            margin: auto 0;
            background: rgba(0, 0, 0, 0.2);
        }

        .carousel .carousel-control i {
            font-size: 30px;
            position: absolute;
            top: 50%;
            display: inline-block;
            margin: -16px 0 0 0;
            z-index: 5;
            left: 0;
            right: 0;
            color: rgba(0, 0, 0, 0.8);
            text-shadow: none;
            font-weight: bold;
        }

        .carousel .item-price {
            font-size: 13px;
            padding: 2px 0;
        }

        .carousel .item-price strike {
            color: #999;
            margin-right: 5px;
        }

        .carousel .item-price span {
            color: #86bd57;
            font-size: 110%;
        }

        .carousel .carousel-control.left i {
            margin-left: -3px;
        }

        .carousel .carousel-control.left i {
            margin-right: -3px;
        }

        .carousel .carousel-indicators {
            bottom: -50px;
        }

        .carousel-indicators li,
        .carousel-indicators li.active {
            width: 10px;
            height: 10px;
            margin: 4px;
            border-radius: 50%;
            border-color: transparent;
        }

        .carousel-indicators li {
            background: rgba(0, 0, 0, 0.2);
        }

        .carousel-indicators li.active {
            background: rgba(0, 0, 0, 0.6);
        }

        .star-rating li {
            padding: 0;
        }

        .star-rating i {
            font-size: 14px;
            color: #ffc000;
        }
    </style>
</head>

<body>
    <?php
    $sql = "SELECT * FROM candidatos";
    $result = $_SESSION['conn']->query($sql);
    $_SESSION['candidatos']['presidentes'] = array();
    $_SESSION['candidatos']['governadores'] = array();
    $_SESSION['candidatos']['prefeitos'] = array();


    while ($row = mysqli_fetch_object($result)) {
        if ($row->tipo_candidato == 1) {
            $aux = new Presidente();
            $aux->set_variables($row->id_candidatos, $row->nome, $row->foto, $row->partido, $row->local);
            array_push($_SESSION['candidatos']['presidentes'], $aux);
        }
        if ($row->tipo_candidato == 2) {
            $aux = new Governador();
            $aux->set_variables($row->id_candidatos, $row->nome, $row->foto, $row->partido, $row->local);
            array_push($_SESSION['candidatos']['governadores'], $aux);
        }
        if ($row->tipo_candidato == 3) {
            $aux = new Prefeito();
            $aux->set_variables($row->id_candidatos, $row->nome, $row->foto, $row->partido, $row->local);
            array_push($_SESSION['candidatos']['prefeitos'], $aux);
        }


        //echo "</br>".$row->nome;
        //echo "</br>".$row->local;
        //echo "</br>".$row->partido;
        //echo "</br>".$row->tipo_candidato;
        echo "</br><img src=\"classes/getImagem.php?PicNum=$row->id_candidatos\"  height=\"50px\" width=\"50px\"  >";
    }

    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Análise de popularidade política baseado em tweets</h2>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for carousel items -->
                    <?php

                    foreach ($_SESSION['candidatos']['presidentes'] as $presidente) {



                    ?>
                        <div class="col-sm-3">
                            <div class="thumb-wrapper">
                                <div class="img-box">
                                    <img src= <?php echo "\"classes/getImagem.php?PicNum=$presidente->id_candidatos\" " ?> height="50px" width="50px"  class="img-responsive img-fluid" alt="">
                                </div>
                                <div class="thumb-content">
                                    <h4><?php echo $presidente->nome; ?></h4>
                                    <p class="item-price"><?php echo $presidente->partido; ?></p>
                                    <p class="item-price"><?php echo $presidente->local; ?></p>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <!-- Carousel controls -->
                    <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>




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