<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["username"];
    $pass = $_POST["password"];
    // deze query doet het volgende: selecteer alle rijen uit de tabel users waar de username en password gelijk zijn aan de ingevoerde username en password
    $sql = "SELECT * FROM gebruikers WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows == 1) {
        session_start();
        $_SESSION["username"] = $uname;
        $_SESSION["logedin"] = true;
        // Stuur de gebruiker door naar de dashboard.php pagina na een succesvolle login
        header("Location: ingelogd.php");
        exit();
    } else {
        // Gebruiker niet gevonden in de database
        echo "Ongeldige username of wachtwoord.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
</head>
<body>
<form action="index.php" method="post">
    <label for="username">Gebruikersnaam</label>
    <input type="text" name="username" id="username" required>
    <label for="password">Wachtwoord</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" value="Inloggen">
</form>
</body>
</html>
