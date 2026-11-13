<?php
include './includes/config.php';

/* =======================
   RÉCUPÉRATION DES FILTRES
======================= */
$search     = isset($_GET['search']) ? trim($_GET['search']) : '';
$categorie  = isset($_GET['categorie']) && $_GET['categorie'] !== '' ? (int)$_GET['categorie'] : null;
$date_event = isset($_GET['date']) ? $_GET['date'] : '';

/* =======================
   REQUÊTE DE BASE
======================= */
$sql = "
SELECT e.*, c.nom AS nom_categorie
FROM evenements e
LEFT JOIN categorie c ON e.id_categorie = c.id
WHERE e.statut = 'publie'
";

/* =======================
   FILTRES
======================= */
if ($search !== '') {
    $search_safe = mysqli_real_escape_string($conn, $search);
    $sql .= " AND e.titre LIKE '%$search_safe%'";
}

if (!empty($categorie)) {
    $sql .= " AND e.id_categorie = $categorie";
}

if ($date_event !== '') {
    $date_safe = mysqli_real_escape_string($conn, $date_event);
    $sql .= " AND e.date_debut = '$date_safe'";
}

$sql .= " ORDER BY e.date_debut ASC";

/* =======================
   EXÉCUTION ÉVÉNEMENTS
======================= */
$result = $conn->query($sql);
if (!$result) {
    die("ERREUR SQL EVENEMENTS : " . $conn->error);
}

/* =======================
   RÉCUPÉRATION CATÉGORIES
======================= */
$categories = $conn->query("SELECT id, nom FROM categorie ORDER BY nom");
if (!$categories) {
    die("ERREUR SQL CATEGORIES : " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Événements | GbinGbanCe</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }
.event-card { background:#fff; border-radius:18px; box-shadow:0 10px 30px rgba(0,0,0,.08); }
.event-card img { width:100%; height:220px; object-fit:cover; }
.event-date { background:#ff7300; color:#fff; padding:6px 14px; border-radius:30px; font-size:13px; }
</style>
</head>

<body>

<?php include 'includes/nav.php'; ?>

<!-- HERO -->
<section class="events-hero text-center text-white" style="background:url('assets/images/z.jpg') center/cover no-repeat;height:60vh;">
  <div class="d-flex h-100 align-items-center justify-content-center bg-dark bg-opacity-50">
    <div>
      <h1>Découvrez les meilleurs événements</h1>
      <p>Concerts, soirées, festivals & expériences uniques</p>
    </div>
  </div>
</section>

<!-- FILTRES -->
<div class="container mt-n5">
<form method="GET" class="row g-3 bg-white p-4 rounded shadow">

  <div class="col-md-4">
    <input type="text" name="search" class="form-control"
           placeholder="Rechercher un événement"
           value="<?= htmlspecialchars($search) ?>">
  </div>

  <div class="col-md-3">
    <select name="categorie" class="form-select">
      <option value="">Toutes les catégories</option>
      <?php while ($cat = $categories->fetch_assoc()): ?>
        <option value="<?= $cat['id']; ?>"
          <?= ($categorie == $cat['id']) ? 'selected' : '' ?>>
          <?= htmlspecialchars($cat['nom']); ?>
        </option>
      <?php endwhile; ?>
    </select>
  </div>

  <div class="col-md-3">
    <input type="date" name="date" class="form-control"
           value="<?= htmlspecialchars($date_event) ?>">
  </div>

  <div class="col-md-2">
    <button class="btn btn-warning w-100 text-white">Filtrer</button>
  </div>

</form>
</div>

<!-- LISTE DES ÉVÉNEMENTS -->
<section class="py-5">
<div class="container">
<div class="row g-4">

<?php if ($result->num_rows > 0): ?>
  <?php while ($event = $result->fetch_assoc()): ?>
    <div class="col-lg-4 col-md-6">
      <div class="event-card h-100">
        <div class="position-relative">
          <img src="<?= eventImg($event['image']); ?>" alt="<?= htmlspecialchars($event['titre']); ?>" style="width:100%;height:220px;object-fit:cover;display:block">
          <span class="event-date position-absolute top-0 start-0 m-3">
            <?= date('d M', strtotime($event['date_debut'])); ?>
          </span>
        </div>
        <div class="p-3">
          <h5><?= htmlspecialchars($event['titre']); ?></h5>
          <p class="text-muted mb-2">
            📍 <?= htmlspecialchars($event['ville']); ?><br>
            🎟 <?= number_format($event['prix'], 0, ',', ' '); ?> <?= htmlspecialchars($event['devise']); ?>
          </p>
          <a href="event-details.php?id=<?= $event['id']; ?>" class="btn btn-outline-warning w-100">
            Voir détails
          </a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php else: ?>
  <div class="col-12 text-center">
    <p class="text-muted">Aucun événement trouvé 😔</p>
  </div>
<?php endif; ?>

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
