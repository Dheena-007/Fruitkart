<?php
    require 'connection.php';
    session_start();
    $shopname1 = mysqli_real_escape_string($con, $_POST['shopname1']);
    $email1 = mysqli_real_escape_string($con, $_POST['email1']);
    $regex_email1 = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";

    // Validate email using regular expression
    if (!preg_match($regex_email1, $email1)) {
        echo "Incorrect email. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup_shop_owner.php" />
        <?php
        exit();
    }

    $password1 = md5(md5(mysqli_real_escape_string($con, $_POST['password1'])));

    // Validate password length
    if (strlen($password1) < 6) {
        echo "Password should have at least 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup_shop_owner.php" />
        <?php
        exit();
    }

    $contact1 = $_POST['contact1'];
    $city1 = mysqli_real_escape_string($con, $_POST['city1']);
    $address1 = mysqli_real_escape_string($con, $_POST['address1']);

    // Check for duplicate email
    $duplicate_shops_query = "SELECT id FROM shops WHERE email='$email1'";
    $duplicate_shops_result = mysqli_query($con, $duplicate_shops_query) or die(mysqli_error($con));
    $rows_fetched = mysqli_num_rows($duplicate_shops_result);

    if ($rows_fetched > 0) {
        // Duplicate registration
        ?>
        <script>
            window.alert("Email already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup_shop_owner.php" />
        <?php
        exit();
    } else {
        // Insert new shop registration
        $shops_registration_query = "insert into shops (shopname, email, password, contact, city, address) 
            values ('$shopname1', '$email1', '$password1', '$contact1', '$city1', '$address1')";
        
        $shops_registration_result = mysqli_query($con, $shops_registration_query) or die(mysqli_error($con));

        echo "Shop successfully registered";
        $_SESSION['email1'] = $email1;
        // The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        $_SESSION['id'] = mysqli_insert_id($con);

        ?>
        <meta http-equiv="refresh" content="3;url=login_shop_owner.php" />
        <?php
    }
?>
