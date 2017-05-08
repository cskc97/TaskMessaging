<?php

/**
 * Created by PhpStorm.
 * User: santh
 * Date: 5/8/2017
 * Time: 7:51 PM
 */

require_once ('vendor/autoload.php');
use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

class ParseInitialize
{
    private $APP_ID,$MASTER_KEY,$MONGODB_URI,$PARSE_MOUNT
    ,$SERVER_URL;
    public function ParseInitialize()
    {
        $this->APP_ID = "testappcskc";
        $this->MASTER_KEY="CSkc@5797";
        $this->MONGODB_URI="mongodb://heroku_1smrw9ch:18kallj4vprgrsppe4ksjf94nu@ds117919.mlab.com:17919/heroku_1smrw9ch";
        $this->PARSE_MOUNT="/parse";
        $this->SERVER_URL="http://testparsecskc.herokuapp.com/parse";



    }

    private function init()
    {
        ParseClient::initialize($this->APP_ID,null,$this->MASTER_KEY);
        ParseClient::setServerURL($this->SERVER_URL,'parse');



    }


}

?>