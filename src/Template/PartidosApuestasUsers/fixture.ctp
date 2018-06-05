<div class="col-lg-12">
	<div class="col-lg-12"> <h1><?php
echo h("Mi Fixture");
?></h1></div>
	<div class="col-lg-12">
		<?php

foreach ($listado_partidos as $partido) :
    ?>
		<div class="col-lg-4 col-lg-offset-1 panel">
		<div class='col-lg-12 text-center panel panel-heading'><h4><?php
    echo $partido->fecha;
    ?></h4></div>
			<div class='col-lg-12'><h3><?php
    echo $partido->presentacionSinFecha;
    ?></h3></div>
    
    <div class='col-lg-4'><h5><?php
    echo "Resultado predecido: ";
    ?></h5></div>
    <div class='col-lg-4'><h5><?php
    echo $equipos[$partido->equipo_id_local] . "(" . $partido->goles_local . " )";
    ?></h5></div>
    <div class='col-lg-4'><h5><?php
    echo $equipos[$partido->equipo_id_visitante] . "(" . $partido->goles_local . " )";
    ?></h5></div>
		</div>
    
    
    
    <div class='col-lg-4'><h5><?php
    echo "Resultado real: ";
    ?></h5></div>
    <div class='col-lg-4'><h5><?php
    echo $equipos[$partido->equipo_id_local] . "(" . $partido->goles_local . " )";
    ?></h5></div>
    <div class='col-lg-4'><h5><?php
    echo $equipos[$partido->equipo_id_visitante] . "(" . $partido->goles_local . " )";
    ?></h5></div>
		</div>
		<?php
endforeach
;
?>
	</div>

</div>