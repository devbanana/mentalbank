<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MentalBanksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MentalBanksTable Test Case
 */
class MentalBanksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MentalBanksTable
     */
    public $MentalBanks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mental_banks',
        'app.contracts',
        'app.users',
        'app.value_events'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MentalBanks') ? [] : ['className' => MentalBanksTable::class];
        $this->MentalBanks = TableRegistry::get('MentalBanks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MentalBanks);

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
