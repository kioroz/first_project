<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>contact</title>
</head>
<body>
    <nav>
        <a href="index.html">Acceuil</a>
        <a href="inscription.html">Inscription</a>
        <a href="connexion.html">Connexion</a>
        <a href="formcontact.html">Contact</a>
    
    </nav>
    <?php
    $dsn = "mysql:host=localhost;dbname=site_noha;charset=utf8";
    $dbUser = "root";
    $dbPass = "mysql";
    $message_status = "";
    $message_color = "";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
    require 'vendor/autoload.php';
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les données du formulaire
        $prenom= $_POST['prénom'];
        $name = $_POST['name'];
        $sujet = $_POST['sujet'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        if (empty($prenom) || empty($name) || empty($email) || empty($sujet) || empty($message)) {
            $message_status = '<h2> Veuillez remplir tout ce qui est requis ! </h2>';
            $message_color = 'red';
            echo $message_status;
            
        } else{
            try{
                $pdo = new PDO($dsn, $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                $sql = "INSERT INTO contact (prenom, nom, email, sujet, msg) VALUES (:prenom, :nom, :email, :sujet, :msg)";
                $stmt = $pdo->prepare($sql);
                if ($stmt -> execute([
                ':prenom' => $prenom,
                ':nom' => $name,
                ':email' => $email,
                ':sujet' => $sujet,
                ':msg' => $message,
            ])){
                echo "<p>Message enregistré dans la base de données.</p>";
            } else{
                echo "<p>Erreur lors de l'enregistrement du message dans la base de données.</p>";
            };
            }catch (PDOException $e){
                echo ("<p>Connexion échouée :</p " . $e->getMessage());
                
            }
             
            try {
                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
                $mail->SMTPAuth = true;
                $mail->Username = 'site.test.noreply@gmail.com';
                $mail->Password = 'faqb jxvg fbsd hcuy';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;
                //destinataires
                $mail->setFrom($mail ->Username,'Site Test NoReply');
                $mail->addAddress('kioroz56@gmail.com', "Noha");
                $mail->addReplyTo($email,$name);
                //Content
                $mail->CharSet = 'UTF-8';
                $mail->isHTML(false);
                $mail->Subject = 'Nouveau message de ' . $name . ' ' . $prenom . ' sujet: ' . $sujet ;
                $mail->Body    = "bonjour je m'appel $prenom\n mon email est la suivante si vous souhaitée me contacter $email.\n$message";

                $mail->send();
                $message_status = '<p>Message envoyé avec succès ! </p>';
                // Afficher les données (vous pouvez aussi les envoyer par email ou les stocker dans une base de données)
            echo "<p>Merci pour votre message, $prenom!</p>";
            echo "<p>Email: $email</p>";
            echo "<p> Sujet: $sujet</p>";
            echo "<p>Message: $message</p>";
        }catch (Exception $e) {
                $message_status = "<p> Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo} </p>";
            }
            echo $message_status;
        }



   
    }
    ?>
</body>
</html>
