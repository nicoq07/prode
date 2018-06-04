<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partido'), ['action' => 'edit', $partido->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partido'), ['action' => 'delete', $partido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partido->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partidos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partido'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Torneos'), ['controller' => 'Torneos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Torneo'), ['controller' => 'Torneos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partidos view large-9 medium-8 columns content">
    <h3><?= h($partido->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Torneo') ?></th>
            <td><?= $partido->has('torneo') ? $this->Html->link($partido->torneo->id, ['controller' => 'Torneos', 'action' => 'view', $partido->torneo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($partido->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Goles Visitante') ?></th>
            <td><?= h($partido->goles_visitante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($partido->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Equipo Id Local') ?></th>
            <td><?= $this->Number->format($partido->equipo_id_local) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Equipo Id Visitante') ?></th>
            <td><?= $this->Number->format($partido->equipo_id_visitante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Equipo Id Ganador') ?></th>
            <td><?= $this->Number->format($partido->equipo_id_ganador) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Goles Local') ?></th>
            <td><?= $this->Number->format($partido->goles_local) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dia Partido') ?></th>
            <td><?= h($partido->dia_partido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($partido->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($partido->modified) ?></td>
        </tr>
    </table>
</div>
