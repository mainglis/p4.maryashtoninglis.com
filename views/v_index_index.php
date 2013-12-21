<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/users.css" type="text/css">


<!-- <div class="well"> -->
<?php if($user): ?>

<div class="well">
	<form class="form-horizontal">
		<legend>About Shift Log</legend>
		<p>The intention of this application is to streamline meal recording, meal planning, and volunteer management at Haley House's Soup Kitchen. Records are currently kept on paper in a binder and haphazardly entered into an Excel sheet.  This application will hopefully help the meal leaders decide what to make and record the results effectively.  It should also help the volunteer coordinator know who has shown up to volunteer and with what frequency.</p>
	</form>
</div>

<?php else: ?>
<form class="form-signin">
<h3 class='form-signin-heading'>Welcome, Shift Head!</h3>
<p>Your life is about to get easier. Scratch the 3-ring binder and start logging soup kitchen meals from your laptop or phone!</p>
<?php endif; ?>
</form>
</div> 
