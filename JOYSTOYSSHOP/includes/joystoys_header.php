<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    header {
    margin: 0;
    padding: 0;
    }

    nav {
    display: flex;
    align-items: center;
    background-color: #f2f2f2;
    height: 50px;
    }

    nav img {
    height: 40px;
    margin: 5px 10px 5px 0;
    }

    nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    align-items: center;
    justify-content: flex-end;
    flex: 1;
    }

    nav li {
    margin: 0 10px;
    }

    nav a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    padding: 5px;
    transition: all 0.3s ease;
    border-radius: 3px;
    }

    nav a:hover {
    background-color: #333;
    color: #fff;
    }
</style>
</head>   


<body>
    
<!-- Header -->
<header>

    <img  src="./images/toyslogo.png" alt="My Website Logo" class="logo">

    <nav>

        <ul>
            <li><a href="./joystoys.php">About</a></li>
            <li><a href="./joystoys_products.php" >Products</a></li>
            <li><a href="./joystoys_customer_register.php" >Register</a></li>
            <li><a href="./joystoys_customer_manage.php" >Shopping</a></li>
            <li><a href="./joystoys_register.php" >Admins</a></li>
            <li><a href="./joystoys_manage.php" >Manage</a></li>
            <li><a href="./joystoys_contact.php" >Contact</a></li>
        </ul>

     </nav>
</header>

<main>   
  <img style="max-width: 100%; height: auto" src="./images/toysimage.jpg" alt="Toy Shop">

    
<!--
  <div>
    <h1 style= "font-size: 35px;font-weight: bold; text-align:center" >JOY'S TOYS</h1>
    <?php require('./includes/connect_db.php'); ?>
  </div>
-->

</main>      
</body>
