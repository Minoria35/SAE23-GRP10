<?php
include 'functions\function.php';
setup('Avis');
pageheader('Avis', './avis.php');
navbar('Avis');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ils ont donné leur avis</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .etoiles {
      font-size: 0;
    }

    .etoile {
      display: inline-block;
      width: 30px;
      height: 30px;
      background-image: url('images/etoile.png');
      background-size: cover;
    }

    .avis {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Ils ont donné leur avis</h1>
    <br>
    <div id="avis-container"></div>
  </div>

  <script>
    const avis = [
      { notation: 4, commentaire: "Excellent service, je le recommande vivement !" },
      { notation: 3, commentaire: "Bonne expérience globale, mais quelques améliorations pourraient être apportées." },
      { notation: 5, commentaire: "Le meilleur service que j'ai jamais utilisé, je suis entièrement satisfait !" }
    ];

    const avisContainer = document.getElementById('avis-container');

    avis.forEach(function(avis) {
      const avisElement = document.createElement('div');
      avisElement.classList.add('avis');
      avisElement.style.marginBottom = '50px';

      const etoilesElement = document.createElement('div');
      etoilesElement.classList.add('etoiles');

      for (let i = 0; i < avis.notation; i++) {
        const etoileElement = document.createElement('span');
        etoileElement.classList.add('etoile');
        etoilesElement.appendChild(etoileElement);
      }

      avisElement.appendChild(etoilesElement);

      const commentaireElement = document.createElement('p');
      commentaireElement.textContent = avis.commentaire;
      avisElement.appendChild(commentaireElement);

      avisContainer.appendChild(avisElement);
    });
  </script>
</body>
</html>
