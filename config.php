<?php
   $config = parse_ini_file('/config/config.ini');
   define('DB_SERVER', 'localhost');
   //define('DB_USERNAME', 'root');
   //define('DB_PASSWORD', 'root123');
   //define('DB_DATABASE', 'MY_TEST_DATABASE');
   // Try and connect to the database
   $connection = mysqli_connect(DBSERVER,$config['username'],$config['password'],$config['dbname']);

   // If connection was not successful, handle the error
   if($connection === false) {
      // Handle error - notify administrator, log to a file, show an error screen, etc.
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   }

   //$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   /* check connection */
   //IF (mysqli_connect_errno())
   //{
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
   //}
?>
