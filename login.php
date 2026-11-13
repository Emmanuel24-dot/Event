<?php include 'includes/nav.php'; ?>

<style>
/* =====================
   GLOBAL
===================== */
.section-title h2 {
  font-weight: 600;
  margin-bottom: 10px;
}

.section-title p {
  color: #666;
  font-size: 15px;
}
.hero-carousel,
.hero-carousel .carousel-item {
  height: 100vh;
}

.hero-carousel {
  position: relative;
  z-index: 1;
}

.hero-carousel .carousel-item {
  background-size: cover;
  background-position: center;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.6);
}

.hero-content {
  position: absolute;
  inset: 0;
  z-index: 2;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  color: #fff;
  padding-top: 80px;
}

.hero-content h1 {
  font-family: 'Dancing Script', cursive;
  font-size: 4rem;
}

.hero-content p {
  max-width: 700px;
  margin-bottom: 30px;
}

/* =====================
   SECTION 1 : GRID EVENTS
===================== */
.events-section {
  padding: 80px 0;
  background: #f9f9f9;
}

.event-grid-card {
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  transition: .4s ease;
  height: 100%;
}

.event-grid-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(0,0,0,.15);
}

.event-grid-img {
  position: relative;
  height: 220px;
  overflow: hidden;
}

.event-grid-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: .5s ease;
}

.event-grid-card:hover img {
  transform: scale(1.1);
}

.event-date {
  position: absolute;
  top: 15px;
  left: 15px;
  background: #dc3545;
  color: #fff;
  padding: 6px 12px;
  border-radius: 30px;
  font-size: 13px;
}

.event-grid-content {
  padding: 20px;
}

.event-location {
  font-size: 14px;
  color: #777;
}

.event-grid-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.event-price {
  font-weight: 600;
  color: #dc3545;
}

/* =====================
   SECTION 2 : SCROLL EVENTS
===================== */
.carousel-section {
  background: #f8f9fa;
}

.event-scroll {
  display: flex;
  gap: 24px;
  overflow-x: auto;
  padding: 50px 0;
  scroll-behavior: smooth;
}

.event-scroll::-webkit-scrollbar {
  display: none;
}

.event-scroll-card {
  flex: 0 0 240px;
  background: #fff;
  border-radius: 16px;
  text-align: center;
  transition: .4s ease;
  transform: scale(.85);
  opacity: .6;
}

.event-scroll-card img {
  width: 100%;
  height: 160px;
  object-fit: cover;
  border-radius: 16px 16px 0 0;
}

.event-scroll-card.active {
  transform: scale(1.15);
  opacity: 1;
  box-shadow: 0 25px 50px rgba(0,0,0,.25);
  z-index: 10;
}

/* =====================
   SECTION 3 : LIST EVENTS
===================== */
.upcoming-events {
  background: #fff;
}

.event-list {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.event-list-item {
  display: grid;
  grid-template-columns: 280px 1fr auto;
  gap: 30px;
  background: #f8f9fa;
  padding: 25px;
  border-radius: 18px;
  align-items: center;
  transition: .4s ease;
}

.event-list-item:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 40px rgba(0,0,0,.15);
}

.event-list-item img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 14px;
}

.event-meta {
  font-size: 14px;
  color: #777;
  margin-bottom: 10px;
}

.event-desc {
  font-size: 15px;
  color: #555;
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .event-list-item {
    grid-template-columns: 1fr;
    text-align: center;
  }
}
</style>
<!-- ================= HERO CAROUSEL ================= -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">

  <div class="carousel-inner">

    <div class="carousel-item active" style="background-image:url('assets/images/a.jpg')">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Les plus grandes soirées</h1>
        <p>Vivez des nuits inoubliables avec les meilleurs DJ</p>
        <div class="hero-buttons">
          <a href="billeterie.php" class="btn btn-danger btn-lg">Acheter un ticket</a>
          <a href="events.php" class="btn btn-outline-light btn-lg">Voir événements</a>
        </div>
      </div>
    </div>

    <div class="carousel-item" style="background-image:url('assets/images/b.jpg')">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Concerts & Festivals</h1>
        <p>La musique live comme tu ne l’as jamais vécue</p>
      </div>
    </div>

    <div class="carousel-item" style="background-image:url('assets/images/e.jpg')">
      <div class="hero-overlay"></div>
      <div class="hero-content">
        <h1>Événements exclusifs</h1>
        <p>Réserve ta place avant qu’il ne soit trop tard</p>
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

<!-- =====================
     SECTION 1
===================== -->
<section class="events-section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Événements populaires</h2>
      <p>Les événements les plus suivis du moment</p>
    </div>

    <div class="row g-4">
      <?php for($i=1;$i<=3;$i++): ?>
      <div class="col-lg-4 col-md-6">
        <div class="event-grid-card">
          <div class="event-grid-img">
            <img src="assets/images/c.jpg">
            <span class="event-date">25 AVR</span>
          </div>
          <div class="event-grid-content">
            <h5>Soirée VIP</h5>
            <p class="event-location">Lomé, Togo</p>
            <div class="event-grid-footer">
              <span class="event-price">5 000 FCFA</span>
              <a href="#" class="btn btn-danger btn-sm">Détails</a>
            </div>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- =====================
     SECTION 2
===================== -->
<section class="carousel-section py-5">
  <div class="container">
    <div class="section-title text-center mb-4">
      <h2>À ne pas manquer</h2>
      <p>Les événements qui font le buzz</p>
    </div>

    <div class="event-scroll" id="eventScroll">
      <?php for($i=1;$i<=12;$i++): ?>
      <div class="event-scroll-card">
        <img src="assets/images/z.jpg">
        <div class="p-3">
          <h6>Concert Live <?= $i ?></h6>
          <p>Tickets disponibles</p>
          <a href="#" class="btn btn-outline-danger btn-sm">Voir</a>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- =====================
     SECTION 3
===================== -->
<section class="upcoming-events py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Prochains événements</h2>
      <p>Planifiez vos prochaines sorties</p>
    </div>

    <div class="event-list">
      <div class="event-list-item">
        <img src="assets/images/e.jpg">
        <div>
          <h4>Festival Urbain</h4>
          <div class="event-meta">30 Avril 2026 • Lomé</div>
          <p class="event-desc">
            Un grand rendez-vous culturel mêlant musique, danse et performances urbaines.
          </p>
        </div>
        <a href="#" class="btn btn-danger">Réserver</a>
      </div>
    </div>
  </div>
</section>

<script>
const container = document.getElementById('eventScroll');
const cards = container.querySelectorAll('.event-scroll-card');

function updateCenterCard() {
  const center = container.scrollLeft + container.offsetWidth / 2;

  cards.forEach(card => {
    const cardCenter = card.offsetLeft + card.offsetWidth / 2;
    card.classList.toggle(
      'active',
      Math.abs(center - cardCenter) < card.offsetWidth / 2
    );
  });
}

setInterval(() => {
  container.scrollLeft += 1;
}, 20);

container.addEventListener('scroll', updateCenterCard);
updateCenterCard();
</script>
<?php include 'includes/footer.php'; ?>