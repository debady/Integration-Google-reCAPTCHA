<?php
    session_start();
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

$secretKey = 'VOTRE_SECRET_KEY';

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
$responseKeys = json_decode($response, true);

if ($responseKeys['success']) {
    $_SESSION['suces'] = "Merci $username, votre formulaire a été soumis avec succès.";
    header('location:index.php');

} else {
    $_SESSION['error'] = "Erreur : Veuillez vérifier le reCAPTCHA.";
    header('location:index.php');
}
?>
