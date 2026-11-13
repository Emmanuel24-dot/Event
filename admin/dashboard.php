<?php
$page_title = "Tableau de bord";
include "partials/header.php";
include "partials/sidebar.php";
include "db.php";

function countRows($conn, $sql) {
    $res = $conn->query($sql);
    if ($res) {
        $row = $res->fetch_assoc();
        return isset($row['c']) ? (int)$row['c'] : 0;
    }
    return 0;
}

$total_events  = countRows($conn, "SELECT COUNT(*) AS c FROM evenements");
$active_events = countRows($conn, "SELECT COUNT(*) AS c FROM evenements WHERE statut='publie'");
$draft_events  = countRows($conn, "SELECT COUNT(*) AS c FROM evenements WHERE statut='brouillon'");
$total_users   = countRows($conn, "SELECT COUNT(*) AS c FROM utilisateurs");
$total_msgs    = countRows($conn, "SELECT COUNT(*) AS c FROM messages_contact WHERE lu=0");
?>
<main class="content">

<div class="page-header">
  <div>
    <h3 class="mb-0">Tableau de bord</h3>
    <div class="text-muted">Vue d'ensemble de votre activité</div>
  </div>
  <a class="btn btn-main" href="add-event.php"><i class="bi bi-plus-lg me-1"></i> Ajouter un événement</a>
</div>

<div class="row g-4 mb-4">
  <div class="col-md-6 col-xl-3">
    <div class="card-soft text-center">
      <div class="mb-2" style="font-size:2rem;color:#ff7a2f">🎉</div>
      <div class="text-muted small">Événements total</div>
      <h2 class="mb-0 fw-bold"><?= $total_events ?></h2>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card-soft text-center">
      <div class="mb-2" style="font-size:2rem">✅</div>
      <div class="text-muted small">Publiés</div>
      <h2 class="mb-0 fw-bold text-success"><?= $active_events ?></h2>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card-soft text-center">
      <div class="mb-2" style="font-size:2rem">📝</div>
      <div class="text-muted small">Brouillons</div>
      <h2 class="mb-0 fw-bold text-warning"><?= $draft_events ?></h2>
    </div>
  </div>
  <div class="col-md-6 col-xl-3">
    <div class="card-soft text-center">
      <div class="mb-2" style="font-size:2rem">👥</div>
      <div class="text-muted small">Utilisateurs</div>
      <h2 class="mb-0 fw-bold"><?= $total_users ?></h2>
    </div>
  </div>
</div>

<?php if ($total_msgs > 0): ?>
<div class="alert alert-warning d-flex align-items-center gap-3 mb-4">
  <i class="bi bi-envelope-fill fs-4"></i>
  <span><?= $total_msgs ?> nouveau(x) message(s) de contact non lu(s).</span>
</div>
<?php endif; ?>

<div class="card-soft mt-2">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Derniers événements</h5>
    <a href="events.php" class="btn btn-sm btn-outline-secondary">Voir tous</a>
  </div>
  <div class="table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Date</th>
          <th>Ville</th>
          <th>Prix</th>
          <th>Statut</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $res = $conn->query("SELECT id, titre, date_debut, ville, prix, devise, statut FROM evenements ORDER BY id DESC LIMIT 8");
        if ($res && $res->num_rows > 0) {
          while ($row = $res->fetch_assoc()) {
            $badge = $row['statut'] === 'publie' ? 'badge-success' : 'badge-muted';
            $label = $row['statut'] === 'publie' ? 'Publié' : 'Brouillon';
            $date  = date('d M Y', strtotime($row['date_debut']));
            $prix  = number_format($row['prix'],0,',',' ').' '.$row['devise'];
            echo "<tr>
              <td><strong>".htmlspecialchars($row['titre'])."</strong></td>
              <td>$date</td>
              <td>".htmlspecialchars($row['ville'])."</td>
              <td>$prix</td>
              <td><span class='badge-status $badge'>$label</span></td>
              <td><a class='btn btn-sm btn-outline-secondary' href='edit-event.php?id={$row['id']}'><i class='bi bi-pencil'></i></a></td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='6' class='text-muted text-center py-4'>Aucun événement pour le moment. <a href='add-event.php'>Créer le premier</a></td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

</main>
<?php include "partials/footer.php"; ?>
