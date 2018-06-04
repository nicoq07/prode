<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PartidosApuestasUser[]|\Cake\Collection\CollectionInterface $partidosApuestasUsers
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Partidos Apuestas User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Partidos'), ['controller' => 'Partidos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Partido'), ['controller' => 'Partidos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="partidosApuestasUsers index large-9 medium-8 columns content">
    <h3><?= __('Partidos Apuestas Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('partido_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('goles_local') ?></th>
                <th scope="col"><?= $this->Paginator->sort('goles_visitante') ?></th>
                <th scope="col"><?= $this->Paginator->sort('acertado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cargado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puntaje_obtenido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partidosApuestasUsers as $partidosApuestasUser): ?>
            <tr>
                <td><?= $partidosApuestasUser->has('partido') ? $this->Html->link($partidosApuestasUser->partido->id, ['controller' => 'Partidos', 'action' => 'view', $partidosApuestasUser->partido->id]) : '' ?></td>
                <td><?= $partidosApuestasUser->has('user') ? $this->Html->link($partidosApuestasUser->user->id, ['controller' => 'Users', 'action' => 'view', $partidosApuestasUser->user->id]) : '' ?></td>
                <td><?= $this->Number->format($partidosApuestasUser->goles_local) ?></td>
                <td><?= h($partidosApuestasUser->goles_visitante) ?></td>
                <td><?= $this->Number->format($partidosApuestasUser->acertado) ?></td>
                <td><?= $this->Number->format($partidosApuestasUser->cargado) ?></td>
                <td><?= $this->Number->format($partidosApuestasUser->puntaje_obtenido) ?></td>
                <td><?= h($partidosApuestasUser->created) ?></td>
                <td><?= h($partidosApuestasUser->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $partidosApuestasUser->partido_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partidosApuestasUser->partido_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partidosApuestasUser->partido_id], ['confirm' => __('Are you sure you want to delete # {0}?', $partidosApuestasUser->partido_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
