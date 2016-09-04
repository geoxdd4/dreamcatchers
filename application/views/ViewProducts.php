<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>
Produits
</h1>

<?php

	foreach ($products as $product)
	{
		
			echo "<p>";
			echo "<b>Référence</b> : " . $product->reference . "<br/>";
			echo "<b>Nom</b> : " . $product->name . "<br/>";
			echo "<b>Prix</b> : " . $product->price . " € TTC<br/>";
			echo "<a href=".site_url('cart/add/'.$product->reference).">Ajouter au panier</a>";
			
			echo "</p>";
		
	}
					
?>