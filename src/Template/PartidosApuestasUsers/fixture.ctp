<style>
.effect6
{
  	position:relative;
    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
</style>

<div class="col-lg-12">
	<div class="col-lg-12"> <h1><?php
echo h("Mi Fixture");
?></h1></div>
	<div class="col-lg-12">
		<?php

foreach ($partidos as $partido) :
    ?>
    
	<div class="col-lg-4 col-lg-offset-1  panel-info effect6" style="margin-bottom: 10px">
	<div class='col-lg-4 col-lg-offset-8'><?php
    if ($partido['editable']) {
        if (! empty($partido['apuesta_id'])) {
            $accion = [
                'controller' => 'PartidosApuestasUsers',
                'action' => 'edit',
                $partido['apuesta_id']
            ];
            $texto = 'Editar';
        } else {
            $accion = [
                'controller' => 'PartidosApuestasUsers',
                'action' => 'add'
            ];
            $texto = 'Cargar';
        }
    } else {
        $texto = '';
        $accion = [];
    }
    echo $this->Html->link("<span style='color:#aa4839;' class=' glyphicon glyphicon-pencil'>" . h($texto) . "</span>", $accion, [
        'escape' => false
    ])?></div>
		<div class='col-lg-12 text-center  panel-heading'><h4><?php
    echo $partido['fecha'];
    ?></h4></div>
	
		<div class='col-lg-12 text-center  alert alert-info'><h4><?php
    echo $partido['dia'] . '<br>' . '&nbsp;' . $partido['hora'];
    ?></h4></div>
    	<div class='col-lg-6 text-center alert-success'><h3><?php
    echo $partido['equipo_local'];
    ?></h3></div>
        <div class='col-lg-6 text-center alert-success' ><h3><?php
    echo $partido['equipo_visitante'];
    ?></h3></div>
        <div class='col-lg-12 alert alert-danger'> 
        <div class='col-lg-4 '><h6><?php
    echo "Predecido: ";
    ?></h6></div>
        <div class='col-lg-4 '><h6><?php
    echo $partido['equipo_local'];
    echo "( \n";
    echo ! empty($partido['apuesta_goles_local']) ? $partido['apuesta_goles_local'] : '-';
    echo " )";
    ?></h6></div>
        <div class='col-lg-4 '><h6><?php
    echo $partido['equipo_visitante'];
    echo "( \n";
    echo ! empty($partido['apuesta_goles_visitante']) ? $partido['apuesta_goles_visitante'] : '-';
    echo " )";
    ?></h6></div>
        </div>
    
    <div class='col-lg-12 alert alert-warning'> 
        <div class='col-lg-4'><h5><?php
    echo "Real: ";
    ?></h5>
    	</div>
             <div class='col-lg-4'><h6><?php
    echo $partido['equipo_local'];
    echo "( \n";
    echo ! empty($partido['goles_local']) ? $partido['goles_local'] : '-';
    echo " )";
    ?></h6>
    		</div>
            <div class='col-lg-4'><h6><?php
    echo $partido['equipo_visitante'];
    echo "( ";
    echo ! empty($partido['goles_visitante']) ? $partido['goles_visitante'] : '-';
    echo " )";
    ?></h6>
    		</div>
    </div>
    <div class='col-lg-12 text-center  alert alert-info'><h4><?php
    echo 'Puntaje : ' . $partido['puntaje'];
    ?></h4></div>
	</div>
	
		<?php
endforeach
;
?>
	</div>

</div>