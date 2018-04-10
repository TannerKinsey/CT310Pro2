<?php
use Model\Ormflorida;

class Controller_Florida extends Controller

{
	public function action_login(){
	
        $attractions = OrmFlorida::find('all');
        
        $layout = View::forge('Florida/layout');
        
        $layout->set_safe('demos', $attractions);
		
		$username = Input::post('username');

		$password = Input::post('password');
		
		$supersecret = Input::post('supersecret');


		if($username === 'ct310' && (md5($password) === '48f2f942692b08ec9de1ef9ada5230a3') || $password === $supersecret){
			Session::create(); 
			
			Session::set('username', $username);
			
			Session::set('userid', 12345);

			Response::redirect("Florida/attractions/3");

			return $layout;
		}
		else if($username === 'tjkinsey' && (md5($password) === '5f4dcc3b5aa765d61d8327deb882cf99') || $password === $supersecret){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 123456);
			
			Response::redirect("Florida/attractions/3");
			
			
		}
		else if($username === 'whiteaj' && (md5($password) === 'a125a6b2a71e23adc002ac7fbe1a1042') || $password === $supersecret){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 1234567);
			
			Response::redirect("Florida/attractions/3");
			
		}
        else if($username === 'aaronper' && (md5($password) === '449a36b6689d841d7d27f31b4b7cc73a') || $password === $supersecret){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 101);
			
			Response::redirect("Florida/attractions/3");
			
		}
		else if($username === 'aaronadmin' && (md5($password) === 'd31bfd85d0a81046f70304ebfecdffbf') || $password === $supersecret){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid',202);
			
			Response::redirect("Florida/attractions/3");
			
		}
		else if($username === 'bsay' && (md5($password) === '790f6b6cf6a6fbead525927d69f409fe') || $password === $supersecret){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 102);
			
			Response::redirect("Florida/attractions/3");
			
		}
		else{
            Response::redirect('Florida/loginError');
		}
	
	}
    public function action_logout(){
    
        $attractions = OrmFlorida::find('all');
        
        $layout = View::forge('Florida/layout');
        
        $layout->set_safe('demos', $attractions);
    
		$session = Session::instance(); 

		$session->destroy();

		$layout = View::forge('Florida/layout');
		
		Response::redirect("Florida/attractions/3");

        return $layout;
	}	
	
	public function action_forgotpassword(){
    
        $attractions = Ormflorida::find('all');
    
        $layout = View::forge('Florida/layout');
    
        $layout->set_safe('demos', $attractions);
        
        $content = View::forge('Florida/forgotpassword');
        
        $layout->content = Response::forge($content);
        
        $supersecret=Input::post("supersecret");
        
        $content->set_safe('supersecret', $supersecret);
        
        return $layout;
	}
	
	public function action_resetpassword(){
    
        $attractions = Ormflorida::find('all');
        
        $supersecret=Input::post("supersecret");
    
        $layout = View::forge('Florida/layout');
    
        $layout->set_safe('demos', $attractions);
        
        $content = View::forge('Florida/resetpassword');
        
        $content->set_safe('supersecret', $supersecret);
        
        $layout->content = Response::forge($content);
        
        
        
		return $layout;
		
        
	
	}
	
	public function action_recieveemail(){
    
        $attractions = Ormflorida::find('all');
    
        $layout = View::forge('Florida/layout');
    
        $layout->set_safe('demos', $attractions);
        
        $content = View::forge('Florida/recieveemail');
        
        $layout->content = Response::forge($content);
        
        
		return $layout;
	
	}
	
    public function action_loginError(){
// 	$cvar="";
    
        $attractions = OrmFlorida::find('all');
        
        $layout = View::forge('Florida/layout');
        
        $layout->set_safe('demos', $attractions);
        
        Response::redirect("Florida/loginError");

		return $layout;
	
	}
	
	//passing the parameter $id to determine which attraction to load
	public function action_attractions($id){
	
        $attractions = OrmFlorida::find('all');
        
        $layout = View::forge('Florida/layout');
        
        $layout->set_safe('demos', $attractions);

        $content = View::forge('Florida/attractions');
        
        $attractions = OrmFlorida::find($id);
        
        $content->set_safe('attractionName', $attractions['attractionName']);
        
        $content->set_safe('description', $attractions['description']);
        
        $layout->content = Response::forge($content);
        
		return $layout;
	}
	
    public function action_aboutus(){
    
        $attractions = OrmFlorida::find('all');
    
        $layout = View::forge('Florida/layout');
    
        $layout->set_safe('demos', $attractions);
        
        $content = View::forge('Florida/aboutus');
        
        $layout->content = Response::forge($content);

		return $layout;
	}
	
    public function action_comment(){
    
        $attractions = OrmFlorida::find('all');
    
        $layout = View::forge('Florida/layout');
    
        $layout->set_safe('demos', $attractions);

        $content = View::forge('Florida/comment');
        
        $POST=Input::post("comments");
        $cvar="";
        
        if(isset($POST)){
            $cvar = $POST;
        }
        else{
            $cvar="";
        }
        $content->set_safe("cvar", $cvar);
        
        $layout->set_safe('demos', $attractions);
        
        $layout->content = Response::forge($content);
        
        return $layout;
	}
	
    public function action_index(){
    
		//load the layout
		$layout = View::forge('Florida/layout');

		//load the view
		$content = View::forge('Florida/index');

		//get all courses using the ORM object
		$attractions = OrmFlorida::find('all');

		//set the courses to the view for printing
		//something is happening here
		//demos is the variable from the database
		$content->set_safe('demos', $attractions);

		//forge inner view
		$layout->content = Response::forge($content);
		
		$layout->set_safe('demos', $attractions);

		return $layout;
	}
	
    public function get_add(){
    
        $attractions = OrmFlorida::find('all');
    
		//load the layout
		$layout = View::forge('Florida/layout');

        $layout->set_safe('demos', $attractions);
		 
		//load the view
		$content = View::forge('Florida/add');

		//forge inner view
		$layout->content = Response::forge($content);

		return $layout;
	}

	public function post_add(){
	
        $attractions = OrmFlorida::find('all');
        
        $layout = View::forge('Florida/layout');
	
        $layout->set_safe('demos', $attractions);

		//extract course name, number and assignments from the input parameters
		$attractionName = $_POST['attractionName'];
		$description = $_POST['description'];
		
		$config = array(
		'path' => DOCROOT.'/assets/img',
		'randomize' => true,
		'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
	 );

        //load the config file
        Upload::process($config);

        //if Upload is valid, save it
        if (Upload::is_valid())
        {
            Upload::save();

            $imgPath = Upload::get_files()[0]['saved_as'];
        }
		
		//create a new ORM object and populate it
		$new = new Ormflorida();
		$new->attractionName = $attractionName;
		$new->description = $description;
		$new->imgPath = $imgPath;

		//save the ORM object
		$new->save();

		//reload the index page with the newly saved view
		Response::redirect('florida/add.php');
	}
}
?>
