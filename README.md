# 🗂️ First Project — Prototype de Portfolio

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![PHPMailer](https://img.shields.io/badge/PHPMailer-DD0031?style=for-the-badge&logo=gmail&logoColor=white)
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white)

Un site web portfolio prototype développé en PHP, HTML et CSS, avec gestion d'utilisateurs et formulaire de contact connecté à une base de données MySQL.


## 📋 Fonctionnalités

- **Page d'accueil** — présentation du portfolio (`index.html`)
- **Inscription / Connexion** — système d'authentification utilisateur
- **Formulaire de contact** — envoi de mails via PHPMailer (SMTP) et stockage en BDD
- **Interface admin** — consultation des inscrits et des contacts, avec recherche
- **Base de données MySQL** — script SQL fourni pour l'initialisation

---

## 🛠️ Technologies utilisées

| Technologie | Rôle |
|---|---|
| HTML / CSS | Structure et mise en forme |
| PHP | Logique serveur |
| MySQL | Stockage des données |
| PHPMailer | Envoi d'emails via SMTP |
| Composer | Gestion des dépendances PHP |

---

## 📁 Structure du projet

```
first_project/
├── index.html               # Page d'accueil
├── connexion.html/.php      # Connexion utilisateur
├── inscription.html/.php    # Inscription utilisateur
├── contact.php              # Traitement du formulaire de contact
├── formcontact.html         # Formulaire de contact
├── afficher_inscrit.php     # Liste des inscrits (admin)
├── affichercontact.php      # Liste des contacts (admin)
├── rechercher_inscrit.php   # Recherche d'inscrits
├── rechercher_contact.php   # Recherche de contacts
├── menu-admin.html          # Menu d'administration
├── database.php             # Connexion à la base de données
├── site_noha.sql            # Script de création de la BDD
├── style.css                # Styles globaux
├── vendor/                  # Dépendances Composer
└── image-doccument/         # Images du projet
```

---

## 🚀 Installation

### Prérequis

- PHP >= 7.4
- MySQL
- Composer

### Étapes

1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/kioroz/first_project.git
   cd first_project
   ```

2. **Installer les dépendances** (inclut PHPMailer)
   ```bash
   composer install
   ```
   > PHPMailer est déjà listé dans `composer.json`, il sera installé automatiquement. Si besoin de l'ajouter manuellement :
   > ```bash
   > composer require phpmailer/phpmailer
   > ```

3. **Initialiser la base de données**
   - Créer une base de données MySQL
   - Importer le script fourni :
   ```bash
   mysql -u root -p nom_de_ta_bdd < site_noha.sql
   ```

4. **Configurer la connexion BDD**
   - Modifier `database.php` avec tes identifiants MySQL

5. **Lancer avec un serveur local** (ex: XAMPP, WAMP, ou PHP built-in)
   ```bash
   php -S localhost:8000
   ```

---

## 👤 Auteur

**Noha** — [@kioroz](https://github.com/kioroz)

*Premier projet personnel — BTS SIO SLAM*
