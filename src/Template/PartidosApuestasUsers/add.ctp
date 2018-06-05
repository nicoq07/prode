<div class="col-lg-6 col-lg-offset-3">
    <?=$this->Form->create($partidosApuestasUser)?>
    <fieldset>
        <legend><?=__('Add Partidos Apuestas User')?></legend>
        <?php
        if (! $partidos) {
            ?>
            <div class='col-lg-12 alert alert-info'> "NO HAY PARTIDOS DISPONIBLES PARA CARGAR" </div>
            <?php
        } else {
            echo $this->Form->control('partido_id', [
                'options' => $partidos,
                'type' => 'select'
            ]);
        }
        
        ?>
        <div class='col-lg-12'>
        	<div class='col-lg-6'><?php
        if ($partidos) {
            echo $this->Form->control('goles_local');
        }
        ?>
            </div>
        	<div class='col-lg-6'><?php
        if ($partidos) {
            echo $this->Form->control('goles_visitante');
        }
        ?></div>
        </div> 
        <?php
        // echo $this->Form->control('acertado');
        // echo $this->Form->control('cargado');
        // echo $this->Form->control('puntaje_obtenido');
        ?>
    </fieldset>
    <?php
    
    if ($partidos) :
        echo $this->Form->button(__('Guardar'), [
            'class' => 'btn btn-block btn-lg btn-success'
        ]); endif;
    
    ?>
    <?=$this->Form->end()?>
</div>
