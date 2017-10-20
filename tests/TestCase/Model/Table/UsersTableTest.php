<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsersTable
     */
    public $Users;

    /**
     * Fixtures
     *
     * @var array
     */
  //  public $fixtures = [
    //    'app.users'
    //];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => UsersTable::class];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
     * Test isTestable method
     *
     * @return void
     */
    public function testIsTestable()
    {
        $this->assertTrue(true);
    }

    /**
     * Test has checkAuth method
     *
     * @return void
     */
    public function testHasIsSha1()
    {
        $this->assertTrue(method_exists($this->Users,'isSha1'));
    }

    /**
     * Test testIsSha1WithValidHash
     *
     * @return void
     */
    public function testIsSha1WithValidHash()
    {
      $str = sha1("elfinaldelverano");
        $this->assertTrue($this->Users->isSha1($str));
    }

    /**
     * Test testIsSha1WithInValidHash
     *
     * @return void
     */
    public function testIsSha1WithInValidHash()
    {
      $str = md5("elfinaldelverano");
        $this->assertFalse($this->Users->isSha1($str));
    }

    /**
     * Test has checkAuth method
     *
     * @return void
     */
    public function testHasCheckAuth()
    {
        $this->assertTrue(method_exists($this->Users,'checkAuth'));
    }

    /**
     * Test valid checkAuth method
     *
     * @return void
     */
    public function testInValidCheckAuth()
    {
      $invalid_email = "wcoyote@everland.net";
      $invalid_pass = sha1("pajaroEnMano23#");
      $res = $this->Users->checkAuth($invalid_email,$invalid_pass);
      $this->assertArraySubset(["is_valid"=>false],$res);
    }

    /**
     * Test valid checkAuth method
     *
     * @return void
     */
    public function testValidCheckAuth()
    {
      $valid_email = "fchacon@pragmatico.com";
      $valid_pass = sha1("NewPas1557");
      $res = $this->Users->checkAuth($valid_email,$valid_pass);
      $this->assertArraySubset(["is_valid"=>true],$res);
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
