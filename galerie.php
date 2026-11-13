<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Galerie | GbinGbanCe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }

    /* ===== HERO ===== */
    .gallery-hero {
      height: 80vh; min-height: 400px;
      background: url("assets/images/e.jpg") center/cover no-repeat;
      position: relative; display: flex;
      align-items: center; justify-content: center; color: #fff;
    }
    .gallery-hero::after { content: ""; position: absolute; inset: 0; background: rgba(0,0,0,0.58); }
    .gallery-hero-content { position: relative; z-index: 2; text-align: center; padding: 0 20px; }
    .gallery-hero h1 { font-size: clamp(1.8rem, 5vw, 3.2rem); font-weight: 700; margin-bottom: 10px; }
    .gallery-hero p { font-size: clamp(14px, 2vw, 18px); opacity: 0.9; }

    /* ===== FILTERS ===== */
    .filters {
      background: #fff; border-radius: 18px; padding: 20px 24px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      margin-top: -50px; position: relative; z-index: 10;
      display: flex; flex-wrap: wrap; justify-content: center; gap: 10px;
    }
    .filters button {
      border-radius: 50px; padding: 9px 22px;
      font-weight: 600; font-size: 14px; transition: 0.25s;
      border: 2px solid transparent;
    }
    .filters button.active,
    .filters button:hover { background: #ff7300; color: #fff; border-color: #ff7300; }

    /* ===== GALLERY GRID ===== */
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 18px;
    }
    .gallery-item {
      position: relative; overflow: hidden;
      border-radius: 14px; box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      display: block; background: #ddd;
    }
    .gallery-item img {
      width: 100%; height: 220px;
      object-fit: cover; display: block;
      transition: transform 0.4s ease;
    }
    .gallery-item:hover { transform: translateY(-5px); box-shadow: 0 20px 45px rgba(0,0,0,0.14); }
    .gallery-item:hover img { transform: scale(1.06); }
    .gallery-meta {
      position: absolute; bottom: 10px; left: 10px;
      color: #fff; background: rgba(0,0,0,0.55);
      padding: 4px 12px; border-radius: 30px; font-size: 13px; font-weight: 500;
    }
    .gallery-type-badge {
      position: absolute; top: 10px; right: 10px;
      background: #ff7300; color: #fff;
      padding: 2px 10px; border-radius: 20px; font-size: 11px; font-weight: 600;
    }

    /* ===== PAGINATION ===== */
    .pagination .page-link { border-radius: 50px; margin: 0 3px; color: #ff7300; font-weight: 600; }
    .pagination .active .page-link { background: #ff7300; border-color: #ff7300; color: #fff; }

    @media (max-width: 480px) {
      .gallery-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; }
      .gallery-item img { height: 150px; }
    }
  </style>
</head>
<body>

<?php include 'includes/nav.php'; ?>

<!-- HERO -->
<section class="gallery-hero">
  <div class="gallery-hero-content">
    <h1>Galerie des événements</h1>
    <p>Revivez nos meilleurs moments en photos</p>
  </div>
</section>

<!-- FILTERS -->
<div class="container">
  <div class="filters">
    <button class="btn btn-outline-warning active" data-filter="all">Tous</button>
    <button class="btn btn-outline-warning" data-filter="concert">Concerts</button>
    <button class="btn btn-outline-warning" data-filter="soiree">Soirées</button>
    <button class="btn btn-outline-warning" data-filter="festival">Festivals</button>
    <button class="btn btn-outline-warning" data-filter="conference">Conférences</button>
  </div>
</div>

<!-- GALLERY GRID -->
<section class="py-5">
  <div class="container">
    <div class="gallery-grid" id="galleryGrid">

      <?php
      $items = [
        ['c.jpg', 'Concert Live Night',      'concert',    'Concert'],
        ['d.jpg', 'Festival Urbain 2025',     'festival',   'Festival'],
        ['a.jpg', 'Soirée VIP Rooftop',       'soiree',     'Soirée'],
        ['e.jpg', 'Conférence Tech Afrique',  'conference', 'Conférence'],
        ['b.jpg', 'Festival Roots Kpalimé',   'festival',   'Festival'],
        ['z.jpg', 'Soirée Afrobeat',          'soiree',     'Soirée'],
        ['c.jpg', 'Concert Jazz & Soul',      'concert',    'Concert'],
        ['d.jpg', 'Networking Business',      'conference', 'Conférence'],
        ['a.jpg', 'Soirée Années 90',         'soiree',     'Soirée'],
        ['e.jpg', 'Festival de la Danse',     'festival',   'Festival'],
        ['b.jpg', 'Gala de Charité',          'soiree',     'Soirée'],
        ['z.jpg', 'Concert Gospel Live',      'concert',    'Concert'],
        ['c.jpg', 'Forum des Entrepreneurs',  'conference', 'Conférence'],
        ['d.jpg', 'Nuit des Étoiles',         'soiree',     'Soirée'],
        ['a.jpg', 'Battle de DJs',            'concert',    'Concert'],
        ['e.jpg', 'Festival Gastronomique',   'festival',   'Festival'],
      ];
      foreach ($items as $item):
      ?>
      <a href="assets/images/<?= $item[0] ?>" class="gallery-item glightbox"
         data-gallery="eventGallery"
         data-type="<?= $item[1] ?>"
         data-filter="<?= $item[2] ?>"
         data-description="<?= htmlspecialchars($item[1]) ?>">
        <img src="assets/images/<?= $item[0] ?>" alt="<?= htmlspecialchars($item[1]) ?>" loading="lazy">
        <span class="gallery-meta"><?= htmlspecialchars($item[1]) ?></span>
        <span class="gallery-type-badge"><?= $item[3] ?></span>
      </a>
      <?php endforeach; ?>

    </div>

    <!-- PAGINATION -->
    <nav class="mt-5" aria-label="Pagination de la galerie">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled"><a class="page-link"><i class="bi bi-chevron-left"></i></a></li>
        <li class="page-item active"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </nav>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
window.addEventListener("scroll", function () {
  var nb = document.querySelector(".navbar");
  if (nb) nb.classList.toggle("scrolled", window.scrollY > 50);
});

GLightbox({ selector: '.glightbox' });

// Filter
document.querySelectorAll(".filters button").forEach(function (btn) {
  btn.addEventListener("click", function () {
    document.querySelectorAll(".filters button").forEach(function (b) { b.classList.remove("active"); });
    btn.classList.add("active");
    var filter = btn.getAttribute("data-filter");
    document.querySelectorAll(".gallery-item").forEach(function (item) {
      var match = filter === "all" || item.getAttribute("data-filter") === filter;
      item.style.display = match ? "block" : "none";
    });
  });
});
</script>

</body>
</html>
