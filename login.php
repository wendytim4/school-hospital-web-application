
<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Log in Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style><?php include 'mystyle.css'; ?></style>  
  </head>
  <body>

    <section class="container">


        <form class="my-form" method="post" action="login.php" >

        <?php include('errors.php'); ?>

          <div style="text-align:left; margin-left:69px; margin-top:5px"><img src="pic.jpg" /></div>
          
          <h1 id="nambs">NATEMBEA</h1>

          <strong><h6 id="healthclinic">HEALTH CLINIC</h6></strong>

          
            <h1 style="text-align: center;">Online Portal</h1><br>

            <p style="text-align: center; font-weight: bold; color: #000249">Thank you for using Ashesi Health Services!</p><br>

            <label for="name">Username</label>
            <input class="myinput" type="text" name="username" id="username" placeholder="User name" required><br>
            
           
            <label for="password">Password</label>
            <input class="myinput"  type="password" id="'upass" name="password" placeholder="password" required>


            <button type="submit " class="btn"  value="Sign In" name="login_user" >Sign-In </button>

            <a href="register.php" style="width:auto; "class="signupbtn">Don't have an account? Sign Up</a>
 
          </form>

        </section>
              
            
      
           

</body>
</html>
