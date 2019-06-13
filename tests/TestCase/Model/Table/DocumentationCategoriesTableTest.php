<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentationCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentationCategoriesTable Test Case
 */
class DocumentationCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentationCategoriesTable
     */
    public $DocumentationCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DocumentationCategories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DocumentationCategories') ? [] : ['className' => DocumentationCategoriesTable::class];
        $this->DocumentationCategories = TableRegistry::getTableLocator()->get('DocumentationCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentationCategories);

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
}
