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
				      <a class="navbar-brand" href="/booksharing/"><i class="fa fa-book" aria-hidden="true"></i> BookSharing</a>

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
								<h2 class="cerca-libro-heading-title">REGISTRATI</h2>
								<span class="cerca-libro-header-dot"></span>
								<p>Scrivi i tuoi dati e accertati di rispettare il formato:
								1)L'user non può appartenere ad un utente gia registrato.
								2)L'email deve avere un formato valido.
								3)Inserire cap,comune e provincia validi.</p>
							</div>

							<!-- Start Cerca Libro Overview Content -->
							<div class="cerca-libro-overview-content">
								<div class="row">

								<form method="post" action="/booksharing/Utente/Salvadati" enctype="multipart/form-data">
                                 {if $messaggio!=''}<h2>{$messaggio}</h2>{/if}
  									<!-- CASELLE DI TESTO -->
									User<br>
									<input type="text" name="user"><br>
									Password<br>
									<input type="password" pattern={$psw} name="password"><br>
 									Nome<br>
  									<input type="text" pattern={$nome} name="nome"><br>
  									Cognome<br>
  									<input type="text"  pattern={$cognome} name="cognome"><br>
									email<br>
									<input type="text" pattern={$email}  name="email"><br>
									via<br>
									<input type="text"  pattern={$v} name="via"><br>
									N°civico<br>
									<input type="text" pattern={$N} name="ncivico"><br>
									CAP<br>
									<select name="cap">
										{foreach $cap as $c}
											<option value={$c}>{$c}</option>
										{/foreach}
									</select><br>
									COMUNE<br>
									<select name="comune">
										{foreach $comune as $c}
										<option value={$c}>{$c}</option>
										{/foreach}
									</select><br>
									PROVINCIA<br>
										<select name="provincia">
											{foreach $province as $c}
												<option value={$c}>{$c}</option>
											{/foreach}
										</select><br>
									     <!-- UPLOAD IMMAGINE -->
										<p>Aggiungi una tua immagnie</p>
										<input name="file" type="file" size="40" />
										<!--/ UPLOAD IMMAGINE --><br>




									<!-- SUBMIT -->
 							 <input type="submit" name="registrati" value="registrati">
  									
  								

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
   
 
	
    <!-- Custom js -->
	<script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/custom.js"></script>
	
    
  </body>
</html>
