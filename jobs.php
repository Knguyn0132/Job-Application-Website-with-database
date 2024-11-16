<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <title>SPOTIFREE | POSITION</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      </head>
<body>
    <!--NAV BAR-->
  <?php
  include_once "navbar.inc";


  include ("settings.php");
  $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
  ?>
  
  


    <!--POSITION-->

    <div class="position-page">
    <div class="container">

        <section class="card">
            <div class="position-images">
                <img src="images/cat1.jpg" alt="cat">
                <h1>Security Engineer | SE228</h1>
            </div>
            <div class="position-content">
                
                <br>
                <p class="h2">Involve in designing, implementing and maintaining security against unauthorized access, malware infections and other security risks</p>
                <br>
                <p>135.000AUD - 166.000AUD</p>
                <a href="security_engineer.php">READ MORE</a>
                <a href="apply.php">APPLY NOW</a>
            </div>  
          </section>  
    
    
    
        <section class="card">
            <div class="position-images">
                <img src="images/cat2.jpg" alt="cat">
                <h1>Data Engineer | DE129</h1>

            </div>
            <div class="position-content">
                
                <br>
                <p class="h2">Designing, constructing, and maintaining the systems and infrastructure necessary for the processing, storage, and retrieval of large volumes of data.</p>
                <br>
                <p>120.000AUD - 140.000AUD</p>
                <a href="data_engineer.php">READ MORE</a>
                <a href="apply.php">APPLY NOW</a>
            </div>  
          </section>
    

    
        <section class="card">
            <div class="position-images">
                <img src="images/cat3.jpg" alt="cat">
                <h1>Web Developer | WD303</h1>
            </div>
            <div class="position-content">

                <br>
                <p class="h2">Be able to do Frontend and backend development, UI/UX design, making the website secure, stay in touch with trends and CI/CD.</p>
                <br>
                <p>90.000AUD - 100.000AUD</p>
                <a href="web_developer.php">READ MORE</a>
                <a href="apply.php">APPLY NOW</a>
            </div>  
            
          </section>
          
          
    <aside id="newa">
    
      <p>Three candidates each position!</P>
    
    </aside>
    
    </div>
</div>


  
<!--FOOTER-->
<?php
    include_once "footer.inc";
  ?>


</body>

</html>