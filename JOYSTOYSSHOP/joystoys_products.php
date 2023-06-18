
<!DOCTYPE html>
<html>
<?php include "./includes/joystoys_header.php" ?>
    
    

    <body>
   
      
          <h1>Our Products</h1><br>

            <?php

    
                $sql = "SELECT ProductName, Category, Price , ProductImage FROM products";
                $result = $dbc->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                       echo "<h4>{$row['ProductName']}</h4>
                       <img style='max-width: 100%; max-height: 50vh;' src='{$row['ProductImage']}' alt='{$row['ProductName']}'><br><p>{$row['Category']}  {$row['Price']}</p><br>  ";
          
                        }
                } else {
                    echo "0 results";
                }
                echo "<br><br><br><hr>";
    
    
               ?>



    

    
     <?php include "./includes/joystoys_footer.php" ?>
    </body>
  </html>