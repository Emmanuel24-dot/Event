<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Mes tickets | GbinGbanCe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Marcellus&display=swap" rel="stylesheet">

  <style>
    :root {
      --ink: #0f172a;
      --slate: #475569;
      --sand: #f7f3ef;
      --sun: #ff7a2f;
      --sun-2: #ffb266;
      --night: #101827;
      --line: rgba(15, 23, 42, 0.08);
    }

    body {
      font-family: "Outfit", sans-serif;
      background:
        radial-gradient(1000px 480px at 8% 10%, rgba(255,122,47,0.22), transparent 60%),
        radial-gradient(900px 520px at 90% 85%, rgba(16,24,39,0.18), transparent 60%),
        #f5f2ee;
      color: var(--ink);
      min-height: 100vh;
    }

    .tickets-hero {
      padding: 140px 0 60px;
      position: relative;
    }

    .tickets-hero h1 {
      font-family: "Marcellus", serif;
      font-size: 2.8rem;
      margin-bottom: 10px;
    }

    .tickets-hero p {
      color: var(--slate);
      max-width: 620px;
    }

    .filters {
      background: rgba(255,255,255,0.9);
      border: 1px solid rgba(255,255,255,0.8);
      border-radius: 20px;
      padding: 16px;
      box-shadow: 0 18px 40px rgba(15,23,42,0.08);
      backdrop-filter: blur(10px);
    }

    .ticket-card {
      background: #fff;
      border-radius: 22px;
      border: 1px solid rgba(255,255,255,0.9);
      box-shadow: 0 18px 45px rgba(15,23,42,0.1);
      overflow: hidden;
      transition: transform 0.25s ease, box-shadow 0.25s ease;
      height: 100%;
    }

    .ticket-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 28px 60px rgba(15,23,42,0.16);
    }

    .ticket-cover {
      height: 180px;
      position: relative;
      overflow: hidden;
    }

    .ticket-cover img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .badge-status {
      position: absolute;
      top: 16px;
      left: 16px;
      background: rgba(17, 24, 39, 0.85);
      color: #fff;
      padding: 6px 12px;
      border-radius: 999px;
      font-size: 12px;
      letter-spacing: 0.4px;
      text-transform: uppercase;
    }

    .ticket-body {
      padding: 20px 22px 22px;
    }

    .ticket-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 6px;
    }

    .ticket-meta {
      color: var(--slate);
      font-size: 14px;
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
    }

    .ticket-meta i {
      color: var(--sun);
    }

    .ticket-actions {
      margin-top: 18px;
      display: flex;
      gap: 12px;
      flex-wrap: wrap;
    }

    .btn-soft {
      border-radius: 12px;
      padding: 10px 14px;
      border: 1px solid var(--line);
      background: #fff;
      color: var(--ink);
      font-weight: 600;
      transition: transform 0.2s ease, border 0.2s ease;
    }

    .btn-soft:hover {
      transform: translateY(-2px);
      border-color: rgba(255,122,47,0.4);
    }

    .btn-main {
      border-radius: 12px;
      padding: 10px 16px;
      background: linear-gradient(120deg, var(--sun), var(--sun-2));
      border: none;
      color: #fff;
      font-weight: 600;
      box-shadow: 0 14px 28px rgba(255,122,47,0.25);
    }

    .ticket-qr {
      background: #f8fafc;
      border-radius: 16px;
      padding: 12px;
      display: grid;
      place-items: center;
      border: 1px dashed rgba(15,23,42,0.12);
    }

    .ticket-qr img {
      width: 90px;
      height: 90px;
      object-fit: cover;
    }

    .summary-card {
      background: linear-gradient(135deg, #101827, #1f2937);
      color: #fff;
      border-radius: 22px;
      padding: 24px;
      height: 100%;
      box-shadow: 0 24px 50px rgba(15,23,42,0.2);
    }

    .summary-card h4 {
      font-family: "Marcellus", serif;
      margin-bottom: 14px;
    }

    .summary-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0;
      border-bottom: 1px solid rgba(255,255,255,0.08);
      font-size: 14px;
    }

    .summary-item:last-child {
      border-bottom: none;
    }

    .summary-item span {
      color: rgba(255,255,255,0.7);
    }

    @media (max-width: 992px) {
      .tickets-hero { padding-top: 120px; }
    }
  </style>
</head>

<body>
<?php include 'includes/nav.php'; ?>

