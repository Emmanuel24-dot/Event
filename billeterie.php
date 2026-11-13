<?php
include './includes/config.php';

/* =========================
   FILTRES
========================= */
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$date   = isset($_GET['date']) ? $_GET['date'] : '';

$sql = "
SELECT *
FROM evenements
WHERE statut = 'publie'
";

if ($search !== '') {
    $sql .= " AND titre LIKE '%$search%'";
}

if ($date !== '') {
    $sql .= " AND date_debut = '$date'";
}

$sql .= " ORDER BY date_debut ASC";

$result = $conn->query($sql);

if (!$result) {
    die("Erreur SQL : " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Billetterie | GbinGbanCe</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{font-family:'Poppins',sans-serif;background:#f8f9fa}
.ticket-hero{
height:80vh;background:url("assets/images/z.jpg") center/cover no-repeat;
position:relative;display:flex;align-items:center;justify-content:center;color:#fff
}
.ticket-hero::after{content:"";position:absolute;inset:0;background:rgba(0,0,0,.65)}
.ticket-hero-content{position:relative;z-index:2;text-align:center}
.filters{
background:#fff;border-radius:18px;padding:25px;
box-shadow:0 10px 30px rgba(0,0,0,.08);margin-top:-50px;z-index:10;position:relative
}
.ticket-card{
background:#fff;border-radius:20px;overflow:hidden;
box-shadow:0 10px 30px rgba(0,0,0,.08);transition:.4s;height:100%
}
.ticket-card:hover{transform:translateY(-8px);box-shadow:0 25px 50px rgba(0,0,0,.15)}
.ticket-card img{width:100%;height:220px;object-fit:cover}
.ticket-date{
position:absolute;top:15px;left:15px;background:#ff7300;
color:#fff;padding:6px 14px;border-radius:30px;font-size:13px
}
.ticket-body{padding:20px}
.ticket-price{font-size:18px;font-weight:600;color:#ff7300}
</style>
</head>

<body>

<?php include 'includes/nav.php'; ?>

<!-- HERO -->
<section class="ticket-hero">
  <div class="ticket-hero-content">
    <h1>Billetterie officielle</h1>
    <p>Achetez vos tickets en toute sécurité</p>
  </div>
</section>

<!-- FILTRES -->
<div class="container">
<form method="GET" class="filters row g-3">
  <div class="col-md-5">
    <input type="text" name="search" class="form-control"
           placeholder="Rechercher un événement"
           value="<?= htmlspecialchars($search); ?>">
  </div>
  <div class="col-md-4">
    <input type="date" name="date" class="form-control"
           value="<?= htmlspecialchars($date); ?>">
  </div>
  <div class="col-md-3">
    <button class="btn btn-warning w-100 text-white">Filtrer</button>
  </div>
</form>
</div>

<!-- LISTE TICKETS -->
<section class="py-5">
<div class="container">
<div class="row g-4">

<?php if ($result->num_rows > 0): ?>
<?php while ($event = $result->fetch_assoc()): ?>
<div class="col-lg-4 col-md-6">
<div class="ticket-card">
<div class="position-relative">
<img src="<?= eventImg($event['image']); ?>" alt="<?= htmlspecialchars($event['titre']); ?>" style="width:100%;height:220px;object-fit:cover">
<span class="ticket-date">
<?= date('d M', strtotime($event['date_debut'])); ?>
</span>
</div>

<div class="ticket-body">
<h5><?= htmlspecialchars($event['titre']); ?></h5>

<div class="ticket-meta text-muted mb-2">
📍 <?= htmlspecialchars($event['ville']); ?><br>
🎟 <?= htmlspecialchars($event['devise']); ?>
</div>

<div class="ticket-price mb-3">
<?= number_format($event['prix'],0,',',' '); ?> <?= $event['devise']; ?>
</div>

<div class="d-grid gap-2">
<a href="acheter-ticket.php?id=<?= $event['id']; ?>"
   class="btn btn-outline-warning">
<i class="bi bi-ticket-perforated"></i> Acheter
</a>

<a href="event-details.php?id=<?= $event['id']; ?>"
   class="btn btn-light">
Voir détails
</a>
</div>
</div>
</div>
</div>
<?php endwhile; ?>
<?php else: ?>
<div class="col-12 text-center">
<p class="text-muted">Aucun ticket disponible 😔</p>
</div>
<?php endif; ?>

</div>
</div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
window.addEventListener("scroll",()=>{
document.querySelector(".navbar")
?.classList.toggle("scrolled",window.scrollY>50);
});
</script>

</body>
</html>
