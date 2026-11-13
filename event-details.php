<?php
include './includes/config.php';

/* ======================
   VÉRIFICATION ID
====================== */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Événement introuvable");
}

$id = (int)$_GET['id'];

/* ======================
   RÉCUPÉRATION ÉVÉNEMENT
====================== */
$sql = "
SELECT e.*, c.nom AS nom_categorie
FROM evenements e
LEFT JOIN categorie c ON e.id_categorie = c.id
WHERE e.id = $id AND e.statut = 'publie'
LIMIT 1
";

$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("Événement introuvable");
}

$event = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($event['titre']); ?> | GbinGbanCe</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body { font-family:'Poppins',sans-serif; background:#f8f9fa; }

.event-hero {
  height:55vh; min-height:380px;
  background:url('<?= eventImg($event['image']); ?>') center/cover no-repeat;
  position:relative;
  display:flex;
  align-items:center;
  color:#fff;
}

.event-hero::after {
  content:"";
  position:absolute;
  inset:0;
  background:rgba(0,0,0,.65);
}

.event-hero-content { position:relative; z-index:2; }

.event-box {
  background:#fff;
  border-radius:18px;
  padding:30px;
  box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.price-box {
  background:#ff7300;
  color:#fff;
  border-radius:18px;
  padding:30px;
  text-align:center;
  box-shadow:0 15px 40px rgba(0,0,0,.15);
}

.map-box {
  border-radius:18px;
  overflow:hidden;
  box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.map-box iframe {
  width:100%;
  height:320px;
  border:0;
}
</style>
</head>

<body>

<?php include 'includes/nav.php'; ?>

<!-- HERO -->
<section class="event-hero">
  <div class="container event-hero-content">
    <h1><?= htmlspecialchars($event['titre']); ?></h1>

    <div class="mt-3">
      <span class="me-3">
        <i class="bi bi-calendar-event"></i>
        <?= date('d M Y', strtotime($event['date_debut'])); ?>
        <?= $event['heure_debut'] ? ' à '.$event['heure_debut'] : ''; ?>
      </span>

      <span class="me-3">
        <i class="bi bi-geo-alt"></i>
        <?= htmlspecialchars($event['ville']); ?>
      </span>

      <?php if (!empty($event['nom_categorie'])): ?>
        <span class="badge bg-warning text-dark">
          <?= htmlspecialchars($event['nom_categorie']); ?>
        </span>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- CONTENT -->
<section class="container pb-5 mt-n4">
<div class="row g-4">

<!-- DESCRIPTION -->
<div class="col-lg-8">
  <div class="event-box">
    <h4>Description</h4>
    <p>
      <?= nl2br(htmlspecialchars($event['description_complete'] ?: $event['description_courte'])); ?>
    </p>

    <?php if (!empty($event['lieu'])): ?>
      <h5 class="mt-4">Lieu</h5>
      <p>
        <i class="bi bi-geo-alt-fill text-warning"></i>
        <?= htmlspecialchars($event['lieu']); ?>
        <?= !empty($event['adresse']) ? ' – '.htmlspecialchars($event['adresse']) : ''; ?>
      </p>
    <?php endif; ?>

    <?php if (!empty($event['adresse'])): ?>
      <div class="map-box mt-3">
        <iframe
          src="https://www.google.com/maps?q=<?= urlencode($event['adresse'].' '.$event['ville']); ?>&output=embed"
          loading="lazy">
        </iframe>
      </div>

      <a
        href="https://www.google.com/maps?q=<?= urlencode($event['adresse'].' '.$event['ville']); ?>"
        target="_blank"
        class="btn btn-outline-warning mt-3">
        <i class="bi bi-map"></i> Ouvrir dans Google Maps
      </a>
    <?php endif; ?>
  </div>
</div>

<!-- PRIX -->
<div class="col-lg-4">
  <div class="price-box">
    <p>Ticket à partir de</p>
    <h3>
      <?= number_format($event['prix'], 0, ',', ' '); ?>
      <?= htmlspecialchars($event['devise']); ?>
    </h3>

    <?php if ($event['tickets_disponibles'] > 0): ?>
      <a href="acheter-ticket.php?id=<?= $event['id']; ?>" class="btn btn-light w-100 mt-3">
        Acheter un ticket
      </a>
      <p class="mt-2 small">
        <?= $event['tickets_disponibles']; ?> tickets disponibles
      </p>
    <?php else: ?>
      <button class="btn btn-secondary w-100 mt-3" disabled>
        Complet
      </button>
    <?php endif; ?>
  </div>
</div>

</div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
window.addEventListener("scroll", function () {
  var nb = document.querySelector(".navbar");
  if (nb) nb.classList.toggle("scrolled", window.scrollY > 50);
});
</script>
</body>
</html>
