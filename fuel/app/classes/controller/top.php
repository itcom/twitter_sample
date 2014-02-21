<?php

class Controller_Top extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Top &raquo; Index';
		$this->template->content = View::forge('top/index', $data);
	}

	public function action_login()
	{
		if ( ! Twitter::logged_in() )
		{
			Twitter::set_callback(Uri::create('callback'));
			try {
				Twitter::login();
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}
		$data["subnav"] = array('login'=> 'active' );
		$this->template->title = 'Top &raquo; Login';
		$this->template->content = View::forge('top/login', $data);
	}

    public function action_callback()
    {
		if (  Twitter::logged_in() )
		{
			$tokens = Twitter::get_tokens();
			$twitter_user = Twitter::get('account/verify_credentials');
		}

        Response::redirect(Uri::create('/'));
    }

	public function action_post()
	{
		$data  = array();
		$token = "";
		$user = "";
		$result = "";
		$tweet = "";

		if(Twitter::logged_in()){
			$token = Twitter::get_tokens();
			$user = Twitter::get('account/verify_credentials');
			// POST時
			if(Input::post()){

				$tweet = Input::post('tweetbox');
				if(mb_strlen($tweet) > 0 && mb_strlen($tweet) < 140){
					// post先ユーザーのトークンをセット(実際はテーブルやら何やらから取得)
					Twitter::set_tokens($token);
					// 投稿
					$result = Twitter::post('statuses/update',array('status' => $tweet));
					if(array_key_exists('error',$result)){
						$result = "error:" . $result['error'];
					}else{
						$result = "";
						$tweet = "";
					}

				}else{
					$result = "文字数が１文字以上１４０文字以内ではありません";
				}
			}
			$data['login'] = true;
		}else{
			// 初期表示
			$data['login'] = false;
		}
		$data['result'] = $result;
		$data['tweet'] = $tweet;
		$data['token'] = $token;
		$data['user'] = isset($user->__resp) ? $user->__resp->data : $user;
		$data["subnav"] = array('post'=> 'active' );
		$this->template->title = 'Top &raquo; Post';
		$this->template->content = View::forge('top/post', $data);
	}

	public function action_logout()
	{
		if ( ! Twitter::logged_in() )
		{
		}
		Session::destroy();
		Twitter::logout();
		$data["subnav"] = array('logout'=> 'active' );
		$this->template->title = 'Top &raquo; Logout';
		$this->template->content = View::forge('top/logout', $data);
	}

}
