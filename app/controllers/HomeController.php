<?php

class HomeController extends BaseController {
	public $token="3a521b96ce44bfbaaea8408d93c0b6114f8e83c6"; //bug report
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
			$newName=rand(101010,99999).'.'.$file->getClientOriginalExtension();
			($upload=$file->move('docs/',$newName));
			$path='http://'.$base.'/public/'.($upload);

			$msg.="![logo]($path)";

		}
		$arr=array(
			'title'	=> $title,
			'body'	=> $msg,
			'labels'=> array("request-icon")
			);
		$data=json_encode($arr);
		$api="https://api.github.com/repos/numixproject/$projName/issues?access_token=$this->token";
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
	// public $token="26685a935a7202ff41d0f8a262f0f89a6a698ed6"; @ahhmarr
	function icon_request()
	{
		
		$file=Input::file('icon-image');
		if($file)
		{
			$ext=$file->getClientOriginalExtension();
			dd($ext);
			($upload=$file->move('docs/',rand(11111,99999).$ext));
			$path='http://weird.numixproject.org/public/'.($upload);
		}
		$title='icon request from '.Input::get("senderEmail");
		$message=Input::get("message");
		if(isset($path))
		{
			$message.="![icon]($path)";
		}
		$body="![logo]($path)";
		system('curl https://api.github.com/repos/ahhmarr/laravel-boilerplate/issues?access_token=26685a935a7202ff41d0f8a262f0f89a6a698ed6 -d \'{ "title":"'.$title.'","body":"'.$message.'","labels":["request-icon-form"]}\'');
		
	}
	public function contact_form()
	{
		$email=Input::get("email");
		$message=Input::get("message");
		$from=$email;
		$to='team@numixproject.org';
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

}