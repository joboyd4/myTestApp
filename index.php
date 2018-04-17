<HTML>
  <TITLE>John's Test AWS Web App</TITLE>
  <BODY>
    <?php
       function display()
       {
         echo "The what you wrote in the box was: ".$_POST["variable"]."<BR>";
       }
    ?>
    <?php
       function createUser()
       {
         include("config.php");

         if(isset($_POST["createUser"]))
         {
           // username and password sent from form

           $myusername = mysqli_real_escape_string($connection,$_POST["username"]);
           $mypassword = mysqli_real_escape_string($connection,$_POST["password"]);
           $mypassword2 = mysqli_real_escape_string($connection,$_POST["password2"]);

           if ($mypassword==$mypassword2)
           {
             $sql = "INSERT INTO MY_USERS (USER_NAME,PASSWORD) VALUES('$myusername','$mypassword')";
             if (mysqli_query($connection, $sql))
             {
               echo "New record for ".$myusername." created successfully";
             }
             else
             {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
             }
           }
           else
           {
             echo "Error: Your passwords do not match";
           }
         }
       }
    ?>
    <?php
       function login()
       {
         include("config.php");
         session_start();

         if(isset($_POST["loginTest"]))
         {
           // username and password sent from form

           $myusername = mysqli_real_escape_string($connection,$_POST["username"]);
           $mypassword = mysqli_real_escape_string($connection,$_POST["password"]);

           /*$sql = $connection->prepare(SELECT USER_ID FROM MY_USERS WHERE USER_NAME = :myusername);
           $sql->execute(array('myusername' => $myusername));
           $count=0;
           foreach ($sql as $row)
           {
             $count=1;
             $_SESSION['login_user'] = $myusername;
             echo "You are logged in as ".$_SESSION['login_user'];
           }
           if ($count==0)
           {
             echo "There was an error and you are not logged in";
           }*/


           $sql = "SELECT USER_ID FROM MY_USERS WHERE USER_NAME = '$myusername' and PASSWORD = '$mypassword'";
           $result = mysqli_query($connection,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $active = $row['active'];

           $count = mysqli_num_rows($result);

           // If result matched $myusername and $mypassword, table row must be 1 row
           if($count == 1)
           {
             $_SESSION['login_user'] = $myusername;
             echo "You are logged in as ".$_SESSION['login_user'];
           }
           else
           {
             echo "There was an error and you are not logged in";
           }
         }
       }
    ?>


    <H1>This is a test of adding a php function to a form post</H1><BR>
    <FORM name='formPostTestForm' method="post" action="index.php">
      <INPUT type="text" name="variable">
      <INPUT type="submit" value="Submit" name="formPostTest">
    </FORM>
    <?php
      if(isset($_POST['formPostTest']))
      {
        display();
      }
    ?>
    <BR><BR>

    <H1>This is a test of creating a mySQL login with PHP</H1><BR>
    <FORM name="createUserForm" method="post" action="index.php">
      <LABEL>UserName  :</LABEL><INPUT type="text" name="username">
      <LABEL>Password  :</LABEL><INPUT type="password" name="password">
      <LABEL>Re-Enter Password  :</LABEL><INPUT type="password" name="password2">
      <INPUT type="submit" value="Create" name="createUser">
    </FORM>
    <?php
      if(isset($_POST['createUser']))
      {
        createUser();
      }
    ?>
      <BR><BR>

    <H1>This is a test of adding mySQL login with PHP</H1><BR>
    <FORM name="loginTestForm" method="post" action="index.php">
      <LABEL>UserName  :</LABEL><INPUT type="text" name="username">
      <LABEL>Password  :</LABEL><INPUT type="password" name="password">
      <INPUT type="submit" value="Submit" name="loginTest">
    </FORM>
    <?php
       if(isset($_POST['loginTest']))
       {
         login();
       }
    ?>
    <BR><BR>

  </BODY>
</TITLE>
