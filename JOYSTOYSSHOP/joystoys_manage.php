<?php
session_start();
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admins_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

$servername = "localhost";
$username = "Samia";
$password = "ABC123";
$dbname = "joys_toys";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['add'])) {
    // add product
    // insert product into products table
    $ProductName = $_POST['ProductName'];
    $ProductImage = $_POST['ProductImage'];    
    $Category = $_POST['Category'];
    $Price = $_POST['Price'];  
    $Quantity = $_POST['Quantity'];
    $sqlInsert = "INSERT INTO products (ProductName, ProductImage, Category, Price, Quantity) VALUES ('$ProductName', '$ProductImage', '$Category', '$Price', '$Quantity')";
    mysqli_query($conn, $sqlInsert);
    

    // update inventory
    $ProductID = mysqli_insert_id($conn); // get the ID of the inserted product
    $sqlUpdateInventory = "UPDATE inventory SET Quantity = Quantity + $Quantity WHERE ProductID = $ProductID";
    mysqli_query($conn, $sqlUpdateInventory);
    
}

if (isset($_POST['update'])) {
    // update product in products table
    $ProductID = (int)$_POST['Name'];
    $ProductName = $_POST['ProductName'];
    $ProductImage = $_POST['ProductImage'];    
    $Category = $_POST['Category'];
    $Price = $_POST['Price'];  
    $Quantity = $_POST['Quantity'];          
    $sqlUpdate = "UPDATE products SET ProductID= '$ProductID', ProductName='$ProductName',  ProductImage='$ProductImage', Category= '$Category', Price= '$Price', Quantity= '$Quantity' WHERE ProductID='$ProductID'";
    mysqli_query($conn, $sqlUpdate);

    // update inventory
    $sqlUpdateInventory = "UPDATE inventory SET Quantity = $Quantity WHERE ProductID = $ProductID";
    mysqli_query($conn, $sqlUpdateInventory);
}

if (isset($_POST['delete'])) {
    // delete product
    // delete product from products table
    $ProductID = (int)$_POST['name'];
    $sqlDelete = "DELETE FROM products WHERE ProductID='$ProductID'";
    mysqli_query($conn, $sqlDelete);

    // update inventory
    $sqlUpdateInventory = "DELETE FROM inventory WHERE ProductID = $ProductID";
    mysqli_query($conn, $sqlUpdateInventory);
}



$conn->close();
?>

<!DOCTYPE html>
<html>
<?php include "./includes/joystoys_header.php" ?>
    <body>
    <?php
    echo var_dump($_POST);
	echo "<br>";
	echo "<br>";
	echo "<br>";   
    ?>
        
    <hr>  
   
        
    <!-- Menu Section -->
      
          <h1>Our Products</h1><br>

            <?php
            
                $sql = "SELECT ProductID, ProductName, ProductImage, Category, Price, Quantity FROM products";
                $result = $dbc->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       echo "ProductID: {$row['ProductID']} <h4>{$row['ProductName']}</h4> <p>
                       <img style='max-width: 100%; max-height: 50vh;' src='{$row['ProductImage']}' alt='{$row['ProductName']}'><br><p>{$row['Category']}  {$row['Price']}  {$row['Quantity']}</p><br>  ";
          
                    }
                } else {
                    echo "0 results";
                }
                echo "<br><br><br><hr>";
    
    
               ?>

     
          
              
          <h1>Manage Products</h1><br>
          <hr>
          <h4> Add New Product Item: </h4>
          <form border= "1" action= "" method= "post">
              Product Name: <input type= "text" id="ProductName" name="ProductName" /><br>
              Product Image: <input type= "text" id="ProductImage" name="ProductImage" /><br>
              Category: <input type="text" id= "Category" name= "Category" /> <br>
              Price: <input type="text" id= "Price" name= "Price" /> <br>
              Quantity: <input type="text" id= "Quantity" name= "Quantity" /> <br>
              <input type= "submit" name= "add" value= "Add" />
          </form>
            
          <hr>
            
          <h4> Update Product Item: </h4>
          <form border= "1" action= "" method= "post">
              Product Id: <input type= "number" id="name" name="Name" /><br>
              Product Name: <input type= "text" id="ProductName" name="ProductName" /><br>
              Product Image: <input type= "text" id="ProductImage" name="ProductImage" /><br>
              Category: <input type="text" id= "Category" name= "Category" /> <br>
              Price: <input type="text" id= "Price" name= "Price" /> <br>
              Quantity: <input type="text" id= "Quantity" name= "Quantity" /> <br>
              <input type= "submit" name= "update" value= "Update" />
          </form>
           
          <hr>
            
          <h4> Delete Product Item: </h4> 
          <form border= "1" action= "" method= "post">
              Product Id: <input type= "number" id="name" name="name" /><br>
              <input type= "submit" name= "delete" value= "Delete" />
          </form>
          
          <hr>
            
            
            <br>
            <br>
            <br>
        
        <!-- Add a button to link to the inventory page -->
               <a href="joystoys_inventory.php"><button>View Inventory</button></a>
         <br>
            <br>
            <br>
         <br>
            <br>
            
        
            <hr>
           <?php
          # Display The Logged in Sentence.
          echo "<h4>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']} </h4>";
          # Create navigation links.
          echo '<p><a href="joystoys_goodbye.php">Logout</a></p>';
          ?>
        
       
        


     <hr>
     <?php include "./includes/joystoys_footer.php" ?>
    </body>
  </html>
