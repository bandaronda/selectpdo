<?php
// Deel 1


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


$sql = "SELECT * FROM producten";
$stmt = $conn->query($sql);


if ($stmt->rowCount() > 0) {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table>";
    echo "<tr><th>ID</th><th>Naam</th><th>Beschrijving</th></tr>";
    foreach ($result as $row) {
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


$conn = null;
?>

<?php
// Deel 2

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


$productCode = 1;
$sql = "SELECT * FROM producten WHERE product_code = :productCode";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':productCode', $productCode);
$stmt->execute();


if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Product Code: " . $row["product_code"] . "<br>";
    echo "Product Naam: " . $row["product_naam"] . "<br>";
    echo "Beschrijving: " . $row["beschrijving"] . "<br>";
} else {
    echo "Geen resultaten gevonden.";
}


$conn = null;
?>

<?php
// Deel 3


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


$productCode = 2;
$sql = "SELECT * FROM producten WHERE product_code = :productCode";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':productCode', $productCode);
$stmt->execute();


if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Product Code: " . $row["product_code"] . "<br>";
    echo "Product Naam: " . $row["product_naam"] . "<br>";
    echo "Beschrijving: " . $row["beschrijving"] . "<br>";
} else {
    echo "Geen resultaten gevonden.";
}


$conn = null;
?>