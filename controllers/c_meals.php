<?php

class meals_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		# Only let logged in users access the methods in this controller
		if(!$this->user) {
			die("Members only");
		}
		
	} 
	
	 
	/*-------------------------------------------------------------------------------------------------
	Display a new meal form
	-------------------------------------------------------------------------------------------------*/
	public function add() {
		
		$this->template->content = View::instance("v_meals_add");
		
		$client_files_body = Array(
			'/js/jquery.form.js',
			'/js/posts_add.js'
		);
		
		$this->template->client_files_body = Utils::load_client_files($client_files_body);

		echo $this->template;
		
	}	
	
	
	/*-------------------------------------------------------------------------------------------------
	Process new meals
	-------------------------------------------------------------------------------------------------*/
	public function p_add() {
		
		$_POST['user_id']  = $this->user->user_id;
		$_POST['created']  = Time::now();
		$_POST['modified'] = Time::now();
		
		DB::instance(DB_NAME)->insert('meals',$_POST);
		
		$view = new View('v_meals_p_add');
		
		$view->created = Time::display(Time::now());
		
		echo $view;
				
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	View all meals
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Set up view
		$this->template->content = View::instance('v_meals_index');
		
		# Set up query
		$q = 'SELECT 
			    posts.content,
			    posts.created,
			    posts.user_id AS post_user_id,
			    users_users.user_id AS follower_id,
			    users.first_name,
			    users.last_name
			FROM posts
			INNER JOIN users_users 
			    ON posts.user_id = users_users.user_id_followed
			INNER JOIN users 
			    ON posts.user_id = users.user_id
			WHERE users_users.user_id = '.$this->user->user_id;
		
		# Run query	
		$posts = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $posts array to the view
		$this->template->content->posts = $posts;
		
		# Render view
		echo $this->template;
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function users() {
		
		# Set up view
		$this->template->content = View::instance("v_meals_users");
		
		# Set up query to get all users
		$q = 'SELECT *
			FROM users';
			
		# Run query
		$users = DB::instance(DB_NAME)->select_rows($q);
		
		# Set up query to get all connections from users_users table
		$q = 'SELECT *
			FROM users_users
			WHERE user_id = '.$this->user->user_id;
			
		# Run query
		$connections = DB::instance(DB_NAME)->select_array($q,'user_id_followed');
		
		# Pass data to the view
		$this->template->content->users       = $users;
		$this->template->content->connections = $connections;
		
		# Render view
		echo $this->template;
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Creates a row in the users_users table representing that one user is following another
	-------------------------------------------------------------------------------------------------*/
	public function follow($user_id_followed) {
	
	    # Prepare the data array to be inserted
	    $data = Array(
	        "created"          => Time::now(),
	        "user_id"          => $this->user->user_id,
	        "user_id_followed" => $user_id_followed
	        );
	
	    # Do the insert
	    DB::instance(DB_NAME)->insert('users_users', $data);
	
	    # Send them back
	    Router::redirect("/meals/users");
	
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	Removes the specified row in the users_users table, removing the follow between two users
	-------------------------------------------------------------------------------------------------*/
	public function unfollow($user_id_followed) {
	
	    # Set up the where condition
	    $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
	    
	    # Run the delete
	    DB::instance(DB_NAME)->delete('users_users', $where_condition);
	
	    # Send them back
	    Router::redirect("/meals/users");
	
	}
	
	
	
} # eoc