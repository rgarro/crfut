<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

  public function initialize(){
      parent::initialize();
      $this->loadModel("Users");
      $this->loadModel("Sessions");
      $this->loadComponent("BettyChecks");
  }

  public function datatable(){
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        $res = $this->Users->dataTableData();
        $ret = ["sEcho" => 1,
            "recordsTotal" => $res['total'],
            "recordsFiltered" => 10,
            "data" => $res['data'] ];
        $this->cors_here();
        $this->set($ret);
      }else{
        throw new Exception("token is expired");//ajax logout callback will be ...
      }
    }else{
      throw new Exception("token is required");
    }
  }

}
