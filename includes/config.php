<?php

$host = 'localhost';     // serveur MySQL (souvent localhost)
$db_name = 'event_db';   // nom de ta base de données
$username = 'root';      // utilisateur MySQL
$password = '';          // mot de passe MySQL


$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}


$conn->set_charset("utf8mb4");

/* Retourne le chemin complet d'une image d'événement */
function eventImg($img, $default = 'assets/images/z.jpg') {
    if (empty($img)) return $default;
    if (strpos($img, 'http') === 0 || strpos($img, 'assets/') === 0 || $img[0] === '/') {
        return htmlspecialchars($img, ENT_QUOTES, 'UTF-8');
    }
    return 'assets/images/' . htmlspecialchars($img, ENT_QUOTES, 'UTF-8');
}

?>

