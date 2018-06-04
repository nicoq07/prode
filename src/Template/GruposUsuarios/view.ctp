<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GruposUsuario $gruposUsuario
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Grupos Usuario'), ['action' => 'edit', $gruposUsuario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Grupos Usuario'), ['action' => 'delete', $gruposUsuario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $gruposUsuario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Grupos Usuarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Grupos Usuario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="gruposUsuarios view large-9 medium-8 columns content">
    <h3><?= h($gruposUsuario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($gruposUsuario->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($gruposUsuario->id) ?></td>
        </tr>
    </table>
</div>
