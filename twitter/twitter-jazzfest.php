<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "840160400-jY7h1rG3imwqgvRw6sxk9fIpNE3Mnt3P0WA6JEu7",
    'oauth_access_token_secret' => "uvVRBakbPQLl1O7GVdNDl68ZiNrsXCThM79uPWLc8cSIt",
    'consumer_key' => "uSOcUZhsRTOjv2R3cgZ37S4bu",
    'consumer_secret' => "1h70i4o5oM6neXEwHE0P4VWftcD3FFg7j91s0k4bq8cdRLBeal"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
  $url = 'https://api.twitter.com/1.1/blocks/create.json';
  $requestMethod = 'GET';

  /** POST fields required by the URL above. See relevant docs as above **/
  $postfields = array(
      'screen_name' => 'usernameToBlock',
      'skip_status' => '1'
  );

  /** Perform a POST request and echo the response
  $twitter = new TwitterAPIExchange($settings);
  echo $twitter->buildOauth($url, $requestMethod)
               ->setPostfields($postfields)
               ->performRequest();**/

  /** Perform a GET request and echo the response **/
  /** Note: Set the GET field BEFORE calling buildOauth(); **/
  $url = 'https://api.twitter.com/1.1/search/tweets.json';
  $getfield = '?q=%23jazzfest';
  $requestMethod = 'GET';
  $twitter = new TwitterAPIExchange($settings);
  echo $twitter->setGetfield($getfield)
               ->buildOauth($url, $requestMethod)
               ->performRequest(); 

  $tweetData = json_decode($twitter->setGetField($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest(),$assoc = TRUE);

  //echo $tweetData . "</br>";

  foreach($tweetData['statuses'] as $items)
      {
        
        $userArray = $items['user'];
       
        
        echo "<img src='" .$userArray['profile_image_url'] . "' style=float:left></br>";
        echo "<p><strong>" . $userArray['name'] . "</strong>";
        echo "  @" . $userArray['screen_name'] . "</br>";
        echo "Tweet: " . $items['text'] . "</br>";
        echo "At: " . $items['created_at'] . "<br></br>";
        
        
      }

  ?>