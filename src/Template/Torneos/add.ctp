<div class="col-lg-6 col-lg-offset-3">
    <?=$this->Form->create($torneo)?>
    <fieldset>
        <legend><?=__('Nuevo Torneo')?></legend>
        <?php
        echo $this->Form->control('descripcion');
        echo $this->Form->control('fecha_inicio');
        echo $this->Form->control('fecha_fin');
        echo $this->Form->control('active');
        ?>
    </fieldset>
    <?=$this->Form->button(__('Submit'))?>
    <?=$this->Form->end()?>
</div>
