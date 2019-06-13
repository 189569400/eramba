<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GithubIssuesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GithubIssuesTable Test Case
 */
class GithubIssuesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GithubIssuesTable
     */
    public $GithubIssues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GithubIssues',
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
        $config = TableRegistry::getTableLocator()->exists('GithubIssues') ? [] : ['className' => GithubIssuesTable::class];
        $this->GithubIssues = TableRegistry::getTableLocator()->get('GithubIssues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GithubIssues);

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
