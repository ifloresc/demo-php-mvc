<?php

class error404Controller extends AbstractController {

	public function action() 
	{
	        $this->registry->template->blog_heading = 'Pagina No Existe';
	        return 'error404';
	}


}
?>
