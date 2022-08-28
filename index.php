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
    <script src='script.js'></script>
  </head>
  <body>
    <h1><?=$greeting?></h1>
  
    <main>
      <h2>Sign in</h2>
      <form id="auth">
  	<label>login: <input type="text" name='login'></label> <label class="error" id="auth_login_err" for=auth1"></label> <br>
        <label>password: <input type="password" name='password'></label> <label class="error" id="auth_password_err" for=auth2"></label> <br>
	<input type="submit" id="auth_submit" value="sign in" onclick="formProc('auth'); return false;">
      </form>
      
      <h2>Sign up</h2>
      <form id="reg">
  	<label>login: <input type="text" name='login'></label> <label class="error" id="reg_login_err" for=reg1"></label> <br>
        <label>password: <input type="password" name='password'></label> <label class="error" id="reg_password_err" for=reg2"></label> <br>
        <label>confirm password: <input type="password" name='confirm_password'></label> <label class="error" id="reg_confirm_password_err" for=reg3"></label> <br>
        <label>email: <input type="text" name='email'></label> <label class="error" id="reg_email_err" for=reg4"></label> <br>
        <label>name: <input type="text" name='name'></label> <label class="error" id="reg_name_err" for=reg5"></label> <br>
	<input type="submit" id="reg_submit" value="sign up" onclick="formProc('reg'); return false;">
      </form>
    </main>

      <input type='button' id='logout' value='log out' onclick='logout()'>

  </body>
</html>