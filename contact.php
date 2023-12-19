<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Configurer PHPMailer
    $mail = new PHPMailer(true);

    // Paramètres du serveur SMTP (à adapter)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Remplace avec le serveur SMTP que tu utilises
    $mail->SMTPAuth = true;
    $mail->Username = 'patota.unknown@gmail.com'; // Remplace avec ton adresse e-mail
    $mail->Password = 'beez hibu jqyd wyhe'; // Remplace avec ton mot de passe
    $mail->SMTPSecure = 'tls'; // À adapter (peut être 'ssl' ou 'tls' selon le serveur)
    $mail->Port = 587; // À adapter (peut être différent selon le serveur)

    // Configurer l'e-mail
    $mail->setFrom($email, $name);
    $mail->addAddress('patota.unknown@gmail.com');
    $mail->Subject = 'Nouveau message de ' . $name;
    $mail->Body = $message;

    try {
        // Envoyer l'e-mail
        $mail->send();
        echo "Lasa soa aman-tsara ny hafatrao, misaotra tompoko.";
    } catch (Exception $e) {
        echo "Misy indro kely. Erreur : {$mail->ErrorInfo}";
    }
}
?>
