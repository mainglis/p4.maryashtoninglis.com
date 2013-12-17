<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/users.css" type="text/css">

<style type="text/css">
.form-signin .form-signin-heading,
.form-signin .checkbox {
        margin-bottom: 10px;
      }
      
.form-signin input[type="first_name"],
.form-signin input[type="last_name"],
.form-signin input[type="text"],
.form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
</style>

<form class="form-signin" method='POST' action='/users/p_signup'>
	<h2 class='form-signin-heading'>Sign Up</h2>
	  
	  <input type="text" name='first_name' class="input-block-level" placeholder="First name">
    <input type="text" name='last_name' class="input-block-level" placeholder="Last name">
	  <input type="text" name='email' class="input-block-level" placeholder="Email address">
    <input type="password" name='password' class="input-block-level" placeholder="Password"><br>
  
  	<button class="btn btn-large btn-primary" type="submit">Sign up</button>
 <!--  	<input type='submit' value='Sign Up'> -->
  
</form>