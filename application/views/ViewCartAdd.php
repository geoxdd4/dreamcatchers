<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>
Panier
</h1>

Produit ajouté avec succès.</br>
</br>

<?= $productFromDb->name ?> diam <?= $productFromDb->diameter ?> cm</br>
Quantité : <?= $this->helpersession->getCart()->getItems()[ $productFromDb->reference ] ?></br>
Total : <?= $this->helperprice->format($productPriceFromDb) ?></br>
</br>

Il y a <?= $this->helpersession->getCart()->getQuantity() ?> quantités dans votre panier.</br>
Il y a <?= $this->helpersession->getCart()->getSize() ?> références dans votre panier.</br>

Total produits : <?= $this->helperprice->format($cartPriceFromDb) ?></br>
Frais de port : Offerts</br>
Total : <?= $this->helperprice->format($cartPriceFromDb) ?></br>


<br/>
<a href="<?= site_url('products'); ?>">Continuer mes achats</a> <br/> 
<a href="<?= site_url('cart'); ?>">Commander</a>