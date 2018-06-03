<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TorneosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TorneosTable Test Case
 */
class TorneosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TorneosTable
     */
    public $Torneos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.torneos',
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
        $config = TableRegistry::getTableLocator()->exists('Torneos') ? [] : ['className' => TorneosTable::class];
        $this->Torneos = TableRegistry::getTableLocator()->get('Torneos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Torneos);

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
