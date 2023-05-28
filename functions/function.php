<?php

    function setup($title){ // $title = titre de la page
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>'.$title.'</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="../js/to_top.js"></script>
            <link rel="stylesheet" href="../css/to_top.css">
        </head>
        <body>';
    }

    function pageheader($titre, $pagephp){  // $titre = titre de la page, $pagephp = nom de la page php
        session_start();
        echo '<body>
            <div class="jumbotron jumbotron-fluid">
                <div class="container-fluid sm-4">
                    <h1 class="display-4">' . $titre . '
                        <div class="d-flex justify-content-end"> <h4> Page : '. $pagephp .'</h4>
                        </div>
                    </h1>';
                    if(isset($_SESSION['username']) && isset($_SESSION['roles'])){
                        //echo $_SESSION['username'] . ' (' . $_SESSION['role'] . ')';
                        echo '<div class="connexion-header d-flex justify-content-end">
                        <a href="../functions/traitement_function/deconnexion.php" class="btn btn-outline-dark btn-sm">Se déconnecter</a>
                        </div>';
                    }
                    else {
                        //echo $_SESSION['username'] . ' (' . $_SESSION['role'] . ')';
                        echo '<div class="connexion-header d-flex justify-content-end">
                        <button class="btn btn-outline-dark btn-sm edit-cxs-user" data-bs-toggle="modal" data-bs-target="#edit-cxs-modal">Se connecter</button>
                        </div>';

                        echo '
                            <div class="modal fade" id="edit-cxs-modal" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content container-fluid">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel">Connexion de l\'utilisateur</h5>
                                </div>
                                <form action="../functions/traitement_function/connexion.php" method="post">
                                    <div class="form-group">
                                        <h6 class="modal-title">Nom d\'utilisateur</h6>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Nom d\'utilisateur">
                                    </div>
                                    <div class="form-group">
                                        <h6 class="modal-title">Mot de passe</h6>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Se connecter</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>';

                            echo '
                            <script>
                                const editUserBtns = document.querySelectorAll(\'.edit-user-btn\');
                                const usernameInput = document.getElementById(\'username\');
                            
                                editUserBtns.forEach(btn => {
                                    btn.addEventListener(\'click\', () => {
                                        const username = btn.getAttribute(\'data-username\');
                                        usernameInput.value = username;
                                    });
                                });
                            </script>
                            ';

                        }
                        echo '<br>
                            </div>
                        </div>';
    }


    function navbar($pactive_page){ // $pactive_page = permet de comparer la page active pour quelle soit visible dans le navbar
        echo '
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="nav navbar-nav">
            ';

        if(file_exists('./data/menu.txt')){
            $menu = fopen('./data/menu.txt','r');
        }else{
            $menu = fopen('../data/menu.txt','r');
        }
        if ($menu){
            while (!feof($menu)){
                $buffer = fgets($menu);
                $elements = explode(';', $buffer);
                $dossier = $elements[0];
                $titre = $elements[1];
                $lien = trim($elements[2]);
                $role = trim($elements[3]);

                if(isset($_SESSION['roles'])){

                    if($role == "none"){
                        if($titre == $pactive_page){echo '<li class="active"><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                        ';} 
                        else {
                            echo '<li><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                            ';
                        }
                    }
                    
                    foreach($_SESSION['roles'] as $roles){
                        if($role == "salarie" && $roles == "salarie"){
                            if($titre == $pactive_page){echo '<li class="active"><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                            ';} 
                            else {
                                echo '<li><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                                ';
                            }
                        }elseif($role == "manager" && $roles == "manager"){
                            if($titre == $pactive_page){echo '<li class="active"><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                            ';} 
                            else {
                                echo '<li><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                                ';
                            }
                        }elseif($role == "direction" && $roles == "direction"){
                            if($titre == $pactive_page){echo '<li class="active"><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                            ';} 
                            else {
                                echo '<li><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                                ';
                            }
                        }elseif($role == "admin" && $roles == "admin"){
                            if($titre == $pactive_page){echo '<li class="active"><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                            ';} 
                            else {
                                echo '<li><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                                ';
                            }
                        }
                    }
                }else{
                    if($role == "none"){
                        if($titre == $pactive_page){echo '<li class="active"><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                        ';} 
                        else {
                            echo '<li><a class="nav-link navbar-brand" href="' . $dossier . $lien . '">' . $titre . '</a></li>
                            ';
                        }
                    }
                }
            }
        fclose($menu);
        }
        echo ' 
            </ul> 
            </div>';
            echo '  
            </div>
            </span>
            </nav>
            <br>
            ';
    }

    function footer(){
        echo '
            <div>
                <button onclick="scrollUp()" id="scrollUp"><img src="../images/to_top.png" width="45"/></button> 
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Informations</h4>
                            <ul class="list-unstyled">
                                <li><a href="../../qui_sommes_nous.php">Qui sommes-nous ?</a></li>
                                <li><a href="#">Nous contacter</a></li>
                                <li><a href="#">Mentions légales</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        ';
    }

    function connexion($username, $password){
        session_start();
        $users = json_decode(file_get_contents('../../data/users.json'), true);
        foreach($users as $user){
            if($user['username'] == $username){
                if($user['password'] == null){
                    $_SESSION['username'] = $username;
                    $_SESSION['roles'] = $user['role'];
                    return true;
                }elseif($user['password'] == password_verify($password, $user['password'])){
                    $_SESSION['username'] = $username;
                    $_SESSION['roles'] = $user['role'];
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
    
    function deconnexion(){
        session_start();
        session_unset();
        session_destroy();
    }

    function histoire(){
        echo '<body>
        <script type="text/javascript">
              function changeCouleur(element) {
                element.style.color = "white";
                element.style.fontWeight = "bold";
                element.style.backgroundColor = "black";
                  
            }
        </script>
        <br>
        <div class="timeline">
            <div align="center">
                <div class="container"  >
                    <article onmouseover = "changeCouleur(this)">
                        <h2>Fondation de l\'entreprise</h2>
                        <ul id="Fondation de lentreprise">
                            <span>L\'entreprise est fondée par Jean-Louis Bonneau</span><br>
                            <span>Date :</span> 15/03/2015 
                        </ul>
                    </article>
                </div>
                <img src="images/flechebas.png" width="50em">
                <div class="container" id="acquisition">
                    <article onmouseover = "changeCouleur(this)">';
                       echo "<h2>Première acquisition</h2>
                        <ul>
                            <span>L'entreprise acquiert ...</span><br>
                            <span>Date :</span> 22/09/2007 
                        </ul>
                    </article>
                </div>";
               echo '<img src="images/flechebas.png" width="50em">
                <div class="container" id="nouvpre">
                    <article onmouseover = "changeCouleur(this)">
                        <h2>Nouveau président</h2>
                        <ul>
                            <span>David Gatel et François-Régis Menguy deviennent les nouveaux présidents de l\'entreprise</span><br>
                            <span>Date :</span> 10/12/2012 
                        </ul>
                    </article>
                </div>
                <img src="images/flechebas.png" width="50em">
                <div class="container" id="exp">
                    <article onmouseover = "changeCouleur(this)">
                        <h2>Expansion territoriale</h2>
                        <ul>
                            <span>L\'entreprise ouvre son premier magasin en Angleterre</span><br>
                            <span>Date :</span> 30/03/2021 
                        </ul>
                    </article>
                </div>
                <img src="images/flechebas.png" width="50em">
                <div class="container" id="ChangNom">
                    <article onmouseover = "changeCouleur(this)">';
                        echo "<h2>Changement de nom</h2>
                        <ul>
                            <span>L'entreprise change de nom pour devenir ...</span><br>
                            <span>Date :</span> 10/05/2023 
                        </ul>
                    </article>
                </div>";
               echo "
            </div>
        </div>
    </body>";
    }
?>
