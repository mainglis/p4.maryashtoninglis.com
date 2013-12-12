<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
	
	<!-- JS/CSS File we want on every page -->
	<!-- Bootstrap Core CSS -->
	<link href="/css/bootstrap.css" rel="stylesheet">

	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" href="/css/users.css" type="text/css">
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	

	<div class="navbar-fixed-top">
		<ul class="nav navbar-nav">
		<li><a href='/'>Home</a></li>
				
			<?php if($user): ?>
				<li><a href='/posts/add'>Add Post</a></li>
				<li><a href='/posts/'>View Posts</a></li>
				<li><a href='/posts/users'>Follow Users</a></li>
				<li><a href='/users/logout'>Logout</a></li>
			<?php else: ?>
				<li><a href='/users/signup'>Sign Up</a></li>
				<li><a href='/users/login'>Log In</a></li>
			<?php endif; ?>
	
	</div>
	
	<?php if($user): ?>
		You are logged in as <?=$user->first_name?> <?=$user->last_name?><br>
	<?php endif; ?>
	
	<br><br>
	
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>