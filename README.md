# PHP MVC skeleton fr


Un squelette d'application web PHP POO qui utilise le modèle architectural MVC pour créer une application de base contenant des systèmes de login et de multi-langage et qui peut être utilisé dans n'importe quel projet web.

- Il a été créé pour éviter de devoir créer un script MVC à partir de zéro. 

## Description 

Squelette php basique d'une application web MVC (modèle-vue-contrôleur) que vous pouvez utiliser pour construire votre application sur cette base ou pour comprendre le modèle MVC.

## Caractéristiques 
1. Application basée sur MVC
2. Connexion à la base de données MYSQL
3. multi-langue
4. système de connexion
4. stockage et récupération des sessions

## Comment cela fonctionne 
Il s'agit d'une application MVC normale, qui se compose de modèles, de vues et de contrôleurs. 
1. Tout d'abord, il exécute le script d'initiation [init.php](app/init.php).
    - Le script d'initiation charge les scripts principaux et les fichiers de confinguration.
2. Ensuite, une nouvelle instance d'application est créée et l'url est analysée dans la classe [App.php](app/core/App.php#L51).
3. Dans la classe [App.php](app/core/App.php#L13) la langue demandée est définie et le contrôleur demandé est chargé ex : contrôleur [home.php](app/controllers/home.php).
4. Une instance de classe de contrôleur est créée et la méthode demandée est appelée.
5. La méthode appelle la méthode du modèle et dans la méthode de chargement du modèle, nous vérifions la connexion [Controller model](app/core/Controller.php#L10).
    - Si l'utilisateur est connecté, il obtiendra le modèle demandé, sinon il sera redirigé vers le login.
6. La méthode du contrôleur appelle ensuite la méthode de la vue et dans la méthode de chargement de la vue, nous chargeons les fichiers de langue et la mise en page.  [Vue du contrôleur](app/core/Controller.php#L37)

## Structure du répertoire
1. [app](app) : Backend de l'application
    - [config](app/config) : fichiers de configuration
    - [core](app/core) : scripts de base appelés dans l'initiation de l'application 
    - [Helper](app/Helper) : fonctions d'aide telles que les fonctions courantes et les fonctions de base de données.
    - [languages](app/languages) : les langues contiennent des répertoires avec le code de la langue.
    - [controllers](app/controllers) : contrôleurs d'application
    - [models](app/models) : modèles d'application
    - [views](app/views) : vues de l'application
    - [init.php](app/init.php) : script d'initiation qui inclut les scripts nécessaires.
    - [.htaccess](app/.htaccess) : fichier htaccess pour empêcher les utilisateurs d'entrer dans cette zone.

2. [public](public)
    - [index.php](public/index.php) : crée une instance d'application.
    - [.htaccess](public/.htaccess) : htaccess pour contrôler l'écriture de l'url. 
    - [css](public/css) : contient les fichiers de style css.
    - [js](public/js) : contient les fichiers javascript.

## Comment l'utiliser
- Il suffit de cloner le dépôt et de commencer à construire sur le squelette fourni.


## Enfin 
Je serai heureux de voir la contribution envoyer une demande de pull, 
si vous avez des questions vous pouvez ouvrir un problème.

