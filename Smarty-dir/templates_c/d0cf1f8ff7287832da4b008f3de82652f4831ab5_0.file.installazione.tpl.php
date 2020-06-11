<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-10 17:45:10
  from '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/installazione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee10006c29b23_24706011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0cf1f8ff7287832da4b008f3de82652f4831ab5' => 
    array (
      0 => '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/installazione.tpl',
      1 => 1591803910,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee10006c29b23_24706011 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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


				      <!-- Text Logo -->
				      <a class="navbar-brand" href="/booksharing/"><i class="fa fa-book" ></i> BookSharing</a>

				      <!-- Image Logo -->
				      <!-- <a class="navbar-brand" href="index.html"><img src="/booksharing/Smarty-dir/assets/images/logo.png"></a> -->


				    </div>


			  	</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header>
	<!-- End Header -->


	<!-- Start main content -->

		<main role="main" class="inner cover">
			<h3 class=" text-danger"><?php if (isset($_smarty_tpl->tpl_vars['nophpv']->value)) {?> La tua versione di php non è compatibile! <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['nocookie']->value)) {?> L'app necessita dei cookie abilitati! <?php }?> <br> <?php if (isset($_smarty_tpl->tpl_vars['nojs']->value)) {?> L'app necessita di javascript! <?php }?> <br><?php if (isset($_smarty_tpl->tpl_vars['noconfig']->value)) {?> Controllare i permessi della cartella <?php }?> <br></h3>
			<h3 class="pb-3">Profilo Database</h3>
			<form action="/booksharing/" method="POST">
				<div class="form-group">
					<label>Nome del database</label>
					<input class="form-control" name="nomedb"> </div>
				<div class="form-group">
					<label>Nome Utente</label>
					<input type="text" class="form-control" name="nomeutente"> </div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password"> </div>
				<div class="form-group">
					<button type="submit" class="btn mt-2 btn btn-light" onclick="setcookie()">Installa</button>
		</main>
	<!-- End main content -->


		<?php echo '<script'; ?>
 src="/booksharing/Smarty-dir/assets/js/checkjs.js"><?php echo '</script'; ?>
>
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
