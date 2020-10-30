<?php

	$url = 'http://localhost/PI_TESTE';

	$classe = 'search';
  $metodo = 'find';
  $keyword =  $_GET['keyword'];

	$montar = $url.'/'.$classe.'/'.$metodo.'/'.$keyword;

	$retorno = file_get_contents($montar);

	print_r(json_decode($retorno, 1));