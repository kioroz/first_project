<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>afficher inscrit</title>
</head>

<body>
       <nav>
        <a href="menu-admin.html">Acceuil</a>
        <a href="afficher_inscrit.php">afficher inscrit</a>
        <a href="rechercher_contact.php">rechecher contact</a>
        <a href="rechercher_inscrit.php">recherche inscrit</a>
        <a href="affichercontact.php">afficher contact</a>
        <a href="index.html"> menu basique</a>
    </nav>

    <?php
@include ('database.php');

$sql = "SELECT * FROM inscription";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<h1>Liste des inscrits</h1>";
echo "<center>";
echo "<table>";
echo "<th>id</th>";
echo "<th>username</th>";
echo "<th>email</th>";
foreach($row as $rows){

echo "<tr>";
echo "<td>".$rows['id']."</td>";
echo "<td>".$rows['username']."</td>";
echo "<td>".$rows['email']."</td>";
echo "</tr>";

}
echo "</table>";

echo "</center>";












?>
</body>
</html>