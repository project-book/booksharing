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
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-sm-6 col-sm-push-6">
                <div class="mu-hero-right">
                    <img src="/booksharing/Smarty-dir/assets/images/ebook.png" alt="Ebook img">
                </div>
            </div>

            <div class="col-md-6 col-sm-6 col-sm-pull-6">
                <div class="mu-hero-left">
                    <h1>Condividi i tuoi libri </h1>
                    <p>E' semplice basta poco, cerca un libro di tuo interesse fai una proposta di scambio con un tuo libro, se l'utente accetta avrai un nuovo libro da leggere senza spendere un euro. Più scambi più guadagni punti per comprare fantastici ebook su questo sito. Allora perchè perdere tempo inizia la tua condivisione, registrati subito qui sotto.</p>
                    <a href="/booksharing/Utente/registra">REGISTRATI</a>
                </div>
            </div>

        </div>
    </div>
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
                            <h2 class="cerca-libro-heading-title">CERCA LIBRO</h2>
                            <span class="cerca-libro-header-dot"></span>
                            <p>Scrivi i valori di ricerca</p>
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
                                                    <th>email</th>
                                                    <th>via</th>
                                                    <th>ncivico</th>
                                                    <th>cap</th>
                                                    <th>comune</th>
                                                    <th>provincia</th>
                                                    <th>saldo</th>

                                                </tr>

                                                <tr>

                                                    <td>{$user->getuser()}</td>
                                                    <td>{$user->getnome()}</td>
                                                    <td>{$user->getcognome()}</td>
                                                    <td>{$user->getemail()}</td>
                                                    <td>{$user->getindirizzo()->getVia()}</td>
                                                    <td>{$user->getindirizzo()->getNcivico()}</td>
                                                    <td>{$user->getindirizzo()->getcap()}</td>
                                                    <td>{$user->getindirizzo()->getComune()}</td>
                                                    <td>{$user->getindirizzo()->getprovincia()}</td>
                                                    <td>{$user->getsaldo()}</td>



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
                                                <th>Seleziona</th>
                                                <th>Titolo</th>
                                                <th>Autore</th>
                                                <th>Editore</th>
                                                <th>Genere</th>
                                                <th>Anno</th>
                                                <th>Condizione</th>

                                            </tr>

                                            {foreach $libri as $x}
                                            <form method="post" action="/booksharing/Utente/proponiscambio/{$x->getTitolo()}/{$x->getAutore()}/{$x->getUser()->getuser()}">
                                                <tr>
                                                    <td><input type="radio" name="LibroRichiesto" value="titolo" "></td>
                                                    <td>{$x->getTitolo()}</td>
                                                    <td>{$x->getAutore()}</td>
                                                    <td>{$x->getEditore()}</td>
                                                    <td>{$x->getGenere()}</td>
                                                    <td>{$x->getAnno()}</td>
                                                    <td>{$x->getCondizione()}</td>
                                                </tr>
                                            {/foreach}
                                                <td><input type="submit" name="proponi scambio" value="proponi scambio"</td>
                                            </form>
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
                            <h2 class="cerca-ebook-heading-title">CERCA EBOOK</h2>
                            <span class="cerca-ebook-header-dot"></span>
                            <p>Scrivi i valori di ricerca</p>
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
                                                {foreach $valutazione as $x}
                                                    <tr>
                                                        <td><a href="/booksharing/Utente/dettagliutente/{$x->getValutante()}">{$x->getValutante()}</a></td>
                                                        <td>{$x->getVoto()}</td>
                                                        <td>{$x->getCommento()}</td>
                                                    </tr>
                                                {/foreach}
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

