<?php

require_once __DIR__."/../PHPMailer-master/src/PHPMailer.php";
require_once __DIR__."/../PHPMailer-master/src/Exception.php";
require_once __DIR__."/../PHPMailer-master/src/SMTP.php";
require_once __DIR__."/../PHPMailer-master/src/OAuth.php";

/**
 * Class CEbooks
 * Controller che permette all'utente di ricercare e di acquistare un ebook.
 */
class CCercaEbook
{
    /**
     *Permette all'utente di ricercare un ebook nel db in base ai parametri passati dalla view.
     */
    public function ricerca()
    {

        $VRicerca = new VCercaEbook();
        if (CUtente::isLogged() == true) {
            $t = array();
            $t['titolo'] = $VRicerca->gettitolo();
            $t['autore'] = $VRicerca->getautore();
            $t['editore'] = $VRicerca->geteditore();
            $t['genere'] = $VRicerca->getgenere();
            $t['anno'] = $VRicerca->getanno();
            $t['prezzo_punti'] = $VRicerca->getprezzo();
            $ordine = '';
            $classe = 'Ebook';
            $x = new FPersistentManager();
            $y = array();
            if ($t['titolo'] != null || $t['autore'] != null || $t['editore'] != null || $t['genere'] != null || $t['anno'] != null || $t['prezzo_punti'] != null) {
                foreach ($t as $k => $v) {
                    if ($v != NULL)
                        $y[$k] = $v;
                }
                $user = $x->load('Registrato', $_SESSION['user']);
                $VRicerca->showresult($x->search($classe, $y, $ordine), $user);
            } else
                $a = array();
            $user = $x->load('Registrato', $_SESSION['user']);
            $VRicerca->showresult($x->search('Ebook', $a, $ordine), $user);

        } else
            $VRicerca->Login();
    }

    /**
     * @param $k
     * @param $kk
     * Permette di acquistare l'ebook quindi verrà rimosso dal db e verrà aggiornato il saldo punti dell'utente.
     */
    public function compra($k, $kk)
    {
        if (CUtente::isLogged()) {

            $o = new FPersistentManager();
            $x = $o->load('Registrato', $_SESSION['user']);
            $c['titolo'] = $k;
            $c['autore'] = $kk;
            $t = $o->load('Ebook', $c);
            $s['saldo'] = 0;
            $arr = array();
            $e = $o->search('Ebook', $arr, '');
            $v = new VCercaEbook();
            if ($t->controllopunti($x) == true) {
                $s['saldo'] = $x->getsaldo() - $t->getprezzo();
                if (!static::inviaemail($x->getemail(), $t)) {
                    $mess = 'Riprova, controlla l\'email';
                    $v->saldoinsuff($x, $mess, $e);
                } else {
                    $o->update('Registrato', $s, $_SESSION['user']);
                    $v->Compra($t, $x->getemail(), $s['saldo']);
                }

            } else {
                $mess = 'Il tuo saldo punti  è insufficente';
                $v->saldoinsuff($x, $mess, $e);
            }


        }
    }

    public function inviaemail($x, $t)
    {

        // Instantiation and passing `true` enables exceptions

        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = 'booksharingtest1@gmail.com';                     // SMTP username
        $mail->Password = 'booksharingprova';                               // SMTP password
        $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


        $mail->From = "booksharingtest1@gmail.com";
        $mail->FromName = "booksharing.com";
        $mail->AddAddress($x);
        $mail->AddBCC($x, '');
        $mail->isHTML(true);
        $mail->Subject = 'Oggetto: Invio libro versione pdf relativo acquisto sul nostro sito';
        $mail->Body = 'ciao ecco il tuo ebook!!!!!!!';
        $mail->AltBody = "";
        $mail->AddAttachment(__DIR__ . '/../Smarty-dir/assets/ebooks/' . $t->getTitolo() . '_' . $t->getAutore() . '.pdf');

        if (!$mail->Send()) {
            $mail->smtpClose();
            return false;
        } else {
            $mail->smtpClose();
            return true;
        }

    }
}


