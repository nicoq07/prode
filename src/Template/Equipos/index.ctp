<div class="equipos index large-9 medium-8 columns content">
    <h3><?=__('Equipos')?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?=$this->Paginator->sort('id')?></th>
                <th scope="col"><?=$this->Paginator->sort('descripcion')?></th>
                <th scope="col"><?=$this->Paginator->sort('bandera')?></th>
                <th scope="col" class="actions"><?=__('Actions')?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($equipos as $equipo) :
                ?>
            <tr>
                <td><?=$this->Number->format($equipo->id)?></td>
                <td><?=h($equipo->descripcion)?></td>
                <td><?=$this->Html->image('ico' . DS . h($equipo->bandera))?></td>
                <td class="actions">
                    <?=$this->Html->link(__('View'), ['action' => 'view',$equipo->id])?>
                    <?=$this->Html->link(__('Edit'), ['action' => 'edit',$equipo->id])?>
                    <?=$this->Form->postLink(__('Delete'), ['action' => 'delete',$equipo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipo->id)])?>
                </td>
            </tr>
            <?php
            endforeach
            ;
            ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?=$this->Paginator->first('<< ' . __('first'))?>
            <?=$this->Paginator->prev('< ' . __('previous'))?>
            <?=$this->Paginator->numbers()?>
            <?=$this->Paginator->next(__('next') . ' >')?>
            <?=$this->Paginator->last(__('last') . ' >>')?>
        </ul>
        <p><?=$this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')])?></p>
    </div>
</div>
