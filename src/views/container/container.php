<!DOCTYPE html>
<html lang="<?php echo $lang_site ?>"> 
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html" />
		<meta name="Description" content="" />
		<meta name="keywords" content="market, product, service" />
		<meta name="robots" content="index, follow, noarchive" />
		<meta name="googlebot" content="noarchive" />	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $lang['PAGE_TITLE']; ?></title>
		<!--  CSS -->
		<link rel="stylesheet" href="<?php echo $site; ?>/css/default.css" />
		<link rel="stylesheet" href="<?php echo $site; ?>/css/ui-lightness/jquery-ui-1.8.20.custom.css" />
		<link rel="stylesheet" href="<?php echo $site; ?>/css/validationEngine.jquery.css" />
		<link rel="stylesheet" href="<?php echo $site; ?>/css/jquery.dataTables.css" /> 	
		<link rel="stylesheet" href="<?php echo $site; ?>/css/jquery.dataTables_themeroller.css" /> 	
		<link href="<?php echo $site; ?>/dist/css/bootstrap.min.css" rel="stylesheet" media="screen">	
		<link href="<?php echo $site; ?>/dist/css/bootstrap-theme.css" rel="stylesheet">

		<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
		<link rel="stylesheet" href="<?php echo $site; ?>/css/jquery-file-upload/jquery.fileupload.css">
		
		
		<script src="<?php echo $site; ?>/assets/js/jquery-1.11.1.min.js"  type="text/javascript"></script>
		
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	</head>
	<body>		
	<?php 
	if (isset($sessionSite)) {
	?>
		<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container">
      			<div class="navbar-header">
		          	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
		            	<span class="icon-bar"></span>
		          	</button>
          			<a class="navbar-brand" href="<?php echo $site;?>home/data"><?php echo $lang['PAGE_NAME']; ?></a>
          		</div> <!--navbar-header -->
          		<div class="collapse navbar-collapse">
             		<?php echo $lang['LOGIN_INFO']; ?> 
	            	<ul class="nav navbar-nav">
	              		<li <?php if (!isset($sessionSite->application)) { ?>class="active"<?php } ?>><a href="<?php echo $site;?>home/data"><span class="glyphicon glyphicon-home"></span></a></li>
		              <?php                    
		              foreach ($sessionSite->applications as &$app) {
		              ?>
	              		<li <?php if (isset($sessionSite->application) && $sessionSite->application == $app->id) { ?>class="active"<?php } ?>><a href="<?php echo $site;?>menu/load/<?php echo $app->id; ?>" ><?php echo $lang['menu.' . $app->code]; ?></a></li>
		              <?php 
		              }
		              ?>
	            	</ul>
		            <ul class="nav navbar-nav navbar-right">
		            	<!--<li><a href=""><i class="glyphicon glyphicon-check"></i><span class="label label-danger">0</span></a></li> -->
            			<li><a href=""><i class="glyphicon glyphicon-envelope"></i><span class="label label-danger">0</span></a></li>
		            	<li class="dropdown">
	            			<a class="dropdown-toggle"  data-toggle="dropdown" href="#">
	            				<span class="glyphicon glyphicon-user"></span> <?php echo $sessionSite->name; if (isset($sessionSite->company)) { echo '['.$sessionSite->companyName.']'; } ?> <span class="caret"></span>
	            			</a>
						  	<ul class="dropdown-menu">
						  		<li><a href="<?php echo $site;?>password/profile"><i class="glyphicon glyphicon-lock"></i> <?php echo $lang['MENU_PASSWORD']; ?></a></li>
						  		<li><a href="<?php echo $site;?>user/profile"><i class="glyphicon glyphicon-edit"></i> <?php echo $lang['MENU_EDIT']; ?></a></li>
                				<li class="divider"></li>
                				<li><a href="<?php echo $site;?>user/out"><i class="glyphicon glyphicon-off"></i> <?php echo $lang['MENU_EXIT']; ?></a></li>
						   </ul>
		            	</li>
		            </ul>
	            </div><!-- collapse -->
      		</div>
    	</div>

		<div id="alert">
			<div id="alert_msg"></div>
		</div>

    <!-- Fin Menu -->
	    <div class="container">    
	        
	    	<div class="row row-offcanvas row-offcanvas-right">

	    		<div class="col-xs-12 col-sm-9">
	    			<p class="pull-right visible-xs">
            			<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Mostrar Menu</button>
          			</p>
          			<?php
          			if (isset($navBar)) {
          			?>
		        	<ol class="breadcrumb">
					  <li><a href="<?php echo $site; ?>home/data"><span class="glyphicon glyphicon-home"></span></a></li>
					  <?php
					  $tam = count($navBar);
					  $iter = 0;
					  foreach ($navBar as $nav) {
					  	 $iter += 1;
					  ?>
					  <li <?php if ($iter == $tam) { ?> class="active" <?php } ?> ><?php if ($iter < $tam) { ?><a href="<?php echo $site . $nav->url ?>"><?php } ?><?php echo $lang['nav.' . $nav->code]; if ($iter < $tam) { ?></a><?php } ?></li>
					  <?php
					  }
					  ?>				
					</ol>					
		          	<?php		
		          	}	
					include($body); 
					?>
				</div> <!--  col -->

		    	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
		       		<div class="well sidebar-nav"> 
			            <ul class="nav">
			            <?php 
			            if (isset($sessionSite->application)) { 
							foreach ($sessionSite->applications as &$app) {
								if ($app->id == $sessionSite->application) {
									foreach ($app->modules as &$mod) {
						?>
			            	<li><span class="glyphicon glyphicon-list-alt"></span> <?php echo $lang['mod.' . $mod->code];?></li>
			              <?php 
			              				foreach ($mod->options as &$opt) {
			              ?>
			              	<li <?php if (isset($sessionSite->option) && $sessionSite->option == $opt->id) { ?>class="active"<?php } ?>><a href="<?php echo $site . $opt->url?>?index"><span class="glyphicon glyphicon-tag"></span> <?php echo $lang['opt.'.$opt->code];?></a></li>             
			              <?php 
			              				}
			              			}
			              		}
			              	}
			              }
			              ?>
			            </ul>
		          	</div><!--/.well -->
		        </div><!--/col-->

	        </div><!--/row-->

	      	<hr>

	      	<footer>
	        	<address>
			  		<strong><?php echo $lang['FOOTER_SITE']; ?></strong>
				</address>
	      	</footer>

	    </div><!-- container-->
	
	<?php 
	} else {
		include($body);
	}
	?>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<script src="<?php echo $site; ?>/assets/js/jquery-ui-1.10.2.custom.js"  type="text/javascript"></script>
		<script src="<?php echo $site; ?>/js/jquery.validationEngine.js" type="text/javascript"></script>
		<script src="<?php echo $site; ?>/js/languages/jquery.validationEngine-<?php echo $lang_site ?>.js" type="text/javascript"></script>
		<script src="<?php echo $site; ?>/js/jquery.dataTables.js" type="text/javascript"></script>
		<script src="<?php echo $site; ?>/js/default.js" type="text/javascript"></script>
		<script src="<?php echo $site; ?>/dist/js/bootstrap.js"  type="text/javascript"></script>
		<script src="<?php echo $site; ?>/js/jquery.enter.js" type="text/javascript"></script>
		<script src="<?php echo $site; ?>/js/jquery.relatedselects.min.js" type="text/javascript"></script>
		<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/vendor/jquery.ui.widget.js"></script>
		<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.iframe-transport.js"></script>
		<!-- The basic File Upload plugin -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.fileupload.js"></script>
		<!-- The File Upload processing plugin -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.fileupload-process.js"></script>
		<!-- The File Upload image preview & resize plugin -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.fileupload-image.js"></script>
		<!-- The File Upload audio preview plugin -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.fileupload-audio.js"></script>
		<!-- The File Upload video preview plugin -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.fileupload-video.js"></script>
		<!-- The File Upload validation plugin -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.fileupload-validate.js"></script>
		<!-- The File Upload user interface plugin -->
		<script src="<?php echo $site; ?>/js/jquery-file-upload/jquery.fileupload-ui.js"></script>
	</body>
</html>
