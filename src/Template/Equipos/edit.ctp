<div class="col-lg-6 col-lg-offset-3">
    <?=$this->Form->create($equipo)?>
    <fieldset>
        <legend><?=__('Edit Equipo')?></legend>
        <?php
        echo $this->Form->control('descripcion');
        echo $this->Form->control('bandera', [
            'label' => 'Banderas',
            'options' => $banderas
        ]);
        ?>
    </fieldset>
    <?=$this->Form->button(__('Submit'))?>
    <?=$this->Form->end()?>
</div>
