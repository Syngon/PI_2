<?php
error_reporting(0);
include_once(dirname(__FILE__).'/config.php');
include_once(dirname(__FILE__).'/lib/TwitterSentimentAnalysis.php');
session_start();

class search{

  public $TwitterSentimentAnalysis;
  public $twitterSearchParams;
  public $results;

  public $pos = 0;
  public $neg = 0;
  public $neu = 0;
  public $total = 0;

  public function find($parametros){
    if(isset($parametros) && $parametros!=''){
      $TwitterSentimentAnalysis = new TwitterSentimentAnalysis( DATUMBOX_API_KEY, 
                                                                TWITTER_CONSUMER_KEY, 
                                                                TWITTER_CONSUMER_SECRET, 
                                                                TWITTER_ACCESS_KEY, 
                                                                TWITTER_ACCESS_SECRET );

      $twitterSearchParams = array(
        'q'=>$parametros,
        'lang'=>'en',
        'count'=>10,
    );
      $results = $TwitterSentimentAnalysis->sentimentAnalysis($twitterSearchParams);
      return $results;
    }
  }
  
  public function analyse($results){
    foreach($results as $tweet){
			if($tweet['sentiment'] == 'positive'){
				$pos = $pos + 1;
			}
			if($tweet['sentiment'] == 'negative'){
				$neg = $neg + 1;
			}
			if($tweet['sentiment'] == 'neutral'){
				$neu = $neu + 1;
			}
			
		}
    $total = $pos + $neg + $neu;
    return array("total" => $total, "pos" => $pos, "neg" => $neg, "neu" => $neu);
  }

  public function show($parametros){
    $results = $this->find($parametros);
    $total = $this->analyse($results);
    $obj = array("resultados" => $results, "sentimento" => $total, "nome" => $parametros);
    return $obj;
  }
}
?>