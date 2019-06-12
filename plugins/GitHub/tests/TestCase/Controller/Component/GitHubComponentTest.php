<?php
namespace GitHub\Test\TestCase\Controller\Component;

use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;
use GitHub\Controller\Component\GitHubComponent;

/**
 * GitHub\Controller\Component\GitHubComponent Test Case
 */
class GitHubComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \GitHub\Controller\Component\GitHubComponent
     */
    public $GitHub;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->GitHub = new GitHubComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GitHub);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
