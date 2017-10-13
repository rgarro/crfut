<?php
namespace App\Controller;
use App\Controller\AppController;

class ContesterController extends AppController
{
  public function initialize(){
      $this->loadComponent('RequestHandler');
  }

  public function testService()
  {
    $this->cors_here();
    $this->set(["here"=>1,"is_success"=>1]);
  }

}
