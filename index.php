<!-- Descrizione
Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

Milestone 1  DONE
Creare un form che invii in GET la lunghezza della password. 
Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. 
Scriviamo tutto (logica e layout) in un unico file index.php

Milestone 2  DONE
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale -->
<?php

include 'functions.php';

$alert = '';

if (isset($_GET['psw_length']) and $_GET['psw_length'] <= 8) {
    gen_psw($_GET['psw_length']);
} else {
    $alert = 'Inserisci un numero maggiore di 8';
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
            height: 400px;
            background-color: lightgrey;
        }

        .button {
            margin-top: 3rem;
        }
    </style>

</head>

<body class="bg-dark">

    <h1 class="text-white-50 text-center pt-3">Strong Password Generator</h1>
    <h3 class="text-white text-center">Genera una password sicura</h3>

    <div class="container py-5">
        <div class="center pt-5">
            <form action="index.php" method="get">
                <div class="input-length d-flex justify-content-center">
                    <h4 class="me-5">Inserisci la lunghezza della password</h4>
                    <input type="text" name="psw_length" id="psw_length">
                </div>
                <?php if (isset($_GET['psw_length'])) : ?>
                    <h4 class="text-success text-center mt-5"><?= gen_psw($_GET['psw_length']) ?></h4>
                <?php else : ?>
                    <h4 class="text-danger text-center mt-5"><small><?= $alert ?></small></h4>
                <?php endif ?>
                <div class="button d-flex justify-content-center ">
                    <button type="submit" class="btn btn-primary me-3">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>