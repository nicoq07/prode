<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Partido Entity
 *
 * @property int $id
 * @property int $torneo_id
 * @property int $equipo_id_local
 * @property int $equipo_id_visitante
 * @property int $equipo_id_ganador
 * @property string $fecha
 * @property \Cake\I18n\FrozenTime $dia_partido
 * @property int $goles_local
 * @property int $goles_visitante
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Equipo $equipo
 * @property \App\Model\Entity\Torneo $torneo
 */
class Partido extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    public function _getPresentacion()
    {
        $EquiposTable = TableRegistry::getTableLocator()->get('Equipos');
        $equipoLocal = $EquiposTable->get($this->equipo_id_local);
        $equipoVisitante = $EquiposTable->get($this->equipo_id_visitante);
        
        $cadena = h($equipoLocal->presentacion) . ' - ' . h($equipoVisitante->presentacion) . "  (" . $this->fecha . ")";
        
        return $cadena;
    }

    public function _getPresentacionSinFecha()
    {
        $EquiposTable = TableRegistry::getTableLocator()->get('Equipos');
        $equipoLocal = $EquiposTable->get($this->equipo_id_local);
        $equipoVisitante = $EquiposTable->get($this->equipo_id_visitante);
        
        $cadena = h($equipoLocal->presentacion) . ' - ' . h($equipoVisitante->presentacion);
        
        return $cadena;
    }
}
