<?php

define('SITE','/PHP/projet/');

$pdo=new PDO('mysql:host=localhost;dbname=projet', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8') );



function executeRequete($requete, $data=array())
{
    // le paramètre $requete recoit une requete sql. Le paramètre $data recoit un tableau associatif avec en indice les marqueurs et en valeurs les données transmises provenant pour la plus part des saisies du formulaire

    // boucle d'echapement des caractères speciaux en entité HTML
    foreach ($data as $marqueur=>$valeur){

        $data[$marqueur]=htmlspecialchars($valeur);
        // grace à htmlspecialchars, on transforme les chevrons <> en entité HTML pour éviter les injections de style ou de script en BDD. On parle de faille css (style) et xss (pour le script js)

    }

    global $pdo;// permet d'accèder à notre $pdo déclaré dans l'espace global

    $resultat=$pdo->prepare($requete);// on prépare la requête reçu.
    $success= $resultat->execute($data);// on appelle la méthode d'execution de la requete à laquelle on passe le tableau de marqueurs associé à leur valeur

    // $resultat renvoi un booléen que l'on stocke dans $success
    if ($success){ // si $success est vrai on renvoie le résultat (objet PDOStatement dans une requete de select ou booléen dans une requete d'update, insert ou delete )

        return $resultat;

    }else{

        return false;
    }



}

session_start();