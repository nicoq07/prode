<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PartidosApuestasUser Entity
 *
 * @property int $id
 * @property int $partido_id
 * @property string $user_id
 * @property int $goles_local
 * @property int $goles_visitante
 * @property int $acertado
 * @property int $cargado
 * @property int $puntaje_obtenido
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Partido $partido
 * @property \App\Model\Entity\User $user
 */
class PartidosApuestasUser extends Entity
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
}
