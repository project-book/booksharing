<!DOCTYPE html>
{assign var='mess' value=$mess|default:'null'}
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
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/booksharing/Smarty-dir/assets/js/sorttable.js"></script>


    <script type=”text/javascript”>$(function() {
			$("#customers").tablesorter();
		});</script>
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
                            <h2 class="cerca-libro-heading-title">GESTISCI EBOOK</h2>
                            <span class="cerca-libro-header-dot"></span>


                        </div>


                    </div>
                </div>
            </div>
    </section>


    <table border="1" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
        <tr>
            <td >&nbsp;
                <table id="customers" class="sortable">

                    <h1 align="center"> Ebook </h1>

                    <tr>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th>Editore</th>
                        <th>Genere</th>
                        <th>Anno</th>
                        <th>prezzo punti</th>

                    </tr>

                    {foreach $array as $x}


                        <tr>
                            <form method="post" action="/booksharing/Admin/modifica_elimina/{$x->gettitolo()}/{$x->getautore()}">

                            <td>{$x->gettitolo()}</td>
                            <td>{$x->getautore()}</td>
                            <td>{$x->geteditore()}</td>
                            <td>{$x->getgenere()}</td>
                            <td>{$x->getanno()}</td>
                            <td>{$x->getprezzo()}</td>
                            <td><input type="submit" name="modifica" value="modifica" ></td>
                            <td><input type="submit" name="elimina" value="elimina" ></td>

                        </tr>
                        </form>

                        {/foreach}


                        <tr><form method="post" action="/booksharing/Admin/aggiungiebook" enctype="multipart/form-data">
                                <td><input type="text" name="titolo"></td>
                                <td><input type="text" name="autore"></td>
                                <td><input type="text" name="editore"></td>
                                <td>
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
                                    </select><br></td>
                                <td><input type="text" name="anno"></td>
                                <td><input type="text" name="prezzo_punti"></td>

                                <td>
                                    <!-- UPLOAD PDF -->
                                <p>Aggiungi il file pdf dell'ebook.</p>
                                <input name="file" type="file"/>
                                    <!--/ UPLOAD PDF -->
                                </td>

                        </tr>
                </table>

            </td>




        </tr>

    </table>




    <div class="testo-centrato">

        <input type="submit" name="aggiungi" value="Aggiungi ebook">

    </div>
    </form>

    <div class="testo-centrato">
        {if $mess!='null'}
            <h2>{$mess}</h2>
        {/if}
    </div>
    <div class="testo-centrato">
        <img src="/booksharing/Smarty-dir/assets/images/ebook.png" alt="Ebook img">
    </div>
    <hr>


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
