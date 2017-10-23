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
      $this->loadModel("Users");
      $this->loadModel("Sessions");
  }

  public function auth()
  {
    $ret = [];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $res = $this->Users->checkAuth($email,$password);
    if($res['is_valid']){
      $ret['invalid_form'] = 0;
      $ret['User'] = $res['User'];
      $ret['Session'] = $this->Sessions->setSession(intval($res['User']['UserID']));
      $ret['token'] = $ret['Session']['token'];
      $ret['flash'] = "Welcome ".$ret['User']['FirstName']." ".$ret['User']['LastName'];
    }else{
      $ret['invalid_form'] = 1;
      $ret['flash'] = "invalid auth data";
    }
    $ret['res'] = $res;
    $ret['password'] = $password;
    $ret['email'] = $email;
    $this->cors_here();
    $this->set($ret);
  }
}
