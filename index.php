<?php

// Stap 1: Verbinding maken met de database
$servername = "localhost:3307";
$username = "test";
$password = "root";
$dbname = "winkel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding met de database mislukt: " . $e->getMessage());
}

// Stap 2: De query uitvoeren om alle data te selecteren
$sql = "SELECT * FROM jouw_tabelnaam";
$result = $conn->query($sql);

// Stap 3: Controleren of er resultaten zijn en deze weergeven
if ($result->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Naam</th><th>Beschrijving</th></tr>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["naam"] . "</td>";
        echo "<td>" . $row["beschrijving"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Geen resultaten gevonden.";
}

// Stap 4: Verbinding met de database sluiten
$conn = null;
?>
In this script, we establish a connection to the database using PDO, execute the query, fetch the results, and display them in a table format. Finally, we close the database connection. Make sure to replace "jouw_gebruikersnaam", "jouw_wachtwoord", "winkel", and "jouw_tabelnaam" with the appropriate values for your database and table.











