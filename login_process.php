<?php
session_start();
include './includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: connexion.php');
    exit;
}

$email    = trim(isset($_POST['email'])    ? $_POST['email']    : '');
$password = trim(isset($_POST['password']) ? $_POST['password'] : '');

$errors = array();
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
if ($password === '') $errors[] = "Le mot de passe est requis.";

if (!empty($errors)) {
    $_SESSION['login_errors'] = $errors;
    header('Location: connexion.php');
    exit;
}

$stmt = $conn->prepare("SELECT id, nom_utilisateur, mot_de_passe FROM utilisateurs WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();

$id_user = $nom_user = $hash_user = null;
$stmt->bind_result($id_user, $nom_user, $hash_user);
$found = $stmt->fetch();
$stmt->close();

if (!$found || !password_verify($password, $hash_user)) {
    $_SESSION['login_errors'] = array("Email ou mot de passe incorrect.");
    header('Location: connexion.php');
    exit;
}

$_SESSION['user_id']    = $id_user;
$_SESSION['user_nom']   = $nom_user;
$_SESSION['user_email'] = $email;

header('Location: mes-tickets.php');
exit;
