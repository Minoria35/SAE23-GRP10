<!DOCTYPE html>
<html>
<head>
<?php include 'functions.php';
$titre = "Plaprêt";
$pageactive = "";
setup("Page d'accueil");
pageheader($titre);
pagenavbar($pageactive);
?>
</head>
<body>
<br>
  <h2 id="texteAGlisser">Présentation de l'entreprise</h2>
  <br>
<div class=container>
  <h3 id="texteAGlisser">Qui sommes-nous ?</h3>
  <p>

Nous sommes une jeune entreprise spécialisée dans les bons plats à simplement réchauffer au micro-ondes qui ont simplement voulu vivre de leur passion, l'élaboration de plats goûtus, de qualité, en en faisant profiter les papilles de chacun d'entre vous qui nous ferait confiance. Retrouvez sur notre site différentes pages permettant d'en connaître plus sur l'entreprise.</p>
<br>
<h4>Membres de l'entreprise</h4>
<h5><strong>- Martin Desruisseaux :</strong> directeur général</h5>
<h5><strong>- Véronique Mathieu :</strong> cheffe culinaire</h5>
<h5><strong>- Vivienne Fréchette :</strong> Ingénieure en industrialisation</h5>
<h5><strong>- Yseult Deslauriers :</strong> Responsable communication</h5>

<h3>Le mot de la direction</h3>
<p>

Cette entreprise a vu le jour il y a déjà trois ans et demi maintenant. Depuis un an, nous nous efforçons à vous fournir des produits d'une qualité incomparable. Chacun de nos plats est confectionné en France (à Saint-Malo, 35400) avec des produits 100% français, ce qui fait la force et la qualité de notre entreprise. Présents à Saint-Malo, nous prévoyons dans le futur de nous agrandir en ouvrant différents centres de production en France pour produire vos plats encore plus proche de vous, où que vous soyez.
<h3>Activités de Plaprêt</h3>
<h5>Notre engagement avec Restos du Cœur</h5>
<p>
Chez Plaprêt, nous nous engageons à faire don d'au moins 500 plats prêts à la consommation par an, pour un monde meilleur.
 </p>
<h5>Notre participation au programme télévisé "La meilleure entreprise de France"</h5>
<p>L'année dernière, Plaprêt, fort de son innovation pour son dernier produit, un mélange de différents épices à mettre sur tous vos plats, a été mis à l'honneur dans l'émission présentée sur France 2 "La meilleure entreprise de France". Nous avons pu mettre à l'honneur notre entrepot 100% éco-responsable et nos produits 100% français. </p>
<h3>Partenaire</h3>
<p style="float:left"><img src="images/logo.png" alt="Logo_partenaire"></p>

<p>Nous sommes fiers de travailler continuellement avec notre partenaire FD, spécialiste dans l'industrialisation éco-responsable. Ce parteneriat représente un enjeu majeur dans le développement de notre entreprise.</p>
<br><br><br><br>
</div>

<?php    
    //Créé le fichier users.json avec les 4 premiers utilisateurs définis dans functions.php :
    newUsers();

pagefooter();
?>
<script>
const element = document.getElementById('texteAGlisser');

const positionFinale = 15;

const vitesse = 100;

const distanceTotale = element.parentNode.offsetWidth * (positionFinale / 100) - element.offsetLeft;

const duree = Math.abs(distanceTotale / vitesse * 1000);

element.style.position = 'relative';

function glisserTexte() {
  const tempsDebut = new Date().getTime();

  function animer() {
    const tempsMaintenant = new Date().getTime();
    const tempsEcoule = tempsMaintenant - tempsDebut;

    const positionActuelle = element.offsetLeft;
    const deplacement = vitesse * (tempsEcoule / 1000);
    const nouvellePosition = positionActuelle + deplacement;

    element.style.left = nouvellePosition + 'px';

    if ((deplacement > 0 && nouvellePosition < distanceTotale) || (deplacement < 0 && nouvellePosition > distanceTotale)) {
      requestAnimationFrame(animer);
    }
  }

  requestAnimationFrame(animer);
}

glisserTexte();
</script>
</body>
</html>
