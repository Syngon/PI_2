<?php
include_once(dirname(__FILE__).'/config.php');
include_once(dirname(__FILE__).'/lib/TwitterSentimentAnalysis.php');

class search{

  private $TwitterSentimentAnalysis;
  private $twitterSearchParams;
  private $results;
  private $keyword;

  private $pos = 0;
  private $neg = 0;
  private $neu = 0;
  private $total = 0;

  public function find(){
    if(isset($_GET['q']) && $_GET['q']!=''){
      $TwitterSentimentAnalysis = new TwitterSentimentAnalysis( DATUMBOX_API_KEY, 
                                                                TWITTER_CONSUMER_KEY, 
                                                                TWITTER_CONSUMER_SECRET, 
                                                                TWITTER_ACCESS_KEY, 
                                                                TWITTER_ACCESS_SECRET );

      $twitterSearchParams = array(
        'q'=>$_GET['q'],
        'lang'=>'en',
        'count'=>50,
    );
      $results = $TwitterSentimentAnalysis->sentimentAnalysis($twitterSearchParams);
    }
  }
  
  public function analyse(){
    foreach($results as $tweet){
      $tweet['sentiment'] == 'positive' ? $pos++ : $tweet['sentiment'] == 'negative' ? $neg++ : $neu++;
      $total = $pos + $neg + $neu;
    }
  }

  public function show(){
    var_dump($keyword);
    var_dump($_GET['q']);
    find();
    analyse();

    echo '<h3>Results for '.$_GET['q'].'</h3>';
    
    echo '  <p class="res"><span class="pos">Positive Tweets:'.round(($pos/$total)*100).'%</span> | <span class="neu">Neutral Tweets:'.round(($neu/$total)*100).'%</span> | <span class="neg"> Negative Tweets:'.round(($neg/$total)*100).'%</span> </p>
            <div class="aa_htmlTable">
            <table class="table" border="1">
                <tr class="title">
                    <th>USER</th>
                    <th>TWEET</th>
                    <th>LINK</th>
                    <th>SENTIMENT</th>
                </tr>';
   
    foreach($results as $tweet) {
                          
      $color = NULL;
      $tweet['sentiment'] == 'positive' ? $color = '#7fff7f' : $tweet['sentiment'] == 'negative' ? $color = '#ffb2b2' : $color = '#FFFFFF';

      echo '<tr style="background:'.$color.'>
              <td><strong>'.$tweet['user'].'</strong></td>
              <td>'.$tweet['text'].'</td>
              <td><a href="'.$tweet['url'].'" target="_blank"><i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i></a></td>
              <td><strong>'.$tweet['sentiment'].'</strong></td>
            </tr>';

      echo '<tr style="background:'.$color.';">
              <td><strong> '.$tweet['user'].';</strong></td>
              <td>         '.$tweet['text'].';</td>
              <td><a href="'.$tweet['url'].'" target="_blank"><i class="fa fa-2x fa-twitter-square" aria-hidden="true"></i></a></td>
              <td><strong> '.$tweet['sentiment'].'</strong></td>
            </tr>';  

      echo '</table></div><i class="fa fa-code" aria-hidden="true"></i> with <i class="fa fa-heart" aria-hidden="true"></i> by <strong>Vinit Shahdeo</strong>';       
    

    }
  }


}
?>