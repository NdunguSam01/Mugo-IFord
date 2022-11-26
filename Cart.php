<?php 
if (isset($_POST["add"]))
    {
        if (isset($_SESSION["cart"]))
        {
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["pid"],$item_array_id))
            {
                $count = count($_SESSION["cart"]);
                $item_array = array(
            'product_id' => $_GET["pid"],
                    'item_name' => $_POST["hidden_name"],
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
                'product_id' => $_GET["pid"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }
 if (isset($_GET["action"]))
    {
        if ($_GET["action"] == "delete")
        {
            foreach ($_SESSION["cart"] as $keys => $value)
            {
                if ($value["product_id"] == $_GET["pid"])
                {
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed!")</script>';
                    echo '<script>window.location="Cart"</script>';
                }
            }
        }
    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="Cart.css">
    <title>Shopping Cart</title>
</head>
<body background="https://th.bing.com/th/id/R.96142d5bd8a2052b13ee478d7a8bfebf?rik=sTZVEFGJNmPvMg&pid=ImgRaw">

<div class="container" style="width: 65%">
    <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>

        <button><a href="./">Continue Shopping</a></button>

        <div class="table-responsive">
            <br><table class="table table-bordered">
            <tr>
                <th width="20%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="13%">Total Price</th>
                <th width="20%" colspan="2">Actions</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>Kshs <?php echo $value["product_price"]; ?></td>
                            <td>
                                Kshs <?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="Cart.php?action=order&id=<?php echo $value["product_id"]; ?>"><span
                                        class="btn btn-success">Place Order</span></a> </td>
                            <td><a href="Cart.php?action=delete&id=<?php echo $value["product_id"]; ?>" onclick="return confirm('Are you sure you want to remove item?');"><span
                                        class="btn btn-success">Remove</span></a></td>

                        </tr>
                        <?php
                        $amount = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">Kshs <?php echo number_format($amount, 2); ?></th>
                            <td></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>


 </div>

</body>
</html>