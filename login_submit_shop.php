<?php
    require 'connection.php';
    session_start();
    $email1=mysqli_real_escape_string($con,$_POST['email1']);
    $regex_email1="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email1,$email1)){
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login_shop_owner.php" />
        <?php
    }
    $password1=md5(md5(mysqli_real_escape_string($con,$_POST['password1'])));
    if(strlen($password1)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login_shop_owner.php" />
        <?php
    }
    $shop_authentication_query="select id,email from shops where email='$email1' and password='$password1'";
    $shop_authentication_result=mysqli_query($con,$shop_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($shop_authentication_result);
    if($rows_fetched==0)       //no shop
    {    //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong email or password");
        </script>
        <meta http-equiv="refresh" content="1;url=login_shop_owner.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($shop_authentication_result);
        $_SESSION['email1']=$email1;
        $_SESSION['id']=$row['id'];  //shop id
        header('location: fruits_avail.php');
    }
    
 ?>