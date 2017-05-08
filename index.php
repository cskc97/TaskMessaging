<?php
/**
 * Created by PhpStorm.
 * User: santh
 * Date: 5/8/2017
 * Time: 7:18 PM
 */

require_once "vendor/autoload.php";
use Twilio\Twiml;

$response = new Twiml();
$response->message("Hello World");
print $response;

header("content-type: text/xml");




?>