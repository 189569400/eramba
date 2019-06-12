<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GithubMilestonesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GithubMilestonesTable Test Case
 */
class GithubMilestonesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GithubMilestonesTable
     */
    public $GithubMilestones;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GithubMilestones'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GithubMilestones') ? [] : ['className' => GithubMilestonesTable::class];
        $this->GithubMilestones = TableRegistry::getTableLocator()->get('GithubMilestones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GithubMilestones);

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
