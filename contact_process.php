<?php
session_start();
include './includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

$nom     = trim(isset($_POST['name'])    ? $_POST['name']    : '');
$email   = trim(isset($_POST['email'])   ? $_POST['email']   : '');
$sujet   = trim(isset($_POST['subject']) ? $_POST['subject'] : '');
$message = trim(isset($_POST['message']) ? $_POST['message'] : '');

$errors = array();
if ($nom === '')     $errors[] = "Le nom est requis.";
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
if ($sujet === '')   $errors[] = "Le sujet est requis.";
if ($message === '') $errors[] = "Le message est requis.";

if (!empty($errors)) {
    $_SESSION['contact_errors']  = $errors;
    $_SESSION['contact_old']     = array('nom'=>$nom,'email'=>$email,'sujet'=>$sujet,'message'=>$message);
    header('Location: contact.php');
    exit;
}

$stmt = $conn->prepare(
    "INSERT INTO messages_contact (nom, email, sujet, message) VALUES (?, ?, ?, ?)"
);
$stmt->bind_param("ssss", $nom, $email, $sujet, $message);
$ok = $stmt->execute();
$stmt->close();

if ($ok) {
    $_SESSION['contact_success'] = "Votre message a bien été envoyé. Nous vous répondrons dans les 24h.";
} else {
    $_SESSION['contact_errors'] = array("Une erreur est survenue. Veuillez réessayer.");
}

header('Location: contact.php');
exit;
