<?php 
    /**
     * home.php
     *
     * A simple home page for these login demos.
     *
     * David J. Malan
     * malan@harvard.edu
     */

    // enable sessions
    session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Home</title>
  </head>
  <body>
    <h1>Home</h1>
    
	<?php if (isset($_SESSION["Mauthenticated"]) && $_SESSION["Mauthenticated"] === true) { ?>
        Manager is logged in!  
      <?php } else { ?>
        Manager is not logged in!
      <?php } ?>
	  <br>
	  <?php if (isset($_SESSION["Cauthenticated"]) && $_SESSION["Cauthenticated"] === true) { ?>
        Chef is logged in!  
      <?php } else { ?>
        Chef is not logged in!
      <?php } ?>
	  <br><br>
    <b>Login Demos</b>
    <ul>
      <li><a href="customerLogInPage.php">customerLogIn</a></li>
      <li><a href="staffLogInPage.php">staffLogIn</a></li>
	
    </ul>
  </body>
</html>
