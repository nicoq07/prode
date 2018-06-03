<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = 'ProDef';
?>
<!DOCTYPE html>
<html>
<head>
    <?=$this->Html->charset()?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?=$cakeDescription?>:
        <?=$this->fetch('title')?>
    </title>
    <?=$this->Html->meta('icon')?>

    <?=$this->Html->css(['bootstrap.min.css','navBar','login','cake','base'])?>
	<?=$this->Html->script(['jquery-3.1.1.min','bootstrap','varios'])?>
	
    <?=$this->fetch('meta')?>
    <?=$this->fetch('css')?>
    <?=$this->fetch('script')?>
</head>
<body>
	<?php

if (! empty($current_user)) :
    ?>
    
         <?php
    
    if (! empty($current_user) && $current_user['rol_id'] === ADMINISTRADOR) :
        ?>
          	 <?=$this->element('topNavBarAdmin');?>
         <?php
     
    elseif (! empty($current_user) && $current_user['rol_id'] === USUARIO) :
        ?>
         	<?=$this->element('topNavBarUsers')?>
         <?php
    
    endif;
    ?>
        
     
   <?php
endif;

?>
    <div class="col-lg-12"><?=$this->Flash->render()?></div>
    <div class ='flex-container'>
    	<div class="col-lg-12"> <?=$this->fetch('content')?></div> 
    </div>
    <footer>
    </footer>
</body>
</html>
