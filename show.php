<?php
session_start(); 
include_once 'classes/Candidatos.php';


?>

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
         $trump = new Presidente();
         $trump->set_variables(1, 'Trump', '1', '2', 'EUA');
         $trump->acoes();

         ?>
      <h3>Resultados para "<?php echo $_GET['keyword']; ?>"</h3>
      <p class="res"><span class="pos">Tweets Positivos: <?php echo round(($sentimentos->{'pos'}/$sentimentos->{'total'})*100);?>%</span> | <span class="neu">Tweets Neutros: <?php echo round(($sentimentos->{'neu'}/$sentimentos->{'total'})*100);?>%</span> | <span class="neg"> Tweets Negativos: <?php echo round(($sentimentos->{'neg'}/$sentimentos->{'total'})*100);?>%</span> </p>
      <div class="aa_htmlTable">
      <table class="table" border="1">
      <tr class="title">
         <th>Usuário</th>
         <th>Tweet</th>
         <!--<th>URL</th>-->
         <th>Opiniões</th>
      </tr>
      <?php
         foreach($resultado as $tweet) {
             $color = NULL;
             if($tweet['sentiment']=='positive') {
                 $color='#7fff7f';
             }
             else if($tweet['sentiment']=='negative') {
                 $color='#ffb2b2';
             }
             else if($tweet['sentiment']=='neutral') {
                 $color='#FFFFFF';
             }
             ?>
      <tr style="background:<?php echo $color; ?>;">
         <td><strong><?php echo $tweet['user']; ?></strong></td>
         <td><?php echo $tweet['text']; ?></td>
         <!-- <td><a href="<?php //echo $tweet['url']; ?>" target="_blank"><i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i></a></td> -->
         <td><strong><?php  if($tweet['sentiment'] == 'positive'){
            echo 'positivo';
            }else if($tweet['sentiment'] == 'negative'){
            echo 'negativo';
            }else{
            echo 'neutro';
            }?></strong></td>
      </tr>
      <?php
         }
         ?>    
   </body>
</html>

<?php