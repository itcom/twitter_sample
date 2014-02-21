<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "index" ); ?>'><?php echo Html::anchor('/','Index');?></li>
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "post" ); ?>'><?php echo Html::anchor('post','Post');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('logout','Logout');?></li>

</ul>
<p>Index</p>

