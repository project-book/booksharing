<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-17 13:13:46
  from 'C:\xampp\htdocs\booksharing\Smarty-dir\templates\profilo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee9faead632d7_78079902',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b03cee961f2b552c613598a8a375d094e59578b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\booksharing\\Smarty-dir\\templates\\profilo.tpl',
      1 => 1592392298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9faead632d7_78079902 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('y', (($tmp = @$_smarty_tpl->tpl_vars['y']->value)===null||$tmp==='' ? '' : $tmp));
$_smarty_tpl->_assignInScope('bool', (($tmp = @$_smarty_tpl->tpl_vars['bool']->value)===null||$tmp==='' ? 'ok' : $tmp));?>
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



<!-- Start main content -->

<main role="main">


    <!-- Start Cerca Libro -->

    <section id="cerca-libro">
        <hr>
        <div class="cerca-libro-overview-area">
            <div class="cerca-libro-heading-area">
                <div class="cerca-libro-heading-title">
                    <h1 >PROFILO</h1>

                    <img src="/booksharing/Smarty-dir/assets/images/user/<?php echo $_smarty_tpl->tpl_vars['immagine']->value;?>
">

                    <h2>In questa pagina puoi visualizzare le tue informazioni utente, tra cui dati personali, valutazioni e proposte.
                    Una volta accettata una proposta ricevuta o dopo che una vostra proposta inviata viene accettata, puoi contattare via email l'utente per accordare
                    lo scambio.
                    Successivamente potrai inviare una recensione.</h2>

                </div>
            </div>

                        <!-- Start Cerca Libro Overview Content -->

                    <div class="testo-centrato">
                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="200%" id="AutoNumber1">
                            <tr>

                                <td >&nbsp;

                                    <table id="customers" class="sortable">
                                        <form method="post" action="/booksharing/Utente/modificautente/<?php echo '';?>
">
                                            <h2> Dati personali</h2>

                                            <tr>
                                                <th>User</th>
                                                <th>Nome</th>
                                                <th>Cognome</th>
                                                <th>email</th>
                                                <th>via</th>
                                                <th>ncivico</th>
                                                <th>cap</th>
                                                <th>comune</th>
                                                <th>provincia</th>
                                                <th>saldo</th>
                                                <th>modifica</th>


                                                </tr>

                                                    <tr>

                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getuser();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getnome();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getcognome();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getemail();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getindirizzo()->getVia();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getindirizzo()->getNcivico();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getindirizzo()->getcap();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getindirizzo()->getComune();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getindirizzo()->getprovincia();?>
</td>
                                                        <td><?php echo $_smarty_tpl->tpl_vars['dati']->value->getsaldo();?>
</td>
                                                        <td><input type="submit" name="modifica" value="modifica" ></td>



                                                    </tr>

                                                </form>
                                            </table>
                                        </td>
                                    </tr>
                                </table>





                        <table border="0" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="200%" id="AutoNumber1">
                                            <tr>
                                        <td >&nbsp;

                                            <table id="customers" class="sortable">


                                                <h2> Libri personali </h2>

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
                                                        <form method="post" action="/booksharing/Utente/eliminalibro/<?php echo $_smarty_tpl->tpl_vars['x']->value->getTitolo();?>
/<?php echo $_smarty_tpl->tpl_vars['x']->value->getAutore();?>
">
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

                                                        <td><input type="submit" name="elimina" value="elimina" ></td>
                                                    </tr>

                                                    </form>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                                                <tr>
                                                    <form method="post" action="/booksharing/Utente/aggiungilibro" enctype="multipart/form-data">
                                                        <td><input type="text" name="titolo"></td>
                                                        <td><input type="text" name="autore"></td>
                                                        <td><input type="text" name="editore"></td>
                                                        <td><select name="genere">
                                                            <option value=""></option>
                                                            <option value="Giallo">Giallo</option>
                                                            <option value="Horror">Horror</option>
                                                            <option value="Storico">Storico</option>
                                                            <option value="Biografia">Biografia</option>
                                                            <option value="Fantasy">Fantasy</option>
                                                            <option value="Narrativa">Narrativa</option>
                                                            <option value="Thriller">Thriller</option>
                                                            <option value="Romanzo">Romanzo</option>


                                                        </select><br></td>
                                                        <td><input type="text" name="anno"></td>
                                                        <td>  <select name="condizione">
                                                                <option value=""></option>
                                                                <option value="Nuovo">Nuovo</option>
                                                            <option value="Come">Come nuovo</option>
                                                            <option value="Usato">Usato</option>
                                                            <option value="Pessime">Pessime condizioni</option></td>
                                                        <td>        <!-- UPLOAD IMMAGINE -->
                                                            <p>Aggiungi una tua immagnie</p>
                                                            <input name="file" type="file" size="40" />
                                                            <!--/ UPLOAD IMMAGINE --></td>


                                                </tr>

                                            </table>
                                            <!-- SUBMIT -->
                                            <input type="submit" name="aggiungilibro" value="Aggiungi Libro" >

                                            </form>
                                        </td>


                                    </tr>
                                </table>