<section class="tickets-hero">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-lg-7">
        <h1>Mes tickets</h1>
        <p>Retrouvez tous vos billets, téléchargez vos QR codes et suivez vos prochains événements.</p>
      </div>
      <div class="col-lg-5">
        <div class="filters">
          <div class="row g-2">
            <div class="col-12 col-md-4">
              <select class="form-select">
                <option>Tous</option>
                <option>À venir</option>
                <option>Passés</option>
              </select>
            </div>
            <div class="col-12 col-md-4">
              <select class="form-select">
                <option>Catégorie</option>
                <option>Concert</option>
                <option>Festival</option>
                <option>Conférence</option>
              </select>
            </div>
            <div class="col-12 col-md-4">
              <button class="btn btn-main w-100">Filtrer</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="pb-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="summary-card">
          <h4>Votre activité</h4>
          <div class="summary-item">
            <span>Tickets actifs</span>
            <strong>3</strong>
          </div>
          <div class="summary-item">
            <span>Événements à venir</span>
            <strong>2</strong>
          </div>
          <div class="summary-item">
            <span>Dernier achat</span>
            <strong>28 Jan</strong>
          </div>
          <div class="summary-item">
            <span>Ville favorite</span>
            <strong>Lomé</strong>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="row g-4">
          <div class="col-md-6">
            <div class="ticket-card">
              <div class="ticket-cover">
                <img src="assets/images/c.jpg" alt="Concert Live">
                <span class="badge-status">À venir</span>
              </div>
              <div class="ticket-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <div class="ticket-title">Concert Live Night</div>
                    <div class="ticket-meta">
                      <span><i class="bi bi-geo-alt"></i> Lomé</span>
                      <span><i class="bi bi-calendar3"></i> 25 AVR</span>
                    </div>
                  </div>
                  <div class="ticket-qr">
                    <img src="assets/images/a.jpg" alt="QR code">
                  </div>
                </div>
                <div class="ticket-actions">
                  <button class="btn btn-soft"><i class="bi bi-download"></i> Télécharger</button>
                  <button class="btn btn-main"><i class="bi bi-upc-scan"></i> Voir QR</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="ticket-card">
              <div class="ticket-cover">
                <img src="assets/images/b.jpg" alt="Festival">
                <span class="badge-status">À venir</span>
              </div>
              <div class="ticket-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <div class="ticket-title">Festival Sunset</div>
                    <div class="ticket-meta">
                      <span><i class="bi bi-geo-alt"></i> Kpalimé</span>
                      <span><i class="bi bi-calendar3"></i> 10 MAI</span>
                    </div>
                  </div>
                  <div class="ticket-qr">
                    <img src="assets/images/a.jpg" alt="QR code">
                  </div>
                </div>
                <div class="ticket-actions">
                  <button class="btn btn-soft"><i class="bi bi-download"></i> Télécharger</button>
                  <button class="btn btn-main"><i class="bi bi-upc-scan"></i> Voir QR</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="ticket-card">
              <div class="ticket-cover">
                <img src="assets/images/e.jpg" alt="Conférence">
                <span class="badge-status">Passé</span>
              </div>
              <div class="ticket-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <div class="ticket-title">Conférence Business</div>
                    <div class="ticket-meta">
                      <span><i class="bi bi-geo-alt"></i> Lomé</span>
                      <span><i class="bi bi-calendar3"></i> 18 JAN</span>
                    </div>
                  </div>
                  <div class="ticket-qr">
                    <img src="assets/images/a.jpg" alt="QR code">
                  </div>
                </div>
                <div class="ticket-actions">
                  <button class="btn btn-soft"><i class="bi bi-receipt"></i> Reçu</button>
                  <button class="btn btn-main"><i class="bi bi-chat-left-text"></i> Avis</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="ticket-card">
              <div class="ticket-cover">
                <img src="assets/images/a.jpg" alt="Soirée VIP">
                <span class="badge-status">À venir</span>
              </div>
              <div class="ticket-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <div class="ticket-title">Soirée VIP Club</div>
                    <div class="ticket-meta">
                      <span><i class="bi bi-geo-alt"></i> Lomé</span>
                      <span><i class="bi bi-calendar3"></i> 02 JUIN</span>
                    </div>
                  </div>
                  <div class="ticket-qr">
                    <img src="assets/images/a.jpg" alt="QR code">
                  </div>
                </div>
                <div class="ticket-actions">
                  <button class="btn btn-soft"><i class="bi bi-download"></i> Télécharger</button>
                  <button class="btn btn-main"><i class="bi bi-upc-scan"></i> Voir QR</button>
                </div>
              </div>
            </div>
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
