<?php
$page_title = "Ajouter un événement";
include "partials/header.php";
include "partials/sidebar.php";
include "db.php";

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$short_description = isset($_POST['short_description']) ? trim($_POST['short_description']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';
$category_id = isset($_POST['category_id']) ? (int)$_POST['category_id'] : 0;
$city = isset($_POST['city']) ? trim($_POST['city']) : '';
$venue = isset($_POST['venue']) ? trim($_POST['venue']) : '';
$address = isset($_POST['address']) ? trim($_POST['address']) : '';
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';
$price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
$currency = isset($_POST['currency']) ? trim($_POST['currency']) : 'FCFA';
$capacity = isset($_POST['capacity']) ? (int)$_POST['capacity'] : 0;
$available = isset($_POST['available']) ? (int)$_POST['available'] : 0;
$status = isset($_POST['status']) ? $_POST['status'] : 'draft';
$featured = isset($_POST['featured']) ? 1 : 0;
$image = null;


  if ($title === '') { $errors[] = "Le titre est obligatoire."; }
  if ($start_date === '') { $errors[] = "La date de début est obligatoire."; }

  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $file_name = uniqid('event_', true) . '.' . strtolower($ext);
    $target = __DIR__ . '/uploads/' . $file_name;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $image = $file_name;
    }
  }

  if (count($errors) === 0) {
    $stmt = $conn->prepare("INSERT INTO events (title, short_description, description, category_id, city, venue, address, start_date, start_time, end_date, end_time, price, currency, capacity, available_tickets, image, status, featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisssssssdsiissi", $title, $short_description, $description, $category_id, $city, $venue, $address, $start_date, $start_time, $end_date, $end_time, $price, $currency, $capacity, $available, $image, $status, $featured);
    $stmt->execute();
    $stmt->close();
    header("Location: events.php");
    exit;
  }
}

$cats = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");
?>

<div class="page-header">
  <div>
    <h3 class="mb-0">Ajouter un événement</h3>
    <div class="text-muted">Créez un nouvel événement</div>
  </div>
</div>

<?php if (!empty($errors)): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach ($errors as $e): ?>
        <li><?= htmlspecialchars($e) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<div class="card-soft">
  <form method="post" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6">
      <label class="form-label">Titre</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label class="form-label">Catégorie</label>
      <select name="category_id" class="form-select">
        <option value="0">Aucune</option>
        <?php while ($c = $cats->fetch_assoc()): ?>
          <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <div class="col-12">
      <label class="form-label">Description courte</label>
      <input type="text" name="short_description" class="form-control">
    </div>
    <div class="col-12">
      <label class="form-label">Description complète</label>
      <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="col-md-4">
      <label class="form-label">Ville</label>
      <input type="text" name="city" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">Lieu</label>
      <input type="text" name="venue" class="form-control">
    </div>
    <div class="col-md-4">
      <label class="form-label">Adresse</label>
      <input type="text" name="address" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">Date début</label>
      <input type="date" name="start_date" class="form-control" required>
    </div>
    <div class="col-md-3">
      <label class="form-label">Heure début</label>
      <input type="time" name="start_time" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">Date fin</label>
      <input type="date" name="end_date" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">Heure fin</label>
      <input type="time" name="end_time" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">Prix</label>
      <input type="number" step="0.01" name="price" class="form-control" value="0">
    </div>
    <div class="col-md-3">
      <label class="form-label">Devise</label>
      <input type="text" name="currency" class="form-control" value="FCFA">
    </div>
    <div class="col-md-3">
      <label class="form-label">Capacité</label>
      <input type="number" name="capacity" class="form-control" value="0">
    </div>
    <div class="col-md-3">
      <label class="form-label">Tickets dispo</label>
      <input type="number" name="available" class="form-control" value="0">
    </div>
    <div class="col-md-6">
      <label class="form-label">Image</label>
      <input type="file" name="image" class="form-control">
    </div>
    <div class="col-md-3">
      <label class="form-label">Statut</label>
      <select name="status" class="form-select">
        <option value="published">Publié</option>
        <option value="draft">Brouillon</option>
      </select>
    </div>
    <div class="col-md-3 d-flex align-items-end">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="featured" id="featured">
        <label class="form-check-label" for="featured">Mise en avant</label>
      </div>
    </div>
    <div class="col-12">
      <button class="btn btn-main" type="submit">Enregistrer</button>
      <a class="btn btn-outline-secondary" href="events.php">Annuler</a>
    </div>
  </form>
</div>

<?php include "partials/footer.php"; ?>
