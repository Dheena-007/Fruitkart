<?php
    session_start();
    require 'check_if_added.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/fruitkartlogo.png" />
        <title>FruitKart</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header3.php';
            ?>
            <div class="container">
                <div class="jumbotron">
                    <h1>Welcome to FruitKart!</h1>
                    <p>We have the best fresh fruits for you. No need to hunt around, we have all in one place.</p>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="https://FruitKart.in">Fruitkart</a> Store. All Rights Reserved.</p>
                   <p>This website is developed by Team 17</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
