<!DOCTYPE html>
<html lang="en">
<head>
<title><?php if(isset($title)) echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	

<!-- JS/CSS File we want on every page -->
<!-- Bootstrap Core CSS -->
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/css/bootstrap-responsive.css" rel="stylesheet">

<!-- Controller Specific JS/CSS -->
<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>
	<div class="navbar-wrapper">
		<div class="navbar navbar-static-top">
			<a class="navbar-brand" href='/'>ShiftLog</a>
			<ul class="pull-right nav navbar-nav">
<!-- PHP IF USER LOGGED IN -->
			<?php if($user): ?>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">You are logged in as <?=$user->first_name?> <?=$user->last_name?> <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="/users/profile">View Profile</a></li>
		          <li><a href="/users/logout">Logout</a></li>
		        </ul>
		      </li>
		    </ul>
		</div> <!--/navbar-static-top-->
	</div> <!--/navbar-wrapper-->
	<div class="container-fluid">
	      <div class="row-fluid">
	        <div class="span3">
	          <div class="well sidebar-nav">
	            <ul class="nav nav-list">
	              <li class="nav-header">Actions</li>
	              <!-- <li class="active"><a href="#">Link</a></li> -->
	              <li><a href='/meals/add'>Log Meal</a></li>
	              <li><a href='/meals/index'>View Meals</a></li>
	              <li><a href='/recipes/search'>Search for Recipe</a></li>
	            </ul>
	          </div><!--/well sidebar-nav-->
	        </div><!--/span3-->
	        <div class="span9">
	          <!-- <div class="row-fluid"> -->
            	<p>
            		<?php if(isset($content)) echo $content; ?>
					<?php if(isset($client_files_body)) echo $client_files_body; ?>
				</p>
	      		<!-- </div> -->
	      	</div>
	      </div>
<!-- PHP IF USER IS NOT LOGGED IN -->
			<?php else: ?>
			      <li><a href='/users/signup'>Sign Up</a></li>
			      <li><a href='/users/login'>Log In</a></li>
		     	</div>
				</div>

						<?php if(isset($content)) echo $content; ?>
						<?php if(isset($client_files_body)) echo $client_files_body; ?>

			<?php endif; ?>
		
<!-- JS File we want on every page. placed at the end of the document so the pages load faster  -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>				

<!-- Bootstrap core JavaScript -->
<script src="/js/bootstrap.min.js"></script>

</body>
</html>