<?php
$servername = "localhost";
$username = "Samia";
$password = "ABC123";
$dbname = "joys_toys";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 
              
 if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];           
    $sqlInsert = "INSERT INTO contact (name, email, message) VALUES ('$name',  '$email', '$message')";
    mysqli_query($conn, $sqlInsert);
}
                      
$conn->close();
?>


<!DOCTYPE html>

<html>
    <body>
        <?php include "./includes/joystoys_header.php" ?>

        <!-- Contact Section -->
          <div >
            <h1 style= "font-size: 35px;font-weight: bold; text-align:center">Contact Us</h1><br> 
            <p> We welcome your comments, suggestions, and inquiries. Please feel free to contact us through any of the following channels: </p>
               <p> By Phone: Call us at 555-123-4567 during our store hours:</p>
              <p> Monday to Saturday: 10 AM to 6 PM </p>
              <p>  Sunday: Closed </p>

              <p>In Person: We are located at 123 Main St, Anytown 12345. Please visit us during our store hours. </p>

              <p>We look forward to hearing from you soon! Do not hesitate to contact us.</p>
              
              <br>
              

                      
            <form action="" method="post">
                <p><input  type="text" placeholder="Name"  required name="name"></p>
                <p><input  type="datetime-local" placeholder="Date and time"  name="date" value="2020-11-16T20:00"></p>
                <p><input  type="text" placeholder="Email" required name="email"></p>
                <p><textarea name="message" placeholder="Message \ Special requirements" rows="5" cols="50"></textarea></p>
                <p><button  type="submit" name="submit"> Submit </button></p>
            </form>
              
              
          </div>
        
        <br>
        <hr>
        <?php include "./includes/joystoys_footer.php" ?>
    </body>
</html>