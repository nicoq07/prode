<div class="col-lg-6 col-lg-offset-3">
    <?=$this->Form->create($partidosApuestasUser)?>
    <fieldset>
        <legend><?=__($partidosApuestasUser->partido->presentacion)?></legend>
        <?php
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
    </fieldset>
    <?php
    
    echo $this->Form->button(__('Guardar'), [
        'class' => 'btn btn-block btn-lg btn-success'
    ]);
    
    ?>
    <?=$this->Form->end()?>
</div>
