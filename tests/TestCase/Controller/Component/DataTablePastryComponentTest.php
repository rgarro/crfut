<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\DataTablePastryComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\DataTablePastryComponent Test Case
 */
class DataTablePastryComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\DataTablePastryComponent
     */
    public $DataTablePastry;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->DataTablePastry = new DataTablePastryComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DataTablePastry);

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
