<?php
namespace App\Controller;

use App\Controller\AppController;

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
  }

  public function auth()
  {
    $this->cors_here();
    $this->set(["here"=>1,"is_success"=>1]);
  }
}
