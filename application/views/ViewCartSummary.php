<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<h1>
Panier
</h1>

<?php $this->load->view('ViewCartHeader'); ?>

<h2>
Récapitulatif de la commande
</h2>


<div id="cartContent">
	

	
</div>
<div style="display:none;"id="msgErrorAjax" align="center" >Une erreur est survenue lors de la récupération du panier. Veuillez recharger la page.</div>
<div style="display:none;"id="emptyCart" align="center" >Votre panier est vide.</div>



</br>
<a href="<?= site_url('products'); ?>">Continuer mes achats</a> | 
<a href ="<?=site_url('cart/connection')?>">Commander</a>


<script>
	
	jQuery.ajaxSetup({
beforeSend: function() {
    Pace.start();
},
complete: function(){
    Pace.stop();
},
success: function() {
    Pace.stop();
}
});
	
	//DISPLAY CART
	$(document).ready( function(event){
		
		$("#loader").show();
		
		$.ajax( {
			
			 url: '<?= site_url( 'ajax/cart/get' )?>',
			 type: 'GET',
			 dataType : "json",
			 success:function(data) { 
			 	displayCartFromJson( data );
			 },
			 error: function() { 
			 	showAjaxError();
			 }
		});
	});
	
	function displayCartFromJson( data ){
		
		if ( data.length == 0){
			showEmptyCart();
			return ;
		}
		
		var content = '<table><tr>';
			content +='<td>Produit</td>';
			content +='<td>Description</td>';
			content +='<td>Disponibilité</td>';
			content +='<td>Prix unitaire</td>';
			content +='<td>Quantité</td>';
			content +='<td>/</td>';
			content +='<td>Total</td>';
			content +='</tr>';
		
		
		for ( var i = 0; i < data.length; i++ ){
			content += '<tr>';
			content += '<td>' + data[i].reference + '</td>';
			content += '<td>' + data[i].name + '</td>';
			content += '<td>En stock</td>';
			content += '<td>' + data[i].price + '</td>';
			content += '<td>' + data[i].quantity + '<button class="qtUp" id="'+data[i].reference+'">+</button><button class="qtDown" id="'+data[i].reference+'">-</button></td>';
			content += '<td>/</td>';
			content += '<td>' + data[i].total + '</td>';
			content += '</tr>';
			
		}
		
		content += '</table>' ;
		hideAll();
		$( '#cartContent' ).html(content).show();

	}
	
	$('#cartContent').on('click','.qtUp',function(event){
		var productReference = event.target.id;
		ajaxModifyQuantity( productReference, 'add' );
	});
	
	$('#cartContent').on('click','.qtDown',function(event){
		var productReference = event.target.id;
		ajaxModifyQuantity( productReference, 'remove' );
	});
	
	//ADD QUANTITY
	function ajaxModifyQuantity( productReference, action ){

		$.post( '<?= site_url( 'ajax/cart/')?>'+action, 
				{reference: productReference } ) 
		.done(function( data ) {
			var json = JSON.parse(data);
			displayCartFromJson(json);
		})
		.fail(function( data ) {
		 	showAjaxError();
		});

	}
	
	//show msg error
	function showAjaxError(){
		hideAll();
		$("#msgErrorAjax").show();
	}
	
	//show emptycart
	function showEmptyCart(){
		hideAll();
		$( '#emptyCart' ).show();
	}
	
	function hideAll(){
		$("#msgErrorAjax").hide();
		$( '#cartContent' ).hide().html('');
		$( '#emptyCart' ).hide();
	}

</script>

