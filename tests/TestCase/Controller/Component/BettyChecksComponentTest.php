<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\BettyChecksComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\BettyChecksComponent Test Case
 */
class BettyChecksComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\BettyChecksComponent
     */
    public $BettyChecks;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->BettyChecks = new BettyChecksComponent($registry);
        
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BettyChecks);

        parent::tearDown();
    }

    public function testHasVeryToken()
    {
        $this->assertTrue(method_exists($this->BettyChecks,'veryToken'));
    }

    public function testHasSessions()
    {
        $this->assertTrue(property_exists($this->BettyChecks,'SessionTable'));
    }

    public function testHasLastCheckResult()
    {
        $this->assertTrue(property_exists($this->BettyChecks,'LastCheckResult'));
        $this->assertTrue(is_array($this->BettyChecks->LastCheckResult));
    }

    public function testVeryTokenInvalidToken(){
      $invalid_token = "95oor8Retg3i64u3t7Da59ee759cc04ed5.17119151";
      $this->BettyChecks->veryToken($invalid_token);
      $this->assertFalse($this->BettyChecks->LastCheckResult['is_alive']);
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->assertTrue(true);
    }
}
