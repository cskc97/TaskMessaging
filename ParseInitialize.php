<?php

/**
 * Created by PhpStorm.
 * User: santh
 * Date: 5/8/2017
 * Time: 7:51 PM
 */
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

    /**
     * @return string
     */
    public function getAPPID()
    {
        return $this->APP_ID;
    }

    /**
     * @return string
     */
    public function getMASTERKEY()
    {
        return $this->MASTER_KEY;
    }

    /**
     * @return string
     */
    public function getMONGODBURI()
    {
        return $this->MONGODB_URI;
    }

    /**
     * @return string
     */
    public function getPARSEMOUNT()
    {
        return $this->PARSE_MOUNT;
    }

    /**
     * @return string
     */
    public function getSERVERURL()
    {
        return $this->SERVER_URL;
    }




}

?>