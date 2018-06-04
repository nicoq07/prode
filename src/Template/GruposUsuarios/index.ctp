<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GruposUsuario[]|\Cake\Collection\CollectionInterface $gruposUsuarios
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Grupos Usuario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="gruposUsuarios index large-9 medium-8 columns content">
    <h3><?= __('Grupos Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gruposUsuarios as $gruposUsuario): ?>
            <tr>
                <td><?= $this->Number->format($gruposUsuario->id) ?></td>
                <td><?= h($gruposUsuario->descripcion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $gruposUsuario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $gruposUsuario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $gruposUsuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gruposUsuario->id)]) ?>
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
