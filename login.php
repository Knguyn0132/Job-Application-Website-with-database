

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <title>SPOTIFREE | LOGIN</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>
<body>


<?php
  include_once "navbar.inc";
  ?>
        <div class="login">
            <form action = "loginprocess.php" method = "post">
                <h1 id="manager">Manager Login</h1>
                <br>
                <?php if (isset($_GET['error'])) {
                    echo $_GET['error'] . "Invalid username or password<br>";
                }
                ?>
                <label>Username</label>
                <input type="text" name="name" placeholder="Username" id="username" required></br>
                <label>Password</label>
                <input type ="password" name="pwd" placeholder="Password" id="password" required></br>
                <button type ="submit" id="login-button">Login</button>
            </form>
        </div>
<!--FOOTER-->
<?php
    include_once "footer.inc";
  ?>

</body>
</html>