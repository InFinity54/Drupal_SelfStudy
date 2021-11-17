# Autoformation Drupal

Site créé durant une autoformation en entreprise sur Drupal 9.

## Installation
### Installation locale

- Cloner le dépôt en local comme pour n'importe quel dépôt Git à l'aide de la commande suivante : `git clone https://github.com/InFinity54/Drupal_SelfStudy chemin\vers\www\autoform_drupal`.
- Créer un vhost Apache ayant pour adresse `http://autoformdrupal.local` et pointant vers le dossier `web` de ce dépôt.
- Utiliser le fichier `autoform_drupal_db.sql` à la racine du dépôt pour recréer la base de données du site dans une base de données nommée `autoform_drupal`.
- Se placer dans le dossier où a été cloner le site et installez les dépendances avec `composer install`.
- Dans le fichier `web/sites/default/settings.php`, ajoutez le code suivant à la ligne 91.
```php
$databases['default']['default'] = [
  'database' => 'autoform_drupal',
  'username' => 'root',
  'password' => '',
  'host' => 'localhost',
  'port' => '3306',
  'driver' => 'mysql',
  'prefix' => '',
  'collation' => 'utf8mb4_general_ci',
];
```
- Dans le fichier `web/sites/default/settings.php`, ajoutez le code suivant à la ligne 274.
```php
$settings['config_sync_directory'] = dirname(DRUPAL_ROOT).'/config';
```
- Dans le fichier `web/sites/default/settings.php`, ajoutez le code suivant à la ligne 303.
```php
$settings['hash_salt'] = 'autoForm@Drupal8_';
```
- Dans le fichier `web/sites/default/settings.php`, ajoutez le code suivant à la ligne 733.
```php
$settings['trusted_host_patterns'] = [
  '^autoformdrupal\.local$',
];
```
- Importez la configuration du site avec la commande `drush cim`.
- Réinitialisez le cache du site avec la commande `drush cr`.

### Utiliser le site

Si vous avez besoin de vous connecter au compte administrateur du site pour le modifier, vous trouverez ces identifiants dans le fichier nommé `autoform_drupal_cred.txt`, situé à la racine du dépôt.