</div>

                        <!-- End Cerca Libro Overview Content -->

                    </div>


    </section>

    <!-- End Cerca Libro -->



    <!-- Start Cerca Ebook -->
    <section id="cerca-ebook">
        <hr>



                        <div class="cerca-ebook-heading-area">
                            <h1 class="cerca-ebook-heading-title">VALUTAZIONI</h1>

                        </div>

        <?php if (!empty($_smarty_tpl->tpl_vars['effettuate']->value) || !empty($_smarty_tpl->tpl_vars['ricevute']->value)) {?>

                                <table border="0" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                                    <tr>

                                        <td width="50%">&nbsp;

                                            <?php if (!empty($_smarty_tpl->tpl_vars['effettuate']->value)) {?>

                                            <table id="customers" class="sortable">

                                                <h2 align="center"> Valutazioni effettuate</h2>

                                                <tr>
                                                    <th>User</th>
                                                    <th>Voto</th>
                                                    <th>Commento</th>

                                                </tr>
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['effettuate']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                                                <tr>
                                                    <td><a href="/booksharing/Utente/dettagliutente/<?php echo $_smarty_tpl->tpl_vars['x']->value->getValutato();?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value->getValutato();?>
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
                                        <?php } else { ?>
                                        <h2>Nessuna valutazione inviata</h2>
                                        <?php }?>

                            <td width="50%">&nbsp;
                                <?php if (!empty($_smarty_tpl->tpl_vars['ricevute']->value)) {?>
                                <table id="customers" class="sortable">


                                    <h2 align="center"> Valutazioni ricevute </h2>
                                    <tr>
                                        <th>User</th>
                                        <th>Voto</th>
                                        <th>Commento</th>

                                    </tr>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ricevute']->value, 'x');
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
                                        <?php } else { ?>

                                        <h2 align="center">Nessuna valutazione ricevuta</h2>

                                        <?php }?>

                            </tr>
                            </table>

        <?php } else { ?>
        <h2 align="center">Nessuna valutazione</h2>
        <?php }?>

    </section>

    <!-- Start Contact -->
    <section id="mu-contact">
        <hr>
        <h1 align="center">PROPOSTE IN CORSO</h1>

        <?php if (!empty($_smarty_tpl->tpl_vars['propric']->value) || !empty($_smarty_tpl->tpl_vars['propinv']->value)) {?>

        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
            <tr>

                <td >&nbsp;
                    <?php if (!empty($_smarty_tpl->tpl_vars['propric']->value)) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['propric']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                    <?php if ($_smarty_tpl->tpl_vars['x']->value->getstato() == NULL) {?>
                        <?php $_smarty_tpl->_assignInScope('bool', 'no');?>
                    <?php }?>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        <?php if ($_smarty_tpl->tpl_vars['bool']->value == 'no') {?>
                    <table id="customers" class="sortable">


                        <h2 align="center">Proposte ricevute</h2>
                        <tr>
                            <th>Richiedente</th>
                            <th>Titolo_libro_Richiesto</th>
                            <th>Autore_Libro_Richiesto</th>
                            <th>Titolo_libro_Proposto</th>
                            <th>Autore_Libro_Proposto</th>
                            <th>Accetta Proposta</th>


                        </tr>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['propric']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                            <tr>
                                <form method="post" action=/booksharing/Utente/Risposta/<?php echo $_smarty_tpl->tpl_vars['x']->value->getid();?>
 >
                                <?php if (($_smarty_tpl->tpl_vars['x']->value->getstato() == NULL)) {?>

                                    <td> <a href="/booksharing/Utente/dettagliutente/<?php echo $_smarty_tpl->tpl_vars['x']->value->getutenteprop();?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value->getutenteprop();?>
</a></td>.
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibrorich()->gettitolo();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibrorich()->getautore();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibroprop()->gettitolo();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibroprop()->getautore();?>
</td>
                                <td><button type="submit" name="ida" value="<?php echo $_smarty_tpl->tpl_vars['x']->value->getid();?>
">Accetta</button>
                                    <button type="submit" name="idr" value="<?php echo $_smarty_tpl->tpl_vars['x']->value->getid();?>
">Rifiutato</button> </td><?php }?>

                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>

                    <?php }?>



            <?php if ($_smarty_tpl->tpl_vars['bool']->value == 'ok') {?>
                    <h2 align="center">Nessuna proposta ricevuta</h2>
                    <?php }?>
                </td>
                </form>
            </tr>

            <?php } else { ?>
            <h2 align="center">Nessuna proposta ricevuta</h2>
            <?php }?>
        </table>

            <hr>
                <table border="0" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                    <td >
                    <?php if (!empty($_smarty_tpl->tpl_vars['propinv']->value)) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['propinv']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['x']->value->getstato() == NULL) {?>
                    <table id="customers" class="sortable">


                        <h2 align="center">Proposte inviate</h2>
                        <tr>
                            <th>Ricevente</th>
                            <th>Titolo_libro_Richiesto</th>
                            <th>Autore_Libro_Richiesto</th>
                            <th>Titolo_libro_Proposto</th>
                            <th>Autore_Libro_Proposto</th>



                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['propinv']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                            <tr>
                                <?php if (($_smarty_tpl->tpl_vars['x']->value->getstato() == '')) {?>
                                    <td><a href="/booksharing/Utente/dettagliutente/<?php echo $_smarty_tpl->tpl_vars['x']->value->getutenterich();?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value->getutenterich();?>
</a></td>
                                <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibrorich()->gettitolo();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibrorich()->getautore();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibroprop()->gettitolo();?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibroprop()->getautore();?>
</td>
                                <?php }?>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                        <?php } else { ?>
                            <h2 align="center">Nessuna proposta inviata</h2>
                        <?php }?>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php } else { ?>
                        <h2 align="center">Nessuna proposta inviata</h2>
<?php }?>
                </td>


            </tr>
        </table>
