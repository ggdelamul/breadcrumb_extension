# Développement d'un fil d'ariane pour les articles et les pages

## Mettre en place la fonction breadCrumb sur le header.php avec le code suivant dans les thème classique

```

<?php
 if(function_exists('breadCrumb')){
 echo breadCrumb();
 }
 ?>

```

## Utilisez le short code pour les thèmes à base de bloc

ajoutez le code court dans le modèle header du thème
[mybreadcrumb]

## Pour élémentor

Ajout du bloc code court à l’en-tête avec l’extension Elementor Header & Footer Builder
[mybreadcrumb]
