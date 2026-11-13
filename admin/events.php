<?php
$page_title = "Événements";
include "partials/header.php";
include "partials/sidebar.php";
include "db.php";

if (isset($_GET['delete'])) {
    $id   = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM evenements WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: events.php?deleted=1");
    exit;
}

if (isset($_GET['toggle'])) {
    $id     = (int)$_GET['toggle'];
    $conn->query("UPDATE evenements SET statut = IF(statut='publie','brouillon','publie') WHERE id=$id");
    header("Location: events.php");
    exit;
}

$res = $conn->query("
    SELECT e.*, c.nom AS nom_categorie
    FROM evenements e
    LEFT JOIN categorie c ON e.id_categorie = c.id
    ORDER BY e.id DESC
");
?>
<main class="content">

<div class="page-header">
  <div>
    <h3 class="mb-0">Événements</h3>
    <div class="text-muted">Gérez tous vos événements</div>
  </div>
  <a class="btn btn-main" href="add-event.php"><i class="bi bi-plus-lg me-1"></i> Ajouter</a>
</div>

<?php if (isset($_GET['deleted'])): ?>
<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
  Événement supprimé avec succès.
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="card-soft">
  <div class="table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Image</th>
          <th>Titre</th>
          <th>Catégorie</th>
          <th>Ville</th>
          <th>Date</th>
          <th>Prix</th>
          <th>Statut</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php if ($res && $res->num_rows > 0): ?>
        <?php while ($row = $res->fetch_assoc()): ?>
          <?php
          $badge = ($row['statut'] === 'publie') ? 'badge-success' : 'badge-muted';
          $label = ($row['statut'] === 'publie') ? 'Publié' : 'Brouillon';
          $img   = !empty($row['image']) ? '../'.$row['image'] : '../assets/images/a.jpg';
          $prix  = number_format($row['prix'],0,',',' ').' '.$row['devise'];
          ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td>
              <img src="<?= htmlspecialchars($img) ?>" style="width:56px;height:40px;object-fit:cover;border-radius:8px" alt="">
            </td>
            <td><strong><?= htmlspecialchars($row['titre']) ?></strong></td>
            <td><?= htmlspecialchars(isset($row['nom_categorie']) ? $row['nom_categorie'] : '—') ?></td>
            <td><?= htmlspecialchars(isset($row['ville']) ? $row['ville'] : '') ?></td>
            <td><?= $row['date_debut'] ? date('d/m/Y', strtotime($row['date_debut'])) : '—' ?></td>
            <td><?= $prix ?></td>
            <td><span class="badge-status <?= $badge ?>"><?= $label ?></span></td>
            <td>
              <a class="btn btn-sm btn-outline-secondary" href="edit-event.php?id=<?= $row['id'] ?>" title="Modifier">
                <i class="bi bi-pencil"></i>
              </a>
              <a class="btn btn-sm btn-outline-warning" href="events.php?toggle=<?= $row['id'] ?>" title="Changer statut">
                <i class="bi bi-arrow-repeat"></i>
              </a>
              <a class="btn btn-sm btn-outline-danger"
                 href="events.php?delete=<?= $row['id'] ?>"
                 onclick="return confirm('Supprimer cet événement définitivement ?')"
                 title="Supprimer">
                <i class="bi bi-trash"></i>
              </a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="9" class="text-muted text-center py-5">
          Aucun événement. <a href="add-event.php">Créez le premier !</a>
        </td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
</main>
<?php include "partials/footer.php"; ?>
