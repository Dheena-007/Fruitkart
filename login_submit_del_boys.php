<?php
    require 'connection.php';
    session_start();
    $email2=mysqli_real_escape_string($con,$_POST['email2']);
    $regex_email2="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email2,$email2)){
        echo "Incorrect email. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login_del_boys.php" />
        <?php
    }
    $password2=md5(md5(mysqli_real_escape_string($con,$_POST['password2'])));
    if(strlen($password2)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to login page...";
        ?>
        <meta http-equiv="refresh" content="2;url=login_del_boys.php" />
        <?php
    }
    $del_boys_authentication_query="select id,email from del_boys where email='$email2' and password='$password2'";
    $del_boys_authentication_result=mysqli_query($con,$del_boys_authentication_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($del_boys_authentication_result);
    if($rows_fetched==0)       //no del_boys
    {    //redirecting to same login page
        ?>
        <script>
            window.alert("Wrong email or password");
        </script>
        <meta http-equiv="refresh" content="2;url=login_del_boys.php" />
        <?php
        //header('location: login');
        //echo "Wrong email or password.";
    }else{
        $row=mysqli_fetch_array($del_boys_authentication_result);
        $_SESSION['email2']=$email2;
        $_SESSION['id']=$row['id'];  //del_boys id
        header('location: delivery.php');
    }
    
 ?>