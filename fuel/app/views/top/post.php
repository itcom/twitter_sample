<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('/','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "post" ); ?>'><?php echo Html::anchor('post','Post');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('logout','Logout');?></li>

</ul>
<p>Index</p>
<?php if($login):?>
<?php echo $result;?><br />
<?php echo Form::open()?>
<?php echo Form::textarea('tweetbox', $tweet)?><br />
<?php echo Form::submit()?>
<?php echo Form::close()?>
<?php var_dump($token);?>
<?php var_dump($user);?><br />
<?php else:?>
ログインして！
<?php endif;?>
