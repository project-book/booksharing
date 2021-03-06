<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-24 18:45:30
  from 'C:\xampp\htdocs\booksharing\Smarty-dir\templates\recensione.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ef3832a388df2_47484864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a60bf7a7d9cb777bb5cc47b720d4662eeb41e63c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\booksharing\\Smarty-dir\\templates\\recensione.tpl',
      1 => 1592843298,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef3832a388df2_47484864 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <h2 class="cerca-libro-heading-title">Recensisci</h2>
                            <h2>In questa pagina puoi recensire il cliente una volta che lo scambio è stato effettuato.</h2>
                            <span class="cerca-libro-header-dot"></span>
                            <?php if ($_smarty_tpl->tpl_vars['m']->value != '') {?>
                                <p><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</p>
                            <?php }?>

                        </div>

                        <!-- Start Cerca Libro Overview Content -->
                        <div class="cerca-libro-overview-content">
                            <div class="row">

                                <form method="post" action="/booksharing/Utente/inviarec/<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">

                                    <!-- CASELLE DI TESTO -->
                                    USER<br>
                                    <otuput type="text" name="user"><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
<br>

                                        <!-- SELECTBOX -->
                                        VOTO<br>
                                        <select name="voto">
                                            <option value=1>1</option>
                                            <option value=2>2</option>
                                            <option value=3>3</option>
                                            <option value=4>4</option>
                                            <option value=5>5</option>
                                        </select><br>

                                        COMMENTO<br>
                                        <textarea name="commento" cols="40" rows="5" placeholder="inserisci commento"></textarea><br>



                                    <!-- SUBMIT -->
                                    <input type="submit" name="invia" value="invia">



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
