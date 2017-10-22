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
        $data = ["email" => "fchacon@pragmatico.com","password" => sha1("NewPas1557")];
        $r = $this->get('/login/auth',$data);
        $this->assertResponseContains('token');
        $this->assertTrue($r['invalid_form']==0);
    }

    public function testInValidAuth(){
        $data = ["email" => "fchon@pragtico.com","password" => sha1("Nas1557")];
        $r = $this->get('/login/auth',$data);
        $this->assertTrue($r['invalid_form']==1);
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
