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
         session_start();

         if(isset($_POST["loginTest"]))
         {
           // username and password sent from form

           $myusername = mysqli_real_escape_string($db,$_POST["username"]);
           $mypassword = mysqli_real_escape_string($db,$_POST["password"]);

           echo $myusername." here it is ".$mypassword."<BR>";


           $sql = "SELECT USER_ID FROM MY_USERS WHERE USER_NAME = '$myusername' and PASSWORD = '$mypassword'";
           echo $sql."<BR>";
           $result = mysqli_query($db,$sql);
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $active = $row['active'];

           $count = mysqli_num_rows($result);

           echo $myusername." ".$mypassword;

           // If result matched $myusername and $mypassword, table row must be 1 row
           if($count == 1)
           {
             session_register("myusername");
             $_SESSION['login_user'] = $myusername;
             echo "You are logged in";
           }
           else
           {
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
    <BR><BR>
    <?php
       echo "<H1>This is a test of adding mySQL login with PHP</H1><BR>";

       if(isset($_POST['loginTest']))
       {
         login();
       }
    ?>
    <FORM name="loginTestForm" method="post" action="index.php">
      <LABEL>UserName  :</LABEL><INPUT type="text" name="username">
      <LABEL>Password  :</LABEL><INPUT type="text" name="password">
      <INPUT type="submit" value="Submit" name="loginTest">
    </FORM>
    <BR><BR>

  </BODY>
</TITLE>
