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

		if($username == 'ct310' && md5($password) == '48f2f942692b08ec9de1ef9ada5230a3'){
			Session::create(); 
			
			Session::set('username', $username);
			
			Session::set('userid', 12345);

			Response::redirect("Florida/attractions/1");

			return $layout;
		}
		else if($username === 'tjkinsey' && md5($password) === '5f4dcc3b5aa765d61d8327deb882cf99'){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 123456);
			
			Response::redirect("Florida/attractions/1");
			
			
		}
		else if($username === 'lwilson1' && md5($password) === '5716915db7869136e2b65a433cc152b9'){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 1234567);
			
			Response::redirect("Florida/attractions/1");
			
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

		$content = View::forge('Florida/welcome');
        
        $layout->content = Response::forge($content);/*
		$AttractionString;*/

		//this loop converts all courses to a single string and stores them in $CoursesString
// 		foreach($attractions as $key=>$attraction)
// 		{
// 			$AttractionString[$key] = $attraction['attractionID']." ".$attraction['attractionName']." ".$attraction['description']." ".$attraction['imgPath'];
// 		}

        return $layout;
	}	
	
    public function action_loginError(){
    
        $attractions = OrmFlorida::find('all');
        
        $layout = View::forge('Florida/layout');
        
        $layout->set_safe('demos', $attractions);

        $content = View::forge('Florida/loginError');
        
        $layout->content = Response::forge($content);

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
        
//         $layout->content = Response::forge($content);
        
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
		$imgPath = $_POST['imgPath'];

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
