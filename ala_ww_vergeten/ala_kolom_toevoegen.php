<!DOCTYPE html>
<html>
<head>
    <title>Wachtwoord Vergeten</title>
</head>
<body>
    <h2>Wachtwoord Vergeten</h2>
    <form action="" method="post">
        Gebruikersnaam: <input type="text" name="username"><br>
        Selecteer geheime vraag:
        <select name="secret_question">
            <option value="1">Wat is de naam van je eerste huisdier?</option>
            <option value="2">In welke stad ben je geboren?</option>
            <option value="3">Wat is de meisjesnaam van je moeder?</option>
        </select><br>
        Antwoord op geheime vraag: <input type="text" name="secret_answer"><br>
        Nieuw wachtwoord: <input type="password" name="new_password"><br>
        <input type="submit" value="Reset Wachtwoord">
    </form>
</body>
</html>

<?php
require_once "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $secret_answer = $_POST['secret_answer'];
    $new_password = $_POST['new_password'];

    // Controleer of de gebruiker bestaat en het geheime antwoord klopt
    $sql = "SELECT * FROM gebruikers WHERE username = '$username' AND secret_answer = '$secret_answer'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        try {
            // Gebruiker gevonden, update wachtwoord
            $sql_update = "UPDATE gebruikers SET password = '$new_password' WHERE username = '$username'";
            $conn->query($sql_update);
            echo "Wachtwoord succesvol bijgewerkt!";
        } catch (Exception $e) {
            echo "Fout bij het bijwerken van het wachtwoord: " . $conn->error;
        }
    } else {
        echo "Ongeldige gebruikersnaam, geheime vraag of geheim antwoord.";
    }
}

$conn->close();
?>
