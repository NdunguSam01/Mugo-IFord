<?php

if(isset($_POST['add-to-cart']))
{
    $item_array=array(
        'item_id'=>$_POST['hidden_id'],
        'item_name'=>$_POST['hidden_name'],
        'item_price'=>$_POST['hidden_price'],
        'item_quantity'=>$_POST['quantity']
    );
    $cart_data[]=$item_array;
    $item_data=json_encode($cart_data);
    setcookie('shopping_cart',$item_data, time() + (86400 * 30));
    header("location: index?success=1");
}
if(isset($_GET["success"]))
{
    $message='<script>alert("Item added to cart")</script>';
}
?>
<table>
    <tr>
        <th>Item name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Action</th>
    </tr>
    <?php
        if(isset($_COOKIE['shopping_cart']))
        {
            $total=0;
            $cookie_data=stripslashes($_COOKIE['shopping_cart']);
            $cart_data=json_decode($cookie_data, true);

            foreach($cart_data as $keys=>$values)
            {
    ?>
        <tr>
            <td><?php echo $values['item_name']; ?></td>
            <td><?php echo $values['item_quantity']; ?></td>
            <td><?php echo $values['item_price']; ?></td>
            <td><?php echo number_format($values['item_quantity']) * $values['item_price'],2; ?></td>
            <td><a href="index?action=delete&id=<?php echo $values['item_id'];?>">Delete item?</a></td>
        </tr>

    <?php
            $total=$total+($values['item_quantity'] * $values['item_price']);
            }
    ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right"><?php echo number_format($total, 2);?></td>
            </tr>
    <?php
        }
        else
        {
            echo '
                <tr>
                    <td colspan="5" aligb="center">No item in cart</td>
                </tr>
            ';
        }
    ?>
</table>