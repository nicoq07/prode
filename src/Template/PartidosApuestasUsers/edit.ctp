<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PartidosApuestasUser $partidosApuestasUser
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $partidosApuestasUser->partido_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $partidosApuestasUser->partido_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Partidos Apuestas Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partido'), ['controller' => 'Partidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partidosApuestasUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($partidosApuestasUser) ?>
    <fieldset>
        <legend><?= __('Edit Partidos Apuestas User') ?></legend>
        <?php
            echo $this->Form->control('goles_local');
            echo $this->Form->control('goles_visitante');
            echo $this->Form->control('acertado');
            echo $this->Form->control('cargado');
            echo $this->Form->control('puntaje_obtenido');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
