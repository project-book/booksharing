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
	<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/sorttable.js"></script>


	<script type=”text/javascript”>$(function() {
			$("#customers").tablesorter();
		});</script>

</head>

<body>


<!-- Start Header -->
<header id="mu-header" class="" role="banner">
<div class="container">
	<nav class="navbar navbar-default mu-navbar">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->

			<!-- Text Logo -->
			<a class="navbar-brand" href="/booksharing/"><i class="fa fa-book" aria-hidden="true"></i> BookSharing</a>

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
							<h2 class="cerca-libro-heading-title">RIEPILOGO SCAMBIO</h2>
							<h1>Di seguito sono riportate le informazioni dello scambio che hai proposto, puoi controllare lo stato della tua proposta <br>
							nella sezione 'Profilo'.</h1>
							<span class="cerca-libro-header-dot"></span>

						</div>


					</div>
				</div>
			</div>
	</section>


	<table border="1" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
		<tr>
			<td width="50%">&nbsp;
				<table id="customers" class="sortable">

					<h1> Richiedente</h1>

					<tr>
						<th>Utente richiedente</th>
						<th>Titolo</th>
						<th>Autore</th>
						<th>Editore</th>
						<th>Genere</th>
						<th>Anno</th>
						<th>Condizione</th>


					</tr>
						<tr>
							<td>{$prop->getutenteprop()}</td>
							<td>{$prop->getlibroprop()->getTitolo()}</td>
							<td>{$prop->getlibroprop()->getAutore()}</td>
							<td>{$prop->getlibroprop()->getEditore()}</td>
							<td>{$prop->getlibroprop()->getGenere()}</td>
							<td>{$prop->getlibroprop()->getAnno()}</td>
							<td>{$prop->getlibroprop()->getCondizione()}</td>

						</tr>

				</table>
			</td>

			<td width="50%">&nbsp;
				<table id="customers" class="sortable">


					<h1> Ricevente </h1>
					<tr>
						<th>Utente ricevente</th>
						<th>Titolo</th>
						<th>Autore</th>
						<th>Editore</th>
						<th>Genere</th>
						<th>Anno</th>
						<th>Condizione</th>
					</tr>
						<tr>
							<td><a href="/booksharing/Utente/dettagliutente/{$prop->getutenterich()}">{$prop->getutenterich()}</a></td>
							<td>{$prop->getlibrorich()->getTitolo()}</td>
							<td>{$prop->getlibrorich()->getAutore()}</td>
							<td>{$prop->getlibrorich()->getEditore()}</td>
							<td>{$prop->getlibrorich()->getGenere()}</td>
							<td>{$prop->getlibrorich()->getAnno()}</td>
							<td>{$prop->getlibrorich()->getCondizione()}</td>



						</tr>
				</table>
			</td>


		</tr>

	</table>
	<div align="center">
	<button onclick="location.href='/booksharing/'">
		Torna alla Home
	</button></div>








	<div class="testo-centrato">
		<img src="/booksharing/Smarty-dir/assets/images/ebook.png" alt="Ebook img">
	</div>

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
