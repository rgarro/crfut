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
      $this->loadModel("CompanyBanks");
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

  public function save(){
    $ret = [];
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        if(isset($_POST['Company']['CompanyID']) && intval($_POST['Company']['CompanyID']) > 0){
          $company = $this->Companies->get(intval($_POST['Company']['CompanyID']),['contain' => []]);
        }else{
          $company = $this->Companies->newEntity();
          $_POST['Company']['Entered'] = date("Y-m-d H:i:s");
        }
        $cli = $this->Companies->patchEntity($company,$_POST['Company']);


        if ($this->Companies->save($cli)) {
          if(isset($_FILES['photo']) && strlen($_FILES['photo']['tmp_name']) > 1){
            $file_dir = WWW_ROOT."/files/cialogos/".$cli->CompanyID;
            if(!is_dir($file_dir)){
              mkdir($file_dir);
            }
            move_uploaded_file($_FILES['photo']['tmp_name'],$file_dir."/".$_FILES['photo']['name']);
          }
            $flash = __('The Company has been saved.');
            $success = 1;
            $invalid_form = 0;
            $errors = [];
        }else{
          $success = 0;
          $flash = __('The Company could not be saved. Please, try again.');
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

  public function delete(){
    $ret = [];
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        if(isset($_POST['CompanyID']) && intval($_POST['CompanyID']) > 0){
          $company = $this->Companies->get(intval($_POST['CompanyID']),['contain' => []]);
//file_put_contents("/Users/rolando/Documents/Unity/sql.log",print_r($company,true));
          $this->Companies->deleteCia($_POST['CompanyID']);
          unlink(WWW_ROOT."/files/cialogos/".$_POST['CompanyID']."/".$_POST['Logo']);
          rmdir(WWW_ROOT."/files/cialogos/".$_POST['CompanyID']);
          $flash = __('The Company has been deleted.');
          $success = 1;
          $invalid_form = 0;
          $errors = [];
        }else{
          $flash = __('The Company could not been deleted.');
          $success = 0;
          $invalid_form = 1;
          $errors = [];
        }
        $ret['is_success'] = $success;
        $ret['flash'] = $flash;
        $ret['invalid_form'] = $invalid_form;
        $ret['error_list'] = $errors;
      }else{
        $ret["token_is_expired"] = 1;
      }
    }else{
      $ret["token_is_absent"] = 1;
    }
    $this->cors_here();
    $this->set($ret);
  }

  public function savecompanyaccount(){
    $ret = [];
    if(isset($_GET["token"])){
      $this->BettyChecks->veryToken($_GET["token"]);
      if($this->BettyChecks->LastCheckResult["is_alive"]){
        $companyBanks = $this->CompanyBanks->newEntity();
        $cli = $this->CompanyBanks->patchEntity($companyBanks,$_GET['CompanyBanks']);
        if ($this->CompanyBanks->save($cli)) {
            $flash = __('The CompanyBank has been saved.');
            $success = 1;
            $invalid_form = 0;
            $errors = [];
        }else{
          $success = 0;
          $flash = __('The Company Bank could not be saved. Please, try again.');
          $invalid_form = 1;
          $errors = $cli->errors();
        }
        $ret['is_success'] = $success;
        $ret['flash'] = $flash;
        $ret['invalid_form'] = $invalid_form;
        $ret['error_list'] = $errors;
      }else{
        $ret["token_is_expired"] = 1;
      }
    }else{
      $ret["token_is_absent"] = 1;
    }
    $this->cors_here();
    $this->set($ret);
  }

  public function currencyoptions(){
    $ret = $this->Companies->getCurrencies();
    $this->cors_here();
    $this->set($ret);
  }

  public function getbankoptions(){
    $ret = $this->CompanyBanks->getBankList($_GET['CompanyID']);
    $this->cors_here();
    $this->set($ret);
  }

}
