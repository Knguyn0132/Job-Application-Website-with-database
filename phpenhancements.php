<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <title>SPOTIFREE | ENHANCEMENTS</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!--NAV BAR-->
  <?php
  include_once "navbar.inc";
  ?>

  

    <!--ENHANCEMENTS-->  
    <div class="item">
        <a href="manage.php" class="enhancement-name">Enhancement 1: Username & Password</a>
        <div class="enhancement-text">
          <p>Build an HTML form with input fields for the username and password. Use the POST method to send form data to a PHP script. Retrieve submitted username and password in your PHP script. Additionally, compare them with predefined values (e.g., ‘admin’ and ‘password’)and set a session variable for successful logins</p>
          <p>
            Copyright &copy;:
            <a href="https://www.youtube.com/watch?v=vESwDXV81F0&pp=ygUQbG9naW4gbG9nb3V0IHBocA%3D%3D">Username and Password</a>
          </p>
        </div>
    </div>



      <div class="item">
        <a href="manage.php" class="enhancement-name">Enhancement 2: Log out</a>
        <div class="enhancement-text">
           <p>Implement security measures to ensure that the management webpage is not accessible via its URL by unauthorized users or anyone who is not logged in. 
            Use authentication checks to restrict access and redirect any unauthorized access attempts to the login page. 
            This will help maintain secure access control and prevent direct URL access to the management page.
</p>
          <p>
            Copyright &copy;:
            <a href="https://www.youtube.com/watch?v=TrY5EUa6ZC8&pp=ygUQbG9naW4gbG9nb3V0IHBocA%3D%3D">Logout</a>
          </p>
        </div>
      </div>
      
      
  


<!--FOOTER-->
<?php
    include_once "footer.inc";
  ?>
        
    
    </body>
    </html>