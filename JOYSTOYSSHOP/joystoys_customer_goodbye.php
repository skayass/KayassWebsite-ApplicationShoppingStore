<?php include "./includes/joystoys_header.php" ?>
<hr>

<?php # DISPLAY COMPLETE LOGGED OUT PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'newcustomer_id' ] ) ) { require ( 'login_customer_tools.php' ) ; load() ; }

# Set page title and display header section.
$page_title = 'Goodbye' ;

# Clear existing variables.
$_SESSION = array() ;
  
# Destroy the session.
session_destroy() ;

# Display body section.
echo '<h1>Goodbye!</h1><p>You are now logged out.</p><p><a href="joystoys_customer_login.php">Login</a></p>' ;
?>


<hr>
<?php include "./includes/joystoys_footer.php" ?>