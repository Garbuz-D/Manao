<?php

if(isset($_COOKIE['PHPSESSID'])){
  $stylesheet = 'sheet1.css';
  $greeting = 'Hello ' . $_COOKIE['name'];
}else{
  $stylesheet = 'sheet2.css';
  $greeting = 'Welcome. Log in or register';
}
?>

<!doctype HTML>
<html>
  <head>
    <link rel='stylesheet' href='<?=$stylesheet?>'>
    <link rel='stylesheet' href='stylemain.css'>
    <script src='script.js'></script>
  </head>
  <body>
    <h1><?=$greeting?></h1>
  
    <main>
      
      <form id="auth">
	<h2>Sign in</h2>
  	<label for='auth_login'>login:</label> <input type="text" name='login' id='auth_login'> <label class="error" id="auth_login_err" for=auth1"></label> <br>
        <label for='ath_password'>password:</label> <input type='password' id="auth_password" name='password'> <label class="error" id="auth_password_err" for=auth2"></label> <br>
	<input type="submit" id="auth_submit" value="sign in" onclick="formProc('auth'); return false;">
      </form>
      
      <form id="reg">
      <h2>Sign up</h2>
  	<label for='reg_login'>login:</label> <input type="text" id='reg_login' name='login'> <label class="error" id="reg_login_err" for=reg1"></label> <br>
        <label for='reg_password'>password:</label> <input type='password' id="reg_password" name='password'> <label class="error" id="reg_password_err" for=reg2"></label> <br>
        <label for='confirm_password'>confirm password:</label> <input type="password" id='confirm_password' name='confirm_password'> <label class="error" id="reg_confirm_password_err" for=reg3"></label> <br>
        <label for='email'>email:</label> <input type="text" id='email' name='email'> <label class="error" id="reg_email_err" for=reg4"></label> <br>
        <label for='name'>name:</label> <input type="text" id='name' name='name'> <label class="error" id="reg_name_err" for=reg5"></label> <br>
	<input type="submit" id="reg_submit" value="sign up" onclick="formProc('reg'); return false;">
      </form>
    </main>

      <input type='button' id='logout' value='log out' onclick='logout()'>

  </body>
</html>