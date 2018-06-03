<div class="col-lg-6 col-lg-offset-3">
    <?=$this->Form->create($equipo)?>
    <fieldset>
        <legend><?=__('Nuevo equipo')?></legend>
        <?php
        echo $this->Form->control('descripcion', [
            'label' => 'Nombre'
        ]);
        ?>
    </fieldset>
    <?=$this->Form->button(__('Cargar'), ['class' => 'btn btn-lg btn-block btn-success'])?>
    <?=$this->Form->end()?>
</div>
