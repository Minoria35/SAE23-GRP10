<?php

    $json = json_decode(file_get_contents('../../data/users.json'), true);

    $username = $_GET['username'];

    foreach($json as $user){
        if($user['username'] != $username){
            $updated_users[] = $user; 
        }
    }

    file_put_contents('../../data/users.json', json_encode($updated_users));

    header('Location: ..\..\admin_page\admin.php');
?>