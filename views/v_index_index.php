<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/users.css" type="text/css">


<div class="well">
<?php if($user): ?>
Hello <?=$user->first_name;?>
<?php else: ?>
<p>Welcome, Shift Head! Your life is about to get easier. You know those old meal logs we keep in a 3-ring binder on the counter in the soup kitchen?
</p>
<?php endif; ?>
</div>


<!-- If logged in, I want this page to display as the v_meals_index page, which will list all the meals recently made -->