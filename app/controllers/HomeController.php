<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		
		return View::make('home.index');
	}
	public function save_form()
	{
		$action=Input::get("action");
		switch($action)
		{
			case 'contact-form'			:  return $this->contact_form();
										   break;
			case 'problem-form'			:  $this->problem_form();
										   break;
			case 'icon-request'			:  $this->icon_request();
										   break;
			case 'request-icon-form'	:  return $this->request_icon_form();
										   break;
		}

	}
	function request_icon_form()
	{
		$file=Input::file('icon-image');
		$sender=Input::get('email');
		$projName=Input::get('projName');
		$iconName=Input::get('iconName');
		$info=Input::get('info');
		$suggestion=Input::get('suggestion');
		$base=($_SERVER['HTTP_HOST']);
		$msg='';
		$title="Icon Request from $sender";
		$msg="Icon name : $iconName \n ";
		$msg.=($info)?"Info : $info \n ":'';
		$msg.=($suggestion)?"suggestion : $suggestion \n ":'';
		if($file)
		{
			($upload=$file->move('docs/'));
			$path=$base.'/public/'.($upload);

			$msg.="![logo]($path)";

		}
		$arr=array(
			'title'	=> $title,
			'body'	=> $msg,
			'labels'=> array("request-icon")
			);
		$data=json_encode($arr);
		$api="https://api.github.com/repos/ahhmarr/laravel-boilerplate/issues?access_token=$this->token";
		// $curll="$api -d '$data'";
		// $a=system('curl '.$curll);
		$ch = curl_init();
		curl_setopt_array(
		    $ch, array( 
		    CURLOPT_URL => $api,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_CUSTOMREQUEST=>"POST",
		    CURLOPT_POSTFIELDS=>$data,
		    CURLOPT_HTTPHEADER=>array('Content-Type: application/json'),
		    CURLOPT_USERAGENT => 'Codular Sample cURL Request'

		));
		 
		$output = curl_exec($ch);
		return Redirect::to('/')->with("success","Message posted successfully");
	}
	public $token="26685a935a7202ff41d0f8a262f0f89a6a698ed6";
	function icon_request()
	{
		
		$file=Input::file('icon-image');
		if($file)
		{
			($upload=$file->move('docs/'));
			$path='http://localhost/numix-proj/public/'.($upload);
		}
		$title='icon request from '.Input::get("senderEmail");
		$message=Input::get("message");
		if(isset($path))
		{
			$message.="![icon]($path)";
		}
		$body="![logo]($path)";
		system('curl https://api.github.com/repos/ahhmarr/laravel-boilerplate/issues?access_token=26685a935a7202ff41d0f8a262f0f89a6a698ed6 -d \'{ "title":"'.$title.'","body":"'.$message.'","labels":["request-icon-form"]}\'');
		/*Mail::queue('emails.request',$data,function($message){
			$message->to('ahmar.siddiqui@gmail.com','john doe')->subject('awesome');
		});*/
	}
	public function contact_form()
	{
		$email=Input::get("email");
		$message=Input::get("message");
		$from=$email;
		$to='ahmar.siddiqui@gmail.com';
		$subject="query mail";
		$data=array(
			'from'	=> $from,
			'email' => $email,
			'msg'  => $message
			);
	Mail::queue('emails.contact',$data,function($message)use($subject,$to){
			$message->to($to,'numix')->subject($subject);
		});
	 return Redirect::to('/')->with('success','thank you');
	}
	protected function mail($from,$to,$subj,$msg,$image=array())
	{
        
		
		

	}

}