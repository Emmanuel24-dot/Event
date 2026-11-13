<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Partenaires | GbinGbanCe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" rel="stylesheet">

  <style>
    body { font-family: 'Poppins', sans-serif; background: #f8f9fa; }

    /* ===== HERO ===== */
    .partners-hero {
      height: 80vh; min-height: 420px;
      background: url("assets/images/c.jpg") center/cover no-repeat;
      position: relative; display: flex;
      align-items: center; justify-content: center; color: #fff;
    }
    .partners-hero::after {
      content: ""; position: absolute; inset: 0; background: rgba(0,0,0,0.6);
    }
    .partners-hero-content { position: relative; z-index: 2; text-align: center; padding: 0 20px; }
    .partners-hero h1 { font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 700; }

    /* ===== PARTNER GALAXY SECTION ===== */
    .partners-galaxy {
      background: linear-gradient(160deg, #fff 0%, #f9f9f9 100%);
      padding: 80px 0; overflow: hidden;
    }

    /* ===== SWIPER PARTNER CARD ===== */
    .partner-card {
      width: 200px; height: 200px;
      background: rgba(255,255,255,0.9);
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.1), 0 0 0 1px rgba(255,115,0,0.1);
      display: flex; flex-direction: column;
      justify-content: center; align-items: center;
      position: relative; transition: all 0.4s ease;
      margin: 0 auto;
    }
    .partner-card:hover {
      transform: translateY(-10px) scale(1.05);
      box-shadow: 0 20px 50px rgba(255,115,0,0.25);
    }
    .partner-card img {
      max-width: 130px; max-height: 100px;
      object-fit: contain;
      filter: grayscale(80%);
      transition: filter 0.4s ease;
    }
    .partner-card:hover img { filter: grayscale(0%); }
    .partner-name {
      position: absolute; bottom: 14px;
      font-size: 13px; font-weight: 700;
      color: #ff7300; opacity: 0;
      transform: translateY(6px);
      transition: all 0.4s ease;
    }
    .partner-card:hover .partner-name { opacity: 1; transform: translateY(0); }

    .swiper { padding: 40px 10px; }
    .swiper-slide { display: flex; justify-content: center; align-items: center; }

    /* ===== BECOME PARTNER CTA ===== */
    .partner-cta {
      background: linear-gradient(135deg, #ff7300, #ff3b3b);
      border-radius: 20px; padding: 50px 40px; color: #fff; text-align: center;
    }
    .partner-cta h3 { font-weight: 700; margin-bottom: 16px; }
    .partner-cta p { opacity: 0.9; max-width: 520px; margin: 0 auto 24px; }

    /* ===== STATS ===== */
    .stat-card {
      background: #fff; border-radius: 16px; padding: 28px;
      text-align: center; box-shadow: 0 8px 24px rgba(0,0,0,0.06);
      border-top: 4px solid #ff7300;
    }
    .stat-card .num { font-size: 2.5rem; font-weight: 700; color: #ff7300; line-height: 1; }
    .stat-card .label { font-size: 14px; color: #777; margin-top: 6px; }

    @media (max-width: 576px) {
      .partner-card { width: 160px; height: 160px; }
      .partner-cta { padding: 34px 20px; }
    }
  </style>
</head>
<body>

<?php include 'includes/nav.php'; ?>

<!-- HERO -->
<section class="partners-hero">
  <div class="partners-hero-content">
    <h1>Nos Partenaires</h1>
    <p class="mt-2 fs-5">Ils nous accompagnent pour créer des événements inoubliables</p>
  </div>
</section>

<!-- STATS -->
<section class="py-5 bg-white">
  <div class="container">
    <div class="row g-4 text-center">
      <div class="col-6 col-md-3">
        <div class="stat-card">
          <div class="num">30+</div>
          <div class="label">Partenaires actifs</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-card">
          <div class="num">120+</div>
          <div class="label">Événements co-organisés</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-card">
          <div class="num">50k+</div>
          <div class="label">Participants</div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="stat-card">
          <div class="num">5</div>
          <div class="label">Années d'expérience</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PARTNERS SWIPER -->
<section class="partners-galaxy">
  <div class="container">
    <h2 class="text-center fw-bold mb-2">Nos partenaires officiels</h2>
    <p class="text-center text-muted mb-5">Des marques qui partagent notre vision</p>

    <div class="swiper galaxy-swiper">
      <div class="swiper-wrapper">
        <?php
        $partners = [
          ['a.jpg','Orange Togo'],
          ['b.jpg','Moov Africa'],
          ['c.jpg','Ecobank'],
          ['d.jpg','UTB Togo'],
          ['e.jpg','ORABANK'],
          ['z.jpg','Lomé Invest'],
          ['a.jpg','Togocel'],
          ['c.jpg','SIB Group'],
        ];
        foreach ($partners as $p):
        ?>
        <div class="swiper-slide">
          <div class="partner-card">
            <img src="assets/images/<?= $p[0] ?>" alt="<?= htmlspecialchars($p[1]) ?>">
            <span class="partner-name"><?= htmlspecialchars($p[1]) ?></span>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- BECOME A PARTNER -->
<section class="py-5">
  <div class="container">
    <div class="partner-cta">
      <h3>Devenez partenaire de GbinGbanCe</h3>
      <p>Rejoignez notre réseau de partenaires et augmentez votre visibilité auprès de milliers de participants à travers le Togo.</p>
      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="contact.php" class="btn btn-light btn-lg px-4 fw-bold">
          <i class="bi bi-envelope me-2"></i>Nous contacter
        </a>
        <a href="contact.php" class="btn btn-outline-light btn-lg px-4">En savoir plus</a>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- JS — chargé en dernier pour que Swiper soit disponible -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
window.addEventListener("scroll", function () {
  var nb = document.querySelector(".navbar");
  if (nb) nb.classList.toggle("scrolled", window.scrollY > 50);
});

new Swiper('.galaxy-swiper', {
  loop: true,
  slidesPerView: 'auto',
  spaceBetween: 30,
  grabCursor: true,
  speed: 3000,
  autoplay: {
    delay: 0,
    disableOnInteraction: false,
  },
  freeMode: { enabled: true, momentum: false },
  breakpoints: {
    0:   { slidesPerView: 2, spaceBetween: 16 },
    576: { slidesPerView: 3, spaceBetween: 20 },
    768: { slidesPerView: 4, spaceBetween: 24 },
    992: { slidesPerView: 5, spaceBetween: 30 },
  }
});
</script>

</body>
</html>
