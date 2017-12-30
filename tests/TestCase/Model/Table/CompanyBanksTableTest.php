<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompanyBanksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompanyBanksTable Test Case
 */
class CompanyBanksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CompanyBanksTable
     */
    public $CompanyBanks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.company_banks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CompanyBanks') ? [] : ['className' => CompanyBanksTable::class];
        $this->CompanyBanks = TableRegistry::get('CompanyBanks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompanyBanks);

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
