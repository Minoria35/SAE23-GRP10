<?php

    include 'functions\function.php';
    setup('Partenaires');
    pageheader('Partenaires', './partenaires.php');
    navbar('Partenaires');
?>

<div class="container-fluid row row-cols-1 row-cols-md-2 g-3" style="margin-top: 60px;">
        <div class="col">
            <div class="card h-100">
                <img class="card-img-top" src="images/Powermedia.jpg" alt="Card image" style="width:80%">
                <div class="card-body">
                    <h4 class="card-title">Power Média</h4>
                    <p class="card-text">Power Média est une petite entreprise Rennaise de reconditionnement
                        d'ordinateur portable et de smartphone. Je vous parle d'eux puisque j'ai effectuer mon premier
                        stage en seconde avec eux.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img class="card-img-top" src="images/INRAE.png" alt="Card image" style="width:80%">
                <div class="card-body">
                    <h4 class="card-title">INRAE</h4>
                    <p class="card-text">INRAE est l'Institut National de Recherche pour l'Agriculture, l'Alimentation
                        et l'Environnement. Je vous parle d'eux puisque j'ai effectuer mon
                        premier stage de première avec M. MAUBERT (Administrateur Réseau).</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img class="card-img-top" src="images/Hexatel.png" alt="Card image" style="width:80%">
                <div class="card-body">
                    <h4 class="card-title">Hexatel</h4>
                    <p class="card-text">Hexatel est un Opérateur télécom et réseaux. Je vous parle d'eux puisque j'ai
                        effectuer mon deuxième
                        stage de première aux sein de leur Centre d'Expertise Technique.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img class="card-img-top" src="images/RMetropole.png" alt="Card image" style="width:80%">
                <div class="card-body">
                    <h4 class="card-title">Rennes Métropoles</h4>
                    <p class="card-text">Finalement, j'ai réaliser mon stage de terminale à Rennes Métropoles, au sein
                        de l'unité télécom du service Infrastructure de la Direction des Systèmes d'Informations.</p>
                </div>
            </div>
        </div>
</div>

<?php
    footer();
?>