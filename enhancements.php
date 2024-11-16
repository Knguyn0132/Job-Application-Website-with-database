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
        <a href="index.php#footer" class="enhancement-name">Enhancement 1: Responsive Footer</a>
        <div class="enhancement-text">
          <ul>
            <li>Using the pseudo-elements "before" to insert content before the main content of an element.</li>
            <li>Add "transition: all 0.5s ease" to ensure a smoother experience for the user.</li>
            <li>Add "@media" element to make the website responsive for different sizes of smaller screens.</li>
          </ul>
          <p>
            Copyright &copy;:
            <a href="https://www.youtube.com/watch?v=bf01WW-Cols&pp=ygUacmVzcG9uc2l2ZSBmb290ZXIgaHRtbCBjc3M%3D">Footer</a>
          </p>
        </div>
    </div>



      <div class="item">
        <a href="jobs.php#card" class="enhancement-name">Enhancement 2: Position Cards</a>
        <div class="enhancement-text">
          <ul>
            <li>Apply "flex-wrap: wrap" to ensure the container will wrap all the elements inside when there are changes in the device's size.</li>
            <li>Utilize "box-shadow" to give contents more depth and make them stand out from the background.</li>
            <li>Imply "visibility" so that the content will appear and disappear depends on your hovering.</li>
          </ul>
          <p>
            Copyright &copy;:
            <a href="https://www.youtube.com/watch?v=t5zFfDdvApE&t=71s">Cards</a>
          </p>
        </div>
      </div>
      
      
  


<!--FOOTER-->
<?php
    include_once "footer.inc";
  ?>
        
    
    </body>
    </html>