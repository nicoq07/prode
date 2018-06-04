<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $partido->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $partido->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Partidos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Torneos'), ['controller' => 'Torneos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Torneo'), ['controller' => 'Torneos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partidos form large-9 medium-8 columns content">
    <?= $this->Form->create($partido) ?>
    <fieldset>
        <legend><?= __('Edit Partido') ?></legend>
        <?php
            echo $this->Form->control('equipo_id_ganador');
            echo $this->Form->control('fecha');
            echo $this->Form->control('dia_partido');
            echo $this->Form->control('goles_local');
            echo $this->Form->control('goles_visitante');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
