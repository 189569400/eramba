<?php
namespace ReCaptcha\Test\TestCase\View\Helper;

use Cake\TestSuite\TestCase;
use Cake\View\View;
use ReCaptcha\View\Helper\ReCaptchaHelper;

/**
 * ReCaptcha\View\Helper\ReCaptchaHelper Test Case
 */
class ReCaptchaHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \ReCaptcha\View\Helper\ReCaptchaHelper
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
        $view = new View();
        $this->ReCaptcha = new ReCaptchaHelper($view);
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
