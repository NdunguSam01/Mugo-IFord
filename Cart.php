<?php
session_start();
include_once 'dbConfig.php';
$message='';
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
                header("location:Cart?remove=1");
            }
        }
    }
    if($_GET["action"]=='clear')
    {
        setcookie('shopping_cart',"",time()-3600);
        header("location:Cart?clearAll=1");
    }
}


if(isset($_GET["success"]))
{
    $message='
        <p>Item added to cart</p>
    ';
}

// if(isset($_GET["remove"]))
// {
//     echo '<script>alert("Item removed from cart!")</script>';
// }
if(isset($_GET["clearAll"]))
{
    $message='
    <p>Shopping cart has been cleared!</p>
    ';
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cart Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./CSS/index.css">
        <link rel="stylesheet" href="./CSS/nav.css">
        <link rel="stylesheet" href="./CSS/footer.css">
        <link rel="stylesheet" href="./CSS/Side.css">
        <link rel="stylesheet" href="./CSS/Items.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">       
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>    
        <script>
            $(function()
            {
                $('#navbar').load('./Nav.html');
                $('#footer').load('./Footer.html');
            })
        </script>
        <style>
table, td 
{
  top: 150px;
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 300px;
}
td,th 
{
  padding-top: 20px;
  padding-right: 30px;
  padding-bottom: 40px;
  padding-left: 25px;
  padding: 20px;
  background-color: white;
}
th
{
  color: white;
  background-color :rgba(255,255,255,0.3);;
  border: 1px solid black;
  border-collapse: collapse;
  font-style: italic;
  font-weight: bolder;
}
tr:hover 
{
    background-color: black;
}
a,a:visited
{
    text-decoration: none;
}
#checkout
{
    padding: 15px;
    background-color: green;
    color: white;
    border:none;
    font-size: 15px;
}
#checkout:hover
{
    background-color: greenyellow;
}

    </style>
    </head>
    <body>
        <div id="navbar"></div>
        <div id="footer"></div>
      <?php echo $message;?>
    <form method="post" action="./Checkout">
      <table width="70%" align="center" style="padding-top: 200px;">
      <h2 style="text-align: center;">Order details</h2>
        <tr>
            <th width="30%">Item name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
        <?php
        if(isset($_COOKIE['shopping_cart']))
        {
            $total=0;
            $cookie_data=stripslashes($_COOKIE['shopping_cart']);
            $cart_data=json_decode($cookie_data, true);

            foreach($cart_data as $keys => $values)
            {
                ?>

                <tr>
                    <td><?php echo $values['item_name'];?></td>
                    <td style="text-align: center;"><?php echo $values['item_quantity'];?></td>
                    <td style="text-align: center;">Kshs <?php echo $values['item_price'];?></td>
                    <td style="text-align: left;">Kshs <?php echo number_format($values['item_quantity'] * $values['item_price'], 2);?></td>
                    <td style="text-align: center;"><a href="Cart?action=delete&id=<?php echo $values['item_id'];?>" onclick="return confirm('Remove item from cart?')"><i class="fa fa-trash"  onMouseOver="this.style.color='red'" onMouseOut="this.style.color='blue'" style="font-size: 20px;" ></i></a></td>
                </tr>
                <?php
                    $total=$total+($values['item_quantity'] * $values['item_price']);
                    $_SESSION['amount']=$total;

            }
            ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td colspan="2" style="text-align: left;">Kshs <?php echo number_format($total, 2);?></td>
                </tr>
                <tr>
                    <td colspan="5" align="right">
                        <button type="submit" name="checkout" id="checkout">Checkout</button>
                    </td>
                </tr>
                <?php
        }
        else
        {
            echo '
            <tr>
                <td colspan"5" align="center">Cart is empty!</td>
            </tr>
            ';
        }
        ?>
      </table>
    </form>

    
    </body>
</html>