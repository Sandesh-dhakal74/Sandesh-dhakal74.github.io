
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[type=text], select {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
        }

        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
        include("connectiontest.php");
        error_reporting(0);

        $fnameErr = $lnameErr = $addressErr = $emailErr = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = test_input($_POST["fname"]);
            $lname = test_input($_POST["lname"]);
            $address = test_input($_POST["address"]);
            $email = test_input($_POST["email"]);

            if (empty($fname)) {
                $fnameErr = "First name is required";
            }

            if (empty($lname)) {
                $lnameErr = "Last name is required";
            }

            if (empty($address)) {
                $addressErr = "Address is required";
            }

            if (empty($email)) {
                $emailErr = "Email is required";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }

            if ($fnameErr == "" && $lnameErr == "" && $addressErr == "" && $emailErr == "") {
                $query="INSERT INTO studentinfo (fname,lname,address,email) VALUES ('$fname','$lname','$address','$email')";
                $data=mysqli_query($conn,$query);
                if ($data) {
                    echo "<script>alert('Data inserted successfully');</script>";
                    echo "<META HTTP-EQUIV='refresh' CONTENT='0; URL=http://localhost/testgarna.php'>";
                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        First name: <input type="text" name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : ''; ?>">
        <span class="error"><?php echo $fnameErr;?></span>
        <br>
        Last name: <input type="text" name="lname" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : ''; ?>">
        <span class="error"><?php echo $lnameErr;?></span>
        <br>
        Address: <input type="text" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
<span class="error"><?php echo $addressErr;?></span>
<br>
Email: <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
<span class="error"><?php echo $emailErr;?></span>
<br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>