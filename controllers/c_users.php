<?php
class users_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    public function __construct() {
    
    	# Make sure the base controller construct gets called
		parent::__construct();
    } 


	/*-------------------------------------------------------------------------------------------------
	Display a form so users can sign up	
	-------------------------------------------------------------------------------------------------*/
    public function signup() {
       
       # Set up the view
       $this->template->content = View::instance('v_users_signup');
       $this->template->title   = "Sign Up";
       # Render the view
       echo $this->template;
       
    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the sign up form
    -------------------------------------------------------------------------------------------------*/
    public function p_signup() {
	    	    
	    # Mark the time
	    $_POST['created']  = Time::now();
	    
	    # Hash password
	    $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
	    
	    # Create a hashed token
	    $_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
	    
	    # Insert the new user    
	    DB::instance(DB_NAME)->insert_row('users', $_POST);
	    
	    # Send them to the login page
	    Router::redirect('/users/login');
	    
    }


	/*-------------------------------------------------------------------------------------------------
	Display a form so users can login
	-------------------------------------------------------------------------------------------------*/
    public function login($error = NULL) {

        # Set up the view
        $this->template->content = View::instance("v_users_login");

        # Pass data to the view
        $this->template->content->error = $error;

        # Render the view
        echo $this->template;

    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the login form
    -------------------------------------------------------------------------------------------------*/
    public function p_login() {

        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token 
            FROM users 
            WHERE email = '".$_POST['email']."' 
            AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # If we didn't find a matching token in the database, it means login failed
        if(!$token) {

            # Send them back to the login page
            Router::redirect("/users/login/error");

        # But if we did, login succeeded! 
        } else {

            /* 
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
            Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+2 weeks'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/");

        }

    }


	/*-------------------------------------------------------------------------------------------------
	No view needed here, they just goto /users/logout, it logs them out and sends them
	back to the homepage.	
	-------------------------------------------------------------------------------------------------*/
    public function logout() {
       
       # Generate a new token they'll use next time they login
       $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
       
       # Update their row in the DB with the new token
       $data = Array('token' => $new_token);
       
       # Do the update
    			DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");
       
       # Delete their old token cookie by expiring it
       setcookie('token', '', strtotime('-1 year'), '/');
       
       # Send them back to the homepage
       Router::redirect('/');
       
    }

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    public function profile($user_name = NULL) {
		
		# Only logged in users are allowed...
		if(!$this->user) {
			die('Members only. <a href="/users/login">Login</a>');
		}
		
		# Set up the View
		$this->template->content = View::instance('v_users_profile');
		$this->template->title   = "Profile";
				
		# Pass the data to the View
		$this->template->content->user_name = $user_name;
		
		# Display the view
		echo $this->template;
				
    }

} # end of the class










