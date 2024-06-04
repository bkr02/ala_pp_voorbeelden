<?php
// Deze pagina voegt twee kolommen toe aan de tabel gebruikers
// De kolommen secret_question en secret_answer 
// Dit hoeft maar één keer uitgevoerd te worden
// Je kan ALTER TABLE ook in phpMyAdmin of Mysql Workbench uitvoeren
require_once "dbconnect.php";

// Voer het ALTER TABLE commando uit
$sql = "ALTER TABLE gebruikers
        ADD COLUMN secret_question VARCHAR(255) NOT NULL,
        ADD COLUMN secret_answer VARCHAR(255) NOT NULL";

if ($conn->query($sql) === TRUE) {
    echo "Kolommen succesvol toegevoegd.";
} else {
    echo "Fout bij het toevoegen van kolommen: " . $conn->error;
}

// Sluit de verbinding
$conn->close();
?>
