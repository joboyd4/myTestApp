<?php
   define('DB_SERVER', 'localhost:3036');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'root123');
   define('DB_DATABASE', 'MY_TEST_DATABASE');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   /* check connection */
   IF (mysqli_connect_errno())
   {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
   }
?>
