<?php
session_start();
include 'functions.php';
deconnexion();
header('Location: connexion_user.php');
exit;
?>