<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Torneo $torneo
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $torneo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $torneo->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Torneos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partido'), ['controller' => 'Partidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="torneos form large-9 medium-8 columns content">
    <?= $this->Form->create($torneo) ?>
    <fieldset>
        <legend><?= __('Edit Torneo') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
            echo $this->Form->control('fecha_inicio');
            echo $this->Form->control('fecha_fin');
            echo $this->Form->control('active');
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
