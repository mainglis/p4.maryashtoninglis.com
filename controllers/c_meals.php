<?php

class meals_controller extends base_controller {
	
	/*-------------------------------------------------------------------------------------------------
	
	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		
		# Make sure the base controller construct gets called
		parent::__construct();
		
		# Only let logged in users access the methods in this controller
		if(!$this->user) {
			Router::redirect('/users/login');
		}
		
	} 
	
	 
	/*-------------------------------------------------------------------------------------------------
	Display a new meal form
	-------------------------------------------------------------------------------------------------*/
	public function add() {
		
		$this->template->content = View::instance("v_meals_add");
		
		$client_files_body = Array(
			'/js/jquery.form.js',
			'/js/meals_add.js'
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
		$this->template->title   = "Meals";
		
		# Set up query
		$q = 'SELECT 
			`meal_id`, 
			`created`, 
			`modified`, 
			`user_id`, 
			`date`, 
			`meal_kind`, 
			`shift_head`, 
			`vibe`, 
			`number_served_unique`, 
			`menu`, 
			`volunteers`, 
			`notes`, 
			`meal_photo`
			 
		FROM `meals` 
		WHERE 1';
			
		# Run query	
		$meals = DB::instance(DB_NAME)->select_rows($q);
		
		# Pass $meals array to the view
		$this->template->content->meals = $meals;
		
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
	
	/*--------------------------------------------------------------------------------------------- */

    public function p_upload() {
                    $imghash = md5($_POST['uploads']);
                    # Upload an image file into the uploads/avatars folder
                    $img = @Upload::upload($_FILES, "/uploads/meal_images/", 
                    array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG"), $imgHash);
                    
                    # Check if image is a valid type, if so, insert image into db   
            if($img != 'Invalid file type.') {
                         
                            // # Getting the file name, without the extension
                            // $file = $_FILES['uploads']['name'];          
                            // $info = pathinfo($file);
                            
                            // # Add the extension again after the file name to match how the file is uploaded        
                            // $file_name =  $file.'.'.$info['extension'];        
                     
                            # Set the name of the image file to be the user_id.jpg
                            $img_url = $file_name; 
                                    
                            # Prepare the image_url for upadate into users table
                            $data = array("img_url" => $img_url);
                    
                            # Insert the image url into the database
                            DB::instance(DB_NAME)->update('meals', $data, "WHERE user_id = '".$this->user->user_id."'");
            
                            # Send them to the login page
                            Router::redirect("/meals");
                    
                    }
                    else {
                            
                            Router::redirect("/users/p_profile/filetype_error"); 
            } 
                    
    }
	/*--------------------------------------------------------------------------------------------- */
	
	
	
} # eoc