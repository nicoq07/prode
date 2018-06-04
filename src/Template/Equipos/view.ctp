<div class="equipos view large-9 medium-8 columns content">
    <h3><?=h($equipo->id)?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?=__('Descripcion')?></th>
            <td><?=h($equipo->descripcion)?></td>
        </tr>
        <tr>
            <th scope="row"><?=__('Id')?></th>
            <td><?=$this->Number->format($equipo->id)?></td>
        </tr>
    </table>
</div>
