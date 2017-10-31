<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CsrfsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CsrfsTable Test Case
 */
class CsrfsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CsrfsTable
     */
    public $Csrfs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.csrfs',
        'app.sessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Csrfs') ? [] : ['className' => CsrfsTable::class];
        $this->Csrfs = TableRegistry::get('Csrfs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Csrfs);

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
