<?php require_once 'init.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.2/lux/bootstrap.min.css" integrity="sha512-c92Fgo6BOkdn6SLfXJQb1gBV26zNssZQwtkLPFoMX0B5JXd+yeOo0nx5v3rEYsjvMy97CpIRdsV4HA+AysY2Eg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= SITE ?>">Mon_App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= SITE ?>">Accueil

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <?php if(isset($_SESSION['utilisateur'])&& $_SESSION['utilisateur']['role']=='ROLE_ADMIN'): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ADMIN</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= SITE.'ajoutProduit.php' ?>">Ajouter un produit</a>
                        <a class="dropdown-item" href="<?=  SITE.'gestionProduit.php'; ?>">Gestion produit</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
               <?php endif;  ?>
            </ul>
         <?php if(!isset($_SESSION['utilisateur'])): ?>
            <a href="<?= SITE.'inscription.php'; ?>" class="btn btn-success me-3">Inscription</a>
            <a href="<?= SITE. 'connexion.php'; ?>" class="btn btn-info me-3">Connexion</a>
         <?php else: ?>
            <a href="<?= SITE. '?action=deco'; ?>" class="btn btn-info me-3">Deconnexion</a
         <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container mt-5">


    <?php      if (isset($_SESSION['messages']) && !empty($_SESSION['messages'])):
                    foreach ($_SESSION['messages'] as $type => $messages):                                                  foreach ($messages as $index=>$message):                                                                                                                 ?>

                               <div class="alert alert-<?=  $type; ?> text-center w-50 mx-auto ">
                               <p><?=  $message; ?></p>
                                </div>


     <?php
     unset ($_SESSION['messages'][$type][$index]);

     endforeach;endforeach;endif;  ?>