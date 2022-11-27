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
    </head>
<body onload="onLoadCart()">
<script>
    const onLoadCart=()=>
{
    let productNumbers=localStorage.getItem('cartNumbers');
    if(productNumbers)
    {
        document.querySelector('.topnav-right span').textContent= productNumbers;
    }
}
</script>
<div class="navbar">
    <img src='../Images/logo-white.png' alt='I-Ford Gaming' class='image'></img>
    <div class="topnav-right">
        <a href="../"><i class="fa fa-home">&ensp;Home</i></a>
        <a href='../Cart'><i class="fa fa-shopping-cart">&ensp;Cart<span><sup>0</sup></span></i></a>
        <div class="dropdown">
            <button class="dropbtn">Account Details&ensp;<i class="fa fa-angle-down"></i>
            </button>
            <div class="dropdown-content">
                <a href='../Accounts/MyAccount'><i class="fa fa-user">&nbsp;My Account</i></a>
                <a href='../Accounts/Orders'><i class="fa fa-shopping-bag">&nbsp;Orders</i></a>
                <a href='../Accounts/Inbox'><i class="fa fa-envelope">&nbsp;Inbox</i></a>
                <a href='../Accounts/Saved'><i class="fa fa-heart">&nbsp;Saved Items</i></a>
            </div>
        </div>
        <a href='../Help'><i class="fa fa-question-circle">&ensp;Help</i></a>
    </div>   
    
</div>

<div id="divMenu">    
    <ul>    
        <li><a>PlayStation 3&ensp;<i class="fa fa-angle-right" style="font-size:24px"></i></a>    
            <ul>    
                <li><a href="../PS3/Consoles">Consoles</a></li>    
                <li><a href="../PS3/Controllers">Controllers</a></li>    
                <li><a href="../PS3/Games">Digital Games</a></li>    
            </ul>    
        </li>         
    </ul> 
    <ul>    
        <li><a>PlayStation 4&ensp;<i class="fa fa-angle-right" style="font-size:24px"></i></a>    
            <ul>    
                <li><a href="../PS4/Consoles">Consoles</a></li>    
                <li><a href="../PS4/Controllers">Controllers</a></li>    
                <li><a href="../PS4/Games">Games</a></li>    
            </ul>    
        </li>         
    </ul>  
    <ul>    
        <li><a>PlayStation 5&ensp;<i class="fa fa-angle-right" style="font-size:24px"></i></a>    
            <ul>    
                <li><a href="../PS5/Consoles">Consoles</a></li>    
                <li><a href="../PS5/Controllers">Controllers</a></li>    
                <li><a href="../PS5/Games">Games</a></li>  
            </ul>    
        </li>         
    </ul>    
    <ul>    
        <li><a>PC Games&ensp;&ensp;&ensp;<i class="fa fa-angle-right" style="font-size:24px"></i></a>    
            <ul>    
                <li><a href="../PC/Games">Games</a></li>   
            </ul>    
        </li>         
    </ul>  
</div> 

<div class="main">
    <?php
      include_once '../dbConfig.php';
      $query = "SELECT * FROM products WHERE category='ps3console' ";
      $result = mysqli_query($con,$query);
      
      if(mysqli_num_rows($result) > 0) 
      {
        while ($row = mysqli_fetch_array($result)) 
        {

    ?>
        <div class="card">
            <img src="../Uploads/<?php echo $row["image"]; ?>" width="150px" height="130px">
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

<!-- <div class="footer">
    <a href='https://twitter.com'  title='Twitter Page' target="_blank" class="fa fa-twitter"></a>&ensp;
    <a href='https://facebook.com'  title='Facebook Page' target="_blank" class="fa fa-facebook"></a>&ensp;
    <a href='https://instagram.com' title='Instagram Page' target="_blank" class="fa fa-instagram"></a>&ensp;
    <a href='mailto:ndungu.muigai01@gmail.com' title='Email address' target="_blank" class="fa fa-envelope-o"></a>&ensp;
    <a href='https://web.whatsapp.com/send?phone=+254707251073' title='WhatsApp contact' target="_blank" class="fa fa-whatsapp"></a>
</div> -->

<script src="../main.js"></script>
</body>
</html>