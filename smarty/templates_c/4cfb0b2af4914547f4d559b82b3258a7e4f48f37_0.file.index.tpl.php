<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-19 12:02:14
  from '/opt/lampp/htdocs/booksharing/smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ec3aea6caefc9_06468279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cfb0b2af4914547f4d559b82b3258a7e4f48f37' => 
    array (
      0 => '/opt/lampp/htdocs/booksharing/smarty/templates/index.tpl',
      1 => 1589826794,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec3aea6caefc9_06468279 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Booksharing : Home</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="images/favicon.ico"/>
    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick slider -->
    <link href="css/slick.css" rel="stylesheet">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="css/index.css" rel="stylesheet">

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
				      <a class="navbar-brand" href="/booksharing/smarty/html/index.html"><i class="fa fa-book" aria-hidden="true"></i> BOOKSHARING</a>

				      <!-- Image Logo -->
				      <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"></a> -->


				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      	<ul class="nav navbar-nav mu-menu navbar-right">
					        <li><a href="#">HOME</a></li>
					        <li><a href="#cerca-libro">CERCA LIBRO</a></li>
					        <li><a href="#mu-author">CERCA EBOOK</a></li>
                                            <li><a href="#login">LOGIN</a></li>
				            <li><a href="#mu-contact">CONTACT</a></li>
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
						<img src="images/ebook.png" alt="Ebook img">
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-sm-pull-6">
					<div class="mu-hero-left">
						<h1>Perfect Landing Page Template to Present Your eBook</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam saepe, recusandae quidem nulla! Eveniet explicabo perferendis aut, ab quos omnis labore laboriosam quisquam hic deserunt ipsum maxime aspernatur velit impedit.</p>
						<a href="#" class="mu-primary-btn">Download Now!</a>
						<span>*Avaliable in PDF, ePUB, Mobi & Kindle.</span>
					</div>
				</div>	

			</div>
		</div>
	</section>
	
	<!-- Start Featured Slider -->
	
	<!-- Start main content -->
		
	<main role="main">


		<!-- Start Cerca libro -->
		<section id="cerca-libro">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="cerca-libro-area">

							<div class="cerca-libro-heading-area">
								<h2 class="cerca-libro-heading-title">CERCA LIBRO</h2>
								<span class="cerca-libro-header-dot"></span>

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
  									<option value="G">Giallo</option>
  									<option value="H">Horror</option>
  									</select><br>

  									<!-- CHECKBOX -->
 										CONDIZIONE<br>
  									<input type="checkbox" name="condizone" value="N"> Nuovo<br>
  									<input type="checkbox" name="condizione" value="U"> Usato<br>



  										<!-- SUBMIT -->
 							 <input type="submit" name="ricerca" value="ricerca">

								</form>


							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Cerca libro -->

		



		<!-- Start Cerca ebook -->
		<section id="cercaebook">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="cerca-ebook-area">
								<h2 class="cerca-ebook-heading-title">CERCA EBOOK</h2>
								<span class="cerca-ebook-header-dot"></span>
								<br>
								<form method="post" action="VCercaebook.php">

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
  									CONDIZIONE<br>
  								<input type="checkbox" name="condizone" value="N"> Nuovo<br>
  								<input type="checkbox" name="condizione" value="U"> Usato<br>

  								<!-- CHECKBOX -->
  									FASCIA DI PREZZO<br>
  								<input type="checkbox" name="fascia di prezzo" value="0"> 0-50<br>
  								<input type="checkbox" name="fascia di prezzo" value="50"> 50-100<br>


 								 <!-- SUBMIT -->
 								 <input type="submit" name="ricerca" value="ricerca">

								</form>

 						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End cerca ebook -->



	
		<!-- Start Contact -->
		<section id="mu-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-contact-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Drop Us A Message</h2>
								<span class="mu-header-dot"></span>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
							</div>

							<!-- Start Contact Content -->
							<div class="mu-contact-content">

								<div id="form-messages"></div>
								<form id="ajax-contact" method="post" action="mailer.php" class="mu-contact-form">
									<div class="form-group">                
										<input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
									</div>
									<div class="form-group">                
										<input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" required>
									</div>              
									<div class="form-group">
										<textarea class="form-control" placeholder="Message" id="message" name="message" required></textarea>
									</div>
									<button type="submit" class="mu-send-msg-btn"><span>SUBMIT</span></button>
						        </form>

							</div>
							<!-- End Contact Content -->

						</div>
					</div>
				</div>
			</div>
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
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<!-- Slick slider -->
    <?php echo '<script'; ?>
 type="text/javascript" src="js/slick.min.js"><?php echo '</script'; ?>
>
    <!-- Counter js -->
    <?php echo '<script'; ?>
 type="text/javascript" src="js/counter.js"><?php echo '</script'; ?>
>
    <!-- Ajax contact form  -->
    <?php echo '<script'; ?>
 type="text/javascript" src="js/app.js"><?php echo '</script'; ?>
>
   
 
	
    <!-- Custom js -->
	<?php echo '<script'; ?>
 type="text/javascript" src="js/custom.js"><?php echo '</script'; ?>
>
	
    
  </body>
</html>
<?php }
}
