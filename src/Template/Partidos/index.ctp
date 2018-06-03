<div class="col-lg-12">
    <h3><?=__('Partidos')?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?=$this->Paginator->sort('id')?></th>
                <th scope="col"><?=$this->Paginator->sort('torneo_id')?></th>
                <th scope="col"><?=$this->Paginator->sort('equipo_id_local')?></th>
                <th scope="col"><?=$this->Paginator->sort('equipo_id_visitante')?></th>
                <th scope="col"><?=$this->Paginator->sort('equipo_id_ganador')?></th>
                <th scope="col"><?=$this->Paginator->sort('fecha')?></th>
                <th scope="col"><?=$this->Paginator->sort('dia_partido')?></th>
                <th scope="col"><?=$this->Paginator->sort('goles_local')?></th>
                <th scope="col"><?=$this->Paginator->sort('goles_visitante')?></th>
                <th scope="col"><?=$this->Paginator->sort('created')?></th>
                <th scope="col"><?=$this->Paginator->sort('modified')?></th>
                <th scope="col" class="actions"><?=__('Actions')?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($partidos as $partido) :
                ?>
            <tr>
                <td><?=$this->Number->format($partido->id)?></td>
                <td><?=$partido->has('torneo') ? $this->Html->link($partido->torneo->id, ['controller' => 'Torneos','action' => 'view',$partido->torneo->id]) : ''?></td>
                <td><?=$this->Number->format($partido->equipo_id_local)?></td>
                <td><?=$this->Number->format($partido->equipo_id_visitante)?></td>
                <td><?=$this->Number->format($partido->equipo_id_ganador)?></td>
                <td><?=h($partido->fecha)?></td>
                <td><?=h($partido->dia_partido)?></td>
                <td><?=$this->Number->format($partido->goles_local)?></td>
                <td><?=h($partido->goles_visitante)?></td>
                <td><?=h($partido->created)?></td>
                <td><?=h($partido->modified)?></td>
                <td class="actions">
                    <?=$this->Html->link(__('View'), ['action' => 'view',$partido->id])?>
                    <?=$this->Html->link(__('Edit'), ['action' => 'edit',$partido->id])?>
                    <?=$this->Form->postLink(__('Delete'), ['action' => 'delete',$partido->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partido->id)])?>
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
