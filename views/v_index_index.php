<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/users.css" type="text/css">


<!-- <div class="well"> -->
<?php if($user): ?>
<form class="form-signin">
Hello <?=$user->first_name;?> <!-- Do I need this anymore? -->
</form>

<?php else: ?>
<form class="form-signin">
<h3 class='form-signin-heading'>Welcome, Shift Head!</h3>
<p>Your life is about to get easier. Scratch the 3-ring binder and sign up here to log meals from your laptop or phone.</p>
</form>
<?php endif; ?>
<!-- 
</div> -->


<!-- If logged in, I want this page to display as the v_meals_index page, which will list all the meals recently made -->