<?php
namespace ReCaptcha\Test\TestCase\Model\Behavior;

use Cake\TestSuite\TestCase;
use ReCaptcha\Model\Behavior\ReCaptchaBehavior;

/**
 * ReCaptcha\Model\Behavior\ReCaptchaBehavior Test Case
 */
class ReCaptchaBehaviorTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ReCaptcha\Model\Behavior\ReCaptchaBehavior
     */
    public $ReCaptcha;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ReCaptcha = new ReCaptchaBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReCaptcha);

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
