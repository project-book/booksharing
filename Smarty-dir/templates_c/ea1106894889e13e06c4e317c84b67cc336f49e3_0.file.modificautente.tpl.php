<?php
/* Smarty version 3.1.34-dev-7, created on 2020-06-16 13:03:11
  from '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/modificautente.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ee8a6ef603ea9_30970959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea1106894889e13e06c4e317c84b67cc336f49e3' => 
    array (
      0 => '/opt/lampp/htdocs/booksharing/Smarty-dir/templates/modificautente.tpl',
      1 => 1592304618,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee8a6ef603ea9_30970959 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<?php $_smarty_tpl->_assignInScope('messaggio', (($tmp = @$_smarty_tpl->tpl_vars['messaggio']->value)===null||$tmp==='' ? '' : $tmp));?>
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
                            <h2 class="cerca-libro-heading-title">REGISTRATI</h2>
                            <span class="cerca-libro-header-dot"></span>
                            <p>Scrivi i tuoi dati</p>
                        </div>

                        <!-- Start Cerca Libro Overview Content -->
                        <div class="cerca-libro-overview-content">
                            <div class="row">

                                <form method="post" action="/booksharing/Utente/aggiornautente" enctype="multipart/form-data">

                                    <!-- CASELLE DI TESTO -->
                                  <?php if ($_smarty_tpl->tpl_vars['messaggio']->value != NULL) {?>  <h2><?php echo $_smarty_tpl->tpl_vars['messaggio']->value;?>
</h2><?php }?>
                                    User<br>
                                    <output type="text" name="user"><?php echo $_smarty_tpl->tpl_vars['user']->value->getuser();?>
<br></output>
                                    Nome<br>
                                    <output type="text" name="nome"><?php echo $_smarty_tpl->tpl_vars['user']->value->getnome();?>
<br></output>
                                    Cognome<br>
                                    <output type="text" name="cognome"><?php echo $_smarty_tpl->tpl_vars['user']->value->getcognome();?>
<br></output>
                                    Password<br>
                                    <input type="password"pattern=<?php echo $_smarty_tpl->tpl_vars['psw']->value;?>
 name="password" ><br>
                                    email<br>
                                    <input type="email"  name="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getemail();?>
" pattern=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
><br>
                                    via<br>
                                    <input type="text" name="via" pattern=<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
 placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getindirizzo()->getVia();?>
"><br>
                                    N°civico<br>
                                    <input type="text" name="ncivico" pattern=<?php echo $_smarty_tpl->tpl_vars['N']->value;?>
 placeholder="<?php echo $_smarty_tpl->tpl_vars['user']->value->getindirizzo()->getNcivico();?>
"><br>
                                    CAP<br>
                                    <select name="cap">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cap']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                                            <option value=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select><br>
                                    COMUNE<br>
                                    <select name="comune" >
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comune']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                                            <option  value=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select><br>
                                    PROVINCIA<br>
                                    <select name="provincia">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['province']->value, 'c');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['c']->value) {
?>
                                            <option value=<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</option>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </select><br>
                                    <!-- UPLOAD IMMAGINE -->
                                    <p>Modifica immagnie</p>
                                    <br><input name="file" type="file" size="40" />
                                    <!--/ UPLOAD IMMAGINE --><br>

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
