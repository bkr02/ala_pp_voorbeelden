<?php
session_start();

if (empty($_SESSION["logedin"])) {
    // Gebruiker is niet ingelogd, stuur door naar de inlogpagina
    header("Location: index.php");
    exit();
}

echo "Je bent ingelogd, met de deze gegevens: <br>";
echo "Gebruikersnaam: " . $_SESSION["username"] . "<br>";
echo "Ingelogd: " . ($_SESSION["logedin"] ? 'Ja' : 'Nee');
?>
