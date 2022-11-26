<?php
include_once 'dbConfig.php';

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
        <link rel="stylesheet" href="./Assets/CSS/index.css">
        <link rel="stylesheet" href="./Assets/CSS/nav.css">
        <link rel="stylesheet" href="./Assets/CSS/footer.css">
        <link rel="stylesheet" href="./Assets/CSS/Side.css">
        <link rel="stylesheet" href="./Assets/CSS/Items.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>    
        <script>
            $(function()
            {
                $('#navbar').load('./Assets/Components/Nav.html');
                $('#side').load('./Assets/Components/Side.html');
                $('#footer').load('./Assets/Components/Footer.html');
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

        <div class="card">
          <img src="./Assets/Uploads/<?php echo $row["image"]; ?>" class="img-responsive">
          <p class="text-info"><?php echo $row["pname"]; ?></p>
          <p class="text-danger" id="price">Kshs <?php echo $row["price"]; ?></p>
          <p><button>Add to Cart</button></p>
        </div>

<?php
        }
      }
?>
</div>

</body>
</html>