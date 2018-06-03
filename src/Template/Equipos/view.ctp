<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipo $equipo
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Equipo'), ['action' => 'edit', $equipo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Equipo'), ['action' => 'delete', $equipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Equipos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Equipo'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="equipos view large-9 medium-8 columns content">
    <h3><?= h($equipo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($equipo->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($equipo->id) ?></td>
        </tr>
    </table>
</div>
