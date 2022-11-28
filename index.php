<?php
session_start();
include_once 'dbConfig.php';
$message='';
if(isset($_POST['add_to_cart']))
{
    if(isset($_COOKIE['shopping_cart']))
    {
        $cookie_data=stripslashes($_COOKIE['shopping_cart']);
        $cart_data=json_decode($cookie_data, true);

    }
    else
    {
        $cart_data=array();
    }

    $item_id_list=array_column($cart_data, 'item_id');

    if(in_array($_POST['hidden_id'],$item_id_list))
    {
        foreach($cart_data as $keys=>$values)
        {
            if ($cart_data[$keys]['item_id']==$_POST['hidden_id']) 
            {
                $cart_data[$keys]['item_quantity']= $cart_data[$keys]['item_quantity'] + $_POST['quantity'];
            }
        }
    }
    else
    {

        $item_array=array(
            'item_id' => $_POST['hidden_id'],
            'item_name' => $_POST['hidden_name'],
            'item_price' => $_POST['hidden_price'],
            'item_quantity' => $_POST['quantity'],
        );
        $cart_data[]= $item_array;
    }
    $item_data=json_encode($cart_data);
    setcookie('shopping_cart', $item_data, time() + (86400*30));
    header("location:Index?success=1");
}

if(isset($_GET["action"]))
{
    if($_GET["action"]== "delete")
    {
        $cookie_data=stripslashes($_COOKIE['shopping_cart']);
        $cart_data=json_decode($cookie_data, true);

        foreach($cart_data as $keys=>$values)
        {
            if($cart_data[$keys]['item_id']== $_GET['id'])
            {
                unset($cart_data[$keys]);
                $item_data=json_encode($cart_data);
                setcookie('shopping_cart', $item_data, time()+(86400*30));
                header("location:Index?remove=1");
            }
        }
    }
    if($_GET["action"]=='clear')
    {
        setcookie('shopping_cart',"",time()-3600);
        header("location:index?clearAll=1");
    }
}


if(isset($_GET["success"]))
{
    $message='
        <p>Item added to cart</p>
    ';
}

if(isset($_GET["remove"]))
{
    $message='
    <p>Item removed from cart</p>
    ';
}
if(isset($_GET["clearAll"]))
{
    $message='
    <p>Shopping cart has been cleared!</p>
    ';
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
        <link rel="stylesheet" href="./CSS/index.css">
        <link rel="stylesheet" href="./CSS/nav.css">
        <link rel="stylesheet" href="./CSS/footer.css">
        <link rel="stylesheet" href="./CSS/Side.css">
        <link rel="stylesheet" href="./CSS/Items.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>    
        <script>
            $(function()
            {
                $('#navbar').load('./Nav.html');
                $('#side').load('./Side.html');
                $('#footer').load('./Footer.html');
            })
        </script>
    </head>
<body>
        <div id="navbar"></div>
        <!-- <div id="footer"></div> -->
        <div id="side"></div>

<div class="main">
    <?php
      include_once 'dbConfig.php';
      $query = "SELECT * FROM products ORDER BY id ASC ";
      $result = mysqli_query($con,$query);
      
      if(mysqli_num_rows($result) > 0) 
      {
        while ($row = mysqli_fetch_array($result)) 
        {

    ?>
    <form method="POST">
        <div class="card">
            <img src="./All Uploads/<?php echo $row["image"]; ?>" width="150px" height="130px">
            <p class="text-info"><?php echo $row["pname"]; ?></p>
            <p class="text-danger" >Kshs <?php echo $row["price"]; ?></p>
            <input type="number" name="quantity" value="1">
            <input type="hidden" name="hidden_id" value="<?=$row["id"]?>">
            <input type="hidden" name="hidden_name" value="<?=$row['pname']?>">
            <input type="hidden" name="hidden_price" value="<?=$row['price']?>">
            <p><button type="submit" name="add_to_cart">Add to Cart</button></p>
        </div>
    </form>

<?php
        }
      }
?>
</div>
    
</body>
</html>