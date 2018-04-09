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
       function login()
       {
         include("config.php");
         //session_start();

         if(isset($_POST['loginTest']))
         {
           // username and password sent from form

           $myusername = mysqli_real_escape_string($db,$_POST['username']);
           $mypassword = mysqli_real_escape_string($db,$_POST['password']);

           $sql = "SELECT USER_ID FROM MY_USERS WHERE username = '$myusername' and passcode = '$mypassword'";
           $result = mysqli_query($db,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $active = $row['active'];

           $count = mysqli_num_rows($result);

           // If result matched $myusername and $mypassword, table row must be 1 row
           if($count == 1)
           {
             session_register("myusername");
             $_SESSION['login_user'] = $myusername;

             header("location: welcome.php");
             echo "You are logged in";
           }
           else
           {
             $error = "Your Login Name or Password is invalid";
             echo "There was an error and you are not logged in";
           }
         }
       }
    ?>

    <?php
       echo "<H1>This is a test of adding a php function to a form post</H1><BR>";

       if(isset($_POST['formPostTest']))
       {
         display();
       }
    ?>

    <FORM name='formPostTestForm' method="post" action="index.php">
      <INPUT type="text" name="variable">
      <INPUT type="submit" value="Submit" name="formPostTest">
    </FORM>

    <?php
       echo "<H1>This is a test of adding a php function to a form post</H1><BR>";

       if(isset($_POST['submit2']))
       {
         display();
       }
    ?>
    <FORM name="loginTestForm" method="post" action="index.php">
      <LABEL>UserName  :</LABEL><INPUT type="text" name="username">
      <LABEL>Password  :</LABEL><INPUT type="text" name="password">
      <INPUT type="submit" value="Submit" name="loginTest">
    </FORM>

  </BODY>
</TITLE>
