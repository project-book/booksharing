<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 18:45:16
  from 'C:\xampp\htdocs\booksharing\Smarty-dir\templates\dettagliutente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef3831cc015c0_63085639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '737c06b660c7ba7e1b0451d5a96796ba76c1cc55' => 
    array (
      0 => 'C:\\xampp\\htdocs\\booksharing\\Smarty-dir\\templates\\dettagliutente.tpl',
      1 => 1593017115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef3831cc015c0_63085639 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <li><a href="#cerca-libro">INFORMAZIONI PERSONALI</a></li>
                        <li><a href="#cerca-ebook">VALUTAZIONI</a></li>
                        <li><a href="#mu-contact">PROPOSTE</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
</header>
<!-- End Header -->

<!-- Start Featured Slider -->

<section id="mu-hero">
    <img src="/booksharing/Smarty-dir/assets/images/user/<?php echo $_smarty_tpl->tpl_vars['immagine']->value;?>
">
    <?php if ($_smarty_tpl->tpl_vars['bool']->value == true) {?>
    <h2>Contatta via mail l'user per accordarti sulla scambio <?php echo $_smarty_tpl->tpl_vars['user']->value->getemail();?>
</h2>
    <?php }?>
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
                            <span class="cerca-libro-header-dot"></span>
                        </div>

                        <!-- Start Cerca Libro Overview Content -->

                        <div class="row">
                            <table border="1" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                                <tr>

                                    <td >&nbsp;

                                        <table id="customers" class="sortable">

                                                <h1> Dati personali</h1>

                                                <tr>
                                                    <th>User</th>
                                                    <th>Nome</th>
                                                    <th>Cognome</th>
                                                    <th>via</th>
                                                    <th>ncivico</th>
                                                    <th>cap</th>
                                                    <th>comune</th>
                                                    <th>provincia</th>
                                                    <th>saldo</th>

                                                </tr>

                                                <tr>

                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getuser();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getnome();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getcognome();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getindirizzo()->getVia();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getindirizzo()->getNcivico();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getindirizzo()->getcap();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getindirizzo()->getComune();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getindirizzo()->getprovincia();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->getsaldo();?>
</td>



                                                </tr>

                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <table border="1" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                                <tr>
                                    <td >&nbsp;

                                        <table id="customers" class="sortable">


                                            <h1> Libri personali </h1>
                                            <tr>
                                                <th>Titolo</th>
                                                <th>Autore</th>
                                                <th>Editore</th>
                                                <th>Genere</th>
                                                <th>Anno</th>
                                                <th>Condizione</th>

                                            </tr>

                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['libri']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                                                <tr>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getTitolo();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getAutore();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getEditore();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getGenere();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getAnno();?>
</td>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getCondizione();?>
</td>
                                                </tr>
                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                                        </table>


                                    </td>


                                </tr>
                            </table>






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
                            <span class="cerca-ebook-header-dot"></span>
                        </div>

                        <!-- Start Cerca Ebook Overview Content -->
                        <div class="cerca-ebook-overview-content">
                            <div class="row">


                                <table border="1" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                                    <tr>



                                        <td >&nbsp;

                                            <table id="customers" class="sortable">


                                                <h1> Valutazioni ricevute</h1>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Voto</th>
                                                    <th>Commento</th>

                                                </tr>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['valutazione']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                                                    <tr>
                                                        <td><a href="/booksharing/Utente/dettagliutente/<?php echo $_smarty_tpl->tpl_vars['x']->value->getValutante();?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value->getValutante();?>
</a></td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getVoto();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getCommento();?>
</td>
                                                    </tr>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                            </table>
                                        </td>


                                    </tr>
                                </table>




                            </div>
                        </div>
                        <!-- End Cerca Ebook Overview Content -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cerca Ebook -->


>


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
