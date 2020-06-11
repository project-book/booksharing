<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-27 11:15:04
  from 'C:\xampp\htdocs\book\Smarty-dir\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ece2f986182d2_79405588',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58e298fe6b40ab9ae33a77381a5db6a7a22e3749' => 
    array (
      0 => 'C:\\xampp\\htdocs\\book\\Smarty-dir\\templates\\index.tpl',
      1 => 1590419646,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ece2f986182d2_79405588 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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
    <link href="/booksharing/Smarty-dir/assets/css/style.css" rel="stylesheet">

    <!-- Fonts -->

    <!-- Open Sans for body font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
    <!-- Lato for Title -->
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
 
 
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
  </head>

  <body>

   	
  	<!-- Start Header -->
	<header id="mu-header" class="" role="banner">
		<div class="container">
			<nav class="navbar navbar-default mu-navbar">
			  	<div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>

				      <!-- Text Logo -->
				      <a class="navbar-brand" href="/booksharing/"><i class="fa fa-book" aria-hidden="true"></i> BookSharing</a>

				      <!-- Image Logo -->
				      <!-- <a class="navbar-brand" href="index.html"><img src="/booksharing/Smarty-dir/assets/images/logo.png"></a> -->


				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      	<ul class="nav navbar-nav mu-menu navbar-right">
					        <li><a href="#cerca-libro">CERCA LIBRO</a></li>
					        <li><a href="#cerca-ebook">CERCA EBOOK</a></li>
				            <li><a href="/booksharing/Utente/inserimento">LOGIN</a></li>
				            <li><a href="#mu-contact">CONTATTI</a></li>
				      	</ul>
				    </div><!-- /.navbar-collapse -->
			  	</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header>
	<!-- End Header -->

	<!-- Start Featured Slider -->

	<section id="mu-hero">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-6 col-sm-push-6">
					<div class="mu-hero-right">
						<img src="/booksharing/Smarty-dir/assets/images/ebook.png" alt="Ebook img">
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-sm-pull-6">
					<div class="mu-hero-left">
						<h1>Condividi i tuoi libri </h1>
						<p>E' semplice basta poco, cerca un libro di tuo interesse fai una proposta di scambio con un tuo libro, se l'utente accetta avrai un nuovo libro da leggere senza spendere un euro. Più scambi più guadagni punti per comprare fantastici ebook su questo sito. Allora perchè perdere tempo inizia la tua condivisione, registrati subito qui sotto.</p>
						 <a href="/booksharing/Utente/registra">REGISTRATI</a>
					</div>
				</div>	

			</div>
		</div>
	</section>
	
	<!-- Start Featured Slider -->
	
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
								<h2 class="cerca-libro-heading-title">CERCA LIBRO</h2>
								<span class="cerca-libro-header-dot"></span>
								<p>Scrivi i valori di ricerca</p>
							</div>

							<!-- Start Cerca Libro Overview Content -->
							<div class="cerca-libro-overview-content">
								<div class="row">

								<form method="post" action="/booksharing/CercaLibro/ricerca">

  									<!-- CASELLE DI TESTO -->
 									TITOLO<br>
  									<input type="text" name="titolo"><br>
  									AUTORE<br>
  									<input type="text" name="autore"><br>
  									EDITORE<br>
  									<input type="text" name="editore"><br>
  									ANNO<br>
  									<input type="text" name="anno"><br>
  									
  									
  									<!-- SELECTBOX -->
  									GENERE<br>
  									<select name="genere">
 									<option value=""></option>
  									<option value="c">c</option>
  									<option value="H">Horror</option>
  									</select><br>

  									<!-- CHECKBOX -->
 									CONDIZIONE<br>

  									<input type="checkbox" name="condizione" value="nuovo">Nuovo<br>
  									<input type="checkbox" name="condizione" value="usato">Usato<br>


  										<!-- SUBMIT -->
 							 <input type="submit" name="ricerca" value="ricerca">
  								

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



		<!-- Start Cerca Ebook -->
		<section id="cerca-ebook">
		<hr>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="cerca-ebook-overview-area">

							<div class="cerca-ebook-heading-area">
								<h2 class="cerca-ebook-heading-title">CERCA EBOOK</h2>
								<span class="cerca-ebook-header-dot"></span>
								<p>Scrivi i valori di ricerca</p>
							</div>

							<!-- Start Cerca Ebook Overview Content -->
							<div class="cerca-ebook-overview-content">
								<div class="row">


								<form method="post" action="/booksharing/CercaEbook/ricerca">

									<!-- CASELLE DI TESTO -->
 									TITOLO<br>
  									<input type="text" name="titolo"><br>
  									AUTORE<br>
  									<input type="text" name="autore"><br>
  									EDITORE<br>
  									<input type="text" name="editore"><br>
  									ANNO<br>
  									<input type="text" name="anno"><br>
  									
  									
  									<!-- SELECTBOX -->
  									GENERE<br>
  									<select name="genere">
 									<option value=""></option>
  									<option value="G">Giallo</option>
  									<option value="H">Horror</option>
  									</select><br>

  									<!-- CHECKBOX -->
 									PREZZO PUNTI<br>
  									<input type="checkbox" name="prezzo_punti" value="0-50"> 0-50<br>
  									<input type="checkbox" name="prezzo_punti" value="50-100"> 50-100<br>
  									<input type="checkbox" name="prezzo_punti" value="50-100"> >100<br>



  										<!-- SUBMIT -->
 							 <input type="submit" name="ricerca" value="ricerca">
  									
									</form>

								</div>
							</div>
							<!-- End Cerca Ebook Overview Content -->

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Cerca Ebook -->

	
		<!-- Start Contact -->
	<section id="mu-contact">
		<hr>
								<h2 align="center">CONTATTI</h2>
		<div style="float: left; text-align: justify; width: 47%;">
			<p align="center">Federico Paolone </p>
			<p align="center">federico.paolone@student.univaq.it</p></div>
		<div style="float: right; text-align: justify; width: 47%;">
			<p align="center">Giorgio Fraccavento</p>
			<p align="center">giorgio.fraccavento@student.univaq.it</p></div>
		<div style="clear: both;">
		</div>
		<hr>
	</section>

		<!-- End Contact -->


	</main>
	
	<!-- End main content -->	
			

	
	
    <!-- jQuery library -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Bootstrap -->
    <?php echo '<script'; ?>
 src="/booksharing/Smarty-dir/assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<!-- Slick slider -->
    <?php echo '<script'; ?>
 type="text/javascript" src="/booksharing/Smarty-dir/assets/js/slick.min.js"><?php echo '</script'; ?>
>
    <!-- Counter js -->
    <?php echo '<script'; ?>
 type="text/javascript" src="/booksharing/Smarty-dir/assets/js/counter.js"><?php echo '</script'; ?>
>
    <!-- Ajax contact form  -->
    <?php echo '<script'; ?>
 type="text/javascript" src="/booksharing/Smarty-dir/assets/js/app.js"><?php echo '</script'; ?>
>
   
 
	
    <!-- Custom js -->
	<?php echo '<script'; ?>
 type="text/javascript" src="/booksharing/Smarty-dir/assets/js/custom.js"><?php echo '</script'; ?>
>
	
    
  </body>
</html>
<?php }
}
