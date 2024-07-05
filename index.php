<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a connection to the database
    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    // Retrieve form data from the POST request and store them in variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    // SQL query to insert the form data into the database
    $sql = "INSERT INTO `krmu_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `details`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if($con->query($sql) === TRUE){
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal+SC:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <img class="kri" src="https://d13loartjoc1yn.cloudfront.net/upload/institute/images/large/180508035020_krm-university-34.webp" alt="kri">
    <div class="container">
        <h3>K.R. Mangalam Manali Trip Form</h3>
        <p>Enter and submit your details to confirm your entry for the trip.</p>
        <?php
        if ($insert == true) {
            echo "<p>Thank you for submitting your details. Your form has been successfully submitted.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number" required>
            <textarea name="desc" id="desc" placeholder="Enter additional details here" required></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
