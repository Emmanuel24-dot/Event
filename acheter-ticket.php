<?php
include './includes/config.php';

/* ======================
   VÉRIFICATION ID EVENT
====================== */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Événement introuvable");
}

$id = (int)$_GET['id'];

/* ======================
   RÉCUPÉRATION EVENT
====================== */
$sql = "SELECT * FROM evenements WHERE id = $id AND statut = 'publie' LIMIT 1";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    die("Événement introuvable");
}

$event = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Achat ticket | <?= htmlspecialchars($event['titre']); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{font-family:'Poppins',sans-serif;background:#f8f9fa}
.ticket-box,.recap-box{
  background:#fff;
  border-radius:18px;
  padding:25px;
  box-shadow:0 10px 30px rgba(0,0,0,.08)
}
.ticket-type{
  border:2px solid #eee;
  border-radius:14px;
  padding:15px;
  cursor:pointer;
  transition:.3s;
  margin-bottom:12px
}
.ticket-type.active{
  border-color:#ff7300;
  background:#fff5eb
}
.price{color:#ff7300;font-weight:600}
</style>
</head>

<body>

<?php include 'includes/nav.php'; ?>

<section class="py-5">
<div class="container">
<div class="row g-4">

<!-- ===== FORMULAIRE ===== -->
<div class="col-lg-8">
<div class="ticket-box">
<h4 class="mb-3">Acheter votre ticket</h4>

<p><strong>Événement :</strong> <?= htmlspecialchars($event['titre']); ?></p>
<p><strong>Date :</strong> <?= date('d M Y', strtotime($event['date_debut'])); ?></p>

<h6 class="mt-4">Type de ticket</h6>

<div class="ticket-type active" data-type="Standard" data-price="<?= $event['prix']; ?>">
🎟 Standard <span class="price float-end">
<?= number_format($event['prix'],0,',',' '); ?> <?= $event['devise']; ?>
</span>
</div>

<div class="ticket-type" data-type="VIP" data-price="<?= $event['prix'] * 3; ?>">
⭐ VIP <span class="price float-end">
<?= number_format($event['prix'] * 3,0,',',' '); ?> <?= $event['devise']; ?>
</span>
</div>

<div class="ticket-type" data-type="Premium" data-price="<?= $event['prix'] * 6; ?>">
👑 Premium <span class="price float-end">
<?= number_format($event['prix'] * 6,0,',',' '); ?> <?= $event['devise']; ?>
</span>
</div>

<form id="ticketForm" class="mt-4">

<input type="hidden" id="ticketType" value="Standard">
<input type="hidden" id="ticketPrice" value="<?= $event['prix']; ?>">

<div class="row g-3">
<div class="col-md-6">
<input class="form-control" placeholder="Nom complet" required>
</div>
<div class="col-md-6">
<input class="form-control" placeholder="Email" type="email" required>
</div>

<div class="col-md-6">
<select class="form-select" id="paymentMethod" required>
<option value="">Mode de paiement</option>
<option value="flooz">Flooz</option>
<option value="tmoney">T-Money</option>
<option value="card">Carte bancaire</option>
</select>
</div>
</div>

<!-- FLOOZ / TMONEY -->
<div id="mobilePay" class="mt-3 d-none">
<input class="form-control" placeholder="Numéro de téléphone">
</div>

<!-- CARTE -->
<div id="cardPay" class="row g-3 mt-3 d-none">
<div class="col-md-12">
<input class="form-control" placeholder="Numéro de carte">
</div>
<div class="col-md-6">
<input class="form-control" placeholder="MM/AA">
</div>
<div class="col-md-6">
<input class="form-control" placeholder="CVV">
</div>
</div>

<button class="btn btn-warning text-white w-100 mt-4">
Payer maintenant
</button>
</form>

<div id="qrSection" class="text-center mt-4 d-none">
<h6>Votre ticket électronique</h6>
<div id="qrcode"></div>
</div>

</div>
</div>

<!-- ===== RECAP ===== -->
<div class="col-lg-4">
<div class="recap-box">
<h5 class="mb-3">Récapitulatif</h5>

<p>🎫 Ticket : <strong id="recapType">Standard</strong></p>
<p>💰 Prix : <strong id="recapPrice">
<?= number_format($event['prix'],0,',',' '); ?> <?= $event['devise']; ?>
</strong></p>
<hr>
<p>Total à payer :</p>
<h4 class="text-warning" id="recapTotal">
<?= number_format($event['prix'],0,',',' '); ?> <?= $event['devise']; ?>
</h4>
</div>
</div>

</div>
</div>
</section>

<?php include 'includes/footer.php'; ?>

<script>
/* Ticket selection */
document.querySelectorAll('.ticket-type').forEach(t=>{
t.onclick=()=>{
document.querySelectorAll('.ticket-type').forEach(x=>x.classList.remove('active'));
t.classList.add('active');

ticketType.value=t.dataset.type;
ticketPrice.value=t.dataset.price;

recapType.innerText=t.dataset.type;
recapPrice.innerText=t.dataset.price+' <?= $event['devise']; ?>';
recapTotal.innerText=t.dataset.price+' <?= $event['devise']; ?>';
}
});

/* Payment switch */
paymentMethod.onchange=e=>{
mobilePay.classList.add('d-none');
cardPay.classList.add('d-none');

if(e.target.value==='flooz'||e.target.value==='tmoney')
mobilePay.classList.remove('d-none');

if(e.target.value==='card')
cardPay.classList.remove('d-none');
};

/* QR Code */
ticketForm.onsubmit=e=>{
e.preventDefault();

const num="GB-"+Math.floor(100000+Math.random()*900000);
const text=`GbinGbanCe | <?= addslashes($event['titre']); ?> | ${ticketType.value} | ${num}`;

qrcode.innerHTML='';
qrSection.classList.remove('d-none');

new QRCode(qrcode,{text:text,width:220,height:220});
};
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
