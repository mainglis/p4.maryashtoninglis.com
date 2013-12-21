<?php
class recipes_controller extends base_controller {

	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    public function __construct() {
    
    	# Make sure the base controller construct gets called
		parent::__construct();
    } 

    /*-------------------------------------------------------------------------------------------------
	View recently "liked" recipes?
	-------------------------------------------------------------------------------------------------*/
	public function index() {
		
		# Set up view
		$this->template->content = View::instance('v_recipes_index');
		
		// # Set up query
		// $q = 'SELECT 
		// 	    meals.content,
		// 	    meals.created,
		// 	    meals.user_id AS meal_user_id,
		// 	    users_users.user_id AS follower_id,
		// 	    users.first_name,
		// 	    users.last_name
		// 	FROM meals
		// 	INNER JOIN users_users 
		// 	    ON meals.user_id = users_users.user_id_followed
		// 	INNER JOIN users 
		// 	    ON meals.user_id = users.user_id
		// 	WHERE users_users.user_id = '.$this->user->user_id;
		
		// # Run query	
		// $meals = DB::instance(DB_NAME)->select_rows($q);
		
		// # Pass $posts array to the view
		// $this->template->content->meals = $meals;
		
		# Render view
		echo $this->template;
		
	}
	
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
    /*-------------------------------------------------------------------------------------------------
    Search for recipes (use smitten kitchen or some other site or google?)
    -------------------------------------------------------------------------------------------------*/
    public function search() {
    	
    	$this->template->content = View::instance("v_recipes_search");
    	
    	$client_files_body = Array(
    		'/js/jquery.form.js',
    		'/js/recipes.js'
    	);
    	
    	$this->template->client_files_body = Utils::load_client_files($client_files_body);

    	echo $this->template;
    	
    }	

    /*-------------------------------------------------------------------------------------------------
    Search for recipes 
    -------------------------------------------------------------------------------------------------*/
    // public function p_search() {
    	
    // 	$_POST['user_id']  = $this->user->user_id;
    // 	$_POST['created']  = Time::now();
    // 	$_POST['modified'] = Time::now();
    	
    // 	DB::instance(DB_NAME)->insert('meals',$_POST);
    	
    // 	$view = new View('v_meals_p_add');
    	
    // 	$view->created = Time::display(Time::now());
    	
    // 	echo $view;
    			
    // }
	
} # eoc