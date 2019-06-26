<?php
  require_once ('utils/Config.php');

  $results = array();
  $tweetFunctions = new Config();

  if ($_SERVER['REQUEST_METHOD'] == "POST")
  {
    if (isset($_POST['search_q']))
    {
      $searchQ = htmlspecialchars($_POST['search_q']);
      $results= $tweetFunctions -> getTweets($searchQ);

      foreach ($results as $result)
      {
        // code...
        print_r($result);
      }
    }
  }
  // $searchQ = htmlspecialchars($_POST['search_q']);
  $results= $tweetFunctions -> getTweets("cow");

  foreach ($results as $result)
  {
    // code...
    // print_r($result);
    echo $result ->status->text;
  }
  // $resultsArray = $results;
  // $resultsArray = json_decode($results, true);

?>
