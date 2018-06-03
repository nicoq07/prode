<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTorneosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTorneosTable Test Case
 */
class UsersTorneosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTorneosTable
     */
    public $UsersTorneos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users_torneos',
        'app.torneos',
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
        $config = TableRegistry::getTableLocator()->exists('UsersTorneos') ? [] : ['className' => UsersTorneosTable::class];
        $this->UsersTorneos = TableRegistry::getTableLocator()->get('UsersTorneos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersTorneos);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
