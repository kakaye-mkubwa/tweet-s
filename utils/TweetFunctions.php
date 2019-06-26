<?php
  require_once ('utils/Config.php');

  /**
   *
   */
  class TweetFunctions
  {

    public function getTweets($qry)
    {
      $config = new Config();
      $connection = $config->twtConnection();
      $content = $connection->get("https://api.twitter.com/1.1/search/tweets.json",['q'=>$qry]);
      return $content;
    }
  }
  // Search tweets
  // https://api.twitter.com/1.1/statuses/user_timeline.json
  // Search users
// $content = $connection->get("users/search",['q'=>$qry]);

?>
