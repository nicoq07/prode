<?php
$this->assign('title', 'Nuevo usuario')?>
 <div class="col-lg-4 col-lg-offset-4 panel panel-info">
   <div class="panel-heading"><h3><?=__('Nuevo usuario')?></h3></div>
    <?=$this->Form->create($user)?>
    <div class='panel-body'>
    <fieldset>

<div class="form-group">
<?php

echo $this->Form->control('nombre', [
    'class' => 'form-control'
]);
?>
</div>

<div class="form-group">
<?php
echo $this->Form->control('apellido', [
    'class' => 'form-control'
]);
?> </div>
<div class="form-group">
<?php
echo $this->Form->control('username', [
    'class' => 'form-control'
]);
?> </div>
<div class="form-group">
<?php

echo $this->Form->control('password', [
    'class' => 'form-control'
]);
?></div>
<div class="form-group">
<?php

echo $this->Form->control('rol_id', [
    'options' => $roles,
    'type' => 'select',
    'empty' => true
], [
    'class' => 'form-control'
]);
?></div>
<div class="form-group">
<?php

echo $this->Form->control('grupo_id', [
    'type' => 'select',
    'options' => $gruposUsuarios,
    'empty' => true
], [
    'class' => 'form-control'
]);
?>
</div>
<div class="form-check">
<?php

echo $this->Form->control('active', [
    'label' => 'Activo'
], [
    'class' => 'form-check'
]);
?>
</div>
   
    </fieldset>
     <?=$this->Form->button(__('Crear'), ['class' => 'btn btn-block btn-success'])?>
       </div>
    
    <?=$this->Form->end()?>
    
</div>