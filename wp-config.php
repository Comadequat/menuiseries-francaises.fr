<?php
define('WP_CACHE', true); // Added by WP Rocket
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur 
 * {@link http://codex.wordpress.org/Editing_wp-config.php Modifier
 * wp-config.php} (en anglais). C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'atlantiqnwpress');


/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'atlantiqnwpress');


/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'PtKqi435QJ7e');


/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'mysql51-101.bdb');


/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données. 
  * N'y touchez que si vous savez ce que vous faites. 
  */
define('DB_COLLATE', '');
define ( 'FORCE_SSL_ADMIN' , true);
/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant 
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|4B*]A-k-*RX0m06[DA&_R/BW=<k#yUgT,!72sHnAoO&CgQ<S|y/ISpN[%@^D`FF');

define('SECURE_AUTH_KEY',  'yN6SzAXo.Jpl+g^|1#; 0d-og:]ME4)EVUr7;7Ix.0OQkWC]bM+86EEmo/nEJ]>x');

define('LOGGED_IN_KEY',    'vfbz]g`tkh|-G2rRkj)>Hrvjsy=@cXwG;ucN7fuAF2LGvMX$,)8VEZY-eO=||Ra|');

define('NONCE_KEY',        '~#iF+j(fr08tI*}#)Q#$nOEsnv$x)xAj^$,u*]tYE%cL>M?(CmHV}TfWXxqiYUY&');

define('AUTH_SALT',        'f*l3EZ|}Z!k-[u]$wAOW=rt-Qn9X3~/Ju0cfzf2c~qND[_)N.W1@&`zSb|/Dht=6');

define('SECURE_AUTH_SALT', '=-I2O|#:el2SU2~-E!NZUk!`z$zbL![Wq5[)+c?994>vApKvm9yv-^_zSmH7|`e~');

define('LOGGED_IN_SALT',   'J4HC-IJMO&Lx8gu9U<cjmnup6*JAu$K9wU;ktBI5|<Yvc|asI B=On8:{g6&x{fz');

define('NONCE_SALT',       'Dr[/j^[C|Y-vuWg&jsCIySt;gqeC089OCR}aNuGKnD Dy9)-x}Xk3++XAUX,Z,=h');

/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique. 
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_lmf_';


/**
 * Langue de localisation de WordPress, par défaut en Anglais.
 *
 * Modifiez cette valeur pour localiser WordPress. Un fichier MO correspondant
 * au langage choisi doit être installé dans le dossier wp-content/languages.
 * Par exemple, pour mettre en place une traduction française, mettez le fichier
 * fr_FR.mo dans wp-content/languages, et réglez l'option ci-dessous à "fr_FR".
 */
define('WPLANG', 'fr_FR');
define('WP_MEMORY_LIMIT', '96M');

/** 
 * Pour les développeurs : le mode deboguage de WordPress.
 * 
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant votre essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de 
 * développement.
 */ 
define('WP_DEBUG', false); 

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');