<!DOCTYPE html>
<html>
    <body>
        <?php include "./includes/joystoys_header.php" ?>

        <!-- Page content -->
       
              <h1>Register</h1><br>
              
                <?php # DISPLAY COMPLETE REGISTRATION PAGE.

                # Set page title and display header section.
                $page_title = 'Register' ;


                # Check form submitted.
                if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
                {

                  # Initialize an error array.
                  $errors = array();

                  # Check for a first name.
                  if ( empty( $_POST[ 'first_name' ] ) )
                  { $errors[] = 'Enter your first name.' ; }
                  else
                  { $fn = mysqli_real_escape_string( $dbc, trim( $_POST[ 'first_name' ] ) ) ; }

                  # Check for a last name.
                  if (empty( $_POST[ 'last_name' ] ) )
                  { $errors[] = 'Enter your last name.' ; }
                  else
                  { $ln = mysqli_real_escape_string( $dbc, trim( $_POST[ 'last_name' ] ) ) ; }

                  # Check for an email address:
                  if ( empty( $_POST[ 'email' ] ) )
                  { $errors[] = 'Enter your email address.'; }
                  else
                  { $e = mysqli_real_escape_string( $dbc, trim( $_POST[ 'email' ] ) ) ; }

                  # Check for a password and matching input passwords.
                  if ( !empty($_POST[ 'pass1' ] ) )
                  {
                    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
                    { $errors[] = 'Passwords do not match.' ; }
                    else
                    { $p = mysqli_real_escape_string( $dbc, trim( $_POST[ 'pass1' ] ) ) ; }
                  }
                  else { $errors[] = 'Enter your password.' ; }

                  # Check if email address already registered.
                  if ( empty( $errors ) )
                  {
                    $q = "SELECT newcustomer_id FROM newcustomers WHERE email='$e'" ;
                    $r = @mysqli_query ( $dbc, $q ) ;
                    if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="joystoys_customer_login.php">Login</a>' ;
                  }

                 
                  if ( empty( $errors ) ) 
                  {
                    $q = "INSERT INTO newcustomers  (first_name, last_name, email, pass, reg_date) VALUES ('$fn', '$ln', '$e', SHA2('$p',256), NOW() )";
                    $r = @mysqli_query ( $dbc, $q ) ;
                    if ($r)
                    { echo '<h1>Registered!</h1><p>You are now registered.</p><p><a href="joystoys_customer_login.php">Login</a></p>'; }

                    # Close database connection.
                    mysqli_close($dbc); 

                    # Display footer section and quit script:

                    exit();
                  }
                  # Or report errors.
                  else 
                  {
                    echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
                    foreach ( $errors as $msg )
                    { echo " - $msg<br>" ; }
                    echo 'Please try again.</p>';
                    # Close database connection.
                    mysqli_close( $dbc );
                  }  
                }
                ?>

                <!-- Display body section -->
                <form action="" method="post">
                <p>First Name: <input type="text" name="first_name" size="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>"></p> 
                <p>Last Name: <input type="text" name="last_name" size="20" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>"></p>
                <p>Email Address: <input type="text" name="email" size="50" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
                <p>Password: <input type="password" name="pass1" size="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" ></p>
                <p>Confirm Password: <input type="password" name="pass2" size="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"></p>
                <p><input type="submit" value="Register"></p>
                </form>
          <hr>
  
        <!-- End page content -->
  
    <?php include "./includes/joystoys_footer.php" ?>
 
    </body>
</html>

