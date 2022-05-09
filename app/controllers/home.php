<?php

class Home extends Controller{

    public function index(){
        /*
        * Les paramètres URL peuvent être reçus comme argument en spécifiant une variable pour lui dans la déclaration de la fonction.
        * EX : public function index($param1 , $param2){}
        * et peuvent être utilisés à l'intérieur de la fonction
        * traité par le modèle de fonction
        * - envoyé à la vue
        */
        
        //information sur l'utilisateur connecté
        global $loggedUser ;
        //récupération du modèle d'index
        $index = $this->model('Index') ;
        //affichage de la vue home/index
        $this->view('home/index', ['user' => $loggedUser ]) ;
    }

    
        /*
        * la méthode de connexion inclut un nouvel objet de la classe login
        * vérifie si les informations d'identification de l'utilisateur [nom d'utilisateur, mots de passe] sont fournies par POST  
        * Si oui, elle vérifie si les informations d'identification de l'utilisateur sont correctes en utilisant le modèle de connexion. 
        * Sinon, elle affiche la page de connexion
        */
    public function login(){

        $login = $this->model('Login') ;
        if(isset($_POST['username'])){

            $login->username = $_POST['username'] ;
            $login->password = $_POST['password'] ;
            $user = $login->userlogin() ;
            if(!$user){
                $this->view('home/login', [ 'error' => 'loginError' ]) ;
            }sinon{
                $this->view('home/index', [ 'msg' => 'loginSuccess', 'user' => $user ]) ;                
            }
        }else{
                $this->view('home/login') ;
        }


    }


    public function logout(){
            $logout = $this->model('Logout') ;
            $logout->userLogout() ;
            $this->view('home/login',['msg' => 'logoutSuccess']) ;
    }
}
