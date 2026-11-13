<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Accueil | GbinGbanCe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Urbanist:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --ink: #0f172a;
      --slate: #475569;
      --pearl: #f6f2ee;
      --sun: #ff7a2f;
      --sun-2: #ffb266;
      --night: #101827;
      --line: rgba(15, 23, 42, 0.08);
    }

    body {
      font-family: "Urbanist", sans-serif;
      background:
        radial-gradient(1100px 520px at 10% 10%, rgba(255,122,47,0.2), transparent 60%),
        radial-gradient(900px 520px at 90% 85%, rgba(16,24,39,0.16), transparent 60%),
        #f7f4ef;
      color: var(--ink);
    }

    .section {
      padding: 80px 0;
    }

    .section-title h2 {
      font-family: "Libre Baskerville", serif;
      font-size: 2.1rem;
      margin-bottom: 12px;
    }

    .section-title p {
      color: var(--slate);
      max-width: 700px;
      margin: 0 auto;
    }

    .hero {
      position: relative;
      padding: 140px 0 90px;
    }

    .hero-card {
      background: #fff;
      border-radius: 26px;
      box-shadow: 0 30px 80px rgba(15,23,42,0.14);
      padding: 48px;
      border: 1px solid rgba(255,255,255,0.9);
    }

    .hero-eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 14px;
      border-radius: 999px;
      background: rgba(255,122,47,0.12);
      color: #a84c1b;
      font-size: 12px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      font-weight: 700;
    }

    .hero h1 {
      font-family: "Libre Baskerville", serif;
      font-size: 3rem;
      line-height: 1.1;
      margin: 18px 0 14px;
    }

    .hero p {
      color: var(--slate);
      font-size: 1.05rem;
      margin-bottom: 24px;
    }

    .hero-visual {
      border-radius: 24px;
      overflow: hidden;
      position: relative;
      height: 100%;
      min-height: 320px;
      box-shadow: 0 24px 60px rgba(15,23,42,0.2);
    }

    .hero-visual img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .hero-visual .tag {
      position: absolute;
      bottom: 18px;
      left: 18px;
      background: rgba(16,24,39,0.85);
      color: #fff;
      padding: 10px 14px;
      border-radius: 12px;
      font-size: 13px;
    }

    .btn-main {
      background: linear-gradient(120deg, var(--sun), var(--sun-2));
      border: none;
      color: #fff;
      border-radius: 12px;
      padding: 12px 18px;
      font-weight: 600;
      box-shadow: 0 16px 34px rgba(255,122,47,0.25);
    }

    .btn-ghost {
      border-radius: 12px;
      border: 1px solid var(--line);
      padding: 12px 18px;
      font-weight: 600;
      background: #fff;
    }

    .stat-row {
      display: flex;
      gap: 18px;
      flex-wrap: wrap;
      margin-top: 28px;
    }

    .stat-pill {
      background: #fff;
      border-radius: 16px;
      padding: 12px 16px;
      border: 1px solid rgba(255,255,255,0.8);
      box-shadow: 0 16px 34px rgba(15,23,42,0.08);
      font-weight: 600;
      color: #1f2937;
    }

    .event-card {
      background: #fff;
      border-radius: 20px;
      overflow: hidden;
      border: 1px solid rgba(255,255,255,0.8);
      box-shadow: 0 20px 50px rgba(15,23,42,0.12);
      height: 100%;
      transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .event-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 28px 60px rgba(15,23,42,0.16);
    }

    .event-thumb {
      height: 180px;
      overflow: hidden;
    }

    .event-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .event-body {
      padding: 18px 20px 20px;
    }

    .event-meta {
      color: var(--slate);
      font-size: 14px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .category-card {
      background: rgba(255,255,255,0.9);
      border-radius: 18px;
      padding: 18px;
      border: 1px solid rgba(255,255,255,0.8);
      display: flex;
      gap: 14px;
      align-items: center;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .category-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 18px 40px rgba(15,23,42,0.1);
    }

    .category-icon {
      width: 52px;
      height: 52px;
      border-radius: 14px;
      display: grid;
      place-items: center;
      background: rgba(255,122,47,0.15);
      color: #a84c1b;
      font-size: 20px;
    }

    .schedule-card {
      background: #fff;
      border-radius: 20px;
      padding: 20px;
      border: 1px solid rgba(255,255,255,0.8);
      display: grid;
      grid-template-columns: 90px 1fr auto;
      gap: 20px;
      align-items: center;
      box-shadow: 0 16px 40px rgba(15,23,42,0.1);
    }

    .schedule-date {
      border-radius: 16px;
      background: #101827;
      color: #fff;
      text-align: center;
      padding: 14px 10px;
      font-weight: 700;
      line-height: 1.1;
    }

    .schedule-date span {
      display: block;
      font-size: 12px;
      color: rgba(255,255,255,0.7);
      letter-spacing: 1px;
    }

    .quote-card {
      background: #101827;
      color: #fff;
      border-radius: 24px;
      padding: 28px;
      box-shadow: 0 24px 50px rgba(15,23,42,0.25);
    }

    .quote-card p {
      color: rgba(255,255,255,0.78);
    }

    .cta {
      background: linear-gradient(130deg, #101827, #1f2937);
      color: #fff;
      border-radius: 26px;
      padding: 40px;
      display: grid;
      gap: 18px;
      align-items: center;
    }

    @media (max-width: 992px) {
      .hero { padding-top: 120px; }
      .schedule-card { grid-template-columns: 1fr; text-align: center; }
    }
  </style>
</head>

<body>
<?php include 'includes/nav.php'; ?>

<!-- SECTION 1: HERO -->
<section class="hero">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-6">
        <div class="hero-card">
          <span class="hero-eyebrow"><i class="bi bi-stars"></i> Plateforme &eacute;v&eacute;nementielle</span>
          <h1>Cr&eacute;ez des souvenirs, vivez des &eacute;v&eacute;nements qui marquent.</h1>
          <p>Explorez les concerts, festivals et conf&eacute;rences les plus demand&eacute;s. R&eacute;servez vos places et suivez vos tickets en temps r&eacute;el.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="events.php" class="btn btn-main">Voir les &eacute;v&eacute;nements</a>
            <a href="billeterie.php" class="btn btn-ghost">Acheter un ticket</a>
          </div>
          <div class="stat-row">
            <div class="stat-pill">120+ &eacute;v&eacute;nements</div>
            <div class="stat-pill">40 villes actives</div>
            <div class="stat-pill">Support 7j/7</div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="hero-visual">
          <img src="assets/images/b.jpg" alt="Soir&eacute;e live">
          <div class="tag"><i class="bi bi-geo-alt"></i> Lom&eacute; &bull; Ce week-end</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 2: &Eacute;V&Eacute;NEMENTS POPULAIRES -->
<section class="section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>&Eacute;v&eacute;nements populaires</h2>
      <p>Une s&eacute;lection premium des sorties qui font le plus parler d&rsquo;elles.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <div class="event-card">
          <div class="event-thumb"><img src="assets/images/c.jpg" alt="Concert Live"></div>
          <div class="event-body">
            <h5>Concert Live Night</h5>
            <div class="event-meta">
              <span><i class="bi bi-calendar3"></i> 25 AVR</span>
              <span><i class="bi bi-geo-alt"></i> Lom&eacute;</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <strong>5 000 FCFA</strong>
              <a href="event-details.php" class="btn btn-sm btn-main">R&eacute;server</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="event-card">
          <div class="event-thumb"><img src="assets/images/e.jpg" alt="Festival"></div>
          <div class="event-body">
            <h5>Festival Urbain</h5>
            <div class="event-meta">
              <span><i class="bi bi-calendar3"></i> 30 AVR</span>
              <span><i class="bi bi-geo-alt"></i> Kara</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <strong>8 000 FCFA</strong>
              <a href="event-details.php" class="btn btn-sm btn-main">R&eacute;server</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="event-card">
          <div class="event-thumb"><img src="assets/images/a.jpg" alt="Conference"></div>
          <div class="event-body">
            <h5>Business &amp; Tech</h5>
            <div class="event-meta">
              <span><i class="bi bi-calendar3"></i> 12 MAI</span>
              <span><i class="bi bi-geo-alt"></i> Lom&eacute;</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
              <strong>12 000 FCFA</strong>
              <a href="event-details.php" class="btn btn-sm btn-main">R&eacute;server</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 3: CAT&Eacute;GORIES -->
<section class="section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Cat&eacute;gories &agrave; d&eacute;couvrir</h2>
      <p>Choisissez l&rsquo;ambiance qui vous ressemble et trouvez rapidement votre prochain &eacute;v&eacute;nement.</p>
    </div>
    <div class="row g-3">
      <div class="col-md-6 col-lg-4">
        <div class="category-card">
          <div class="category-icon"><i class="bi bi-music-note-beamed"></i></div>
          <div>
            <h6 class="mb-1">Concerts live</h6>
            <p class="mb-0 text-muted">Artistes locaux &amp; internationaux.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="category-card">
          <div class="category-icon"><i class="bi bi-emoji-laughing"></i></div>
          <div>
            <h6 class="mb-1">Soir&eacute;es &amp; clubs</h6>
            <p class="mb-0 text-muted">Ambiance nocturne premium.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="category-card">
          <div class="category-icon"><i class="bi bi-briefcase"></i></div>
          <div>
            <h6 class="mb-1">Conf&eacute;rences</h6>
            <p class="mb-0 text-muted">Business, tech et inspiration.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="category-card">
          <div class="category-icon"><i class="bi bi-people"></i></div>
          <div>
            <h6 class="mb-1">Networking</h6>
            <p class="mb-0 text-muted">Rencontrez votre futur partenaire.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="category-card">
          <div class="category-icon"><i class="bi bi-palette"></i></div>
          <div>
            <h6 class="mb-1">Culture &amp; arts</h6>
            <p class="mb-0 text-muted">Expos, th&eacute;&acirc;tre et performances.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4">
        <div class="category-card">
          <div class="category-icon"><i class="bi bi-cup-hot"></i></div>
          <div>
            <h6 class="mb-1">Gastronomie</h6>
            <p class="mb-0 text-muted">Saveurs locales et exp&eacute;riences.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 4: PROCHAINS &Eacute;V&Eacute;NEMENTS -->
<section class="section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Prochains &eacute;v&eacute;nements</h2>
      <p>Planifiez vos sorties avec une vue claire des &eacute;v&eacute;nements &agrave; venir.</p>
    </div>
    <div class="d-grid gap-3">
      <div class="schedule-card">
        <div class="schedule-date">25<span>AVR</span></div>
        <div>
          <h6 class="mb-1">Gala &amp; Awards Night</h6>
          <p class="mb-0 text-muted">H&ocirc;tel 2 F&eacute;vrier &bull; Lom&eacute;</p>
        </div>
        <a href="event-details.php" class="btn btn-main">R&eacute;server</a>
      </div>
      <div class="schedule-card">
        <div class="schedule-date">30<span>AVR</span></div>
        <div>
          <h6 class="mb-1">Festival Urbain</h6>
          <p class="mb-0 text-muted">Stade Municipal &bull; Kara</p>
        </div>
        <a href="event-details.php" class="btn btn-main">R&eacute;server</a>
      </div>
      <div class="schedule-card">
        <div class="schedule-date">12<span>MAI</span></div>
        <div>
          <h6 class="mb-1">Conf&eacute;rence Business &amp; Tech</h6>
          <p class="mb-0 text-muted">Centre de conf&eacute;rences &bull; Lom&eacute;</p>
        </div>
        <a href="event-details.php" class="btn btn-main">R&eacute;server</a>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 5: AVIS + CTA -->
<section class="section">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      <div class="col-lg-5">
        <div class="quote-card h-100">
          <h4>Ils nous font confiance</h4>
          <p>“Une plateforme simple, rapide et tr&egrave;s classe. Les tickets sont clairs et l&rsquo;exp&eacute;rience client est premium.”</p>
          <div class="d-flex align-items-center gap-3 mt-3">
            <img src="assets/images/a.jpg" alt="Client" class="rounded-circle" style="width:54px;height:54px;object-fit:cover;">
            <div>
              <strong>Alima K.</strong>
              <div class="text-white-50 small">Organisatrice d&rsquo;&eacute;v&eacute;nements</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="cta h-100">
          <h3 class="mb-1">Pr&ecirc;t &agrave; vivre votre prochain &eacute;v&eacute;nement ?</h3>
          <p class="text-white-50 mb-0">Rejoignez la communaut&eacute; et recevez les meilleures offres avant tout le monde.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="inscription.php" class="btn btn-main">Cr&eacute;er un compte</a>
            <a href="partenaires.php" class="btn btn-ghost">Devenir partenaire</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  window.addEventListener("scroll", () => {
    const navbar = document.querySelector(".navbar");
    if (navbar) {
      navbar.classList.toggle("scrolled", window.scrollY > 50);
    }
  });
</script>
</body>
</html>
