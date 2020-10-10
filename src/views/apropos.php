<?php
 ob_start();
?>
<div id="container">
  <h4>Introduction</h4>
  <p>
    Ce site a été réalisé dans le cadre de notre formation en Licence informatique.
    Il rentre dans le processus d'évaluation du module Technologie Web.
    Par groupe de deux étudiants nous devions développer un site en utilisant une architechture MVCR.
    Le choix du sujet pour le site est libre, mais devait forcement faire intervenir une gestion d'objet ( supression, ajout, listing... ).
    Nous avons choisi de le faire sur <b>un site de vente type le bon coin de produit informatique</b> (Ordinateur, souris, clavier...).

  </p>
  <h4>Etudiants ayant travaillé sur ce site:</h4>
  <ul>
    <li>étudiant numéro 21504712</li>
    <li>étudiant numéro 21500894</li>
  </ul>


  <h4>Choix du sujet et du design:</h4>
  <p>Le sujet nous demander de choisir un objet que l'on pouvait suprimer, ajouter, modifier, lister ...
  Nous avons donc directement pensé à faire à un site d'annonce car il s'adapte parfaitement à l'exercice.
  Ensuite en temps que parfaits informaticiens nous avons choisi de travailler sur des annonces de matériels informatiques.
  </p>

  <p>
  Le nom de notre site <b>Logitech'noweb</b>, est un clin d'oeil à la marque Logitech et au nom de notre cour, réalisé à l'aide d'un jeu de mot (Vive l'humour!!).
  </p>

  <p>
  Pour notre site nous avons opté pour des vues sobres et épurées, notamment pour ce qui est des formulaire.
  On utilise des couleurs foncées pour notre page d'accueil, nos menus et nos bas de page.
  Pour ce qui est du contenue de nos pages ils utilisent des couleurs clair/pastel car elle permettent une bonne lisibilité.
  </p>

  <p>
  Pour ce qui est de la présentation de nos pages, nous avons choisi une présentation classique avec une barre de navigation, une page principale de contenue et un footer.
  </p>

  <h4>Fonctionnalitées mise en place dans le cadre du projet / contenue du site:</h4>
  <ul>
    <li>Une page d'accueil avec le logo du site.</li>
    <li>Une barre de navigation et un footer présentés sur chaque page, ils permettent la navigation au sein du site.</li>
    <li>Une page gallerie (Nos annonces) permettant de consulter toutes les annonces postées</li>
    <li>Une page de création d'annonce via un formulaire</li>
    <li>Une page d'inscription au site (l'inscription est nécessaire pour obtenir toutes les fonctionnalitées)</li>
    <li>Une page de connexion pour s'identifier au site</li>
    <li>Une page contact qui envoie un mail a l'équipe de développeur </li>
  </ul>

  <h4>Fonctionnalitées supplémentaires techniques:</h4>
  <ul>
    <li>Récriture de nos adresses/urls à l'aide d'un fichier .htacess.</li>
    <li>Filtre de nos annonces à l'aide d'un champ de recherche.</li>
  </ul>

  <h4>Perspectives d'améliorations:</h4>
  <ul>
    <li>Amélioration de l'aspect graphique.</li>
    <li>Amélioration de la recherche d'annonce, avec la mise en place de nouveau filtre.</li>
    <li>Permettre à l'utilisateur de modifier une annonce qui lui appartient. (Pas implementer car ajoute des erreurs sur une autres partie du code)</li>
  </ul>
</div>



<?php
  $this->content = ob_get_contents();
  ob_end_clean();
?>
