<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoicesTable Test Case
 */
class InvoicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoicesTable
     */
    public $Invoices;

    /**
     * Fixtures
     *
     * @var array
     */
  /*  public $fixtures = [
        'app.invoices'
    ];*/

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Invoices') ? [] : ['className' => InvoicesTable::class];
        $this->Invoices = TableRegistry::get('Invoices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Invoices);

        parent::tearDown();
    }

    public function testHasDataTableData()
    {
        $this->assertTrue(method_exists($this->Invoices,'dataTableData'));
    }

    public function testDataTableDataValidResult()
    {
      $company_id = 1;
      $status_id = 3;
      $res = $this->Invoices->dataTableData($company_id,$status_id);
      //echo ($res['data'][0]["Email"] == "test@grupochanto.com");
  //print_r($res['data'][0]);
  //exit;
      $this->assertTrue($res['data'][0]["InvoiceNumber"] == 4451);
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
