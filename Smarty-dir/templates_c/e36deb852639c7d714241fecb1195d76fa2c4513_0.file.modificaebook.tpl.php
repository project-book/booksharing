<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-29 12:02:48
  from '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/modificaebook.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef9bc4822e7f4_92937853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e36deb852639c7d714241fecb1195d76fa2c4513' => 
    array (
      0 => '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/modificaebook.tpl',
      1 => 1593424966,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef9bc4822e7f4_92937853 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <h2 class="cerca-libro-heading-title">MODIFICA EBOOK</h2>
                            <span class="cerca-libro-header-dot"></span>
                        </div>

                        <!-- Start Cerca Libro Overview Content -->
                        <div class="cerca-libro-overview-content">
                            <div class="row">

                                <form method="post" action="/booksharing/Admin/aggiornaebook/<?php echo $_smarty_tpl->tpl_vars['ebook']->value->getTitolo();?>
/<?php echo $_smarty_tpl->tpl_vars['ebook']->value->getAutore();?>
">

                                    <!-- CASELLE DI TESTO -->
                                    TITOLO<br>
                                    <output type="text"  name="titolo" ><?php echo $_smarty_tpl->tpl_vars['ebook']->value->getTitolo();?>
<br></output>
                                    AUTORE<br>
                                    <output type="text" name="autore"><?php echo $_smarty_tpl->tpl_vars['ebook']->value->getAutore();?>
<br></output>
                                    EDITORE<br>
                                    <output type="text" name="editore"  ><?php echo $_smarty_tpl->tpl_vars['ebook']->value->getEditore();?>
<br></output>
                                    GENERE<br>
                                    <select name="genere">
                                        <option value=""></option>
                                        <option value="Giallo">Giallo</option>
                                        <option value="Horror">Horror</option>ù
                                        <option value="Storico">Storico</option>
                                        <option value="Biografia">Biografia</option>
                                        <option value="Fantasy">Fantasy</option>
                                        <option value="Narrativa">Narrativa</option>
                                        <option value="Thriller">Thriller</option>
                                        <option value="Romanzo">Romanzo</option>
                                    </select><br>
                                    ANNO<br>
                                    <input type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['ebook']->value->getAnno();?>
"name="anno"><br>
                                    PREZZO<br>
                                    <input type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['ebook']->value->getprezzo();?>
" name="prezzo_punti"><br>


                                    <!-- SUBMIT -->
                                    <input type="submit" name="modifica" value="modifica">



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
