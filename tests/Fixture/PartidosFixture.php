<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PartidosFixture
 *
 */
class PartidosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'torneo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'equipo_id_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'equipo_id_visitante' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'equipo_id_ganador' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'fecha' => ['type' => 'string', 'length' => 40, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'dia_partido' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'goles_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'goles_visitante' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'torneo_partidos_idx' => ['type' => 'index', 'columns' => ['torneo_id'], 'length' => []],
            'equipos_ganador_partidos_idx' => ['type' => 'index', 'columns' => ['equipo_id_ganador'], 'length' => []],
            'equipos_visitante_partidos_idx' => ['type' => 'index', 'columns' => ['equipo_id_visitante'], 'length' => []],
            'equipos_local_partidos_idx' => ['type' => 'index', 'columns' => ['equipo_id_local'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'torneo_id', 'equipo_id_local', 'equipo_id_visitante'], 'length' => []],
            'id_UNIQUE' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
            'fecha_UNIQUE' => ['type' => 'unique', 'columns' => ['fecha'], 'length' => []],
            'equipos_ganador_partidos' => ['type' => 'foreign', 'columns' => ['equipo_id_ganador'], 'references' => ['equipos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'equipos_local_partidos' => ['type' => 'foreign', 'columns' => ['equipo_id_local'], 'references' => ['equipos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'equipos_visitante_partidos' => ['type' => 'foreign', 'columns' => ['equipo_id_visitante'], 'references' => ['equipos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'torneo_partidos' => ['type' => 'foreign', 'columns' => ['torneo_id'], 'references' => ['torneos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'torneo_id' => 1,
                'equipo_id_local' => 1,
                'equipo_id_visitante' => 1,
                'equipo_id_ganador' => 1,
                'fecha' => 'Lorem ipsum dolor sit amet',
                'dia_partido' => '2018-06-02 13:23:07',
                'goles_local' => 1,
                'goles_visitante' => 'Lorem ipsum dolor sit amet',
                'created' => '2018-06-02 13:23:07',
                'modified' => '2018-06-02 13:23:07'
            ],
        ];
        parent::init();
    }
}