<?php } else { ?>
            <h2 align="center">Nessuna proposta in corso</h2>
        <?php }?>
    <hr>
    <h1 align="center">PROPOSTE CONCLUSE</h1>
        <?php if (!empty($_smarty_tpl->tpl_vars['concluse']->value)) {?>
    <table border="0" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
        <tr>

                <td >&nbsp;

                    <table id="customers" class="sortable">

                        <tr>
                            <th>User</th>
                            <th>Titolo_libro_Richiesto</th>
                            <th>Autore_Libro_Richiesto</th>
                            <th>Titolo_libro_Proposto</th>
                            <th>Autore_Libro_Proposto</th>
                            <th>Stato</th>
                            <th>Recensione</th>



                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['concluse']->value, 'x');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['x']->value) {
?>
                        <form method="post" action=/booksharing/Utente/Recensione/<?php echo $_smarty_tpl->tpl_vars['x']->value->getid();?>
/<?php echo '';?>
 >
                            <tr>

                                <?php if (($_smarty_tpl->tpl_vars['x']->value->getstato() != NULL)) {?>
                                    <?php if (($_smarty_tpl->tpl_vars['dati']->value->getuser() != $_smarty_tpl->tpl_vars['x']->value->getutenteprop())) {?>
                                    <td><a href="/booksharing/Utente/dettagliutente/<?php echo $_smarty_tpl->tpl_vars['x']->value->getutenteprop();?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value->getutenteprop();?>
</a></td>
                                        <?php $_smarty_tpl->_assignInScope('y', $_smarty_tpl->tpl_vars['x']->value->getutenteprop());?>
                                    <?php } else { ?>
                                    <td> <a href="/booksharing/Utente/dettagliutente/<?php echo $_smarty_tpl->tpl_vars['x']->value->getutenterich();?>
"><?php echo $_smarty_tpl->tpl_vars['x']->value->getutenterich();?>
</a></td>
                                        <?php $_smarty_tpl->_assignInScope('y', $_smarty_tpl->tpl_vars['x']->value->getutenterich());?>
                                    <?php }?>
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibrorich()->gettitolo();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibrorich()->getautore();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibroprop()->gettitolo();?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['x']->value->getlibroprop()->getautore();?>
</td>
                                    <?php if ($_smarty_tpl->tpl_vars['dati']->value->getuser() == $_smarty_tpl->tpl_vars['x']->value->getstato() || $_smarty_tpl->tpl_vars['x']->value->getstato() == 'Recensito') {?>
                                    <td>Recensito</td>
                                    <?php }?>
                                    <td><?php if ($_smarty_tpl->tpl_vars['dati']->value->getuser() != $_smarty_tpl->tpl_vars['x']->value->getstato() && $_smarty_tpl->tpl_vars['x']->value->getstato() != 'Recensito' && $_smarty_tpl->tpl_vars['x']->value->getstato() != 'Rifiutato') {?><button type="submit" name="recensione" value="<?php echo $_smarty_tpl->tpl_vars['y']->value;?>
">Lascia Recensione</button></td>
                                <?php }
}?>
                            </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </table>
                </td>
            </form>
        </tr>
    </table>

        <?php } else { ?>
            <h2 align="center">Nessuna proposta conclusa</h2>
        <?php }?>
        <hr>
        <form method="post" action="/booksharing/Utente/EliminaAccount">
            <input type="submit" name="elimina" value="Elimina account" >
        </form>
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
