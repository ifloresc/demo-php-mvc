<div class="container">

	<h1 class="text-center"><?php echo $lang['PAGE_TITLE']; ?></h1>
	
	<form id="formID" action="<?php echo $site ?>user/login" method="post" autocomplete="off"  class="form-signin well">
		<h3 class="form-signin-heading"><?php echo $lang['LOGIN_TITLE']; ?></h3>

	    <input type="text" class="form-control validate[required]" id="user" name="user" placeholder="<?php echo $lang['INPUT_USER']; ?>">
	    <input type="password" class="form-control validate[required]" id="passwd" name="passwd" placeholder="<?php echo $lang['INPUT_PASSWORD']; ?>">

	  	<button type="submit" class="btn btn-lg btn-success btn-block"><?php echo $lang['BUTTON_LOGIN']; ?></button>
	</form>
</div>
