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
      $this->SessionTable = TableRegistry::get('Sessions', $config);
    }

    public function veryToken($token){
      $total_sessions_with_token = $this->SessionTable->sessionIsAlive($token);
      $this->LastCheckResult['is_alive'] = ($total_sessions_with_token > 0 ? true : false);
      return $total_sessions_with_token;
    }

}
