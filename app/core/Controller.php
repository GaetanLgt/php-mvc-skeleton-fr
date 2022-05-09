<?php 

classe Contrôleur{

    /* fonction modèle appelée pour créer un objet d'une classe modèle.
    * il vérifie d'abord la connexion de l'utilisateur si ce n'est pas le cas il affichera la page de connexion.
    * si l'utilisateur est connecté, la requête se poursuit.
    */

    public function model($model){
            require_once '../app/models/Session.php' ;
            global $loggedUser ;
            $session = new Session ;
            $loggedUser = $session->checkLogin() ;
            /*
            * Comparaison du modèle demandé avec le statut de l'utilisateur 
            * Si l'utilisateur est connecté, il ne peut pas demander le modèle de connexion.
            * Si l'utilisateur n'est pas connecté, il sera redirigé vers le modèle de connexion.
            */

            if(!$loggedUser && $model != 'Login'){
                header('Location : ' . URL . '/' . LANGUAGE .'/home/login') ;
            }elseif($loggedUser && $model == 'Login'){
                header('Location : ' . URL . '/' . LANGUAGE .'/home/index') ;
            }

            require_once '../app/models/' . $model . '.php' ;
            return new $model() ;
    }


    /* fonction de vue appelée pour créer un objet d'une classe de vue
    * elle inclut les fichiers de langage nécessaires
    * elle charge la vue requise.
    */

    public function view($view, $data = []){
        
        /*
        * Un fichier de langue principal appelé main contient les variables principales comme le nom du site et la description dans différentes langues.
        * chaque vue doit avoir le fichier de langue avec le même nom contient un tableau associatif appelé
        * lang = array('key' => 'value') ;
        * dans le répertoire de la langue
        */
        if(!isset($data['lang']['main'])){
            require_once("../app/languages/" . LANGUAGE . "/main.php") ;
            /* $lang est un tableau qui est défini dans le fichier de langue. */
            $data['lang']['main'] = $lang ;
         }
 
        $data['view'] = $view ;
        if(!isset($data['lang'][$view])){
           require_once("../app/languages/" . LANGUAGE . "/". $view .".php") ;
            /* $lang est un tableau qui est défini dans le fichier de langue. */
            $data['lang'][$view] = $lang ;
        }

        //incluant l'en-tête, la vue et le pied de page    
        require_once '../app/views/layout/header.php' ;
        require_once '../app/views/' . $view . '.php' ;
        require_once '../app/views/layout/footer.php' ;
    }

}
