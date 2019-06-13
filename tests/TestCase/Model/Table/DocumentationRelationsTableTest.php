<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentationRelationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentationRelationsTable Test Case
 */
class DocumentationRelationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentationRelationsTable
     */
    public $DocumentationRelations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DocumentationRelations',
        'app.Documentations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DocumentationRelations') ? [] : ['className' => DocumentationRelationsTable::class];
        $this->DocumentationRelations = TableRegistry::getTableLocator()->get('DocumentationRelations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentationRelations);

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
