-- ============================================================
--  GbinGbanCe – Script de création de la base de données
--  Base : event_db   |   Charset : utf8mb4
--  Exécuter via : mysql -u root < setup.sql
-- ============================================================

CREATE DATABASE IF NOT EXISTS event_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE event_db;

-- ── CATÉGORIES ──────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS categorie (
  id   INT AUTO_INCREMENT PRIMARY KEY,
  nom  VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ── ÉVÉNEMENTS ──────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS evenements (
  id                   INT AUTO_INCREMENT PRIMARY KEY,
  titre                VARCHAR(255) NOT NULL,
  description_courte   TEXT,
  description_complete TEXT,
  date_debut           DATE         NOT NULL,
  heure_debut          TIME         DEFAULT NULL,
  date_fin             DATE         DEFAULT NULL,
  ville                VARCHAR(100) DEFAULT 'Lomé',
  adresse              VARCHAR(255) DEFAULT NULL,
  lieu                 VARCHAR(200) DEFAULT NULL,
  image                VARCHAR(255) DEFAULT NULL,
  prix                 DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  devise               VARCHAR(20)  DEFAULT 'FCFA',
  tickets_disponibles  INT          DEFAULT 100,
  statut               ENUM('publie','brouillon') DEFAULT 'publie',
  id_categorie         INT          DEFAULT NULL,
  created_at           TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_categorie) REFERENCES categorie(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ── UTILISATEURS ────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS utilisateurs (
  id           INT AUTO_INCREMENT PRIMARY KEY,
  nom          VARCHAR(100) NOT NULL,
  email        VARCHAR(150) NOT NULL UNIQUE,
  mot_de_passe VARCHAR(255) NOT NULL,
  created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ── MESSAGES CONTACT ────────────────────────────────────────
CREATE TABLE IF NOT EXISTS messages_contact (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  nom        VARCHAR(100),
  email      VARCHAR(150),
  sujet      VARCHAR(200),
  message    TEXT,
  lu         TINYINT(1)  DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ── TICKETS ACHETÉS (futur) ─────────────────────────────────
CREATE TABLE IF NOT EXISTS tickets_achetes (
  id              INT AUTO_INCREMENT PRIMARY KEY,
  ref             VARCHAR(20) NOT NULL UNIQUE,
  id_evenement    INT NOT NULL,
  id_utilisateur  INT DEFAULT NULL,
  nom_acheteur    VARCHAR(150),
  email_acheteur  VARCHAR(150),
  type_ticket     ENUM('Standard','VIP','Premium') DEFAULT 'Standard',
  montant         DECIMAL(10,2),
  mode_paiement   VARCHAR(50),
  statut          ENUM('confirme','annule','attente') DEFAULT 'attente',
  created_at      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_evenement)   REFERENCES evenements(id)   ON DELETE CASCADE,
  FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
--  DONNÉES D'EXEMPLE
-- ============================================================

INSERT INTO categorie (nom) VALUES
  ('Concerts & Musique'),
  ('Soirées & Clubs'),
  ('Festivals'),
  ('Conférences & Business'),
  ('Culture & Arts'),
  ('Sport & Loisirs'),
  ('Gastronomie'),
  ('Networking');

INSERT INTO evenements
  (titre, description_courte, description_complete, date_debut, heure_debut,
   ville, adresse, lieu, image, prix, devise, tickets_disponibles, statut, id_categorie)
VALUES
  (
    'Concert Nuit d\'Été',
    'Un concert live exceptionnel avec les meilleurs artistes togolais.',
    'Revivez la magie d\'une nuit d\'été avec les plus grands artistes du Togo. Au programme : musique afrobeat, jazz, highlife et bien plus. Une soirée inoubliable dans un cadre enchanteur au bord du golf de Guinée.',
    '2026-07-15', '20:00:00',
    'Lomé', 'Boulevard du 13 Janvier, Lomé', 'Palais des Congrès',
    'assets/images/a.jpg', 5000.00, 'FCFA', 250, 'publie', 1
  ),
  (
    'Soirée VIP Rooftop',
    'La soirée la plus exclusive de l\'été au sommet de Lomé.',
    'Profitez d\'une soirée intime et luxueuse avec vue panoramique sur la ville de Lomé. DJ set, cocktails premium, dress code strict. Seuls 80 tickets disponibles pour une expérience ultra-exclusive.',
    '2026-07-20', '21:00:00',
    'Lomé', 'Rue des Ambassadeurs, Tokoin', 'Hotel Sarakawa – Rooftop',
    'assets/images/c.jpg', 15000.00, 'FCFA', 80, 'publie', 2
  ),
  (
    'Festival Urbain Togolais',
    'Le plus grand festival culturel de Lomé revient pour une 5ème édition.',
    'Le Festival Urbain Togolais réunit chaque année les meilleurs artistes locaux et africains pour 3 jours de musique, danse, street art et gastronomie. Un événement familial et festif qui célèbre la culture togolaise.',
    '2026-07-30', '16:00:00',
    'Lomé', 'Place de l\'Indépendance', 'Place de l\'Indépendance',
    'assets/images/e.jpg', 3500.00, 'FCFA', 500, 'publie', 3
  ),
  (
    'Conférence Tech Afrique 2026',
    'La rencontre annuelle des entrepreneurs et innovateurs africains.',
    'Deux jours de conférences, panels et networking dédiés à l\'innovation technologique en Afrique. Intervenants de renommée internationale, startups pitches, et ateliers pratiques. L\'événement de référence pour la communauté tech togolaise.',
    '2026-08-05', '08:30:00',
    'Lomé', 'Angle Av. du 24 Janvier et Rue du Commerce', 'CCIT – Centre de Conférences',
    'assets/images/d.jpg', 10000.00, 'FCFA', 300, 'publie', 4
  ),
  (
    'Soirée Gastronomique Kpalimé',
    'Une expérience culinaire unique dans les collines de Kpalimé.',
    'Découvrez les saveurs authentiques du Togo lors de cette soirée gastronomique exceptionnelle. Chefs étoilés, produits locaux, vins et cocktails artisanaux. Une soirée intimiste au cœur des collines de Kpalimé.',
    '2026-08-10', '19:30:00',
    'Kpalimé', 'Route des Falaises, Kpalimé', 'Eco-lodge Les Fougères',
    'assets/images/b.jpg', 25000.00, 'FCFA', 60, 'publie', 7
  ),
  (
    'Festival de Musique Kpalimé',
    'Deux jours de musique live dans l\'écrin naturel des montagnes.',
    'Profitez d\'un cadre naturel exceptionnel pour ce festival de musique aux influences africaines et mondiales. Camping possible sur site, food trucks, artisanat local. Une expérience hors du commun pour petits et grands.',
    '2026-08-22', '14:00:00',
    'Kpalimé', 'Route d\'Atakpamé, km 3', 'Jardin Musical de Kpalimé',
    'assets/images/z.jpg', 7000.00, 'FCFA', 400, 'publie', 3
  ),
  (
    'Networking Business Lomé',
    'Rencontrez les décideurs et entrepreneurs de demain.',
    'Rejoignez 200 professionnels togolais et expatriés pour une soirée networking de qualité. Cocktail dînatoire, présentations flash de startups, échanges informels. Venez avec vos cartes de visite !',
    '2026-09-10', '18:00:00',
    'Lomé', 'Corniche de Lomé', 'Golden Beach Hotel',
    'assets/images/c.jpg', 8000.00, 'FCFA', 200, 'publie', 8
  ),
  (
    'Gala de Bienfaisance',
    'Une soirée élégante au profit des enfants défavorisés du Togo.',
    'La fondation GbinGbanCe organise son gala annuel au profit de l\'éducation des enfants en milieu rural. Dîner de gala, spectacle artistique, ventes aux enchères. Dress code : tenue de soirée requise.',
    '2026-09-25', '20:00:00',
    'Lomé', 'Bd de la République, Lomé', 'Hôtel 2 Février – Grande Salle',
    'assets/images/a.jpg', 50000.00, 'FCFA', 150, 'publie', 2
  );

-- ── DONNÉES ADMIN (tables English pour panneau admin) ────────
CREATE TABLE IF NOT EXISTS categories (
  id   INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS events (
  id                INT AUTO_INCREMENT PRIMARY KEY,
  title             VARCHAR(255) NOT NULL,
  short_description TEXT,
  description       TEXT,
  category_id       INT DEFAULT NULL,
  city              VARCHAR(100),
  venue             VARCHAR(200),
  address           VARCHAR(255),
  start_date        DATE,
  start_time        TIME,
  end_date          DATE,
  end_time          TIME,
  price             DECIMAL(10,2) DEFAULT 0,
  currency          VARCHAR(20)   DEFAULT 'FCFA',
  capacity          INT           DEFAULT 0,
  available_tickets INT           DEFAULT 0,
  image             VARCHAR(255),
  status            ENUM('published','draft') DEFAULT 'published',
  featured          TINYINT(1)    DEFAULT 0,
  created_at        TIMESTAMP     DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO categories (name) VALUES
  ('Concerts & Music'),('Evenings & Clubs'),('Festivals'),
  ('Conferences'),('Culture & Arts'),('Sports'),('Gastronomy'),('Networking');
