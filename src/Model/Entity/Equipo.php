<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Equipo Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property string $bandera
 */
class Equipo extends Entity
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
    public function _getPresentacion()
    {
        return h($this->descripcion);
    }

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
