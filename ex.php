<?php include 'includes/header.php'; ?>
<style>
  /* SECTION */
.events-section {
  padding: 80px 0;
  background-color: #f9f9f9;
}

/* TITRE */
.section-title h2 {
  font-weight: 600;
  margin-bottom: 10px;
}

.section-title p {
  color: #666;
  font-size: 15px;
}

/* CARD */
.event-card {
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  transition: 0.4s ease;
  height: 100%;
}

.event-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

/* IMAGE */
.event-img {
  position: relative;
  height: 220px;
  overflow: hidden;
}

.event-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: 0.5s ease;
}

.event-card:hover img {
  transform: scale(1.1);
}

/* DATE BADGE */
.event-date {
  position: absolute;
  top: 15px;
  left: 15px;
  background: #ff3b3b;
  color: #fff;
  padding: 6px 12px;
  border-radius: 30px;
  font-size: 13px;
  font-weight: 500;
}

/* CONTENT */
.event-content {
  padding: 20px;
}

.event-content h5 {
  font-weight: 600;
  margin-bottom: 5px;
}

.event-location {
  font-size: 14px;
  color: #777;
  margin-bottom: 15px;
}

/* FOOTER */
.event-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.event-price {
  font-weight: 600;
  color: #ff3b3b;
}


/* SECTION CAROUSEL */
.carousel-section {
  background-color: #f8f9fa;
}

/* CARDS */
.event-card-carousel {
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  width: 250px;
  transition: 0.4s ease;
}

.event-card-carousel:hover {
  transform: translateY(-8px) scale(1.05);
  box-shadow: 0 20px 40px rgba(0,0,0,0.2);
}

/* IMAGE */
.event-img-carousel {
  height: 180px;
  overflow: hidden;
}

.event-img-carousel img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: 0.5s ease;
}

.event-card-carousel:hover img {
  transform: scale(1.1);
}

/* BODY */
.event-body h5 {
  font-weight: 600;
}

.event-body p {
  font-size: 14px;
  color: #777;
}

/* BOUTON */
.event-body .btn {
  border-radius: 30px;
  padding: 5px 20px;
  transition: 0.3s;
}

.event-body .btn:hover {
  transform: scale(1.05);
}

/* CONTROLS */
.carousel-control-prev-icon,
.carousel-control-next-icon {
  background-size: 100%, 100%;
}


/* SECTION PROCHAINS ÉVÉNEMENTS */
.upcoming-events {
  background-color: #fff;
}

.event-item {
  transition: 0.4s ease;
  background: #f8f9fa;
  align-items: center;
}

.event-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 25px rgba(0,0,0,0.15);
}



.event-item:hover .event-img img {
  transform: scale(1.1);
}

.event-info h5 {
  font-weight: 600;
  margin-bottom: 3px;
}

.event-info small {
  color: #666;
}

/* BOUTON */
.event-item .btn {
  border-radius: 30px;
  padding: 5px 18px;
  transition: 0.3s ease;
}

.event-item .btn:hover {
  transform: scale(1.05);
}

</style>
<!-- SECTION : ÉVÉNEMENTS POPULAIRES -->
<section class="events-section">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>Événements populaires</h2>
      <p>Découvrez les événements les plus attendus du moment</p>
    </div>

    <div class="row g-4">
      <?php for($i=1; $i<=3; $i++): ?>
      <div class="col-lg-4 col-md-6">
        <div class="event-card">
          <div class="event-img">
            <img src="./assets/images/c.jpg" alt="Event">
            <span class="event-date">25 AVR</span>
          </div>

          <div class="event-content">
            <h5>Soirée VIP <?= $i ?></h5>
            <p class="event-location">📍 Lomé, Togo</p>

            <div class="event-footer">
              <span class="event-price">À partir de 5 000 FCFA</span>
              <a href="#" class="btn btn-danger btn-sm">Détails</a>
            </div>
          </div>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>


<!-- SECTION 2 : CAROUSEL DE CARTES -->
<section class="carousel-section py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>🎉 À ne pas manquer</h2>
      <p>Les événements les plus attendus du moment</p>
    </div>

    <div id="eventCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php for($i=1; $i<=3; $i++): ?>
        <div class="carousel-item <?= $i==1 ? 'active' : '' ?>">
          <div class="d-flex justify-content-center">
            <div class="event-card-carousel shadow-sm">
              <div class="event-img-carousel">
                <img src="assets/images/z.jpg" alt="Event <?= $i ?>">
              </div>
              <div class="event-body text-center p-3">
                <h5 class="mb-2">Concert Live <?= $i ?></h5>
                <p class="text-muted mb-3">Tickets disponibles</p>
                <a href="#" class="btn btn-outline-danger btn-sm">Voir</a>
              </div>
            </div>
          </div>
        </div>
        <?php endfor; ?>

      </div>
      

      <!-- CONTROLS -->
      <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
      </button>
    </div>
  </div>
</section>


<!-- SECTION 3 : PROCHAINS ÉVÉNEMENTS -->
<section class="upcoming-events py-5">
  <div class="container">
    <div class="section-title text-center mb-5">
      <h2>📅 Prochains événements</h2>
      <p>Ne manquez pas les événements à venir dans votre ville</p>
    </div>

    <div class="row g-3">
      <?php for($i=1; $i<=3; $i++): ?>
      <div class="col-lg-12">
        <div class="event-item d-flex align-items-center shadow-sm p-3 rounded hover-effect">
          <div class="event-img me-3">
            <img src="assets/images/e.jpg" alt="Event <?= $i ?>" class="rounded">
          </div>
          <div class="event-info flex-grow-1">
            <h5>Festival Urbain <?= $i ?></h5>
            <small class="text-muted">30 Avril 2026 • Lomé</small>
          </div>
          <a href="#" class="btn btn-danger btn-sm">🎟 Ticket</a>
        </div>
      </div>
      <?php endfor; ?>
    </div>
  </div>
</section>


<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3">
  © 2026 GbinGbanCe - Tous droits réservés
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
