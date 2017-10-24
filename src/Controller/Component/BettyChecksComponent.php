<?php
/**
 *  BettyChecks Component ...
 *
 *                ,-`'-.
 *               /    , \
 *              (   ((_)))
 *              )  /  a a
 *             /  C     >
 *            (    \   =(
 *           /      )  ( )
 *          (   .--'.   ;-.
 *          )  '     `''   `
 *         /   |  , .--\|-(|
 *        (    |  |'       `
 *         `(  |  |     )   )
 *           `.|  |       .'
 *             |  |       ||
 *             (  ()      ||
 *              \  \      \|
 *               \  \      `
 *              /  \ \      \
 *             '    \ \      `
 *            /      | )>     \
 *           '       /\/\      `
 *          /       (_.,_)      \
 *         '       /      \      `
 *        (       (        )      )
 *         `-=.__  `--==--' __.=-'
 *               |`-.__.._.'
 *               |     |   |
 *               `     |   |
 *                \    /   )
 *                 :   )  /
 *                /   '   |
 *               |    |   |
 *               `    |   |
 *                \   |\  |
 *                 \  |)_ (
 *                 )  (_ \ \
 *                / \  \\ \_\_
 *                l\ \__\`____>
 *                  \____>
 *
 * @author Rolando <rgarro@gmail.com>
 */
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

class BettyChecksComponent extends Component
{
    protected $_defaultConfig = [];
    public $SessionTable;
    public $LastCheckResult = [];
    public $controller;

    public function initialize(array $config)
    {
      parent::initialize($config);
      $this->SessionTable = TableRegistry::get('Sessions');
    }

    public function veryToken($token){
      $query = $this->SessionsTable->find("all",["conditions"=>["Sessions.token"=>$token,"Sessions.expires > ".time()]]);
      $this->LastCheckResult['is_alive'] = ($query->count() ? true : false);
      return $query->count();
    }

}
