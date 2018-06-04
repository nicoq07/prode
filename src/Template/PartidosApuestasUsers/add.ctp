<div class="col-lg-6 col-lg-offset-3">
    <?=$this->Form->create($partidosApuestasUser)?>
    <fieldset>
        <legend><?=__('Add Partidos Apuestas User')?></legend>
        <?php
        echo $this->Form->control('partido_id', [
            'options' => $partidos,
            'type' => 'select'
        ]);
        ?>
        <div class='col-lg-12'>
        	<div class='col-lg-6'><?php
        
        echo $this->Form->control('goles_local');
        ?>
            </div>
        	<div class='col-lg-6'><?php
        
        echo $this->Form->control('goles_visitante');
        ?></div>
        </div> 
        <?php
        // echo $this->Form->control('acertado');
        // echo $this->Form->control('cargado');
        // echo $this->Form->control('puntaje_obtenido');
        ?>
    </fieldset>
    <?=$this->Form->button(__('Guardar'), ['class' => 'btn btn-block btn-lg btn-success'])?>
    <?=$this->Form->end()?>
</div>
