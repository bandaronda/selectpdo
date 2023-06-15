<?php 


$host = 'localhost:3307';
$db   = 'test';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "connection succes";
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// $sql = "SELECT * FROM producten" ;
// $result = $pdo->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$product_naam = $_POST["product_naam"];
$prijs_per_stuk = $_POST["prijs_per_stuk"];
$omschrijving = $_POST["omschrijving"];

$sql = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$resultaat = $stmt->execute([$product_naam, $prijs_per_stuk, $omschrijving]);

echo "Data successfully inserted.";
}
?>

<!DOCTYPE html>
<head>
</head>
<body>
    
<form method="POST" action="insert.php">
  <input type="text" name="product_naam" placeholder="product_naam" required> <br>
  <input type="number" name="prijs_per_stuk" placeholder="prijs_per_stuk" required> <br>
  <input type="text" name="omschrijving" placeholder="omschrijving" required> <br>
  <input type="submit" value="Verstuur">
</form>
</body>

</html>

