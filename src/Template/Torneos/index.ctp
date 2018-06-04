<?php
?>
<div class='col-lg-12'>
	<div class='col-lg-6 col-lg-offset-4'>
       <h1> <?php
    echo h('Torneos disponibles');
    ?></h1>
	</div>
	<?php

foreach ($torneos as $torneo) :
    ?>
	<div class='panel panel-default col-lg-4'>
		<div class='col-lg-12'><h3><?php
    
    echo h($torneo->descripcion)?></h3></div>
	
	<div class='col-lg-12'><h3><?php
    
    echo h('Fecha de inicio:');
    echo h($torneo->fecha_inicio->format('d-m-Y'))?></h3></div>
    <div class='col-lg-12'>
    <?php
    echo $this->Form->postLink('Inscribirse', [
        'controller' => 'UsersTorneos',
        'action' => 'inscripcion',
        $torneo->id
    ], [
        'class' => 'btn btn-block btn-sm btn-info'
    ])?>
    </div>
    </div>
	<?php
endforeach
;
?>
</div>