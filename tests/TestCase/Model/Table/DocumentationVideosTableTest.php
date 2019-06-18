<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentationVideosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentationVideosTable Test Case
 */
class DocumentationVideosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentationVideosTable
     */
    public $DocumentationVideos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.DocumentationVideos',
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
        $config = TableRegistry::getTableLocator()->exists('DocumentationVideos') ? [] : ['className' => DocumentationVideosTable::class];
        $this->DocumentationVideos = TableRegistry::getTableLocator()->get('DocumentationVideos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentationVideos);

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
