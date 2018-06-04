<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PartidosApuestasUser $partidosApuestasUser
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Partidos Apuestas User'), ['action' => 'edit', $partidosApuestasUser->partido_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Partidos Apuestas User'), ['action' => 'delete', $partidosApuestasUser->partido_id], ['confirm' => __('Are you sure you want to delete # {0}?', $partidosApuestasUser->partido_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Partidos Apuestas Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partidos Apuestas User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partido'), ['controller' => 'Partidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="partidosApuestasUsers view large-9 medium-8 columns content">
    <h3><?= h($partidosApuestasUser->partido_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Partido') ?></th>
            <td><?= $partidosApuestasUser->has('partido') ? $this->Html->link($partidosApuestasUser->partido->id, ['controller' => 'Partidos', 'action' => 'view', $partidosApuestasUser->partido->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $partidosApuestasUser->has('user') ? $this->Html->link($partidosApuestasUser->user->id, ['controller' => 'Users', 'action' => 'view', $partidosApuestasUser->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Goles Visitante') ?></th>
            <td><?= h($partidosApuestasUser->goles_visitante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Goles Local') ?></th>
            <td><?= $this->Number->format($partidosApuestasUser->goles_local) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Acertado') ?></th>
            <td><?= $this->Number->format($partidosApuestasUser->acertado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargado') ?></th>
            <td><?= $this->Number->format($partidosApuestasUser->cargado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puntaje Obtenido') ?></th>
            <td><?= $this->Number->format($partidosApuestasUser->puntaje_obtenido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($partidosApuestasUser->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($partidosApuestasUser->modified) ?></td>
        </tr>
    </table>
</div>
