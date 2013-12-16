<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS/CSS File we want on every page -->
	<!-- Bootstrap Core CSS -->
	<link href="/css/bootstrap.css" rel="stylesheet" type="text/css">

	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" href="/css/users.css" type="text/css">
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>
			<?php if($user): ?>
				<div class="navbar-fixed-top">
					<ul class="nav navbar-nav">
					<li><a href='/'>Home</a></li>
					<li><a href='/posts/add'>Add Post</a></li>
					<li><a href='/posts/'>View Posts</a></li>
					<li><a href='/posts/users'>Follow Users</a></li>
					<li class="dropdown">
					  <a href="#" class="dropdown-toggle" data-toggle="dropdown">You are logged in as <?=$user->first_name?> <?=$user->last_name?> <b class="caret"></b></a>
					  <ul class="dropdown-menu">
					    <li><a href="/users/profile">View Profile</a></li>
					    <li><a href="/users/logout">Logout</a></li>
					    <li class="divider"></li>
					   <!--  <li class="dropdown-header">Nav header</li>
					    <li><a href="#">Separated link</a></li>
					    <li><a href="#">One more separated link</a></li> -->
					  </ul>
					</li>
					<!-- <li><a href='/users/logout'>Logout</a></li> -->
			<?php else: ?>
				<!-- <div class="container"> -->

				      <form class="form-signin" method='POST' action='/users/p_login'>
<!-- You want it to only show the login and signin options if the user is not signed in,
	and you want the default at index to be "log in" that will switch to sign up on button click -->
				          <h3 class="form-signin-heading">Welcome, Shift Head!</h3>
				          <p style="font-style:italic;">Log in or sign up below</p>
				        
				          <p>Email<br>
				          <input type='text' name='email'>    
				          <br><br>

				          Password<br>
				          <input type='password' name='password'>
				          <br><br>

				          <?php if(isset($error)): ?>
				              <div class='error'>
				                  Login failed. Please double check your email and password.
				              </div>
				              <br>
				          <?php endif; ?>

				          <input type='submit' value='Log in'></p>

				          <p><a href='/users/signup'>Sign Up</a>
				         <?php if(isset($content)) echo $content; ?>

						<?php if(isset($client_files_body)) echo $client_files_body; ?> 

				      </form>

				
			<?php endif; ?>
	
	</div>
	
	<!-- <?php if($user): ?>
		You are logged in as <?=$user->first_name?> <?=$user->last_name?><br>
	<?php endif; ?>
	
	<br><br> -->
	
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>


<!-- ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- JS File we want on every page -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>				
<!-- Bootstrap core JavaScript -->
	<script src="/js/bootstrap.min.js"></script>
</body>
</html>