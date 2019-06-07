<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PartnersCountriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PartnersCountriesTable Test Case
 */
class PartnersCountriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PartnersCountriesTable
     */
    public $PartnersCountries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PartnersCountries',
        'app.Partners',
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
        $config = TableRegistry::getTableLocator()->exists('PartnersCountries') ? [] : ['className' => PartnersCountriesTable::class];
        $this->PartnersCountries = TableRegistry::getTableLocator()->get('PartnersCountries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PartnersCountries);

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
