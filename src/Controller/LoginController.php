<?php
namespace App\Controller;

use App\Controller\AppController;
use PhpParser\Node\Stmt\If_;

/**
 * Login Controller
 *
 *
 * @method \App\Model\Entity\Login[] paginate($object = null, array $settings = [])
 */
class LoginController extends AppController
{

  public function initialize(){
      parent::initialize();
      $this->loadComponent('RequestHandler');
      $this->loadModel("Users");
      $this->loadModel("Sessions");
  }

  public function auth()
  {
    $this->cors_here();
    //$d = $this->request->getData();
    //$email = $d['email'];
    $ret = [];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $res = $this->Users->checkAuth($email,$password)
    if($res['is_valid']){
      $ret['invalid_form'] = 0;
      $ret['User'] = $res['User'];
      $ret['Session'] = $this->Sessions->setSession($ret['User']['id']);
      $ret['token'] = $ret['Session']['token'];
    }else{
      $ret['invalid_form'] = 1;
    }
    $this->set($ret);
  }
}
