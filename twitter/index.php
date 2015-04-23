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


/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=%23baseball&count=20';
 
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
/**echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();**/

$string = json_decode($twitter->setGetfield($getfield)
                ->buildOauth($url, $requestMethod)
                ->performRequest(),$assoc = TRUE);

foreach($string['statuses'] as $items)
    {
        echo "Tweet: " . $items['text'] . "<br/>";
        echo "When: " . $items['created_at'] . "<br />";
        echo "<hr/>";
    }
