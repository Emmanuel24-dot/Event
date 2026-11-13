<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion | GbinGbanCe</title>
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
    }

    body {
      font-family: 'Poppins', sans-serif;
      background:
        radial-gradient(700px 350px at 20% 10%, rgba(255,115,0,0.25), transparent 60%),
        radial-gradient(800px 450px at 90% 85%, rgba(255,59,59,0.25), transparent 60%),
        #f6f7fb;
      min-height: 100vh;
    }

    .login-section {
      padding: 130px 0 80px;
    }

    .login-card {
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 25px 70px rgba(0,0,0,0.15);
      overflow: hidden;
    }

    .login-header {
      padding: 30px;
      border-bottom: 1px dashed rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .login-logo {
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

    .login-header h1 {
      font-family: 'Dancing Script', cursive;
      font-size: 2.3rem;
      margin: 0;
    }

    .login-header p {
      margin: 0;
      font-size: 14px;
      color: #666;
    }

    .login-body {
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

    .btn-login {
      background: linear-gradient(120deg, var(--primary), var(--secondary));
      border: none;
      border-radius: 14px;
      padding: 13px;
      font-weight: 600;
      color: #fff;
      box-shadow: 0 15px 35px rgba(255,115,0,0.4);
      transition: 0.3s;
    }

    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 20px 45px rgba(255,59,59,0.5);
    }

    .login-links a {
      color: var(--primary);
      font-weight: 600;
      text-decoration: none;
    }

    .login-links a:hover {
      text-decoration: underline;
    }

    .hint {
      background: #fff5eb;
      border-radius: 16px;
      padding: 15px;
      margin-top: 25px;
      font-size: 14px;
    }

    .hint i {
      color: var(--primary);
      margin-right: 6px;
    }
  </style>
</head>

<body>

<?php include 'includes/nav.php'; ?>

<section class="login-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-7">

        <div class="login-card">
          <div class="login-header">
            <div class="login-logo">
              <i class="bi bi-person-check"></i>
            </div>
            <div>
              <h1>Bon retour 👋</h1>
              <p>Connectez-vous pour accéder à vos tickets</p>
            </div>
          </div>

          <div class="login-body">
            <?php if (!empty($_SESSION['login_errors'])): ?>
              <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <?php foreach ($_SESSION['login_errors'] as $err): ?>
                  <div><?= htmlspecialchars($err) ?></div>
                <?php endforeach; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>
              <?php unset($_SESSION['login_errors']); ?>
            <?php endif; ?>
            <form method="POST" action="login_process.php" novalidate>

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
                  <input type="password" name="password" class="form-control" placeholder="********" required>
                </div>
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="remember">
                  <label class="form-check-label" for="remember">
                    Se souvenir de moi
                  </label>
                </div>
                <a href="mot-de-passe-oublie.php" class="login-links">Mot de passe oublié ?</a>
              </div>

              <button class="btn btn-login w-100">
                Se connecter
              </button>

              <p class="text-center mt-4 login-links">
                Pas encore de compte ? <a href="inscription.php">Créer un compte</a>
              </p>
            </form>

            <div class="hint">
              <i class="bi bi-lightning-charge-fill"></i>
              Accédez rapidement à vos QR codes et à l’historique de vos événements.
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
