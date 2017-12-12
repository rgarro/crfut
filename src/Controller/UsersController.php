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
      $this->loadModel("AccessLevels");
      $this->loadModel("Companies");
      $this->loadComponent("BettyChecks");
      $this->loadComponent("DataTablePastry");
  }

  public function accesslevelsoptions(){
    $ret = $this->AccessLevels->getList();
    $this->cors_here();
    $this->set($ret);
  }

  public function datatable(){
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        $searchables = $this->DataTablePastry->paramFilterSearchableColumnNames($_POST['columns']);
        $sortables = $this->DataTablePastry->paramFilterSortableColumnNames($_POST['columns']);
        $res = $this->Users->dataTableData($_POST['length'],$_POST['start'],$_POST['search']['value'],$searchables,$sortables,$_POST['order'][0]['dir']);
        $ret = [
            "draw"=> intval($_POST['draw']),
            "recordsTotal" => $res['total'],
            "recordsFiltered" => $res['total'],
            "data" => $res['data']
          ];

      }else{
        $ret = [];
        $ret["token_is_expired"] = 1;
        //throw new Exception("token is expired");//ajax logout callback will be ...
      }

    }else{
      $ret = [];
      $ret["token_is_absent"] = 1;
      //throw new Exception("token is required");
    }
    $this->cors_here();
    $this->set($ret);
  }

  public function save(){
    $ret = [];
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        if(isset($_GET['User']['UserID']) && is_numeric($_GET['User']['UserID'])){
          $user = $this->Users->get($_GET['User']['UserID'],['contain' => []]);
        }else{
          $user = $this->Users->newEntity();
          $_GET['User']['Entered'] = date("Y-m-d H:i:s");
        }
        $cli = $this->Users->patchEntity($user,$_GET['User']);
        if ($this->Users->save($cli)) {

            $this->Users->assignCompanies($cli->UserID,array_values($_GET['Companies']),$_GET['User']['EnteredBy']);

            $flash = __('The User has been saved.');
            $success = 1;
            $invalid_form = 0;
            $errors = [];
        }else{
          $success = 0;
          $flash = __('The User could not be saved. Please, try again.');
          $invalid_form = 1;
          $errors = $cli->errors();
        }
        $ret['is_success'] = $success;
        $ret['flash'] = $flash;
        $ret['invalid_form'] = $invalid_form;
        $ret['error_list'] = $errors;
      }else{
        $ret["token_is_expired"] = 1;
        //throw new Exception("token is expired");//ajax logout callback will be ...
      }

    }else{
      $ret["token_is_absent"] = 1;
      //throw new Exception("token is required");
    }
    $this->cors_here();
    $this->set($ret);
  }

}
