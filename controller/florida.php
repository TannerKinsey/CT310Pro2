<?php
class Controller_Florida extends Controller
{
	public function action_login(){
		
		$username = Input::post('username');
		$password = Input::post('password');
		if($username == 'ct310' && md5($password) == 'a6cebbf02cc311177c569525a0f119d7'){
			Session::create(); 
			
			Session::set('username', $username);
			
			Session::set('userid', 201);
			Response::redirect("Florida/welcome");
			return $layout;
		}
		else if($username === 'tjkinsey' && md5($password) === '5f4dcc3b5aa765d61d8327deb882cf99'){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 101);
			
			Response::redirect("Florida/welcome");
			
			
		}
		else if($username === 'whiteaj' && md5($password) === 'a125a6b2a71e23adc002ac7fbe1a1042'){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 202);
			
			Response::redirect("Florida/welcome");
			
		}
		else if($username === 'aaronper' && md5($password) === '449a36b6689d841d7d27f31b4b7cc73a'){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 102);
			
			Response::redirect("Florida/welcome");
			
		}
		else if($username === 'aaronadmin' && md5($password) === 'd31bfd85d0a81046f70304ebfecdffbf'){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 203);
			
			Response::redirect("Florida/welcome");
			
		}
		else if($username === 'bsay' && md5($password) === '790f6b6cf6a6fbead525927d69f409fe'){
			Session::create();
			
			Session::set('username', $username);
			
			Session::set('userid', 103);
			
			Response::redirect("Florida/welcome");
			
		}
		else{
            Response::redirect('Florida/loginError');
		}
	
	}
    public function action_logout(){
    
		$session = Session::instance(); 
		$session->destroy();
		$layout = View::forge('Florida/layout');
		$content = View::forge('Florida/welcome');
        
        $layout->content = Response::forge($content);
        return $layout;
	}	
	
    public function action_loginError(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/loginError');
        
        $layout->content = Response::forge($content);
		return $layout;
	
	}
	
	public function action_welcome(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/welcome');
        
        $layout->content = Response::forge($content);
		return $layout;
	
	}
	
    public function action_universal(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/universal');
        
        $layout->content = Response::forge($content);
		return $layout;
	
	}
	
    public function action_buschgardens(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/buschgardens');
        
        $layout->content = Response::forge($content);
		return $layout;
	
	}
	
    public function action_kss(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/kss');
        
        $layout->content = Response::forge($content);
		return $layout;
	
	}
	
    public function action_aboutus(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/aboutus');
        
        $layout->content = Response::forge($content);
		return $layout;
	
	}
	
	public function action_admin(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/admin');
        
        $layout->content = Response::forge($content);
		return $layout;
	
	}
	
    public function action_comment(){
        
        $layout = View::forge('Florida/layout');
        $content = View::forge('Florida/comment');
        
        $layout->content = Response::forge($content);
        
        $POST=Input::post("comments");
        $cvar="";
        
        if(isset($POST)){
            $cvar = $POST;
        }
        else{
            $cvar="";
        }
        $content->set_safe("cvar", $cvar);
        
        $layout->content = Response::forge($content);
        
        return $layout;
	}
	
}
?>
