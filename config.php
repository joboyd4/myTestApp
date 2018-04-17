<?php
   $config = parse_ini_file('/config/config.ini');
   define('DB_SERVER', 'localhost');
   //define('DB_USERNAME', 'root');
   //define('DB_PASSWORD', 'root123');
   //define('DB_DATABASE', 'MY_TEST_DATABASE');
   // Try and connect to the database
   $connection = mysqli_connect(DB_SERVER,$config['username'],$config['password'],$config['dbname']);
   $connection2 = new PDO('mysql:host=localhost;dbname=MY_TEST_DATABASE','root', 'root123');
   echo $connection2;
   $connection2->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $connection2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // If connection was not successful, handle the error
   if($connection === false) {
      // Handle error - notify administrator, log to a file, show an error screen, etc.
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

?>
