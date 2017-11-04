<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CsrfsTable;
use App\Model\Table\SessionsTable;
use App\Model\Table\UsersTable;
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
    public $Users;
    public $Sessions;
    /**
     * Fixtures
     *
     * @var array
     */
    /*public $fixtures = [
        'app.csrfs',
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
        $config = TableRegistry::exists('Csrfs') ? [] : ['className' => CsrfsTable::class];
        $this->Csrfs = TableRegistry::get('Csrfs', $config);
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);
        $config = TableRegistry::exists('Sessions') ? [] : ['className' => SessionsTable::class];
        $this->Sessions = TableRegistry::get('Sessions', $config);
    }

    public function testHasSetCsfrs()
    {
        $this->assertTrue(method_exists($this->Csrfs,'SetCsfrs'));
    }

    public function testHasResetCsfrs()
    {
        $this->assertTrue(method_exists($this->Csrfs,'ResetCsfrs'));
    }

    public function testHasCreateKey()
    {
        $this->assertTrue(method_exists($this->Csrfs,'CreateKey'));
    }

    public function testHasVerifyReset()
    {
        $this->assertTrue(method_exists($this->Csrfs,'VerifyReset'));
    }

    public function testHasDeletePrevSessionKeys()
    {
        $this->assertTrue(method_exists($this->Csrfs,'DeletePrevSessionKeys'));
    }

    public function testHasGetTheLuckyOne()
    {
        $this->assertTrue(method_exists($this->Csrfs,'GetTheLuckyOne'));
    }

    public function testHasXtimesProp()
    {
        $this->assertClassHasAttribute('Xtimes', $this->Csrfs);
        $this->assertTrue($this->Csrfs->Xtimes == 0);
    }

    public function testHasIsResetedProp()
    {
        $this->assertClassHasAttribute('IsReseted', $this->Csrfs);
        $this->assertFalse($this->Csrfs->IsReseted);
    }

    public function testHasCounterProp()
    {
        $this->assertClassHasAttribute('Counter', $this->Csrfs);
        $this->assertTrue($this->Csrfs->Counter == 0);
    }

    public function testHasCypherKeyProp()
    {
        $this->assertClassHasAttribute('CypherKey', $this->Csrfs);
        $this->assertTrue(strlen($this->Csrfs->CypherKey) > 15);
    }

    public function testVerifyTrue()
    {
      $valid_email = "fchacon@pragmatico.com";
      $valid_pass = sha1("NewPas1557");
      $res = $this->Users->checkAuth($valid_email,$valid_pass);
//print_r($res);
      $re = $this->Sessions->setSession(intval($res["User"]["UserID"]));
//print_r($re);
      $r = $this->Sessions->userHasLivingSession(intval($re['session_data']['UserID']));
      $session_id = intval($r['session_data']['id']);

      $csfrs_key = $this->Csrfs->GetTheLuckyOne($session_id);
      $this->assertTrue($this->Csrfs->VerifyReset($session_id,$csfrs_key));
    }

    public function testVerifyFalse()
    {
      $session_id = 1;
      $csfrs_key = "latigradepuriscalpariounavisondetoromucodequepos";
      $this->assertFalse($this->Csrfs->VerifyReset($session_id,$csfrs_key));
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Csrfs);
        unset($this->Users);
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
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        //$this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        //$this->markTestIncomplete('Not implemented yet.');
    }
}
