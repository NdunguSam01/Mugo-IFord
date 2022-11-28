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

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="stylesheet" href="./CSS/index.css"> -->
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
                // $('#side').load('./Side.html');
                $('#footer').load('./Footer.html');
            })
        </script>
    </head>
    <body>
        <div id="navbar"></div>
        <!-- <div id="footer"></div> -->
        <div id="side"></div>
    <div style="clear:both;">
    <h3>Order details</h3>
      <?php echo $message;?>
      <div align="right">
        <a href="Cart?action=clear"><b>Clear cart</b></a> 
      </div>
      <table>
        <tr>
            <th width="40%">Item name</th>
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
                    <td><?php echo $values['item_quantity'];?></td>
                    <td>Kshs <?php echo $values['item_price'];?></td>
                    <td>Kshs <?php echo number_format($values['item_quantity'] * $values['item_price'], 2);?></td>
                    <td><a href="Cart?action=delete&id=<?php echo $values['item_id'];?>"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php
                    $total=$total+($values['item_quantity'] * $values['item_price']);
            }
            ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">Kshs <?php echo number_format($total, 2);?></td>
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
    </div>
    </body>
</html>