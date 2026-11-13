<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GbinGbanCe – Événements au Togo</title>
  <meta name="description" content="Découvrez et réservez les meilleurs événements au Togo : concerts, festivals, soirées VIP et conférences.">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
  /* ===================== GLOBAL ===================== */
  body { font-family: 'Poppins', sans-serif; }
  .section-title h2 { font-weight: 700; margin-bottom: 8px; }
  .section-title p { color: #666; font-size: 15px; }

  /* ===================== HERO CAROUSEL ===================== */
  .hero-carousel,
  .hero-carousel .carousel-item { height: 100vh; min-height: 500px; }
  .hero-carousel .carousel-item { background-size: cover; background-position: center; }
  .hero-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.55); }
  .hero-content {
    position: absolute; inset: 0; z-index: 2;
    display: flex; flex-direction: column;
    justify-content: center; align-items: center;
    text-align: center; color: #fff; padding: 0 20px;
  }
  .hero-content h1 {
    font-family: 'Dancing Script', cursive;
    font-size: clamp(2.2rem, 6vw, 4.5rem);
    font-weight: 700; text-shadow: 0 2px 10px rgba(0,0,0,0.3);
  }
  .hero-content p { max-width: 640px; font-size: clamp(14px, 2vw, 17px); margin-bottom: 28px; }
  .hero-buttons { display: flex; gap: 14px; flex-wrap: wrap; justify-content: center; }

  /* ===================== EVENTS GRID ===================== */
  .events-section { padding: 80px 0; background: #f9f9f9; }
  .event-grid-card {
    background: #fff; border-radius: 16px; overflow: hidden;
    transition: transform .35s ease, box-shadow .35s ease; height: 100%;
  }
  .event-grid-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,.12); }
  .event-grid-img { position: relative; height: 220px; overflow: hidden; }
  .event-grid-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
  .event-grid-card:hover .event-grid-img img { transform: scale(1.08); }
  .event-date {
    position: absolute; top: 14px; left: 14px;
    background: #dc3545; color: #fff;
    padding: 5px 12px; border-radius: 30px; font-size: 12px; font-weight: 600;
  }
  .event-grid-content { padding: 18px 20px; }
  .event-location { font-size: 13px; color: #888; }
  .event-grid-footer { display: flex; justify-content: space-between; align-items: center; margin-top: 12px; }
  .event-price { font-weight: 700; color: #dc3545; font-size: 15px; }

  /* ===================== MARQUEE CAROUSEL ===================== */
  .carousel-section { background: #f8f9fa; }
  .event-marquee { position: relative; overflow: hidden; padding: 20px 0 40px; }
  .event-marquee::before, .event-marquee::after {
    content: ""; position: absolute; top: 0;
    width: 80px; height: 100%; z-index: 2; pointer-events: none;
  }
  .event-marquee::before { left: 0; background: linear-gradient(90deg,#f8f9fa,transparent); }
  .event-marquee::after  { right: 0; background: linear-gradient(270deg,#f8f9fa,transparent); }
  .event-track {
    display: flex; gap: 20px;
    overflow-x: auto; padding: 10px 10px 10px 0;
    scroll-snap-type: x mandatory; scroll-behavior: smooth;
    -ms-overflow-style: none; scrollbar-width: none;
  }
  .event-track::-webkit-scrollbar { display: none; }
  .event-card-compact {
    flex: 0 0 240px; background: #fff; border-radius: 18px;
    overflow: hidden; box-shadow: 0 10px 28px rgba(0,0,0,0.1);
    transition: transform .3s, box-shadow .3s, opacity .3s;
    scroll-snap-align: center; opacity: 0.55; transform: scale(0.88);
  }
  .event-card-compact.is-center { opacity: 1; transform: scale(1.06); box-shadow: 0 22px 48px rgba(0,0,0,0.18); }
  .event-card-compact img { width: 100%; height: 165px; object-fit: cover; }
  .event-card-compact .body { padding: 14px 16px; }
  .event-card-compact .meta { font-size: 12px; color: #888; }

  /* ===================== UPCOMING EVENTS LIST ===================== */
  .upcoming-events { background: #fff; }
  .event-list { display: flex; flex-direction: column; gap: 20px; }
  .event-list-item {
    display: grid;
    grid-template-columns: 260px 1fr auto;
    gap: 24px; background: #f8f9fa; padding: 22px;
    border-radius: 18px; align-items: center; transition: transform .35s, box-shadow .35s;
  }
  .event-list-item:hover { transform: translateY(-5px); box-shadow: 0 18px 40px rgba(0,0,0,.12); }
  .event-list-item img { width: 100%; height: 170px; object-fit: cover; border-radius: 12px; }
  .event-meta { font-size: 13px; color: #888; margin-bottom: 8px; }
  .event-desc { font-size: 14px; color: #555; line-height: 1.6; }

  /* ===================== CATEGORIES ===================== */
  .categories-section { padding: 80px 0; background: #f8f9fa; }
  .category-card {
    background: #fff; border-radius: 16px; padding: 16px 18px;
    border: 1px solid rgba(0,0,0,0.05);
    display: flex; gap: 14px; align-items: center;
    transition: transform .25s, box-shadow .25s;
    text-decoration: none; color: inherit;
  }
  .category-card:hover { transform: translateY(-4px); box-shadow: 0 16px 36px rgba(0,0,0,0.09); color: inherit; }
  .category-icon {
    width: 50px; height: 50px; border-radius: 14px; flex-shrink: 0;
    display: grid; place-items: center;
    background: rgba(220,53,69,0.1); color: #dc3545; font-size: 20px;
  }

  /* ===================== TESTIMONIAL + CTA ===================== */
  .testimonial-section { padding: 80px 0; background: #fff; }
  .quote-card {
    background: #111; color: #fff; border-radius: 22px;
    padding: 28px; box-shadow: 0 22px 48px rgba(0,0,0,0.22); height: 100%;
  }
  .quote-card p { color: rgba(255,255,255,0.75); }
  .cta {
    background: linear-gradient(130deg,#111,#2a2a2a);
    color: #fff; border-radius: 22px; padding: 38px;
    display: flex; flex-direction: column; gap: 16px;
    justify-content: center; height: 100%;
  }
  .cta-buttons { display: flex; flex-wrap: wrap; gap: 12px; }

  /* ===================== RESPONSIVE ===================== */
  @media (max-width: 768px) {
    .event-list-item { grid-template-columns: 1fr; text-align: center; }
    .event-list-item img { height: 200px; }
    .event-list-item .btn { width: 100%; }
    .events-section { padding: 50px 0; }
    .categories-section { padding: 50px 0; }
    .testimonial-section { padding: 50px 0; }
    .cta { padding: 28px; }
  }
  @media (max-width: 480px) {
    .event-card-compact { flex: 0 0 200px; }
  }
  </style>
</head>

<body>

<?php include 'includes/nav.php'; ?>

<!-- ==================== HERO CAROUSEL ==================== -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel" data-bs-interval="5000">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
  </div>
  <div class="carousel-inner">

    <div class="carousel-item active" style="background-image:url('assets/images/a.jpg')">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Les plus grandes soirées</h1>
        <p>Vivez des nuits inoubliables avec les meilleurs artistes du Togo</p>
        <div class="hero-buttons">
          <a href="billeterie.php" class="btn btn-danger btn-lg px-4">
            <i class="bi bi-ticket-perforated me-2"></i>Acheter un ticket
          </a>
          <a href="events.php" class="btn btn-outline-light btn-lg px-4">Voir les événements</a>
        </div>
      </div>
    </div>

    <div class="carousel-item" style="background-image:url('assets/images/b.jpg')">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Concerts & Festivals</h1>
        <p>La musique live comme tu ne l'as jamais vécue au cœur de Lomé</p>
        <div class="hero-buttons">
          <a href="events.php?categorie=1" class="btn btn-danger btn-lg px-4">Découvrir</a>
        </div>
      </div>
    </div>

    <div class="carousel-item" style="background-image:url('assets/images/e.jpg')">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Événements exclusifs</h1>
        <p>Réserve ta place avant qu'il ne soit trop tard</p>
        <div class="hero-buttons">
          <a href="billeterie.php" class="btn btn-danger btn-lg px-4">Réserver maintenant</a>
        </div>
      </div>
    </div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- ==================== ÉVÉNEMENTS POPULAIRES ==================== -->
<section class="events-section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Événements populaires</h2>
      <p>Les événements les plus suivis du moment</p>
    </div>

    <div class="row g-4">
      <?php
      $popularImages = ['c.jpg','d.jpg','z.jpg'];
      $popularTitles = ['Soirée VIP Rooftop','Concert Nuit d\'Été','Festival Urbain'];
      $popularDates  = ['15 JUIL','20 JUIL','30 JUIL'];
      $popularPrices = ['5 000','8 000','3 500'];
      for ($i = 0; $i < 3; $i++):
      ?>
      <div class="col-lg-4 col-md-6">
        <div class="event-grid-card">
          <div class="event-grid-img">
            <img src="assets/images/<?= $popularImages[$i] ?>" alt="<?= $popularTitles[$i] ?>">
            <span class="event-date"><?= $popularDates[$i] ?></span>
          </div>
          <div class="event-grid-content">
            <h5 class="fw-bold mb-1"><?= $popularTitles[$i] ?></h5>
            <p class="event-location mb-0"><i class="bi bi-geo-alt me-1"></i>Lomé, Togo</p>
            <div class="event-grid-footer">
              <span class="event-price"><?= $popularPrices[$i] ?> FCFA</span>
              <a href="billeterie.php" class="btn btn-danger btn-sm px-3">Réserver</a>
            </div>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>

    <div class="text-center mt-5">
      <a href="events.php" class="btn btn-outline-danger btn-lg px-5">Voir tous les événements</a>
    </div>
  </div>
</section>

<!-- ==================== CATÉGORIES ==================== -->
<section class="categories-section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Catégories à découvrir</h2>
      <p>Choisissez l'ambiance qui vous ressemble</p>
    </div>
    <div class="row g-3">
      <?php
      $cats = [
        ['bi-music-note-beamed','Concerts live','Artistes locaux & internationaux','1'],
        ['bi-emoji-laughing','Soirées & clubs','Ambiance nocturne premium','2'],
        ['bi-briefcase','Conférences','Business, tech et inspiration','4'],
        ['bi-people','Networking','Rencontrez votre futur partenaire','8'],
        ['bi-palette','Culture & arts','Expos, théâtre et performances','5'],
        ['bi-cup-hot','Gastronomie','Saveurs locales et expériences','7'],
      ];
      foreach ($cats as $c):
      ?>
      <div class="col-md-6 col-lg-4">
        <a href="events.php?categorie=<?= $c[3] ?>" class="category-card d-flex">
          <div class="category-icon"><i class="bi <?= $c[0] ?>"></i></div>
          <div>
            <h6 class="mb-1 fw-bold"><?= $c[1] ?></h6>
            <p class="mb-0 text-muted" style="font-size:13px"><?= $c[2] ?></p>
          </div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== PROCHAINS ÉVÉNEMENTS ==================== -->
<section class="upcoming-events py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Prochains événements</h2>
      <p>Planifiez vos prochaines sorties</p>
    </div>

    <div class="event-list">
      <?php
      $upcoming = [
        ['e.jpg','Festival Urbain Togolais','30 Juil 2026 • Lomé','Un grand rendez-vous culturel mêlant musique, danse et performances urbaines au cœur de Lomé.','billeterie.php'],
        ['d.jpg','Conférence Tech Afrique','5 Août 2026 • Lomé','Échangez avec les leaders de l\'innovation africaine lors de cette conférence d\'envergure internationale.','billeterie.php'],
        ['b.jpg','Soirée Gastronomique','10 Août 2026 • Kpalimé','Une soirée unique dédiée aux saveurs du Togo avec les meilleurs chefs de la région.','billeterie.php'],
      ];
      foreach ($upcoming as $ev):
      ?>
      <div class="event-list-item">
        <img src="assets/images/<?= $ev[0] ?>" alt="<?= htmlspecialchars($ev[1]) ?>">
        <div>
          <h4 class="fw-bold mb-1"><?= htmlspecialchars($ev[1]) ?></h4>
          <div class="event-meta"><i class="bi bi-calendar-event me-1"></i><?= $ev[2] ?></div>
          <p class="event-desc mb-0"><?= htmlspecialchars($ev[3]) ?></p>
        </div>
        <a href="<?= $ev[4] ?>" class="btn btn-danger px-4">Réserver</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== CARROUSEL "À NE PAS MANQUER" ==================== -->
<section class="carousel-section py-5">
  <div class="container">
    <div class="section-title text-center mb-4">
      <h2>À ne pas manquer</h2>
      <p>Les événements qui font le buzz en ce moment</p>
    </div>

    <div class="event-marquee">
      <div class="event-track" id="eventTrack">
        <?php
        $buzzEvents = [
          ['z.jpg','Concert Night Life','25 Juil','4 000'],
          ['a.jpg','Soirée Afrobeat','28 Juil','6 000'],
          ['c.jpg','Festival Roots','1 Août','3 500'],
          ['d.jpg','Jazz au Bord de Mer','3 Août','7 500'],
          ['e.jpg','Nuit des Étoiles','8 Août','5 000'],
          ['b.jpg','Carnaval de Lomé','12 Août','2 000'],
          ['z.jpg','Club VIP Night','15 Août','10 000'],
          ['a.jpg','Show Comique','18 Août','3 000'],
          ['c.jpg','Gala de Danse','22 Août','4 500'],
          ['d.jpg','Battle de DJs','25 Août','5 500'],
        ];
        foreach ($buzzEvents as $bz):
        ?>
        <div class="event-card-compact">
          <img src="assets/images/<?= $bz[0] ?>" alt="<?= $bz[1] ?>">
          <div class="body">
            <h6 class="mb-1 fw-semibold"><?= $bz[1] ?></h6>
            <div class="meta"><i class="bi bi-calendar3 me-1"></i><?= $bz[2] ?> 2026</div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <span class="fw-bold text-danger" style="font-size:14px"><?= $bz[3] ?> FCFA</span>
              <a href="billeterie.php" class="btn btn-outline-danger btn-sm">Voir</a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ==================== TÉMOIGNAGES + CTA ==================== -->
<section class="testimonial-section">
  <div class="container">
    <div class="row g-4 align-items-stretch">

      <div class="col-lg-5">
        <div class="quote-card">
          <div class="d-flex align-items-center gap-2 mb-3">
            <?php for ($s=0;$s<5;$s++): ?><i class="bi bi-star-fill text-warning"></i><?php endfor; ?>
          </div>
          <h5 class="text-white">Ils nous font confiance</h5>
          <p class="mt-2">"Une plateforme simple, rapide et très classe. Les tickets sont clairs et l'expérience client est premium. Je l'utilise à chaque événement !"</p>
          <div class="d-flex align-items-center gap-3 mt-4">
            <img src="assets/images/a.jpg" alt="Kofi A." class="rounded-circle" style="width:50px;height:50px;object-fit:cover;border:2px solid #ff7300">
            <div>
              <strong>Kofi Atsou</strong>
              <div class="small" style="color:rgba(255,255,255,0.55)">Organisateur d'événements · Lomé</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="cta">
          <div>
            <h3 class="fw-bold mb-2">Prêt à vivre votre prochain événement ?</h3>
            <p class="mb-0" style="color:rgba(255,255,255,0.6)">Rejoignez notre communauté et recevez les meilleures offres avant tout le monde.</p>
          </div>
          <div class="cta-buttons">
            <a href="inscription.php" class="btn btn-danger btn-lg px-4">
              <i class="bi bi-person-plus me-2"></i>Créer un compte
            </a>
            <a href="partenaires.php" class="btn btn-outline-light btn-lg px-4">Devenir partenaire</a>
          </div>
          <div class="d-flex gap-4 mt-2" style="color:rgba(255,255,255,0.5);font-size:13px">
            <span><i class="bi bi-check-circle-fill text-success me-1"></i>Paiement sécurisé</span>
            <span><i class="bi bi-check-circle-fill text-success me-1"></i>Ticket QR code</span>
            <span><i class="bi bi-check-circle-fill text-success me-1"></i>Assistance 24/7</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
(function () {
  const track = document.getElementById('eventTrack');
  if (!track) return;
  const cards = Array.from(track.querySelectorAll('.event-card-compact'));

  function updateCenter() {
    const center = track.scrollLeft + track.offsetWidth / 2;
    cards.forEach(c => {
      c.classList.toggle('is-center', Math.abs(center - c.offsetLeft - c.offsetWidth / 2) < c.offsetWidth / 2);
    });
  }

  let timer;
  function startScroll() {
    timer = setInterval(function () {
      track.scrollLeft += 1.5;
      if (track.scrollLeft + track.offsetWidth >= track.scrollWidth - 2) track.scrollLeft = 0;
      updateCenter();
    }, 16);
  }
  function stopScroll() { clearInterval(timer); }

  track.addEventListener('mouseenter', stopScroll);
  track.addEventListener('mouseleave', startScroll);
  track.addEventListener('touchstart', stopScroll, { passive: true });
  track.addEventListener('touchend', startScroll, { passive: true });
  track.addEventListener('scroll', updateCenter, { passive: true });

  updateCenter();
  startScroll();
})();
</script>

</body>
</html>
