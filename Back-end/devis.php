<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Now you can access your environment variables
$smtpHost = $_ENV['SMTP_HOST'];
$smtpPort = $_ENV['SMTP_PORT'];
$smtpUsername = $_ENV['SMTP_USERNAMES'];
$smtpPassword = $_ENV['SMTP_PASSWORDS'];
$smtpEncryption = $_ENV['SMTP_ENCRYPTION'];

// Enable CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve JSON data from POST request
    $data = json_decode(file_get_contents('php://input'), true);

    function clean_input($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }

    $nom = clean_input($data['nom']);
    $type_entite = clean_input($data['type_entite']);
    $email = clean_input($data['email']);
    $tel = clean_input($data['tel']);
    $adresse_site = clean_input($data['adresse_site']);
    $projet = clean_input($data['projet']);

    // Create a new PHPMailer instance
    if (!$email) {
        echo json_encode(['message' => 'Invalid email address']);
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = $smtpHost;
        $mail->Port = $smtpPort;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpUsername;
        $mail->Password = $smtpPassword;
        $mail->SMTPSecure = $smtpEncryption;

        //Recipients
        $mail->setFrom('devis@gmai.fr', 'Mailer');
        $mail->addAddress('devis@gmail.fr');                     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Demande de devis';
        $mail->Body    = "<p>Nom: $nom</p><p>Type d'entité: $type_entite</p><p>Email: $email</p><p>Téléphone: $tel</p><p>Adresse du site: $adresse_site</p><p>Projet: $projet</p>";

        $mail->send();
        echo json_encode(['message' => 'Email has been sent']);
    } catch (Exception $e) {
        echo json_encode(['message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
    }
} else {
    echo json_encode(['message' => 'Invalid request method']);
}




