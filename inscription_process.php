<?php
session_start();
include './includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: inscription.php');
    exit;
}

$nom      = trim(isset($_POST['nom'])      ? $_POST['nom']      : '');
$email    = trim(isset($_POST['email'])    ? $_POST['email']    : '');
$password = trim(isset($_POST['password']) ? $_POST['password'] : '');

$errors = array();
if ($nom === '')     $errors[] = "Le nom complet est requis.";
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Adresse email invalide.";
if (strlen($password) < 8) $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";

if (!empty($errors)) {
    $_SESSION['signup_errors'] = $errors;
    $_SESSION['signup_old']    = array('nom'=>$nom,'email'=>$email);
    header('Location: inscription.php');
    exit;
}

/* Vérifier si l'email existe déjà */
$check = $conn->prepare("SELECT id FROM utilisateurs WHERE email = ? LIMIT 1");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();
if ($check->num_rows > 0) {
    $_SESSION['signup_errors'] = array("Cette adresse email est déjà utilisée.");
    $_SESSION['signup_old']    = array('nom'=>$nom,'email'=>$email);
    $check->close();
    header('Location: inscription.php');
    exit;
}
$check->close();

$hash = password_hash($password, PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nom, $email, $hash);
$ok   = $stmt->execute();
$stmt->close();

if ($ok) {
    $_SESSION['user_id']        = $conn->insert_id;
    $_SESSION['user_nom']       = $nom;
    $_SESSION['user_email']     = $email;
    $_SESSION['signup_success'] = "Bienvenue, " . htmlspecialchars($nom) . " ! Votre compte a été créé avec succès.";
    header('Location: mes-tickets.php');
} else {
    $_SESSION['signup_errors'] = array("Une erreur est survenue lors de la création du compte.");
    header('Location: inscription.php');
}
exit;
