<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1 . DONE
Creare un form che invii in GET la lunghezza della password. 
Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. 
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale -->

<?php
$alert = '';

if (isset($_GET['psw_length']) and $_GET['psw_length'] < 8) {
    $alert = 'Inserisci un numero maggiore di 8';
} else {
    function gen_psw($length)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,;:!?(){}[]#.$/*-&@+£%";
        $psw = '';

        for ($i = 0; $i < $length; $i++) {
            $random = rand(0, strlen($chars) - 1);
            $psw .= substr($chars, $random, 1);
        }

        return $psw;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        .center {
            height: 700px;
        }
    </style>

</head>

<body class="bg-dark">

    <div class="container py-5">
        <div class="center d-flex flex-column pt-5 bg-danger">
            <form action="index.php" method="get">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <input type="text" name="psw_length" id="psw_length">
            </form>
            <?php if (isset($_GET['psw_length']) && $_GET['psw_length'] > 8) { ?>
                <h4><?= gen_psw($_GET['psw_length']) ?></h4>
            <?php } else { ?>
                <h4><?= $alert ?></h4>
            <?php } ?>
        </div>
    </div>

</body>

</html>