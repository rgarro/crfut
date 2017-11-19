<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[] paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{

  public function initialize(){
      parent::initialize();
      $this->loadModel("Users");
      $this->loadModel("Invoices");
      $this->loadModel("Sessions");
      $this->loadComponent("BettyChecks");
      $this->loadComponent("DataTablePastry");
  }

  public function datatable(){
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        $company_id = intval(base64_decode($_GET['company_id']));
        $status_id = intval(base64_decode($_GET['status_id']));

        $searchables = $this->DataTablePastry->paramFilterSearchableColumnNames($_POST['columns']);
        $sortables = $this->DataTablePastry->paramFilterSortableColumnNames($_POST['columns']);
        $res = $this->Invoices->dataTableData($company_id,$status_id,$_POST['length'],$_POST['start'],$_POST['search']['value'],$searchables,$sortables,$_POST['order'][0]['dir']);
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

  public function getcount(){
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      $ret = [];
      $ret["is_success"] = 0;
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        $company_id = intval(base64_decode($_GET['company_id']));
        $status_id = intval(base64_decode($_GET['status_id']));
        $total = $this->Invoices->countByCompanyAndStatus($company_id,$status_id);
        $ret["is_success"] = 1;
        $ret['total'] = $total;
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
