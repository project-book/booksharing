<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-22 13:11:06
  from 'C:\xampp\htdocs\booksharing\Smarty-dir\templates\ricercalibro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ec7b34a0c02d8_65480485',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4364c9686e1fc08386de3bfbe9b85d0e743b14f2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\booksharing\\Smarty-dir\\templates\\ricercalibro.tpl',
      1 => 1590145864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ec7b34a0c02d8_65480485 (Smarty_Internal_Template $_smarty_tpl) {
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
	<link href="/booksharing/Smarty-dir/assets/css/ricercalibro.css" rel="stylesheet">

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

							<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
								Libri personali<br>
								<select name="LibroPersonale">
									<option value=""></option>
									<option value="G"><?php echo $_smarty_tpl->tpl_vars['x']->value->gettitolo();?>
-<?php echo $_smarty_tpl->tpl_vars['x']->value->getautore();?>
-
										<div class="ciao"><?php echo $_smarty_tpl->tpl_vars['x']->value->getUser()->getuser();?>
</div> </option>
								</select><br>
							<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

						</div>
					</div>
				</div>
			</div>
	</section>
							<!-- Start Cerca Libro Overview Content -->


									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
										<div class="bottone">
										<input type="radio" name="LibroRichiesto" value="titolo">
										<div class="ciao"><?php echo $_smarty_tpl->tpl_vars['x']->value->gettitolo();?>
</div><br>
										</div>
										<div class="text-center"
										<h2><?php echo $_smarty_tpl->tpl_vars['x']->value->gettitolo();
echo $_smarty_tpl->tpl_vars['x']->value->getautore();?>
</h2>
										</div>
										<hr style="height:2px;border-width:0;color:gray;background-color:gray">
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



 							 <input type="submit" name="ricerca" value="Richiedi scambio">

									</form>

							<!-- End Cerca Libro Overview Content -->



		<!-- End Cerca Libro -->




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
