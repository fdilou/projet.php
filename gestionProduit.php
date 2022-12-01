<?php require_once 'inc/header.php';
if (!isset($_SESSION['utilisateur']) || (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role']!=='ROLE_ADMIN')){
    header('location:./');
    exit();

}
$requete=executeRequete("SELECT * FROM produit");
$produits=$requete->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['action']) && $_GET['action']=='delete'){
    $r=executeRequete("DELETE FROM produit WHERE id=:id",array(
        ':id'=>$_GET['id']
    ));
    $_SESSION['messages']['success'][]='Produit supprimé avec succès';

    header('Location:./gestionProduit.php');
    exit();

}

?>




<table class="table table-success table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Titre</th>
        <th scope="col">Prix</th>
        <th scope="col">Photo</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($produits as $produit):  ?>
        <tr>
            <th scope="row"><?=  $produit['id']; ?></th>
            <td><?=  $produit['titre']; ?></td>
            <td><?=  $produit['prix']; ?>€</td>
            <td><img src="<?=  'upload/'.$produit['photo']; ?>" width="100" alt=""></td>
            <td><a href="<?=  SITE.'modificationProduit.php?id='.$produit['id']; ?>" class="btn btn-info">Modifier</a>
                <a href="?action=delete&id=<?=  $produit['id']; ?>" onclick="return confirm('Etes-vous sûr?')" class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php endforeach;  ?>

    </tbody>
</table>





<?php require_once 'inc/footer.php' ?>
