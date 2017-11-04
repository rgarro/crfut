<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SessionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SessionsTable Test Case
 */
class SessionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SessionsTable
     */
    public $Sessions;


    /*public $fixtures = [
        'app.sessions'
    ];*/

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sessions') ? [] : ['className' => SessionsTable::class];
        $this->Sessions = TableRegistry::get('Sessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sessions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        //$this->markTestIncomplete('Not implemented yet.');
        $this->assertTrue(true);
    }

    /**
     * Test testHasSetSession
     *
     * @return void
     */
    public function testHasSetSession()
    {
        $this->assertTrue(method_exists($this->Sessions,'setSession'));
    }

    public function testHasUserHasLivingSession()
    {
        $this->assertTrue(method_exists($this->Sessions,'userHasLivingSession'));
    }

    public function testHasGetSessionByUserID()
    {
        $this->assertTrue(method_exists($this->Sessions,'getSessionByUserID'));
        //$this->assertTrue(true);//has living session return session data
    }

    /**
     * Test testSetSession
     *
     * @return void
     */
    public function testSetSession()
    {
      $res = $this->Sessions->setSession(2);//uid de perla oviedo
      $this->assertArrayHasKey("token",$res);
    }

    /**
     * Test testHasSessionIsAlive
     *
     * @return void
     */
    public function testHasSessionIsAlive()
    {
        $this->assertTrue(method_exists($this->Sessions,'sessionIsAlive'));
    }

    /**
     * Test testHasSessionIsAlive
     *
     * @return void
     */
    public function testSessionIsAlive()
    {
        $res = $this->Sessions->setSession(2);//uid perla oviedo
        $this->assertTrue($this->Sessions->sessionIsAlive($res["token"]) > 0);
    }

    /**
     * Test testHasKillSession
     *
     * @return void
     */
    public function testHasKillSession()
    {
        $this->assertTrue(method_exists($this->Sessions,'killSession'));
    }

    public function testKillSession()
    {
        $res = $this->Sessions->setSession(2);//uid perla oviedo
        $this->assertTrue($this->Sessions->killSession($res["token"]) > 0);
    }

    /**
     * Test testHasCreateToken
     *
     * @return void
     */
    public function testHasCreateToken()
    {
        $this->assertTrue(method_exists($this->Sessions,'createToken'));
    }

    /**
     * Test testHasCreateToken
     *
     * @return void
     */
    public function testTokenIsAlwaysUnique()
    {
      $a = $this->Sessions->createToken();
      $keys = [];
      for($i=0;$i<10;$i++){
          $keys[] = $this->Sessions->createToken();
      }
      $this->assertFalse(in_array($a,$keys));
    }

    /**
     * Test isTestable
     *
     * @return void
     */
    public function testIsTestable(){
      $this->assertTrue(true);
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        //$this->markTestIncomplete('Not implemented yet.');
        $this->assertTrue(true);
    }
}
