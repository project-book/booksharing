<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-14 14:52:50
  from '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/ricercalibro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee61da242c972_52797442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '96fe506fb3cff8b834c3e53f319ded8f403ea9f3' => 
    array (
      0 => '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/ricercalibro.tpl',
      1 => 1592139165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee61da242c972_52797442 (Smarty_Internal_Template $_smarty_tpl) {
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
	<?php echo '<script'; ?>
 type="text/javascript" src="/booksharing/Smarty-dir/assets/js/sorttable.js"><?php echo '</script'; ?>
>


	<?php echo '<script'; ?>
 type=”text/javascript”>$(function() {
			$("#customers").tablesorter();
		});<?php echo '</script'; ?>
>






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
								<h1 class="cerca-libro-heading-title">SELEZIONA LIBRO</h1>
								<span class="cerca-libro-header-dot"></span>
								<p>Seleziona dalla tabella di sinistra il libro che vorresti ottentere e dalla colonna di destra
								il libro di cui ti vuoi liberare.
								Verrà inviata una proposta di scambio all'utente e riceverai la sua risposta direttamente sul tuo profilo.</p>
							</div>
							

					</div>
				</div>
			</div>
	</section>


							<form method="post" action="/booksharing/CercaLibro/scambia">

<table border="1" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" >
<tr>

<td width="70%">&nbsp;

<table id="customers" class="sortable">

<h2 align="center"> libri da scegliere </h2>

  <tr>
    <th>Seleziona</th>
    <th >User</th>
	  <th>Voto_medio_user</th>
    <th>Titolo</th>
    <th>Autore</th>
    <th>Editore</th>
    <th>Genere</th>
    <th>Anno</th>
    <th>Condizione</th>

    
  </tr>


	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['libriricercati']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
    <tr>
    <td>
    <div class="bottone">

	<input type="radio" name="LibroRichiesto"
	value = "<?php echo $_smarty_tpl->tpl_vars['x']->value->gettitolo();?>
/<?php echo $_smarty_tpl->tpl_vars['x']->value->getautore();?>
/<?php echo $_smarty_tpl->tpl_vars['x']->value->getUser()->getuser();?>
"></div><br></div>
	</td>
		<td><a href="/booksharing/Utente/dettagliutente/<?php echo $_smarty_tpl->tpl_vars['x']->value->getUser()->getuser();?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value->getUser()->getuser();?>
</a></td>
		<td>	<?php echo $_smarty_tpl->tpl_vars['media']->value[$_smarty_tpl->tpl_vars['x']->value->getUser()->getuser()];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->gettitolo();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getautore();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->geteditore();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getgenere();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getanno();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getcondizione();?>
</td>

    
  </tr>


  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>
  </td>
    

<td width="30%">&nbsp;

<table id="customers" class="sortable">
  
 
<h2 align="center"> libri personali </h2>
	<?php if (!empty($_smarty_tpl->tpl_vars['libriposseduti']->value)) {?>
  <tr>
    <th>Seleziona</th>
    <th>Titolo</th>
    <th>Autore</th>
    
  </tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['libriposseduti']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
    <tr>
    <td>
    <div class="bottone">
	<input type="radio" name="LibroPersonale" 
	value = "<?php echo $_smarty_tpl->tpl_vars['x']->value->gettitolo();?>
/<?php echo $_smarty_tpl->tpl_vars['x']->value->getautore();?>
/<?php echo $_smarty_tpl->tpl_vars['x']->value->getUser()->getuser();?>
"><br></div>

	</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->gettitolo();?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getautore();?>
</td>
    
    
    
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<?php } else { ?>
	<h2 align="center">Vai al profilo per aggiungere i libri</h2>

	<?php }?>
  </table>
</td>
  
  
  </tr>
  </table>
  
 

		
						<div class="testo-centrato">
						  
							


 							 <input type="submit" name="ricerca" value="Richiedi scambio" >

								</div>
								
									
									</form>
									
									
									<div class="testo-centrato">
						<img src="/booksharing/Smarty-dir/assets/images/ebook.png" alt="Ebook img">
					</div>

<hr>
	



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
