<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:dashboard.php');
  	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\css\login.css">
    <title>Admin Site</title>
  </head>
  <body>
    <div class='box'>
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title'>
      <div class='i i-login'></div><h2>LOGIN</h2>
    </div>
    <div class='box-login'>
      <form action="login.php" method="POST">
      <div class='fieldset-body' id='login_form'>
        <p class='field'>
          <label for='username'>USERNAME</label>
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </p>
        <p class='field'>
          <label for='password'>PASSWORD</label>
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </p>

        <input type='submit' id='do_login' value='Sign In' name="login" />
      </div>
    </form>
    </div>
  </div>
  <?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p>
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>




  </body>
</html>
