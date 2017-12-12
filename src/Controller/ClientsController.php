<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 *
 * @method \App\Model\Entity\Client[] paginate($object = null, array $settings = [])
 */
class ClientsController extends AppController
{

  public function initialize(){
      parent::initialize();
      $this->loadModel("Users");
      $this->loadModel("Clients");
      $this->loadModel("Sessions");
      $this->loadComponent("BettyChecks");
      $this->loadComponent("DataTablePastry");
  }

  public function datatable(){
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        $company_id = intval(base64_decode($_GET['company_id']));

        $searchables = $this->DataTablePastry->paramFilterSearchableColumnNames($_POST['columns']);
        $sortables = $this->DataTablePastry->paramFilterSortableColumnNames($_POST['columns']);
        $res = $this->Clients->dataTableData($company_id,$_POST['length'],$_POST['start'],$_POST['search']['value'],$searchables,$sortables,$_POST['order'][0]['dir']);
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
//file_put_contents("/Users/rolando/Documents/Unity/sql.log", print_r($_POST,true));
        if(isset($_GET['Client']['ClientID']) && is_numeric($_GET['Client']['ClientID'])){
          $client = $this->Clients->get($_GET['Client']['ClientID'],['contain' => []]);
        }else{
          $client = $this->Clients->newEntity();
          $_GET['Client']['Entered'] = date("Y-m-d H:i:s");
        }
        $cli = $this->Clients->patchEntity($client,$_GET['Client']);
        if ($this->Clients->save($cli)) {
            $flash = __('The Client has been saved.');
            $success = 1;
            $invalid_form = 0;
            $errors = [];
        }else{
          $success = 0;
          $flash = __('The Client could not be saved. Please, try again.');
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
