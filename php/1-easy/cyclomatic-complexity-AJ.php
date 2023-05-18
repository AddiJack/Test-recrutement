<?php

/* 
Utilisation d'un tableau labels afin de stocker les unités de tailles.
Utilisation d'une boucle forach pour itérer les unités et effectuer des conversions à la suite.
Ajout d'une condiction dans la boucle pour vérifier si la valeur est bien inférieure à 1024 ou si l'unité est HB. 
Alors la fonction retournera le résultat arrondi avec la bonne unité. 
Suppression des conversions redondantes des unités supérieurs à YB et utilisation direct de l'unité HB pour celles qui sont supérieus à 1024 YB.
Au lieu de $kilobytes, utilisation de la variable $value qui contient les valeurs en cours de conversion.
*/

function convertSize($bytes, $precision = 2) {
  $labels = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB', 'HB'];
  $value = $bytes;

  foreach ($labels as $label) {
    if ($value < 1024 || $label === 'HB') {
      return round($value, $precision) . ' ' . $label;
    }

    $value /= 1024;
  }
}

