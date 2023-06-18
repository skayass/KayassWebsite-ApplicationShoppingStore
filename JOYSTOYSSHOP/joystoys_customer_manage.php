<?php
session_start();
# Redirect if not logged in.
if (!isset($_SESSION['newcustomer_id'])) {
  require('login_customer_tools.php');
  load();
}

$servername = "localhost";
$username = "Samia";
$password = "ABC123";
$dbname = "joys_toys";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
  // Get product id, quantity and price
  $product_id = $_POST['product_id'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];

  // Check if there is enough quantity available
  $sql = "SELECT Quantity FROM products WHERE ProductID = '$product_id'";
  $result = $conn->query($sql);
  if (!$result) {
      printf("Error: %s\nQuery: %s\n", mysqli_error($conn),$sql);
      exit;
  }

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quantity_available = $row['Quantity'];
   
    if ($quantity > $quantity_available) {
      echo "Sorry, there are not enough products available. Please reduce the quantity or choose another product.";
    } else {
      // Calculate total amount
      $total_amount = $price * $quantity;

      // Get new customer id
      $newcustomer_id = $_SESSION['newcustomer_id'];

      // Insert cart item into carts table
      $sql = "INSERT INTO carts (newcustomer_id, ProductID, Quantity, Price) VALUES ('$newcustomer_id', '$product_id', '$quantity', '$price')";
      $result = $conn->query($sql);

      if ($result === TRUE) {
        echo "Product added to cart successfully!";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  } else {
    echo "Error: Product not found.";
  }
}

// Remove product from cart
if (isset($_POST['remove'])) {
  $cart_id = $_POST['cart_id'];

  $sql = "DELETE FROM carts WHERE CartID = '$cart_id'";
  $result = $conn->query($sql);

  if ($result === TRUE) {
    echo "Product removed from cart successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Checkout and create order
if (isset($_POST['checkout'])) {
  // Get new customer id
  $newcustomer_id = $_SESSION['newcustomer_id'];

  // Get current date
  $order_date = date("Y-m-d");

  // Initialize total amount
  $total_amount = 0;

  // Get cart items and update products table
  $sql = "SELECT * FROM carts WHERE newcustomer_id = '$newcustomer_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product_id = $row['ProductID'];
        $quantity = $row['Quantity'];
        $price = $row['Price'];
        $total_amount += $price * $quantity;
    
// Check if product is available in the inventory
    $inventory_query = "SELECT * FROM inventory WHERE ProductID = '$product_id'";
    $inventory_result = $conn->query($inventory_query);

    if ($inventory_result->num_rows > 0) {
      $inventory_row = $inventory_result->fetch_assoc();
      $quantity_available = $inventory_row['Quantity'];

      if ($quantity_available < $quantity) {
        echo "Sorry, we don't have enough quantity available for Product ID $product_id";
        break;
      } else {
    // Update inventory table
        $new_quantity_available = $quantity_available - $quantity;
        $inventory_update = "UPDATE inventory SET Quantity = '$new_quantity_available' WHERE ProductID = '$product_id'";
        $conn->query($inventory_update);
        }
  } else {
    echo "Inventory not found for Product ID $product_id";
    break;
}


// Update products table
    $product_update = "UPDATE products SET Quantity = Quantity - '$quantity' WHERE ProductID = '$product_id'";
    $update_result = $conn->query($product_update);

    if ($update_result !== TRUE) {
      echo "Error: " . $product_update . "<br>" . $conn->error;
      break;
     }

}

//if (!isset($new_quantity_available)) {
// Insert order into orders table
$sql = "INSERT INTO orders (newcustomer_id, OrderDate, TotalAmount) VALUES ('$newcustomer_id', '$order_date', '$total_amount')";
$order_result = $conn->query($sql);

if ($order_result === TRUE) {
      // Insert amount owed into accountreceivable table
    $sql = "INSERT INTO accountreceivable (newcustomer_id, AmountOwed) VALUES ('$newcustomer_id', '$total_amount')";
    $ar_result = $conn->query($sql);

    if ($ar_result === TRUE) {
            // Delete cart items
    $sql = "DELETE FROM carts WHERE newcustomer_id = '$newcustomer_id'";
    $delete_result = $conn->query($sql);

    if ($delete_result === TRUE) {
        echo "Order created successfully!";
    }else {
     echo "Error: " . $sql . "<br>" . $conn->error;
      }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
   }
 }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

} else {
    echo "";
}



//$conn->close();
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
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<form method='POST'>";
            echo "<input type='hidden' name='product_id' value='{$row['ProductID']}'/>";
            echo "Product: {$row['ProductID']} <h4>{$row['ProductName']}</h4> <p>
            <img style='max-width: 100%; max-height: 50vh;' src='{$row['ProductImage']}' alt='{$row['ProductName']}'><br><p>{$row['Category']}  {$row['Price']}  {$row['Quantity']}</p><br>  ";
            echo "Quantity: <input type='number' name='quantity' value='1' min='1' max='{$row['Quantity']}'/> ";
            echo "<input type='hidden' name='price' value='{$row['Price']}'/>";
            echo "<input type='submit' name='submit' value='Add to Cart'/>";
            echo "<hr>";
            echo "<br>";
            echo "</form>";
        }
    } else {
        echo "0 results";
    }
    echo "<br><br><br><hr>";
    

// Display cart items
$newcustomer_id = $_SESSION['newcustomer_id'];
$sql = "SELECT * FROM carts WHERE newcustomer_id = '$newcustomer_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Shopping Cart</h2>";
    echo "<table>";
    echo "<tr><th>Product</th><th>Quantity</th><th>Price</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['ProductID']}</td>";
        echo "<td>{$row['Quantity']}</td>";
        echo "<td>{$row['Price']}</td>";
        echo "<td>
              <form method='POST'>
                <input type='hidden' name='cart_id' value='{$row['CartID']}'/>
                <input type='submit' name='remove' value='Remove'/>
              </form>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<form method='POST'>
          <input type='submit' name='checkout' value='Checkout'/>
          </form>";
} else {
    echo "<h2>Your cart is empty!</h2>";
}

$conn->close();
?>
         
         
          <hr>
           
           
            <br>
            <br>
            <br>
           
           <?php
          # Display The Logged in Sentence.
          echo "<h4>You are now logged in, {$_SESSION['first_name']} {$_SESSION['last_name']} </h4>";
          # Create navigation links.
          echo '<p><a href="joystoys_customer_goodbye.php">Logout</a></p>';
          ?>
       
        

     <hr>
     <?php include "./includes/joystoys_footer.php" ?>
    </body>
  </html>

