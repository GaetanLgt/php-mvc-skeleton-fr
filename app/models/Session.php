<?php 

/*
* Classe de session pour démarrer une session à chaque fois et vérifier la connexion de l'utilisateur. 
*
*/

class Session extends Database {


    function __construct(){
        parent::__construct() ;
        session_start() ; // démarre une nouvelle session ou reprend une session existante
             
     }

    function checkLogin(){
        if (isset($_SESSION['user_id'])){
                /*
                * vérifie si l'utilisateur existe dans la base de données, renvoie false si non 
                * si l'utilisateur existe, un tableau contenant les informations de l'utilisateur est retourné.
                *
                * recherche de l'identifiant, renvoie les données de l'utilisateur dans un tableau ou renvoie false si l'utilisateur n'existe pas.
                */
        }
        retourne false ;    

    }
}
