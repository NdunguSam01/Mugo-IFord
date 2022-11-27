<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>User Details</title>
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
                $('#footer').load('../Components/Footer.html');
            })
        </script>
    </head>
    <body>
        <div id="navbar"></div>
        <!-- <div id="footer"></div> -->
        <div id="side"></div>
        
        <div class="main">
            <table>
                <caption style="text-align: center;">User Details</caption>
                <tr>
                    <td>
                        First name<br><br>
                        <textarea readonly></textarea>
                    </td>
                    <td>
                        Last name<br><br>
                        <textarea readonly></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Email address<br><br>
                        <textarea></textarea>
                    </td>
                    <td>
                        Phone number<br><br>
                        <textarea></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        Username<br><br>
                        <textarea readonly></textarea>
                    </td>
                    <td>
                        Password<br><br>
                        <textarea></textarea>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>