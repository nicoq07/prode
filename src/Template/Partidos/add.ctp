<div class="col-lg-6 col-lg-offset-3">
    <?=$this->Form->create($partido)?>
    <fieldset>
        <legend><?=__('Nuevo Partido')?></legend>
        <?php
        echo $this->Form->control('torneo_id', [
            'options' => $torneos,
            'type' => 'select',
            'label' => 'Torneo'
        ]);
        echo $this->Form->control('equipo_id_local', [
            'options' => $equipos,
            'type' => 'select',
            'label' => 'Local'
        ]);
        echo $this->Form->control('equipo_id_visitante', [
            'options' => $equipos,
            'type' => 'select',
            'label' => 'Visitante'
        ]);
        echo $this->Form->control('equipo_id_ganador', [
            'options' => $equipos,
            'type' => 'select',
            'label' => 'Ganador',
            'empty' => true
        ]);
        echo $this->Form->control('fecha');
        echo $this->Form->control('dia_partido');
        echo $this->Form->control('goles_local');
        echo $this->Form->control('goles_visitante');
        ?>
    </fieldset>
    <?=$this->Form->button(__('Guardar'), ['class' => 'btn btn-block btn-lg btn-success'])?>
    <?=$this->Form->end()?>
</div>
