<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PartidosApuestasUsersFixture
 *
 */
class PartidosApuestasUsersFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'partido_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'goles_local' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'goles_visitante' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'acertado' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'cargado' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        'puntaje_obtenido' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['partido_id', 'user_id'], 'length' => []],
            'user_id_UNIQUE' => ['type' => 'unique', 'columns' => ['user_id'], 'length' => []],
            'partido_id_UNIQUE' => ['type' => 'unique', 'columns' => ['partido_id'], 'length' => []],
            'apuestas_partidos' => ['type' => 'foreign', 'columns' => ['partido_id'], 'references' => ['partidos', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'apuestas_usuarios' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'username'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'partido_id' => 1,
                'user_id' => '998cb792-b235-4304-ad63-6571f8399d56',
                'goles_local' => 1,
                'goles_visitante' => 'Lorem ipsum dolor sit amet',
                'acertado' => 1,
                'cargado' => 1,
                'puntaje_obtenido' => 1,
                'created' => '2018-06-02 13:23:07',
                'modified' => '2018-06-02 13:23:07'
            ],
        ];
        parent::init();
    }
}
