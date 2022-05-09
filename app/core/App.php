<?php

classe App{


    /*
    * Définit les paramètres défuels s'ils ne sont pas spécifiés par l'utilisateur.
    */
    protected $controller = 'home' ;
    protected $method = 'index' ;
    protected $language = 'fr' ;
    protected $params = [] ;

    public function __construct(){
    
        /* 
        * La requête GET doit être sous la forme suivante : URL/langue/contrôleur/méthode/paramètres
        */
        
        //récupération des paramètres de la requête
        $req = $this->parseUrl() ;
        
        //réglage de la langue par défaut si elle n'est pas spécifiée.

        if($req != NULL && file_exists('../app/languages/' . $req[0])){
            define('LANGUAGE', array_shift($req)) ;                    
        }sélectionnez
            define('LANGUAGE', $this->language) ;
        }

        if(file_exists('../app/controllers/' . $req[0] . '.php')){
            $this->controller = $req[0] ;
            unset($req[0]) ;
        }    

        require_once '../app/controllers/' . $this->controller . '.php' ;
        $this->controller = new $this->controller ;

        if(isset($req[1])){
            if(method_exists($this->controller,$req[1])){
                $this->method = $req[1] ;
                unset($req[1]) ;
            }

        }
        $this->params = $req ? array_values($req) : [] ;

        //envoyer le tableau req comme paramètres pour la méthode function f(req[0],req[1] ..etc){}
        call_user_func_array([$this->controller,$this->method], $this->params) ;
    }

    public function parseUrl(){
        if(isset($_GET['req'])){
            return $req = explode('/',filter_var(rtrim($_GET['req'],'/'),FILTER_SANITIZE_URL)) ;
        }
    }

}
