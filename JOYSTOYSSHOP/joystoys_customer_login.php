<!DOCTYPE html>
<html>
    <body>
        <?php include "./includes/joystoys_header.php" ?>

        <!-- Page content -->
        
              <h1>Login</h1><br>
              
                <?php # DISPLAY COMPLETE LOGIN PAGE.

                # Set page title and display header section.
                $page_title = 'Login' ;

                # Display any error messages if present.
                if ( isset( $errors ) && !empty( $errors ) )
                {
                 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
                 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
                 echo 'Please try again or <a href="joystoys_customer_register.php">Register</a></p>' ;
                }
                 ?>

                <!-- Display body section. -->
                <form action="login_customer_action.php" method="post">
                <p>Email Address: <input type="text" name="email"> </p>
                <p>Password: <input type="password" name="pass"></p>
                <p><input type="submit" value="Login" ></p>
                </form>

              

          <hr>
  
  
        <!-- End page content -->
    
    <?php include "./includes/joystoys_footer.php" ?>
 

    </body>
</html>

