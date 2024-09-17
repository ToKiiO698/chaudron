<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Vérification si formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $date = $_POST['date'];

    require 'path/to/PHPMailer/src/Exception.php';
    require 'path/to/PHPMailer/src/PHPMailer.php';
    require 'path/to/PHPMailer/src/SMTP.php';
    // Crée une nouvelle instance 
    $mail = new PHPMailer(true);

    try {
        // serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Remplacez par le serveur SMTP de votre fournisseur
        $mail->SMTPAuth = true;
        $mail->Username = 'khudaverdiyev.nihad@gmail.com'; // Remplacez par votre adresse e-mail
        $mail->Password = 'guns rfrz avbq spzd'; // Remplacez par votre mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Activer le chiffrement TLS
        $mail->Port = 587; // Le port SMTP

        // l'expéditeur et destinataire
        $mail->setFrom('khudaverdiyev.nihad@gmail.com', 'Chaudron baveur'); 
        $mail->addAddress($email, $name); 

        // Contenu e-mail
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<h2>Nouveau message de contact</h2>
                       <p><strong>Nom:</strong> $name</p>
                       <p><strong>E-mail:</strong> $email</p>
                       <p><strong>Date:</strong> $date</p>
                       <p><strong>Message:</strong><br>$message</p>";

        // Envoyer l'e-mail
        $mail->send();
        echo '<div class="sent-message">Votre message a bien été transmis !</div>';
    } catch (Exception $e) {
        echo '<div class="error-message">Le message n\'a pas pu être envoyé. Erreur: ', $mail->ErrorInfo, '</div>';
    }
}
?>