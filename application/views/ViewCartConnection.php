<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $this->load->view('ViewCartHeader'); ?>

<h2>
Connexion / Inscription
</h2>


Connexion

<?= validation_errors(); ?>

<?= form_open('ControllerConnection'); ?>

	<p>Nom / pseudo :<br/>
		<?= form_input('login', set_value('nom')); ?></p>
	
	<p>Mot de passe :<br>
		<?= form_password('password', set_value('password')); ?></p>				
	
	    <?= form_submit('Submit', 'Connexion'); ?>
	    
<?= form_close(); ?>