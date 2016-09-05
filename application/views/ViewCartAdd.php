<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>
Panier
</h1>

Le produit <?= $reference ?> a bien été ajouté au panier.<br/>

<br/>
<a href="<?= site_url('products'); ?>">Continuer mes achats</a> <br/> 
<a href="<?= site_url('cart'); ?>">Commander</a>