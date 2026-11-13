<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription | GbinGbanCe</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Dancing+Script:wght@600&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #ff7300;
      --secondary: #ff3b3b;
      --dark: #111;
      --light: #f8f9fa;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background:
        radial-gradient(800px 400px at 20% 10%, rgba(255,115,0,0.25), transparent 60%),
        radial-gradient(900px 520px at 90% 85%, rgba(255,59,59,0.25), transparent 60%),
        #f6f7fb;
      min-height: 100vh;
    }

    .signup-section {
      padding: 130px 0 80px;
    }

    .signup-card {
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 25px 70px rgba(0,0,0,0.15);
      overflow: hidden;
    }

    .signup-header {
      padding: 30px;
      border-bottom: 1px dashed rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .signup-logo {
      width: 55px;
      height: 55px;
      border-radius: 16px;
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      box-shadow: 0 10px 25px rgba(255,115,0,0.4);
    }

    .signup-header h1 {
      font-family: 'Dancing Script', cursive;
      font-size: 2.3rem;
      margin: 0;
    }

    .signup-header p {
      margin: 0;
      color: #666;
      font-size: 14px;
    }

    .signup-body {
      padding: 30px;
    }

    .form-control {
      border-radius: 14px;
      padding: 12px 14px;
      font-size: 15px;
    }

    .form-control:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 0.2rem rgba(255,115,0,0.2);
    }

    .input-group-text {
      border-radius: 14px;
      background: #fff;
    }

    .btn-signup {
      background: linear-gradient(120deg, var(--primary), var(--secondary));
      border: none;
      border-radius: 14px;
      padding: 13px;
      font-weight: 600;
      color: #fff;
      box-shadow: 0 15px 35px rgba(255,115,0,0.4);
      transition: 0.3s;
    }

    .btn-signup:hover {
      transform: translateY(-2px);
      box-shadow: 0 20px 45px rgba(255,59,59,0.5);
    }

    .benefits {
      background: #fff5eb;
      border-radius: 18px;
      padding: 18px;
      margin-top: 25px;
    }

    .benefits span {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
      margin-bottom: 8px;
    }

    .benefits i {
      color: var(--primary);
    }

    .signup-links a {
      color: var(--primary);
      font-weight: 600;
      text-decoration: none;
    }

    .signup-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

<?php include 'includes/nav.php'; ?>

<section class="signup-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">

        <div class="signup-card">
          <div class="signup-header">
            <div class="signup-logo">
              <i class="bi bi-ticket-perforated"></i>
            </div>
            <div>
              <h1>GbinGbanCe</h1>
              <p>Créez votre compte et achetez vos tickets en 1 clic</p>
            </div>
          </div>

          <div class="signup-body">
            <form method="POST" action="inscription_process.php">
              <div class="mb-3">
                <label class="form-label">Nom complet</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-person"></i></span>
                  <input type="text" name="nom" class="form-control" placeholder="Nom & Prénom" required>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label">Mot de passe</label>
                <div class="input-group">
                  <span class="input-group-text"><i class="bi bi-lock"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Minimum 8 caractères" required minlength="8">
                </div>
              </div>

              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="terms">
                <label class="form-check-label" for="terms">
                  J'accepte les conditions d'utilisation
                </label>
              </div>

              <button class="btn btn-signup w-100">
                Créer mon compte
              </button>

              <p class="text-center mt-4 signup-links">
                Déjà inscrit ? <a href="connexion.php">Se connecter</a>
              </p>
            </form>

            <div class="benefits">
              <span><i class="bi bi-star-fill"></i> Paiement rapide des tickets</span>
              <span><i class="bi bi-star-fill"></i> Accès à vos QR codes</span>
              <span><i class="bi bi-star-fill"></i> Historique de vos événements</span>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
