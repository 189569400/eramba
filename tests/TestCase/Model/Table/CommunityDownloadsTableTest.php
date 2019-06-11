<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CommunityDownloadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CommunityDownloadsTable Test Case
 */
class CommunityDownloadsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CommunityDownloadsTable
     */
    public $CommunityDownloads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CommunityDownloads',
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
        $config = TableRegistry::getTableLocator()->exists('CommunityDownloads') ? [] : ['className' => CommunityDownloadsTable::class];
        $this->CommunityDownloads = TableRegistry::getTableLocator()->get('CommunityDownloads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CommunityDownloads);

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
