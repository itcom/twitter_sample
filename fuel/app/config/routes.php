<?php
return array(
	//'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	'_root_'  => 'top/index',  // The default route
	'login'  => 'top/login',  // login
	'callback'  => 'top/callback',  // callback
	'post'  => 'top/post',  // post
	'logout'  => 'top/logout',  // logout
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
