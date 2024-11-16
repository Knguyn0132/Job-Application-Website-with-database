<?php
    session_start();
    include ("settings.php");
    $conn = @mysqli_connect($host,$user, $pwd, $sql_db);
    $table = "users";
    if (!$conn) {
        echo "<p>Database connection failed</p>";
    }
    else {
        if ((isset($_POST["name"])) and (isset($_POST["pwd"]))) {
            function sanitizeInput($input) {
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);
                return $input;
            }
        }
    }

    $name = sanitizeInput($_POST["name"]);
    $pwd  = sanitizeInput($_POST["pwd"]);
    $sql = "SELECT * FROM $table WHERE name = '$name' AND pwd = '$pwd'"; //get name and pwd from database
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result); //fetch the first row

        if ($row["name"] === $name and $row["pwd"] === $pwd) { //check if data input is correct
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["name"];
            header("Location: manage.php");
            exit();
        }
        else {
            header("Location: login.php?error");
            
            exit();
        }
    } else {
        header("Location: login.php?error");
        exit();
    }

?>