<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Torneo Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property \Cake\I18n\FrozenTime $fecha_inicio
 * @property \Cake\I18n\FrozenTime $fecha_fin
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $active
 *
 * @property \App\Model\Entity\Partido[] $partidos
 * @property \App\Model\Entity\User[] $users
 */
class Torneo extends Entity
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
        'descripcion' => true,
        'fecha_inicio' => true,
        'fecha_fin' => true,
        'created' => true,
        'modified' => true,
        'active' => true,
        'partidos' => true,
        'users' => true
    ];
}
