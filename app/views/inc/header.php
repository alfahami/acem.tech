<?php require APPROOT . '/helpers/title_helper.php';?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo APPNAME . ' | ' .
showTitle($view); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="actualités et mises à jour de l'étudiant comorien au Maroc"
    />
    <meta
      name="keywords"
      content="association des comoriens etudiants au Maroc, acem fes, comoriens de fes, acemfes, etudiants comoriens, lauréats comoriens, licence, master, Comoros, Maroc"
    />
    <meta name="author" content="AL-FAHAMI TOIHIR"/>
    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Exo -->
    <link href="https://fonts.googleapis.com/css2?family=Exo&display=swap" rel="stylesheet">
    <!-- Merriweather -->
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <!--  Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"/>
    <!-- Main style -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
    <!-- Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT; ?>/public/images/favicon.ico">
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php require APPROOT . '/views/inc/navbar.php';?>
