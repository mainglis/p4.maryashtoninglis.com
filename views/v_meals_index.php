<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/meals.css" type="text/css">

<div class="well">

<form class="form-horizontal">
  <legend>What's been cooking?</legend>

  <?php foreach($meals as $meal): ?>

        <div class="form-meal">
        	<label>Shift Head: </label> <?=$meal['shift_head']?> logged on <?=Time::display($meal['created'])?><br>
	        <label>Meal: </label> <div><?=$meal['meal_kind']?><br>
	        <label>Menu: </label> <div><?=$meal['menu']?><br>
	        <!-- <img id="avatar" src="<?=$meals[0]['meal_photo']?>" alt="Photo of meal" height="100" width="100"/> -->
	    </div>
        
<?php endforeach; ?>
  
</form>
</div>



<!-- _________________ Failed attempt ____________________ -->
<!-- If logged in, I want this page to display as the v_meals_index page, which will list all the meals recently made -->
<!-- <div class="well"> -->
<!-- <?#php if($user): ?>

<div class="well">
	<div class="span9">
		Make this echo v_meals_index.php
	</div>
</div> -->

<!-- <form class="form-signin">
Hello <?#=$user->first_name;?> 
</form> -->

<!--<?#php else: ?>
<form class="form-signin">
<h3 class='form-signin-heading'>Welcome, Shift Head!</h3>
<p>Your life is about to get easier. Scratch the 3-ring binder and sign up here to log meals from your laptop or phone.</p>
</form>
<?#php endif; ?> -->
<!-- </div> -->
