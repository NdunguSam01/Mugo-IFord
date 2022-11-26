<?php
include_once '../../../dbConfig.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../CSS/nav.css">
        <link rel="stylesheet" href="../../CSS/footer.css">
        <link rel="stylesheet" href="../../CSS/index.css">
        <link rel="stylesheet" href="../../CSS/Side.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>    
        <script>
            $(function()
            {
                $('#navbar').load('../../Components/Nav.html');
                $('#side').load('../../Components/Side.html');
                $('#footer').load('../../Components/Footer.html');
            })
        </script>
    </head>

<body>
    <div id="navbar"></div>
    <!-- <div id="footer"></div> -->
    <div id="side"></div>
    <div class="main">
    <?php
      $query = "SELECT * FROM products WHERE category='ps3console' ";
      $result = mysqli_query($con,$query);
      
      if(mysqli_num_rows($result) > 0) 
      {
        while ($row = mysqli_fetch_array($result)) 
        {

    ?>
        <div class="card">
            <img id="image" src="./Assets/Uploads/<?php echo $row["image"]; ?>" width="150px" height="130px">
            <p class="text-info" id="name"><?php echo $row["pname"]; ?></p>
            <p class="text-danger" id="price">Kshs <?php echo $row["price"]; ?></p>
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