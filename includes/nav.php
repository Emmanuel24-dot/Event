<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
/* ===== NAVBAR ===== */
.navbar {
  transition: all 0.4s ease;
  padding: 18px 0;
  background: transparent;
  z-index: 1050;
}
.navbar.scrolled {
  background: rgba(12,12,12,0.9);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  box-shadow: 0 4px 24px rgba(0,0,0,0.2);
  padding: 10px 0;
}
.logo-text {
  font-family: 'Dancing Script', cursive;
  font-size: 2rem;
  font-weight: 700;
  color: #fff !important;
  text-decoration: none;
  line-height: 1;
}
.navbar .nav-link {
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  font-size: 13px;
  letter-spacing: 0.7px;
  text-transform: uppercase;
  color: #fff !important;
  margin: 0 4px;
  position: relative;
  padding-bottom: 4px !important;
  transition: color 0.3s ease;
}
.navbar .nav-link:hover,
.navbar .nav-link.active { color: #ff4444 !important; }
.navbar .nav-link::after {
  content: "";
  position: absolute;
  width: 0;
  height: 2px;
  background: #ff3b3b;
  left: 0;
  bottom: 0;
  transition: width 0.3s ease;
}
.navbar .nav-link:hover::after,
.navbar .nav-link.active::after { width: 100%; }
.dropdown-custom {
  border-radius: 12px;
  border: none;
  box-shadow: 0 12px 35px rgba(0,0,0,0.15);
  overflow: hidden;
  min-width: 190px;
}
.dropdown-custom .dropdown-item { padding: 10px 16px; font-size: 14px; }
.dropdown-custom .dropdown-item:hover { background: #ff3b3b; color: #fff; }
.navbar .dropdown-toggle::after { display: none !important; }
@media (min-width: 992px) {
  .navbar .dropdown:hover > .dropdown-menu { display: block; opacity: 1; visibility: visible; transform: translateY(0); }
  .navbar .dropdown-menu { display: block; opacity: 0; visibility: hidden; transform: translateY(10px); transition: opacity 0.25s, transform 0.25s; pointer-events: none; }
  .navbar .dropdown:hover .dropdown-menu { pointer-events: auto; }
}
@media (max-width: 991px) {
  .navbar { padding: 10px 0; }
  .navbar .nav-link::after { display: none; }
}
</style>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="logo-text navbar-brand" href="./index.php">GbinGbanCe</a>

    <button class="navbar-toggler border-0 p-0" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#mobileNav"
            aria-label="Ouvrir le menu" aria-controls="mobileNav">
      <i class="bi bi-list text-white" style="font-size:2rem"></i>
    </button>

    <!-- DESKTOP NAV -->
    <div class="collapse navbar-collapse d-none d-lg-flex">
      <ul class="navbar-nav mx-auto gap-1">
        <li class="nav-item"><a class="nav-link <?= $current==='index.php'?'active':'' ?>" href="./index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link <?= $current==='events.php'?'active':'' ?>" href="./events.php">Événements</a></li>
        <li class="nav-item"><a class="nav-link <?= $current==='billeterie.php'?'active':'' ?>" href="./billeterie.php">Billetterie</a></li>
        <li class="nav-item"><a class="nav-link <?= $current==='galerie.php'?'active':'' ?>" href="./galerie.php">Galerie</a></li>
        <li class="nav-item"><a class="nav-link <?= $current==='partenaires.php'?'active':'' ?>" href="./partenaires.php">Partenaires</a></li>
        <li class="nav-item"><a class="nav-link <?= $current==='contact.php'?'active':'' ?>" href="./contact.php">Contact</a></li>
      </ul>

      <div class="ms-3 dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
           data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle fs-5"></i>
          <span>Mon compte</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-custom">
          <li><a class="dropdown-item" href="./connexion.php"><i class="bi bi-box-arrow-in-right me-2 text-warning"></i>Connexion</a></li>
          <li><a class="dropdown-item" href="./inscription.php"><i class="bi bi-person-plus me-2 text-warning"></i>Inscription</a></li>
          <li><hr class="dropdown-divider my-1"></li>
          <li>
            <a class="dropdown-item d-flex justify-content-between align-items-center" href="./mes-tickets.php">
              <span><i class="bi bi-ticket me-2 text-warning"></i>Mes tickets</span>
              <span class="badge bg-danger rounded-pill">3</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- MOBILE OFFCANVAS -->
<div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="mobileNav" aria-labelledby="mobileNavLabel">
  <div class="offcanvas-header border-bottom border-secondary pb-3">
    <span class="logo-text" id="mobileNavLabel">GbinGbanCe</span>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Fermer"></button>
  </div>
  <div class="offcanvas-body pt-3">
    <ul class="list-unstyled mb-0">
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 rounded mb-1 <?= $current==='index.php'?'bg-danger fw-bold':'' ?>" href="./index.php"><i class="bi bi-house"></i> Accueil</a></li>
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 rounded mb-1 <?= $current==='events.php'?'bg-danger fw-bold':'' ?>" href="./events.php"><i class="bi bi-calendar-event"></i> Événements</a></li>
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 rounded mb-1 <?= $current==='billeterie.php'?'bg-danger fw-bold':'' ?>" href="./billeterie.php"><i class="bi bi-ticket-perforated"></i> Billetterie</a></li>
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 rounded mb-1 <?= $current==='galerie.php'?'bg-danger fw-bold':'' ?>" href="./galerie.php"><i class="bi bi-images"></i> Galerie</a></li>
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 rounded mb-1 <?= $current==='partenaires.php'?'bg-danger fw-bold':'' ?>" href="./partenaires.php"><i class="bi bi-people"></i> Partenaires</a></li>
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 rounded mb-1 <?= $current==='contact.php'?'bg-danger fw-bold':'' ?>" href="./contact.php"><i class="bi bi-envelope"></i> Contact</a></li>
    </ul>
    <hr class="border-secondary">
    <ul class="list-unstyled mb-0">
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 mb-1" href="./connexion.php"><i class="bi bi-box-arrow-in-right text-warning"></i> Connexion</a></li>
      <li><a class="d-flex align-items-center gap-2 text-white text-decoration-none py-2 px-3 mb-1" href="./inscription.php"><i class="bi bi-person-plus text-warning"></i> Inscription</a></li>
      <li>
        <a class="d-flex align-items-center justify-content-between text-white text-decoration-none py-2 px-3" href="./mes-tickets.php">
          <span><i class="bi bi-qr-code text-warning me-2"></i> Mes tickets</span>
          <span class="badge bg-danger">3</span>
        </a>
      </li>
    </ul>
  </div>
</div>

<script>
window.addEventListener("scroll", function () {
  var nb = document.querySelector(".navbar");
  if (nb) nb.classList.toggle("scrolled", window.scrollY > 50);
});
</script>
