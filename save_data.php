<?php

if (isset($_POST['save_data'])) {
    $fruitNames = $_POST['tname'];
    $quantities = $_POST['rollno'];

    // Assuming you have already established a MySQLi connection
    $con = mysqli_connect("localhost", "root", "", "store");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    foreach ($fruitNames as $index => $fruitName) {
        $quantity = $quantities[$index];

        // Check if the fruit already exists in the database
        $checkQuery = "SELECT * FROM shop_fruits WHERE fruit_name = '$fruitName'";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // If the fruit exists, update the quantity
            $existingRecord = mysqli_fetch_assoc($checkResult);
            $newQuantity = $existingRecord['quantity'] + $quantity;

            $updateQuery = "UPDATE shop_fruits SET quantity = '$newQuantity' WHERE fruit_name = '$fruitName'";
            $updateResult = mysqli_query($con, $updateQuery);

            if (!$updateResult) {
                echo "Failed to update quantity: " . mysqli_error($con);
            } else {
                echo "Quantity updated successfully for $fruitName";
            }
        } else {
            // If the fruit doesn't exist, insert a new record
            $insertQuery = "INSERT INTO shop_fruits (fruit_name, quantity) VALUES ('$fruitName', '$quantity')";
            $insertResult = mysqli_query($con, $insertQuery);

            if (!$insertResult) {
                echo "Record not inserted: " . mysqli_error($con);
            } else {
                echo "Record inserted successfully for $fruitName";
            }
        }

        echo "<br>";
    }

    mysqli_close($con);
}

?>
