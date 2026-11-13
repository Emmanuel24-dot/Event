<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar GbinGbanCe</title>

<!-- BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
/* ================= NAVBAR ================= */
.navbar {
  transition: all 0.4s ease;
  padding: 20px 0;
  background: transparent;
}

.navbar.scrolled {
  background: rgba(255, 115, 0, 0.3);
  backdrop-filter: blur(8px);
  box-shadow: 0 4px 20px rgba(0,0,0,0.15);
  padding: 12px 0;
}

.logo-text {
  font-family: 'Dancing Script', cursive;
  font-size: 38px;
  font-weight: bold;
  color: #fff;
  transition: color 0.3s;
}

.navbar.scrolled .logo-text {
  color: #fff;
}

.nav-link {
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  font-size: 15px;
  letter-spacing: 0.8px;
  text-transform: uppercase;
  color: #fff !important;
  margin: 0 12px;
  position: relative;
  transition: all 0.3s ease;
}

.nav-link:hover,
.nav-link.active {
  color: #ff0000 !important;
}

/* Soulignement animé pour actif et hover */
.nav-link::after {
  content: "";
  position: absolute;
  width: 0%;
  height: 2px;
  background-color: #ff3b3b;
  left: 0;
  bottom: -5px;
  transition: width 0.3s ease;
}

.nav-link:hover::after,
.nav-link.active::after {
  width: 100%;
}

/* Dropdown menu style */
.dropdown-custom {
  border-radius: 10px;
  padding: 10px 0;
  border: none;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

/* Dropdown items */
.dropdown-item-custom {
  font-family: 'Poppins', sans-serif;
  transition: all 0.3s ease;
}

.dropdown-item-custom:hover {
  background-color: #ff3b3b;
  color: #fff;
  transform: translateX(5px) scale(1.05);
}

/* Supprimer flèche du dropdown */
.navbar .dropdown-toggle::after {
  display: none !important;
}

/* Supprimer tout style parasite */
.navbar .dropdown-menu {
  list-style: none;
}

/* Responsive */
@media (max-width: 992px) {
  .nav-link::after {
    display: none;
  }
}
/* ================= MOBILE NAV ================= */
@media (max-width: 991px) {

  .navbar {
    padding: 12px 0;
  }

  .mobile-nav {
    background: rgba(0,0,0,0.92);
    backdrop-filter: blur(10px);
    border-radius: 18px;
    margin-top: 15px;
    padding: 25px 0;
  }

  .navbar-nav .nav-item {
    margin: 12px 0;
  }

  .nav-link {
    font-size: 18px;
    padding: 12px 0;
  }

  .dropdown-menu {
    background: transparent;
    border: none;
    box-shadow: none;
    text-align: center;
  }

  .dropdown-item-custom {
    color: #fff;
    padding: 12px;
  }

  .dropdown-item-custom:hover {
    background: #ff3b3b;
  }
}
.nav-link:hover {
  color: #ff3b3b !important;
}

.dropdown-menu .dropdown-item:hover {
  background-color: #ff3b3b;
  color: #fff;
}
/* ===== DROPDOWN HOVER DESKTOP SEULEMENT ===== */
@media (min-width: 992px) {
  .navbar .dropdown:hover > .dropdown-menu {
    display: block;
    margin-top: 0;
    opacity: 1;
    visibility: visible;
  }

  .navbar .dropdown-menu {
    display: block;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.25s ease, transform 0.25s ease;
    transform: translateY(10px);
  }

  .navbar .dropdown:hover .dropdown-menu {
    transform: translateY(0);
  }
}

</style>
</head>

<body>
<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="./index.php">
      <span class="logo-text">GbinGbanCe</span>
    </a>

    <!-- TOGGLER MOBILE -->
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileNav">
      <i class="bi bi-list text-white fs-1"></i>
    </button>

    <!-- DESKTOP NAV -->
    <div class="collapse navbar-collapse d-none d-lg-flex">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='index.php'?'active':'' ?>" href="./index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='events.php'?'active':'' ?>" href="./events.php">Événements</a></li>
        <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='billeterie.php'?'active':'' ?>" href="./billeterie.php">Billetterie</a></li>
        <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='galerie.php'?'active':'' ?>" href="./galerie.php">Galerie</a></li>
        <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='partenaires.php'?'active':'' ?>" href="./partenaires.php">Partenaires</a></li>
        <li class="nav-item"><a class="nav-link <?= basename($_SERVER['PHP_SELF'])=='contact.php'?'active':'' ?>" href="./contact.php">Contact</a></li>
      </ul>

      <div class="ms-4 dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-person-circle fs-5"></i> Mon compte
        </a>

        <ul class="dropdown-menu dropdown-menu-end dropdown-custom">
          <li><a class="dropdown-item dropdown-item-custom" href="./connexion.php">Connexion</a></li>
          <li><a class="dropdown-item dropdown-item-custom" href="./inscription.php">Inscription</a></li>
          <li>
            <a class="dropdown-item dropdown-item-custom d-flex justify-content-between align-items-center" href="./mes-tickets.php">
              Mes tickets
              <span class="badge bg-danger rounded-pill">3</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>
<div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="mobileNav">
  <div class="offcanvas-header">
    <h5 class="logo-text">GbinGbanCe</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">
    <ul class="navbar-nav gap-3">
      <li><a class="nav-link text-white" href="./index.php">Accueil</a></li>
      <li><a class="nav-link text-white" href="./events.php">Événements</a></li>
      <li><a class="nav-link text-white" href="./billeterie.php">Billetterie</a></li>
      <li><a class="nav-link text-white" href="./galerie.php">Galerie</a></li>
      <li><a class="nav-link text-white" href="./partenaires.php">Partenaires</a></li>
      <li><a class="nav-link text-white" href="./contact.php">Contact</a></li>

      <hr class="border-secondary">

      <li><a class="nav-link text-white" href="#"><i class="bi bi-box-arrow-in-right"></i> Connexion</a></li>
      <li><a class="nav-link text-white" href="#"><i class="bi bi-person-plus"></i> Inscription</a></li>
      <li>
        <a class="nav-link text-white d-flex justify-content-between" href="#">
          Mes tickets <span class="badge bg-danger">3</span>
        </a>
      </li>
    </ul>
  </div>
</div>


<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Navbar scroll -->
<script>
  window.addEventListener("scroll", () => {
    document.querySelector(".navbar").classList.toggle("scrolled", window.scrollY > 50);
  });
</script>
</body>
</html>
