<?php

  require 'db-pswd.inc.php';

  try {

    //DOCKER
    $Connection = new PDO('mysql:host=mysql;dbname=talker_db', 'root', 'talker-root-password');

    print "Success! Connected to the database!";


  } catch (PDOException $e) {
      print "Error!:" . $e->getMessage() . "<br/>";
      die();
    }

?>