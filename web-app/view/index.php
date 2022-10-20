<!DOCTYPE html>
<html lang="en-us">
   <meta charset="utf-8" />
   <head>
      <title>.:: Tebuka | Login::.</title>
      <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
      <!-- <link rel="stylesheet" type="text/css" href="css/fonts.css" /> -->
      <link rel="stylesheet" type="text/css" href="css/login.css">
   </head>
   <body>
      <div class="form">
         <div class="header"><h2>TEBUKA | Log In</h2></div>
         <div class="login">
            <?php
            if(isset($wrong_credentials) AND $wrong_credentials == true)
               echo '<div style="color:red; text-align:center;">Wrong username or password.</div>';
            ?>
            <form action="" method="POST">
               <ul>
                  <li>
                  <span class="un"><i class="fa fa-user"></i></span><input type="text" name="username" autofocus value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>" required class="text" placeholder="Username"/></li>
                  <li>
                  <span class="un"><i class="fa fa-lock"></i></span><input type="password" name="password" value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" required class="text" placeholder="Password"/></li>
                  <li>
                  <input type="submit" value="LOGIN" name="login" class="btn">
                  </li>
               </ul>
            </form>
         </div><br/>
         <div class="sign">
            <div class="need" style="text-align:center; width:100%; text-transform:uppercase;">
               TEBUKA Private Area
               <?php
                  if(isAdminTableEmpty()){
                     echo '<span class="pull-right"><a style="color:#FFF; text-decoration: none;" href="index.php?do=seed">*</a></span>';
                  } 
               ?>
            </div>
         </div>
      </div>
   </body>
</html>