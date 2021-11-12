<?php
$insert =false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Could not connect to this database due to" . mysqli_connect_error());
    }
    // echo "Connecting to";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `desc`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true) {
        // echo "Successfully inserted";
        $insert = true;
    } 
    else{
        echo "ERROR : $sql <br> $con->error";
    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>Travel form</title>
</head>
<body>
    <div class="container">
        <h1>Welcome to The trip</h1>
        <p>Enter your details and submit the form to confirm your Participation</p>

        <?php
        if($insert == true) {
            echo "<p class='submitMsg'>Thank you for joinig us for the trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name...">
            <input type="text" name="age" id="age" placeholder="Enter your age...">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender...">
            <input type="email" name="email" id="email" placeholder="Enter your email...">
            <input type="tel" name="phone" id="phone" placeholder="Enter your phone...">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your description..."></textarea>
            <button class="btn">Submit</button>
            <button class="btn">Reset</button>
        </form>
    </div>
    
    <script src="app.js"></script>
</body>
</html>