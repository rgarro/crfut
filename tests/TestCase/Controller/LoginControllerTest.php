<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LoginController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\LoginController Test Case
 */
class LoginControllerTest extends IntegrationTestCase
{

    public function testAuth(){
          $this->get('/login/auth');
          $this->assertResponseOk();
    }

    public function testValidAuth(){
      $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $data = ["email" => "fchacon@pragmatico.com","password" => sha1("NewPas1557")];
        //$r = $this->post('/login/auth',$data);
  $r = $this->get('/login/auth?email=fchacon@pragmatico.com&password='.sha1("NewPas1557"));
        $res = json_decode($this->_response->body());

        $this->assertArrayHasKey("token",$res);
        $this->assertArraySubset(["invalid_form"=>0],$res);
    }

    public function testInValidAuth(){
      $this->configRequest([
            'headers' => ['Accept' => 'application/json']
        ]);
        $data = ["email" => "fchon@pragtico.com","password" => sha1("Nas1557")];
        $r = $this->get('/login/auth',$data);
        $res = json_decode($this->_response->body());
        $this->assertArraySubset(["invalid_form"=>1],$res);
    }

    public function testChecksession(){
          $this->get('/login/checksession');
          $this->assertResponseOk();
    }

    public function testSignout(){
          $this->get('/login/signout');
          $this->assertResponseOk();
    }
}
