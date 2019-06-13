<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GithubIssueLabelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GithubIssueLabelsTable Test Case
 */
class GithubIssueLabelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GithubIssueLabelsTable
     */
    public $GithubIssueLabels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.GithubIssueLabels',
        'app.GithubIssues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('GithubIssueLabels') ? [] : ['className' => GithubIssueLabelsTable::class];
        $this->GithubIssueLabels = TableRegistry::getTableLocator()->get('GithubIssueLabels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GithubIssueLabels);

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
