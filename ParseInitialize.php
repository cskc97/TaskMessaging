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

    private $currentUser;
    public function ParseInitialize()
    {
        $this->init();

    }

    private function init()
    {
        $this->APP_ID = "testappcskc";
        $this->MASTER_KEY="CSkc@5797";
        $this->MONGODB_URI="mongodb://heroku_1smrw9ch:18kallj4vprgrsppe4ksjf94nu@ds117919.mlab.com:17919/heroku_1smrw9ch";
        $this->PARSE_MOUNT="/parse";
        $this->SERVER_URL="http://testparsecskc.herokuapp.com";

        ParseClient::initialize($this->APP_ID,null,$this->MASTER_KEY);
        ParseClient::setServerURL($this->SERVER_URL,'parse');

    }

    private function loginUser($email,$password)
    {
        try {
            $user = ParseUser::logIn($email, $password);
            return true;
        }
        catch(ParseException $exception)
        {
         //   echo $exception->getMessage();
            return false;
        }


    }

    public function retrieveTasks($email,$password)
    {

        if($this->loginUser($email,$password))
        {
           $this->currentUser = ParseUser::getCurrentUser();

           $allTasks = $this->findTasks($this->currentUser);

           if($allTasks!=null)
           {
               $tasksString = implode(',',$allTasks);
               return $tasksString;
           }
           else{
               $string = "You Don't Have Any Tasks. Check if you have entered your 
               email and password properly";
               return $string;
           }

        }




    }

    private function findTasks(ParseUser $currentUser)
    {
        $query = new ParseQuery("Tasks");
        $query->equalTo("user",$currentUser->getEmail());
        $results = $query->find();

        $array = array();

        for($counter=0;$counter<count($results);$counter++)
        {
            $array[] = $results[$counter]->get("task");

        }

    //    echo print_r($array);

        if(isset($array))
        {
            return $array;
        }
        else{
            return null;
        }


    }

    public function logout()
    {
        ParseUser::logOut();

    }





}

?>