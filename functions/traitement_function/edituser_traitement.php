<?php

    $json = json_decode(file_get_contents('../../data/users.json'), true);

    $username = $_POST['username'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
    $roles = $_POST['role'];

    if($password1 != $password2){
        echo '<div class="alert alert-danger" role="alert">
        Les mots de passe ne correspondent pas
        </div>';
    }
    else {
        $password = $password1;
    }

    $updated_users = array();

    foreach($json as $user){
        if($user['username'] == $username){
            
            $updated_user = array(
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'email' => $email,
                'role' => $roles
            );
            $updated_users[] = $updated_user; 
        } else {
            $updated_users[] = $user; 
        }
    }
    
    $json_updated = json_encode($updated_users, JSON_PRETTY_PRINT);
    file_put_contents('../../data/users.json', $json_updated);

    header('Location: ../../Intranet/admin.php');

?>