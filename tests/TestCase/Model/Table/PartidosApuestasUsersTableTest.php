<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PartidosApuestasUsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PartidosApuestasUsersTable Test Case
 */
class PartidosApuestasUsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PartidosApuestasUsersTable
     */
    public $PartidosApuestasUsers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.partidos_apuestas_users',
        'app.partidos',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PartidosApuestasUsers') ? [] : ['className' => PartidosApuestasUsersTable::class];
        $this->PartidosApuestasUsers = TableRegistry::getTableLocator()->get('PartidosApuestasUsers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PartidosApuestasUsers);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
