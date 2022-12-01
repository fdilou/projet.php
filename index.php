<?php require_once 'inc/header.php';

if (isset($_GET['action']) && $_GET['action']=='deco'){

    unset($_SESSION['utilisateur']);
    $_SESSION['messages']['info'][]='A bientôt, merci de votre visite &#128522';
    header('location:./');
    exit();

}

$requete=executeRequete("SELECT * FROM produit");
$produits=$requete->fetchAll(PDO::FETCH_ASSOC);
// $requete est objet PDOStatement, on appelle sa méthode fetchAll() pour convertir le jeu de résultat en données avec en argument PDO::FETCH_ASSOC qui lui indique de convertir ces données en tableau associatif pour chaques insert

//var_dump($produits);

?>


<div class="row justify-content-evenly">

    <?php foreach ($produits as $produit):  ?>

        <div class="card col-md-4 m-4 p-0 rounded border-success mb-3" style="max-width: 20rem;">
            <img src="<?=  'upload/'.$produit['photo']; ?>" alt="">
            <div class="card-header "><?=  $produit['titre']; ?></div>
            <div class="card-body">
                <h4 class="card-title"><?=  $produit['prix']; ?>€</h4>
                <p class="card-text"><?=  $produit['description']; ?></p>
            </div>
        </div>

    <?php endforeach;  ?>


</div>





<?php require_once 'inc/footer.php'; ?>


