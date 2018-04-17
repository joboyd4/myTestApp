<?php
   $config = parse_ini_file('/config/config.ini');
   define('DB_SERVER', 'localhost');
   //define('DB_USERNAME', 'root');
   //define('DB_PASSWORD', 'root123');
   //define('DB_DATABASE', 'MY_TEST_DATABASE');
   // Try and connect to the database
   //$connection = mysqli_connect(DB_SERVER,$config['username'],$config['password'],$config['dbname']);
   $connection = new PDO('mysql:dbname=$config['dbname'];host='localhost'',$config['username'], $config['password']);
   $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // If connection was not successful, handle the error
   if($connection === false) {
      // Handle error - notify administrator, log to a file, show an error screen, etc.
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

?>
