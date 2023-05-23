<?php
    include '..\function.php';

    $json = json_decode(file_get_contents('..\..\data\users.json'), true);

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if ($password == $password2) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        foreach($json as $user){
            if ($user['username'] == $username) {
                echo '
                <div class="alert alert-danger" role="alert">
                    Le nom d\'utilisateur existe déjà
                </div>';
                exit();
            }else{
                $new_user = array(
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'role' => $role
                );
                array_push($json, $new_user);
                file_put_contents('..\..\data\users.json', json_encode($json));
            }
        }
        
    } else {
        echo '
        <div class="alert alert-danger" role="alert">
            Les mots de passe ne correspondent pas
        </div>';
    }

    header('Location: ..\..\admin_page\admin.php');
?>