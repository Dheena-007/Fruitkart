<?php
    session_start();
    require 'check_if_added.php';
?>
<!DOCTYPE html>
<html lang="en">
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
    <!-- Additional CSS for the dynamic table -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container1 {
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px; /* Adding border-radius to the container */
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px; /* Adding border-radius to the table */
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            margin-right: 5px;
            border-radius: 5px; /* Adding border-radius to the buttons */
        }

        .btn-danger {
            background-color: #d9534f;
            border-color: #d9534f;
        }

        .btn-primary {
            background-color: #337ab7;
            border-color: #337ab7;
        }
    </style>
</head>
<body>
    <div>
        <?php
            require 'header3.php';
        ?>
        <div class="container1">
            <div class="jumbotron">
                <h1>Welcome to FruitKart!</h1>
                <p>We have the best fresh fruits for you. No need to hunt around, we have all in one place.</p>
            </div>

            <!-- Dynamic Table Code -->
            <h1>Enter fruits available in your shop</h1>
            <form method="POST" name="sample">
                <br>
                Fruit Name: <input type="text" name="tname" id="fruitName">
                Quantity(kg) <input type="number" name="rollno" id="quantity">
                <br><br>
                <input type="button" name="add" value="Add Data" onclick="addStudent();" class="btn btn-success"><hr>

                <table id="tbl" class="table" border="1">
                    <thead>
                        <th>Fruit Name</th>
                        <th>Qty</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
                <input type="submit" value="Save Data" name="save_data" formaction="save_data.php" class="btn btn-info">
            </form>

            <script type="text/javascript">
                function addStudent() {
                    var tname = document.sample.tname.value;
                    var rollno = document.sample.rollno.value;

                    var tr = document.createElement('tr');

                    var td1 = tr.appendChild(document.createElement('td'));
                    var td2 = tr.appendChild(document.createElement('td'));
                    var td3 = tr.appendChild(document.createElement('td'));
                    var td4 = tr.appendChild(document.createElement('td'));

                    td1.innerHTML = '<input type="hidden" name="tname[]" value="' + tname + '">' + tname;
                    td2.innerHTML = '<input type="hidden" name="rollno[]" value="' + rollno + '">' + rollno;
                    td3.innerHTML = '<input type="button" name="del" value="Delete" onclick="delStudent(this);" class="btn btn-danger">';
                    td4.innerHTML = '<input type="button" name="up" value="Update" onclick="UpStud(this);" class="btn btn-primary">';

                    document.getElementById("tbl").appendChild(tr);

                    // Clear input fields
                    document.getElementById("fruitName").value = "";
                    document.getElementById("quantity").value = "";
                }

                function UpStud(stud) {
                    var s = stud.parentNode.parentNode;
                    var tr = document.createElement('tr');

                    var td1 = tr.appendChild(document.createElement('td'));
                    var td2 = tr.appendChild(document.createElement('td'));
                    var td3 = tr.appendChild(document.createElement('td'));
                    var td4 = tr.appendChild(document.createElement('td'));

                    td1.innerHTML = '<input type="text" name="name1" value="' + s.childNodes[0].childNodes[0].value + '">';
                    td2.innerHTML = '<input type="number" name="rollno1" value="' + s.childNodes[1].childNodes[0].value + '">';
                    td3.innerHTML = '<input type="button" name="del" value="Delete" onclick="delStudent(this);" class="btn btn-danger">';
                    td4.innerHTML = '<input type="button" name="up" value="Update" onclick="addUpStud(this);" class="btn btn-primary">';

                    document.getElementById("tbl").replaceChild(tr, s);

                    // Clear input fields
                    document.getElementById("fruitName").value = "";
                    document.getElementById("quantity").value = "";
                }

                function addUpStud(stud) {
                    var s = stud.parentNode.parentNode;
                    var tr = document.createElement('tr');

                    var td1 = tr.appendChild(document.createElement('td'));
                    var td2 = tr.appendChild(document.createElement('td'));
                    var td3 = tr.appendChild(document.createElement('td'));
                    var td4 = tr.appendChild(document.createElement('td'));

                    td1.innerHTML = document.sample.name1.value;
                    td2.innerHTML = document.sample.rollno1.value;
                    td3.innerHTML = '<input type="button" name="del" value="Delete" onclick="delStudent(this);" class="btn btn-danger">';
                    td4.innerHTML = '<input type="button" name="up" value="Update" onclick="UpStud(this);" class="btn btn-primary">';

                    document.getElementById("tbl").replaceChild(tr, s);

                    // Clear input fields
                    document.getElementById("fruitName").value = "";
                    document.getElementById("quantity").value = "";
                }

                function delStudent(Stud) {
                    var s = Stud.parentNode.parentNode;
                    s.parentNode.removeChild(s);
                }
            </script>
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
