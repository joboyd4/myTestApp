<HTML>
  <TITLE>John's Test AWS Web App</TITLE>
  <BODY>
    <FORM method="post" action="display()">
      <INPUT type="text" name="variable">
      <INPUT type="submit" value="click">
    </FORM>
    <?php
       echo "This is John's Test AWS App<BR>";
       echo "This is a test of uploading to get via local Windows client<BR>";
       echo "This is a test of installing on aws linux via git command line<BR>";
       echo "This is a test of adding a php function<BR>";
       function display()
       {
         echo "The what you wrote in the box was".$_POST["variable"];
       }
    ?>

  </BODY>
</TITLE>
