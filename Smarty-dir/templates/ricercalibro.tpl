<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>BookSharing : Home</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/icon" href="/booksharing/Smarty-dir/assets/images/favicon.ico"/>
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="/booksharing/Smarty-dir/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Theme color -->
	<link id="switcher" href="/booksharing/Smarty-dir/assets/css/theme-color/default-theme.css" rel="stylesheet">

	<!-- Main Style -->
	<link href="/booksharing/Smarty-dir/assets/css/ricercalibro.css" rel="stylesheet">

	<!-- Fonts -->

	<!-- Open Sans for body font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
	<!-- Lato for Title -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>


<!-- Start Header -->
<header id="mu-header" class="" role="banner">
	<div class="container">
		<nav class="navbar navbar-default mu-navbar">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->

					<!-- Text Logo -->
					<a class="navbar-brand" href="index.html"><i class="fa fa-book" aria-hidden="true"></i> BookSharing</a>

					<!-- Image Logo -->
					<!-- <a class="navbar-brand" href="index.html"><img src="/booksharing/Smarty-dir/assets/images/logo.png"></a> -->


				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->

			</div><!-- /.container-fluid -->
		</nav>
	</div>
</header>
<!-- End Header -->
<!-- Start main content -->

<main role="main">




	<section id="cerca-libro">

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="cerca-libro-overview-area">

							<div class="cerca-libro-heading-area">
								<h2 class="cerca-libro-heading-title">CERCA LIBRO</h2>
								<span class="cerca-libro-header-dot"></span>
								<p>Scrivi i valori di ricerca</p>
							</div>
							<form method="post" action="/booksharing/CercaLibro/scambia">
<div class="cerca-libro-overview-content1">

							{foreach $array as $x}
								Libri personali<br>
								<select name="LibroPersonale">
									<option value=""></option>
									<option value="G">{$x->gettitolo()}-{$x->getautore()}-
										<div class="ciao">{$x->getUser()->getuser()}</div> </option>
								</select><br>
							{/foreach}

						</div>
					</div>
				</div>
			</div>
	</section>
							<!-- Start Cerca Libro Overview Content -->


									{foreach $array as $x}
										<div class="bottone">
										<input type="radio" name="LibroRichiesto" value="titolo">
										<div class="ciao">{$x->gettitolo()}</div><br>
										</div>
										<div class="text-center"
										<h2>{$x->gettitolo()}{$x->getautore()}</h2>
										</div>
										<hr style="height:2px;border-width:0;color:gray;background-color:gray">
									{/foreach}



 							 <input type="submit" name="ricerca" value="Richiedi scambio">

									</form>

							<!-- End Cerca Libro Overview Content -->



		<!-- End Cerca Libro -->




</main>

<!-- End main content -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Bootstrap -->
<script src="/booksharing/Smarty-dir/assets/js/bootstrap.min.js"></script>
<!-- Slick slider -->
<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/slick.min.js"></script>
<!-- Counter js -->
<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/counter.js"></script>
<!-- Ajax contact form  -->
<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/app.js"></script>



<!-- Custom js -->
<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/custom.js"></script>


</body>
</html>
