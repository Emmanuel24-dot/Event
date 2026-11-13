<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Contact | GbinGbanCe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
    }

    /* ================= NAVBAR ================= */
    .navbar.scrolled {
      background: rgba(255,115,0,0.9);
      backdrop-filter: blur(8px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      padding: 12px 0;
    }

    .dropdown-toggle::after {
      display: none !important;
    }

    /* ================= HERO ================= */
    .contact-hero {
      height: 80vh;
      background: url("assets/images/e.jpg") center/cover no-repeat;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
    }

    .contact-hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0,0,0,0.6);
    }

    .contact-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
    }

    .contact-hero h1 {
      font-size: 3rem;
    }

    /* ================= CONTACT FORM ================= */
    .contact-section {
      padding: 60px 0;
    }

    .contact-form {
      background: #fff;
      padding: 40px;
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .contact-form .form-control {
      border-radius: 10px;
      margin-bottom: 20px;
      padding: 15px;
    }

    .contact-form button {
      border-radius: 50px;
      padding: 12px 30px;
    }

    /* ================= INFO ================= */
    .contact-info {
      background: #fff;
      padding: 40px;
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .contact-info h5 {
      margin-bottom: 20px;
      font-weight: 600;
    }

    .contact-info p {
      margin-bottom: 12px;
      font-size: 15px;
      color: #555;
    }

    /* ================= MAP ================= */
    .contact-map iframe {
      width: 100%;
      height: 300px;
      border-radius: 18px;
      border: 0;
    }

    /* ================= FOOTER ================= */
    footer {
      background: #111;
      color: #bbb;
      padding: 60px 0 20px;
    }

    footer h5 {
      color: #fff;
      margin-bottom: 20px;
    }

    footer a {
      color: #bbb;
      text-decoration: none;
      display: block;
      margin-bottom: 8px;
    }

    footer a:hover {
      color: #ff7300;
    }
  </style>
</head>
<body>

<?php include 'includes/nav.php'; ?>

<!-- HERO -->
<section class="contact-hero">
  <div class="contact-hero-content">
    <h1>Contactez-nous</h1>
    <p>Nous sommes là pour répondre à toutes vos questions</p>
  </div>
</section>

<!-- CONTACT SECTION -->
<section class="contact-section">
  <div class="container">
    <div class="row g-4">

      <!-- FORMULAIRE -->
      <div class="col-lg-6">
        <div class="contact-form">
          <h4>Envoyez-nous un message</h4>

          <?php if (!empty($_SESSION['contact_success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check-circle-fill me-2"></i><?= htmlspecialchars($_SESSION['contact_success']) ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['contact_success']); ?>
          <?php endif; ?>

          <?php if (!empty($_SESSION['contact_errors'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php foreach ($_SESSION['contact_errors'] as $err): ?>
                <div><?= htmlspecialchars($err) ?></div>
              <?php endforeach; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php unset($_SESSION['contact_errors']); ?>
          <?php endif; ?>

          <?php
          $old = isset($_SESSION['contact_old']) ? $_SESSION['contact_old'] : array();
          unset($_SESSION['contact_old']);
          $old_nom     = isset($old['nom'])     ? $old['nom']     : '';
          $old_email   = isset($old['email'])   ? $old['email']   : '';
          $old_sujet   = isset($old['sujet'])   ? $old['sujet']   : '';
          $old_message = isset($old['message']) ? $old['message'] : '';
          ?>
          <form action="contact_process.php" method="POST" novalidate>
            <input type="text" name="name" class="form-control" placeholder="Nom complet"
                   value="<?= htmlspecialchars($old_nom) ?>" required>
            <input type="email" name="email" class="form-control" placeholder="Adresse email"
                   value="<?= htmlspecialchars($old_email) ?>" required>
            <input type="text" name="subject" class="form-control" placeholder="Sujet"
                   value="<?= htmlspecialchars($old_sujet) ?>" required>
            <textarea name="message" class="form-control" placeholder="Votre message" rows="6" required><?= htmlspecialchars($old_message) ?></textarea>
            <button type="submit" class="btn btn-warning text-white px-4">
              <i class="bi bi-send me-2"></i>Envoyer le message
            </button>
          </form>
        </div>
      </div>

      <!-- INFO + MAP -->
      <div class="col-lg-6">
        <div class="contact-info mb-4">
          <h5>Informations</h5>
          <p><i class="bi bi-geo-alt-fill"></i> 13 BP 474, Lomé, Togo</p>
          <p><i class="bi bi-telephone-fill"></i> +228 90 00 00 00</p>
          <p><i class="bi bi-envelope-fill"></i> contact@exemple.com</p>
        </div>

        <div class="contact-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.547731215486!2d1.216691315361846!3d6.131056295619512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1021a0da7db27a0b%3A0x1e36c8e4a9f3e1f8!2sLom%C3%A9%2C%20Togo!5e0!3m2!1sfr!2s!4v1700000000000!5m2!1sfr!2s" allowfullscreen="" loading="lazy"></iframe>
        </div>
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
