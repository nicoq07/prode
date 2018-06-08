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
    
	<div class="col-lg-4 col-lg-offset-1 panel  panel-info effect6" style="margin-bottom: 10px">
	<div class='col-lg-4 col-lg-offset-8 panel-'><?php
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
        echo $this->Html->link(h($texto), $accion, [
            'escape' => false,
            'class' => 'btn btn-sm glyphicon glyphicon-pencil btn-default'
        ]);
    } else {
        echo $this->Html->link(h(''), [], [
            'escape' => false,
            'class' => 'btn btn-md glyphicon glyphicon-lock btn-default'
        ]);
    }
    ?></div>
    &nbsp;
		<div class='col-lg-12 text-center  panel-heading'><h4><?php
    echo $partido['fecha'];
    ?></h4></div>
	
		<div class='col-lg-12 text-center  alert alert-info'><h4><?php
    echo __($partido['nom_dia']) . ' ' . __($partido['num_dia']) . '<br>' . '&nbsp;' . $partido['hora'];
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
    echo array_key_exists('apuesta_goles_local', $partido) ? $partido['apuesta_goles_local'] : '-';
    echo " )";
    ?></h6></div>
        <div class='col-lg-4 '><h6><?php
    echo $partido['equipo_visitante'];
    echo "( \n";
    echo array_key_exists('apuesta_goles_visitante', $partido) ? $partido['apuesta_goles_visitante'] : '-';
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
    echo $partido['goles_local'];
    echo " )";
    ?></h6>
    		</div>
            <div class='col-lg-4'><h6><?php
    echo $partido['equipo_visitante'];
    echo "( ";
    echo $partido['goles_visitante'];
    echo " )";
    ?></h6>
    		</div>
    </div>
    <?php
    
    ?>
    <div class='col-lg-12 text-center  alert alert-info'><h4><?php
    echo 'Puntaje : ';
    echo array_key_exists('puntaje', $partido) ? $partido['puntaje'] : '-';
    ?></h4></div>
	</div>
	
		<?php
endforeach
;
?>
	</div>

</div>