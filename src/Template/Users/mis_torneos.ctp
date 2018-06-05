<?php
?>
<div class='col-lg-12'>
	<div class='col-lg-12 text-center jumbotron'>
       <h1> <?php
    echo h('Mis torneos');
    ?></h1>
	</div>
	<div class='col-lg-12'>
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
    </div>
	<?php
endforeach
;
?>
</div>