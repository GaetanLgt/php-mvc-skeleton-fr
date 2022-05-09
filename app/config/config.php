<?php
/**
 * Configuration
 *
 * Pour plus d'informations sur les constantes, veuillez consulter http://php.net/manual/en/function.define.php.
 */
/**
 * Configuration pour : Rapports d'erreurs
 * Utile pour montrer tous les petits problèmes pendant le développement, mais seulement les erreurs graves en production.
 */
define('ENVIRONMENT', 'development') ;
if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL) ;
    ini_set("display_errors", 1) ;
}
/**
 * Configuration pour : URL
 * Ici, nous détectons automatiquement l'URL de vos applications et le sous-dossier potentiel. Fonctionne parfaitement sur la plupart des serveurs et dans les
 * et dans les environnements de développement locaux (comme WAMP, MAMP, etc.). Ne touchez pas à ceci à moins que vous ne sachiez ce que vous faites.
 *
 * URL_PUBLIC_FOLDER :
 * Le dossier qui est visible pour le public, les utilisateurs n'auront accès qu'à ce dossier, donc personne ne peut jeter un coup d'œil à
 * "/application" ou un autre dossier dans votre application ou appeler un autre fichier .php que index.php dans "/public".
 *
 * URL_PROTOCOL :
 * Le protocole. Ne le modifiez que si vous savez exactement ce que vous faites. Ceci définit la partie protocole de l'URL.
 * Dans les anciennes versions de MINI, c'était 'http://' pour le HTTP normal et 'https://' si vous avez un site HTTPS. Maintenant, le
 * Maintenant, le '//' indépendant du protocole est utilisé, ce qui reconnaît automatiquement le protocole.
 *
 * URL_DOMAIN :
 * Le domaine. Ne changez pas à moins que vous ne sachiez exactement ce que vous faites.
 *
 * URL_SUB_FOLDER :
 * Le sous-dossier. Laissez-le tel quel, même si vous n'utilisez pas de sous-dossier (ce sera alors juste "/").
 *
 * URL :
 * L'URL finale, auto-détectée (construite via les segments ci-dessus). Si vous ne voulez pas utiliser l'auto-détection,
 * alors remplacez cette ligne par l'URL complète (et le sous-dossier) et une barre oblique de fin de ligne.
 */
define('URL_PUBLIC_FOLDER', '') ;
define('URL_PROTOCOL', '//') ;
define('URL_DOMAIN', $_SERVER['HTTP_HOST']) ;
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])) ;)
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER) ;

/**
 * Configuration pour : Base de données
 * C'est l'endroit où vous définissez les informations d'identification de votre base de données, le type de base de données, etc.
 */
define('DB_TYPE', 'mysql') ;
define('DB_HOST', 'localhost') ;
define('DB_NAME', 'msystem') ;
define('DB_USER', 'msys') ;
define('DB_PASS', 'root') ;

define('DB_CHARSET', 'utf8') ;
