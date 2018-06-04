<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Torneo $torneo
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Torneo'), ['action' => 'edit', $torneo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Torneo'), ['action' => 'delete', $torneo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $torneo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Torneos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Torneo'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Partido'), ['controller' => 'Partidos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="torneos view large-9 medium-8 columns content">
    <h3><?= h($torneo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($torneo->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Fin') ?></th>
            <td><?= h($torneo->fecha_fin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($torneo->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active') ?></th>
            <td><?= $this->Number->format($torneo->active) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Inicio') ?></th>
            <td><?= h($torneo->fecha_inicio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($torneo->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($torneo->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($torneo->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Apellido') ?></th>
                <th scope="col"><?= __('Grupo Id') ?></th>
                <th scope="col"><?= __('Rol Id') ?></th>
                <th scope="col"><?= __('Active') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($torneo->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->nombre) ?></td>
                <td><?= h($users->apellido) ?></td>
                <td><?= h($users->grupo_id) ?></td>
                <td><?= h($users->rol_id) ?></td>
                <td><?= h($users->active) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Partidos') ?></h4>
        <?php if (!empty($torneo->partidos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Torneo Id') ?></th>
                <th scope="col"><?= __('Equipo Id Local') ?></th>
                <th scope="col"><?= __('Equipo Id Visitante') ?></th>
                <th scope="col"><?= __('Equipo Id Ganador') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Dia Partido') ?></th>
                <th scope="col"><?= __('Goles Local') ?></th>
                <th scope="col"><?= __('Goles Visitante') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($torneo->partidos as $partidos): ?>
            <tr>
                <td><?= h($partidos->id) ?></td>
                <td><?= h($partidos->torneo_id) ?></td>
                <td><?= h($partidos->equipo_id_local) ?></td>
                <td><?= h($partidos->equipo_id_visitante) ?></td>
                <td><?= h($partidos->equipo_id_ganador) ?></td>
                <td><?= h($partidos->fecha) ?></td>
                <td><?= h($partidos->dia_partido) ?></td>
                <td><?= h($partidos->goles_local) ?></td>
                <td><?= h($partidos->goles_visitante) ?></td>
                <td><?= h($partidos->created) ?></td>
                <td><?= h($partidos->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Partidos', 'action' => 'view', $partidos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Partidos', 'action' => 'edit', $partidos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Partidos', 'action' => 'delete', $partidos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partidos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
