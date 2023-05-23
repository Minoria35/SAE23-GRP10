<?php

function setup($title) {
  echo "<!DOCTYPE html>";
  echo "<html lang='fr'>";
  echo "<head>";
  echo "<meta charset='UTF-8'>";
  echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
  echo "<meta http-equiv='X-UA-Compatible' content='ie=edge'>";
  echo "<title>$title</title>";
  echo "<link rel='icon' type='image/png' href='favicon.png'/>";
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>';
  echo "</head>";
  echo "<body>";
}
function pageheader($titre) {
    ?>
    <?php session_start();?>
    <header class="jumbotron">
        <p style="float:left"><img src="images/logo-livre.png" alt="Logo"></p>
        <h1><?php echo $titre; ?></h1>
        <?php if (authentifie()): ?>
            <form method="post" action="deconnexion.php">
                <input type="submit" value="Se déconnecter">
            </form>
        <?php else: ?>
            <form method="post" action="connexion_user.php">
                <input type="submit" value="Se connecter">
            </form>
        <?php endif; ?>
    </header>
    <?php if (authentifie()) { ?>
     <p>Vous êtes connecté en tant que <?php echo $_SESSION['usr']; ?>.</p>
 <?php } ?>
    <?php 
    }


function pagenavbar($pageactive) {
  $pageactive = array(
  array('titre' => 'Page d\'accueil', 'url' => 'page01.php'),
  array('titre' => 'Formulaire', 'url' => 'page02.php'),
  array('titre' => 'Informations', 'url' => 'page04.php'),
  //array('titre' => 'Fichiers', 'url' => 'page05.php'),
  array('titre' => 'Administration', 'url' => 'page06.php'),
  array('titre' => 'Gestion', 'url' => 'page07.php'),
  array('titre' => 'Informations TP2', 'url' => 'page08.php')


);
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav"> 
      <div class="connexion-header">
</form>
      </div>

        <?php
        foreach($pageactive as $page) {
          echo '<li class="nav-item">';
          echo '<a class="nav-link" href="' . $page['url'] . '">' . $page['titre'] . '</a>';
          echo '</li>';
        }
        ?>
        <?php 
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $url = "https"; 
  else
    $url = "http"; 
    
  $url .= "://"; 
    
  $url .= $_SERVER['HTTP_HOST']; 
    
  $url .= $_SERVER['REQUEST_URI']; 
      
  echo "Vous êtes actuellement sur la page " . $url; 
?>
      </ul>
    </div>
  </nav>
  <?php
}

function pagefooter() {

  $date = date("d/m/Y H:i:s");
  $ip = $_SERVER['REMOTE_ADDR'];
  $port = $_SERVER['REMOTE_PORT'];
  $auteur = "Victor Cocard";
  $email = "victorcocard@gmail.com";
  $groupe = "FI1G1";
  $annee = date("Y");

  $affichage_footer = '<footer class="jumbotron jumbotron-fluid bg-dark text-light text-center mb-0">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <p class="lead mb-0">' . $auteur . ' - ' . $email . ' - ' . $groupe . ' - ' . $date . '</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <p class="mb-0">&copy; ' . $annee . ' -- Adresse IP : ' . $ip . ' - Port : ' . $port . '</p>
                  </div>
                </div>
              </div>
            </footer>';

  echo $affichage_footer;
}


function showBooks($livres){
    echo '<div class="container">';
    echo '
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Synopsis</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Parution</th>
                </tr>
            </thead>
            <tbody>';
              $books = json_decode(file_get_contents($livres), true);
              if (is_array($books) || is_object($books)) {
                foreach ($books as $book) {
                  echo '<tr>
                  <th scope="row">' . $book['id'] . '</th>';
                  echo '<td>' . $book['title'] . '</td>';
                  echo '<td>' . $book['content'] . '</td>';
                  echo '<td>' . $book['author'] . '</td>';
                  echo '<td>' . $book['date'] . '</td>';
                  echo '</tr>';
            }
          }
    echo '</tbody>
        </table>
    </div>
    </div>';
}

function findBooks($livres, $keyword, $fields=[]){
$json = file_get_contents($livres);
$data = json_decode($json, true);

$result = [];
    
foreach($data as $livre){
    foreach($livre as $key[] => $value){
        if (in_array($fields, $key)){ 
            if(stripos($value, $keyword) !== false){
                $result[] = $livre;
                break;
                }
            }
        }
    }

    $json = json_encode($result);
    $file = 'data/recherche.json';
    file_put_contents($file, $json);
    return $file;
}







//TP2 : fonctions PHP

function newUsers() {
    $users = [
        "admin" => [
            "user" => "admin",
            "mdp" => password_hash("bonjour", PASSWORD_DEFAULT),
            "role" => "admin"
        ],
        "user1" => [
            "user" => "user1",
            "mdp" => password_hash("bonjour", PASSWORD_DEFAULT),
            "role" => "user"
        ],
        "user2" => [
            "user" => "user2",
            "mdp" => password_hash("bonjour", PASSWORD_DEFAULT),
            "role" => "user"
        ],
        "user3" => [
            "user" => "user3",
            "mdp" => password_hash("bonjour", PASSWORD_DEFAULT),
            "role" => "user"
        ]
    ];
    
    $file = 'data/users.json';
    $json = json_encode($users);
    file_put_contents($file, $json);
}

function addUser($usr, $mdp, $role = "user") {
    $file = 'data/users.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    $users[$usr] = [
        "user" => $usr,
        "mdp" => $hash,
        "role" => $role
    ];
    $json = json_encode($users);
    file_put_contents($file, $json);
}

function deleteUser($usr) {
    $file = 'data/users.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    unset($users[$usr]);
    $json = json_encode($users);
    file_put_contents($file, $json);
}

function deconnexion() {
    session_unset();
    session_destroy();
}

function connexion($usr, $mdp) {
    $users = json_decode(file_get_contents('data/users.json'), true);
    foreach ($users as $user) {
        if ($user['user'] === $usr && password_verify($mdp, $user['mdp'])) {
            $_SESSION['authenticated'] = true;
            $_SESSION['usr'] = $usr;
            return true;
        }
    }
    return false;
    }

function authentifie() {
    return isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == true;
}
function getUsers() {
    $file = 'data/users.json';
    $json = file_get_contents($file);
    $users = json_decode($json, true);
    return $users;
}

function findUsers($texte) {
    $users = getUsers();
    $result = [];
    foreach ($users as $user) {
        if (strpos($user['user'], $texte) !== false) {
            $result[] = $user;
        }
    }
    return $result;
}
?>

<?php






?>