<?php
session_start();

// Sessievariabelen wissen om uit te loggen
session_unset();
// Sessie beëindigen
session_destroy();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uitloggen</title>
</head>
<body>
    <h2>Je bent uitgelogd</h2>
    <!-- Knop om terug te gaan naar index.php -->
    <a href="index.php">Terug naar de startpagina</a>
</body>
</html>
