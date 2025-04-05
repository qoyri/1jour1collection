
# 1 Jour 1 Collection - Site Web

Ce projet est un site web pour **"1 Jour 1 Collection"**, un service d'exposition d'œuvres d'art éphémères pour entreprises. Le site est développé avec **Symfony** et utilise **Webpack Encore** pour la gestion des assets.

## Table des matières

- [Technologies utilisées](#technologies-utilisées)
- [Installation en local](#installation-en-local)
- [Commandes utiles](#commandes-utiles)
- [Gestion des assets](#gestion-des-assets)
- [Déploiement en production](#déploiement-en-production)
- [Problèmes connus et solutions](#problèmes-connus-et-solutions)
- [Maintenance](#maintenance)

## Technologies utilisées

- **Backend**: Symfony 6.x  
- **Frontend**:  
  - SCSS pour les styles  
  - JavaScript vanilla  
  - Webpack Encore  
- **Dépendances**:  
  - Font Awesome  
  - Google Fonts (Inter, Playfair Display)

## Installation en local

### Prérequis

- PHP 8.2+
- Composer
- Node.js 16+
- npm ou yarn

### Étapes

```bash
git clone [URL_DU_DEPOT]
cd site

composer install

npm install
# ou
yarn install

cp .env .env.local
nano .env.local
```

### Compiler les assets

```bash
# Dev
npm run dev
# Watch
npm run watch
```

### Lancer le serveur

```bash
symfony server:start
# ou
php -S localhost:8000 -t public/
```

## Commandes utiles

### Symfony

```bash
php bin/console cache:clear
php bin/console debug:router
php bin/console about
```

### npm/Webpack

```bash
npm run dev
npm run watch
npm run build
npm run dev-server
```

### Git

```bash
git pull origin main
git status
git add .
git commit -m "Description"
git push origin main
```

## Gestion des assets

### Organisation des images

```
assets/images/
├── logo/
│   ├── lde-logo.svg
│   └── lde-logo-white.svg
├── hero/
│   ├── hero-main.jpg
│   └── hero-secondary.jpg
├── about/
│   └── about-image.jpg
└── engagement/
    └── engagement-image.jpg
```

### Compilation

```bash
npm run dev     # Dev
npm run build   # Prod
```

## Déploiement en production

### Prérequis

- Accès SSH
- Git (optionnel)

### Étapes

```bash
ssh utilisateur@votredomaine.com
cd /home/wosi9734/public_html/1jour1collection/site
git pull origin main
```

```bash
composer install --no-dev --optimize-autoloader

echo 'APP_ENV=prod' > .env.local
echo 'APP_DEBUG=0' >> .env.local
```

**Compiler en local (recommandé)** :

```bash
npm run build
scp -r public/build utilisateur@votredomaine.com:/home/wosi9734/public_html/1jour1collection/site/public/
```

**Si compilation sur le serveur (non recommandé)** :

```bash
export NODE_OPTIONS="--max-old-space-size=512"
npm run build
```

**Finaliser** :

```bash
APP_ENV=prod php bin/console cache:clear
chmod -R 777 var/cache var/log
```

### .htaccess

```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

## Problèmes connus et solutions

### DebugBundle en production

```bash
APP_ENV=prod php bin/console cache:clear
```

### Erreur de mémoire Webpack

- Compiler en local
- `export NODE_OPTIONS="--max-old-space-size=512"`
- Simplifier `webpack.config.js`

### Assets non chargés

- Vérifier les chemins dans Twig
- Vérifier `setPublicPath` dans Webpack
- Vérifier les permissions sur `public/build/`

## Maintenance

### Modifier le contenu

Fichier : `src/Controller/HomeController.php`  
Méthode : `index()`

### Ajouter une section

1. Ajouter les données au contrôleur
2. Créer le template Twig
3. Ajouter les styles SCSS
4. `npm run build`

### Mettre à jour les dépendances

```bash
composer update
npm update
```
