<!-- Controller Specific JS/CSS -->
<link rel="stylesheet" href="/css/users.css" type="text/css">

<form class="form-signin" method='POST' action='/users/p_login'>
    <h2 class='form-signin-heading'>Log In</h2>
    <input type="text" name='email' class="input-block-level" placeholder="Email address">
    <input type="password" name='password' class="input-block-level" placeholder="Password"><br>

    <?php if(isset($error)): ?>
        <div class='error'>
            Login failed. Please double check your email and password.
        </div>
        <br>
    <?php endif; ?>

    <button class="btn btn-large btn-primary" type="submit">Log in</button>

</form>

