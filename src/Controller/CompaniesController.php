<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Companies Controller
 *
 *
 * @method \App\Model\Entity\Company[] paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{

  public function initialize(){
      parent::initialize();
      $this->loadModel("Users");
      $this->loadModel("Companies");
      $this->loadModel("Sessions");
      $this->loadComponent("BettyChecks");
      $this->loadComponent("DataTablePastry");
  }

  public function companiesoptions(){
    $ret = $this->Companies->getList();
    $this->cors_here();
    $this->set($ret);
  }

  public function datatable(){
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        $user_id = intval(base64_decode($_GET['user_id']));

        $searchables = $this->DataTablePastry->paramFilterSearchableColumnNames($_POST['columns']);
        $sortables = $this->DataTablePastry->paramFilterSortableColumnNames($_POST['columns']);
        $res = $this->Companies->dataTableData($user_id,$_POST['length'],$_POST['start'],$_POST['search']['value'],$searchables,$sortables,$_POST['order'][0]['dir']);
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

}
