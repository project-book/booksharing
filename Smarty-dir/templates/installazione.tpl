<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>BookSharing : Installazione</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/icon" href="/booksharing/Smarty-dir/assets/images/favicon.ico"/>
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="/booksharing/Smarty-dir/assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Theme color -->
	<link id="switcher" href="/booksharing/Smarty-dir/assets/css/theme-color/default-theme.css" rel="stylesheet">

	<!-- Main Style -->
	<link href="/booksharing/Smarty-dir/assets/css/style.css" rel="stylesheet">

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


				<!-- Text Logo -->
				<a class="navbar-brand" ><i class="fa fa-book" aria-hidden="true"></i> BookSharing</a>

				<!-- Image Logo -->
				<!-- <a class="navbar-brand" href="index.html"><img src="/booksharing/Smarty-dir/assets/images/logo.png"></a> -->


			</div>


	</div><!-- /.container-fluid -->
	</nav>
	</div>
</header>
<!-- End Header -->


<!-- Start main content -->

<main role="main">

	<!-- Start Cerca Libro -->

	<section id="cerca-libro">
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="cerca-libro-overview-area">

						<div class="cerca-libro-heading-area">
							<h2 class="cerca-libro-heading-title">Installa l'applicazione</h2>
							<span class="cerca-libro-header-dot"></span>
							<h2 align="center">Crea un nuovo database</h2>
							<h2 align="center">inserisci nome , nome utente e password del database</h2>
						</div>

						<!-- Start Cerca Libro Overview Content -->

							<div class="row">
								<div class="testo-centrato">
								<h3 class=" text-danger">{if isset($nophpv)} La tua versione di php non è compatibile! {/if} {if isset($nocookie)} L'app necessita dei cookie abilitati! {/if} <br> {if isset($nojs)} L'app necessita di javascript! {/if} <br>{if isset($nowrite)} Controllare i permessi della cartella {/if} <br>
								</h3>

								<form action="/booksharing/" method="POST">

									Nome Database<br>
									<input type="text" name="nomedb"><br>
									Nome Utente<br>
									<input type="text" name="nomeutente"><br>
									Password<br>
									<input type="password"  name="password"><br>

<div class="testo-centrato">
						<button type="submit" name="installazione" onclick="setcookie()">Installa</button></div>
						</form>
								</div>
										</div>
						<!-- End Cerca Libro Overview Content -->

					</div>
				</div>
			</div>
		</div>
	</section>

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

<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/checkjs.js"></script>


<!-- Custom js -->
<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/custom.js"></script>


</body>
</html>
