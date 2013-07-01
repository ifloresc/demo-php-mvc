<!DOCTYPE html>
<html lang="<?php echo $lang_site ?>">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html" />
<meta name="Description"
	content="<?php echo $lang['PAGE_NAME']; ?> - <?php echo $lang['PAGE_TITLE']; ?> : <?php if (isset($welcome)) { echo $welcome; } ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index, follow, noarchive" />
<meta name="googlebot" content="noarchive" />
<title><?php echo $lang['PAGE_NAME']; ?> - <?php echo $lang['PAGE_TITLE']; ?>
</title>
<!--  CSS -->
<link rel="stylesheet" href="<?php echo $site; ?>css/default.css" />
<link rel="stylesheet"
	href="<?php echo $site; ?>css/smoothness/jquery-ui-1.10.2.custom.css" />
<link rel="stylesheet"
	href="<?php echo $site; ?>css/validationEngine.jquery.css" />
<link rel="stylesheet"
	href="<?php echo $site; ?>css/jquery.dataTables.css" />
<link rel="stylesheet"
	href="<?php echo $site; ?>css/jquery.dataTables_themeroller.css" />
<link
	href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Yanone+Kaffeesatz:400,200,300,700'
	rel='stylesheet' type='text/css'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="<?php echo $site; ?>css/bootstrap.min.css" rel="stylesheet"
	media="screen">


<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>
<body>

	<header id="header" class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<button type="button" class="btn btn-navbar" data-toggle="collapse"
					data-target=".nav-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="brand" href="#"><?php echo $lang['PAGE_NAME']; ?></a>
				<div class="nav-collapse collapse">
					<ul class="nav">
						<li class="active"><a href="#"><i class="icon-home icon-white"></i>
								Home</a></li>
						<li><a href="#about"><i class="icon-book"></i> About</a></li>
						<li><a href="#contact"><i class="icon-envelope"></i> Contact</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</header>

	<section id="body" class="container-fluid">

		<section id="content" class="container-fluid">>
			<!-- Exito -->
			<section id="alert">
				<article id="alert_msg"></article>
			</section>

			<?php			
			include($body);
			?>
		</section>
		<br>
		<footer class="container-fluid">
			<address>
				<?php echo $lang['FOOTER_SITE']; ?>
			</address>
		</footer>

		<section id="loading"></section>

		<section id="dialog-form">
			<section id="form-data"></section>
		</section>

	</section>

	<!-- JS -->
	<script src="<?php echo $site; ?>js/jquery-1.9.1.js"
		type="text/javascript"></script>
	<script src="<?php echo $site; ?>js/jquery-ui-1.10.2.custom.js"
		type="text/javascript"></script>
	<script src="<?php echo $site; ?>js/jquery.validationEngine.js"
		type="text/javascript"></script>
	<script
		src="<?php echo $site; ?>js/languages/jquery.validationEngine-<?php echo $lang_site ?>.js"
		type="text/javascript"></script>
	<script src="<?php echo $site; ?>js/jquery.dataTables.js"
		type="text/javascript"></script>
	<script src="<?php echo $site; ?>js/jquery.enter.js"
		type="text/javascript"></script>
	<script
		src="<?php echo $site; ?>js/default.js?id=<?php echo rand(); ?>"
		type="text/javascript"></script>
	<script src="<?php echo $site; ?>js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
