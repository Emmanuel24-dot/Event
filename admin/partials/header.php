<?php
if (!isset($page_title)) { $page_title = "Admin"; }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($page_title) ?> | Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --ink: #0f172a;
      --slate: #64748b;
      --bg: #f5f2ee;
      --card: #ffffff;
      --accent: #ff7a2f;
      --accent-2: #ffb266;
      --line: rgba(15, 23, 42, 0.08);
    }
    body {
      font-family: "Urbanist", sans-serif;
      background: var(--bg);
      color: var(--ink);
    }
.admin-wrap {
  min-height: 100vh;           /* S'assure que la page prend toute la hauteur de l'écran */
  display: grid;               /* Active le mode grid pour aligner sidebar et content */
  grid-template-columns: 260px 1fr; /* 260px pour le sidebar, le reste pour le contenu */
}

    .sidebar {
      background: #0f172a;
      color: #fff;
      padding: 28px 22px;
      position: sticky;
      top: 0;
      height: 100vh;
    }
    .brand {
      font-family: "Libre Baskerville", serif;
      font-size: 1.4rem;
      margin-bottom: 26px;
    }
    .nav-link-admin {
      color: rgba(255,255,255,0.75);
      text-decoration: none;
      display: flex;
      gap: 10px;
      align-items: center;
      padding: 10px 12px;
      border-radius: 10px;
      margin-bottom: 6px;
      transition: 0.2s ease;
    }
    .nav-link-admin:hover,
    .nav-link-admin.active {
      background: rgba(255,255,255,0.12);
      color: #fff;
    }
    .content {
      padding: 34px 36px 60px;
    }
    .page-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;
    }
    .card-soft {
      background: var(--card);
      border: 1px solid rgba(255,255,255,0.8);
      border-radius: 18px;
      box-shadow: 0 16px 36px rgba(15,23,42,0.08);
      padding: 20px;
    }
    .btn-main {
      background: linear-gradient(120deg, var(--accent), var(--accent-2));
      border: none;
      color: #fff;
      border-radius: 12px;
      padding: 10px 16px;
      font-weight: 600;
      box-shadow: 0 16px 34px rgba(255,122,47,0.2);
    }
    .badge-status {
      padding: 5px 10px;
      border-radius: 999px;
      font-size: 12px;
    }
    .badge-success { background: rgba(34,197,94,0.15); color: #15803d; }
    .badge-muted { background: rgba(100,116,139,0.12); color: #475569; }
    .table thead th { border-bottom: 0; color: var(--slate); font-weight: 600; }
    .table tbody tr { background: #fff; border-radius: 14px; }
    .table tbody td { vertical-align: middle; }
    @media (max-width: 992px) {
      .admin-wrap { grid-template-columns: 1fr; }
      .sidebar { position: relative; height: auto; }
    }
  </style>
</head>
<body>
<div class="admin-wrap">
