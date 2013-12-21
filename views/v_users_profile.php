<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/users.css" type="text/css">

<div class="well">
<form class="form-horizontal">
  <legend>Profile for <?=$user->first_name?></legend>
  	<span class="help-block">Here's your information:</span>
  	 <div class-"form-group">
  	 		<label>First Name: </label> <?=$user->first_name?><br>
        <label>Last Name: </label> <?=$user->last_name?><br>
       	<label>Favorite Breakfast: </label> <?=$user->favorite_meal?><br>
     </div>

        <!-- <a id="edit_profile" href='/users/p-profile'>Edit Profile</a> -->


	<h5>Hey, <?=$user->first_name?>! Complete your profile here:</h5>
     <form method='POST' action='/users/p_profile'>
        <div class="form-group">
        	<label>Favorite Meal</label>
          <input type='text' name='favorite_meal' id="favorite_meal">
  			</div>
  			<div class="form-group">
          <input type='submit' value='Submit Profile'>
        </div>         
      </form>
  </div>
     


</div>