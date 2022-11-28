<?php
session_start();
include_once '../dbConfig.php';

if (isset($_POST["add"]))
    {
        if (isset($_SESSION["cart"]))
        {
            $item_array_id = array_column($_SESSION["cart"],"id");
            if (!in_array($_GET["id"],$item_array_id))
            {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'id' => $_GET["pid"],
                    'pname' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
                $_SESSION["cart"][$count] = $item_array;
                
                echo '<script>alert("Product has been added to cart!")</script>';
                echo '<script>window.location="index.php"</script>';
            }

            else
            {
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="index"</script>';
            }
        }
        else
        {
            $item_array = array(
                'id' => $_GET["id"],
                'pname' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
?>
<!DOCTYPE <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>I-Ford Gaming</title>    
        <link rel="icon" href="/Assets/Images/logo-white.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/index.css">
        <link rel="stylesheet" href="../CSS/nav.css">
        <link rel="stylesheet" href="../CSS/footer.css">
        <link rel="stylesheet" href="../CSS/Side.css">
        <link rel="stylesheet" href="../CSS/Items.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>    
        <script>
            $(function()
            {
                $('#navbar').load('../Components/Nav.html');
                $('#side').load('../Components/Side.html');
                $('#footer').load('../Footer.html');
            })
        </script>
    </head>
<body>
    <div id="navbar"></div>
    <div id="footer"></div>
    <div id="side"></div>

<div class="main">
    <?php
      include_once '../dbConfig.php';
      $query = "SELECT * FROM products WHERE category='ps5console' ";
      $result = mysqli_query($con,$query);
      
      if(mysqli_num_rows($result) > 0) 
      {
        while ($row = mysqli_fetch_array($result)) 
        {

    ?>
        <div class="card">
            <img src="../Uploads/Ps 5 consoles/<?php echo $row["image"]; ?>" width="150px" height="130px">
            <p class="text-info"><?php echo $row["pname"]; ?></p>
            <p class="text-danger" >Kshs <?php echo $row["price"]; ?></p>
            <input type="hidden" name="id" value="<?=$row["id"]?>">
            <input type="hidden" name="pname" value="<?=$row['pname']?>">
            <input type="hidden" name="price" value="<?=$row['price']?>">
            <!-- <input type="number" name="quantity" value="1"> -->
            <p><button class="add-to-cart" onclick="add()">Add to Cart</button></p>
        </div>

<?php
        }
      }
?>
</div>

</body>
</html>