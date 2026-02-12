<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
    <form action="rechercher_inscrit.php" method="post">
        <input type="text" name="id" placeholder="Entrez l'id de l'inscrit">
        <input type="submit" value="Rechercher">
    </form>
    <?php
@include ('database.php');
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT * FROM inscription WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();
    if($row){
        echo "<h2 style='color: green;'>Inscrit trouvé :</h2>";
        echo "<p>ID: " . $row['id'] . "</p>";
        echo "<p>Username: " . $row['username'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
    } else {
        echo "<p>Aucun inscrit trouvé avec cet ID.</p>";
    }
}



?>
</body>
</html>