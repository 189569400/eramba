<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiceBillingInformationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiceBillingInformationsTable Test Case
 */
class ServiceBillingInformationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiceBillingInformationsTable
     */
    public $ServiceBillingInformations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ServiceBillingInformations',
        'app.Services',
        'app.Countries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ServiceBillingInformations') ? [] : ['className' => ServiceBillingInformationsTable::class];
        $this->ServiceBillingInformations = TableRegistry::getTableLocator()->get('ServiceBillingInformations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ServiceBillingInformations);

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
