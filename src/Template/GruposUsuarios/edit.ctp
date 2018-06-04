<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\GruposUsuario $gruposUsuario
 */
?>
 
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gruposUsuario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gruposUsuario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Grupos Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="gruposUsuarios form large-9 medium-8 columns content">
    <?= $this->Form->create($gruposUsuario) ?>
    <fieldset>
        <legend><?= __('Edit Grupos Usuario') ?></legend>
        <?php
            echo $this->Form->control('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
