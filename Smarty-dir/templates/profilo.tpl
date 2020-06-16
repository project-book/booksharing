<!DOCTYPE html>
{assign var='y' value=$y|default:''}
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



<!-- Start main content -->

<main role="main">


    <!-- Start Cerca Libro -->

    <section id="cerca-libro">
        <hr>
        <div class="cerca-libro-overview-area">
            <div class="cerca-libro-heading-area">
                <div class="cerca-libro-heading-title">
                    <h1 >PROFILO</h1>
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
                                        <form method="post" action="/booksharing/Utente/modificautente/">
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

                                                        <td>{$dati->getuser()}</td>
                                                        <td>{$dati->getnome()}</td>
                                                        <td>{$dati->getcognome()}</td>
                                                        <td>{$dati->getemail()}</td>
                                                        <td>{$dati->getindirizzo()->getVia()}</td>
                                                        <td>{$dati->getindirizzo()->getNcivico()}</td>
                                                        <td>{$dati->getindirizzo()->getcap()}</td>
                                                        <td>{$dati->getindirizzo()->getComune()}</td>
                                                        <td>{$dati->getindirizzo()->getprovincia()}</td>
                                                        <td>{$dati->getsaldo()}</td>
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

                                                {foreach $libri as $x}

                                                    <tr>
                                                        <form method="post" action="/booksharing/Utente/eliminalibro/{$x->getTitolo()}/{$x->getAutore()}">
                                                        <td>{$x->getTitolo()}</td>
                                                        <td>{$x->getAutore()}</td>
                                                        <td>{$x->getEditore()}</td>
                                                        <td>{$x->getGenere()}</td>
                                                        <td>{$x->getAnno()}</td>
                                                        <td>{$x->getCondizione()}</td>
                                                        <td><input type="submit" name="elimina" value="elimina" ></td>
                                                    </tr>

                                                    </form>
                                                {/foreach}


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


        {if !empty($effettuate) || !empty($ricevute)}




                                <table border="0" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                                    <tr>

                                        <td width="50%">&nbsp;

                                            {if !empty($effettuate)}

                                            <table id="customers" class="sortable">

                                                <h2 align="center"> Valutazioni effettuate</h2>

                                                <tr>
                                                    <th>User</th>
                                                    <th>Voto</th>
                                                    <th>Commento</th>

                                                </tr>
                                                {foreach $effettuate as $x}
                                                <tr>
                                                    <td><a href="/booksharing/Utente/dettagliutente/{$x->getValutato()}">{$x->getValutato()}</a></td>
                                                    <td>{$x->getVoto()}</td>
                                                    <td>{$x->getCommento()}</td>


                            </tr>

                            {/foreach}
                            </table>
                            </td>
                                        {else}
                                        <h2>Nessuna valutazione inviata</h2>
                                        {/if}

                            <td width="50%">&nbsp;
                                {if !empty($ricevute)}
                                <table id="customers" class="sortable">


                                    <h2 align="center"> Valutazioni ricevute </h2>
                                    <tr>
                                        <th>User</th>
                                        <th>Voto</th>
                                        <th>Commento</th>

                                    </tr>
                                    {foreach $ricevute as $x}
                                        <tr>
                                            <td><a href="/booksharing/Utente/dettagliutente/{$x->getValutante()}">{$x->getValutante()}</a></td>
                                            <td>{$x->getVoto()}</td>
                                            <td>{$x->getCommento()}</td>
                                        </tr>
                                    {/foreach}
                                </table>
                            </td>
                                        {else}

                                        <h2 align="center">Nessuna valutazione ricevuta</h2>

                                        {/if}

                            </tr>
                            </table>

        {else}
        <h2 align="center">Nessuna valutazione</h2>
        {/if}

    </section>



    <!-- Start Contact -->
    <section id="mu-contact">
        <hr>
        <h1 align="center">PROPOSTE IN CORSO</h1>
        {if !empty($propric) || !empty($propinv)}
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
            <tr>

                <td >&nbsp;
                    {if !empty($propric)}
                    {foreach $propric as $x}
                    {if $x->getstato()==NULL}
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

                        {foreach $propric as $x}
                            <tr>
                                <form method="post" action=/booksharing/Utente/Risposta/{$x->getid()} >
                                {if ($x->getstato()==NULL)}

                                    <td> <a href="/booksharing/Utente/dettagliutente/{$x->getutenteprop()}">{$x->getutenteprop()}</a></td>.
                                    <td>{$x->getlibrorich()->gettitolo()}</td>
                                    <td>{$x->getlibrorich()->getautore()}</td>
                                    <td>{$x->getlibroprop()->gettitolo()}</td>
                                    <td>{$x->getlibroprop()->getautore()}</td>
                                <td><button type="submit" name="ida" value="{$x->getid()}">Accetta</button>
                                    <button type="submit" name="idr" value="{$x->getid()}">Rifiutato</button> </td>{/if}

                            </tr>
                        {/foreach}
                    </table>

                    {else}
                        <h2 align="center">Nessuna proposta ricevuta</h2>
                    {/if}
                    {/foreach}


                    {/if}
                    {/foreach}

                    {/if}
                </td>
                </form>
            </tr>
        </table>
            <hr>
                <table border="0" cellpadding="0" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                    <td >
                    {if !empty($propinv)}
                        {foreach $propinv as $x}
                        {if $x->getstato()==NULL}
                    <table id="customers" class="sortable">


                        <h2 align="center">Proposte inviate</h2>
                        <tr>
                            <th>Ricevente</th>
                            <th>Titolo_libro_Richiesto</th>
                            <th>Autore_Libro_Richiesto</th>
                            <th>Titolo_libro_Proposto</th>
                            <th>Autore_Libro_Proposto</th>



                        </tr>
                        {foreach $propinv as $x}
                            <tr>
                                {if ($x->getstato()=='')}
                                    <td><a href="/booksharing/Utente/dettagliutente/{$x->getutenterich()}">{$x->getutenterich()}</a></td>
                                <td>{$x->getlibrorich()->gettitolo()}</td>
                                <td>{$x->getlibrorich()->getautore()}</td>
                                <td>{$x->getlibroprop()->gettitolo()}</td>
                                <td>{$x->getlibroprop()->getautore()}</td>
                                {/if}
                            </tr>
                        {/foreach}
                    </table>

                        {/if}
                        {/foreach}
                    {else}
                        <h2 align="center">Nessuna proposta inviata</h2>
{/if}
                </td>


            </tr>
        </table>
{else}
            <h2 align="center">Nessuna proposta in corso</h2>
        {/if}
    <hr>
    <h1 align="center">PROPOSTE CONCLUSE</h1>
        {if !empty($concluse)}
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
                        {foreach $concluse as $x}
                        <form method="post" action=/booksharing/Utente/Recensione/{$x->getid()} >
                            <tr>

                                {if ($x->getstato()!=NULL)}
                                    {if ($dati->getuser()!=$x->getutenteprop())}
                                    <td><a href="/booksharing/Utente/dettagliutente/{$x->getutenteprop()}">{$x->getutenteprop()}</a></td>
                                        {$y=$x->getutenteprop()}
                                    {else}
                                    <td> <a href="/booksharing/Utente/dettagliutente/{$x->getutenterich()}">{$x->getutenterich()}</a></td>
                                        {$y=$x->getutenterich()}
                                    {/if}
                                    <td>{$x->getlibrorich()->gettitolo()}</td>
                                    <td>{$x->getlibrorich()->getautore()}</td>
                                    <td>{$x->getlibroprop()->gettitolo()}</td>
                                    <td>{$x->getlibroprop()->getautore()}</td>
                                    {if $dati->getuser()==$x->getstato() || $x->getstato()=='Recensito'}
                                    <td>Recensito</td>
                                    {/if}
                                    <td>{if $dati->getuser()!=$x->getstato() and $x->getstato()!='Recensito' and $x->getstato()!='Rifiutato'}<button type="submit" name="recensione" value="{$y}">Lascia Recensione</button></td>
                                {/if}{/if}
                            </tr>
                        {/foreach}
                    </table>
                </td>
            </form>
        </tr>
    </table>

        {else}
            <h2 align="center">Nessuna proposta conclusa</h2>
        {/if}
        <hr>
    </section>



    <!-- End Contact -->


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

