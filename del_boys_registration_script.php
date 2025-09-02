<?php
    require 'connection.php';
    session_start();
    $name2 = mysqli_real_escape_string($con, $_POST['name2']);
    $email2 = mysqli_real_escape_string($con, $_POST['email2']);
    $regex_email2 = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";

    // Validate email using regular expression
    if (!preg_match($regex_email2, $email2)) {
        echo "Incorrect email. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup_del_boys.php" />
        <?php
        exit();
    }

    $password2 = md5(md5(mysqli_real_escape_string($con, $_POST['password2'])));

    // Validate password length
    if (strlen($password2) < 6) {
        echo "Password should have at least 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup_del_boys.php" />
        <?php
        exit();
    }

    $contact2 = $_POST['contact2'];
    $city2 = mysqli_real_escape_string($con, $_POST['city2']);
    $address2 = mysqli_real_escape_string($con, $_POST['address2']);

    // Check for duplicate email
    $duplicate_del_boys_query = "SELECT id FROM del_boys WHERE email='$email2'";
    $duplicate_del_boys_result = mysqli_query($con, $duplicate_del_boys_query) or die(mysqli_error($con));
    $rows_fetched = mysqli_num_rows($duplicate_del_boys_result);

    if ($rows_fetched > 0) {
        // Duplicate registration
        ?>
        <script>
            window.alert("Email already exists in our database!");
        </script>
        <meta http-equiv="refresh" content="2;url=signup_del_boys.php" />
        <?php
        exit();
    } else {
        // Insert new shop registration
        $del_boys_registration_query = "insert into del_boys (name, email, password, contact, city, address) 
            values ('$name2', '$email2', '$password2', '$contact2', '$city2', '$address2')";
        
        $del_boys_registration_result = mysqli_query($con, $del_boys_registration_query) or die(mysqli_error($con));
        ?>
        <script>
            window.alert("You successfully registered as a delivery member");
        </script>

        <?php
        
        $_SESSION['email2'] = $email2;
        // The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        $_SESSION['id'] = mysqli_insert_id($con);

        ?>
        <meta http-equiv="refresh" content="3;url=delivery.php" />
        <?php
    }
?>
