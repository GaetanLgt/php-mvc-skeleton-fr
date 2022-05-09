<?php 


class Logout extends Database {


    /*
    * Déconnexion de l'utilisateur en détruisant la session en cours.
    * il serait différent d'utiliser une autre méthode de connexion !
    */
    public function userLogout(){
        $_SESSION = array() ;
        session_destroy() ;                
    }


}
