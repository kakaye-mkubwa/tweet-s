<?php



  /*
  Require this file
  */
  require "core/autoload.php";
  use Abraham\TwitterOAuth\TwitterOAuth;

  /**
   *
   */
  class Config
  {
    public function twtConnection()
    {
      $CONSUMER_KEY = "FwIxshHlWTRW0cC0FBBkSbW6m";
      $CONSUMER_SECRET = "lybzwU4NEIrwpckYWDnlmvkthcDUT0B4QAdJ8dL7niq1dlR0Kq";
      $ACCESS_TOKEN = "1138727258661806080-oVpqHXqRzW4etreBX0xjW2bfIEpcIb";
      $ACCESS_TOKEN_SECRET = "EvOYJwqZkcqurfGHgCuWO63jZQMgg0VT8j9xfJbRsEf5X";

      $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);
      // code...
      if (!$connection)
      {
        echo "Error while connecting";
      }
      return $connection;
    }
    public function getTweets($qry)
    {
      $config = new Config();
      $connection = $config->twtConnection();
      $content = $connection->get("users/search",['q'=>$qry]);
      return $content;
    }
  }


  // $content = $connection->get("users/search",['q'=>'cow']);

?>
