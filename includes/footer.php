<link rel="stylesheet" href="<?= rtrim(dirname($_SERVER['PHP_SELF']), '/') === '' ? '' : '../' ?>assets/css/styles.css">

<style>
.site-footer { background:#111; color:#ccc; padding:60px 0 20px; font-size:15px; }
.footer-logo { font-family:'Dancing Script',cursive; font-size:2rem; font-weight:700; color:#ff7300; }
.footer-text { color:#999; line-height:1.75; font-size:14px; }
.footer-heading { font-size:16px; font-weight:700; color:#fff; margin-bottom:18px; text-transform:uppercase; letter-spacing:.6px; }
.footer-links { list-style:none; padding:0; margin:0; }
.footer-links li { margin-bottom:9px; }
.footer-links a { color:#bbb; text-decoration:none; font-size:14px; transition:.25s; display:flex; align-items:center; gap:6px; }
.footer-links a:hover { color:#ff7300; padding-left:4px; }
.footer-contact { list-style:none; padding:0; margin:0; }
.footer-contact li { display:flex; align-items:flex-start; gap:10px; margin-bottom:12px; color:#bbb; font-size:14px; }
.footer-contact i { color:#ff7300; font-size:17px; margin-top:2px; flex-shrink:0; }
.footer-social { display:flex; gap:10px; margin-top:18px; }
.footer-social a {
  width:38px; height:38px; background:#1e1e1e; color:#ccc;
  display:flex; align-items:center; justify-content:center;
  border-radius:50%; transition:.25s; font-size:16px; text-decoration:none;
}
.footer-social a:hover { background:#ff7300; color:#fff; transform:translateY(-4px); }
.footer-bottom { border-top:1px solid #222; margin-top:40px; padding-top:20px; text-align:center; color:#666; font-size:13px; }
.footer-badge { display:inline-block; background:#ff7300; color:#fff; border-radius:50px; padding:2px 10px; font-size:11px; font-weight:700; margin-left:6px; }
</style>

<footer class="site-footer">
  <div class="container">
    <div class="row gy-5">

      <!-- À PROPOS -->
      <div class="col-lg-4 col-md-6">
        <div class="footer-logo mb-3">GbinGbanCe</div>
        <p class="footer-text">
          La plateforme de référence pour découvrir, réserver et vivre
          les meilleurs événements culturels, festifs et professionnels au Togo.
        </p>
        <div class="footer-social">
          <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" aria-label="Twitter/X"><i class="bi bi-twitter-x"></i></a>
          <a href="#" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></a>
          <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <!-- NAVIGATION -->
      <div class="col-lg-2 col-md-6 col-6">
        <h5 class="footer-heading">Navigation</h5>
        <ul class="footer-links">
          <li><a href="./index.php"><i class="bi bi-chevron-right"></i>Accueil</a></li>
          <li><a href="./events.php"><i class="bi bi-chevron-right"></i>Événements</a></li>
          <li><a href="./billeterie.php"><i class="bi bi-chevron-right"></i>Billetterie</a></li>
          <li><a href="./galerie.php"><i class="bi bi-chevron-right"></i>Galerie</a></li>
          <li><a href="./partenaires.php"><i class="bi bi-chevron-right"></i>Partenaires</a></li>
        </ul>
      </div>

      <!-- AIDE -->
      <div class="col-lg-2 col-md-6 col-6">
        <h5 class="footer-heading">Aide</h5>
        <ul class="footer-links">
          <li><a href="./contact.php"><i class="bi bi-chevron-right"></i>Centre d'aide</a></li>
          <li><a href="./contact.php"><i class="bi bi-chevron-right"></i>FAQ</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Conditions d'utilisation</a></li>
          <li><a href="#"><i class="bi bi-chevron-right"></i>Confidentialité</a></li>
          <li><a href="./inscription.php"><i class="bi bi-chevron-right"></i>Mon compte</a></li>
        </ul>
      </div>

      <!-- CONTACT -->
      <div class="col-lg-4 col-md-6">
        <h5 class="footer-heading">Contact</h5>
        <ul class="footer-contact">
          <li><i class="bi bi-geo-alt-fill"></i><span>13 BP 474, Lomé, Togo</span></li>
          <li><i class="bi bi-telephone-fill"></i><a href="tel:+22890000000" class="text-decoration-none" style="color:#bbb">+228 90 00 00 00</a></li>
          <li><i class="bi bi-envelope-fill"></i><a href="mailto:contact@gbingbance.tg" class="text-decoration-none" style="color:#bbb">contact@gbingbance.tg</a></li>
          <li><i class="bi bi-clock-fill"></i><span>Lun–Ven : 8h00 – 18h00</span></li>
        </ul>
        <a href="./contact.php" class="btn btn-sm mt-2" style="background:#ff7300;color:#fff;border-radius:50px;padding:8px 20px;font-size:13px">
          <i class="bi bi-envelope me-1"></i>Nous écrire
        </a>
      </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="footer-bottom">
      <p class="mb-0">
        © <?= date('Y') ?> GbinGbanCe — Tous droits réservés.
        <span class="footer-badge">Togo</span>
      </p>
      <p class="mt-1 mb-0" style="font-size:12px">
        Fait avec ❤️ à Lomé · <a href="./admin/" style="color:#555;text-decoration:none">Administration</a>
      </p>
    </div>
  </div>
</footer>
