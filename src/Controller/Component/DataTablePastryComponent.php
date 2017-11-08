<?php
/**
 * A jQuery dataTables Pastry tool ....
 *             (        (
 *             ( )      ( )          (
 *      (       Y        Y          ( )
 *     ( )     |"|      |"|          Y
 *      Y      | |      | |         |"|
 *     |"|     | |.-----| |---.___  | |
 *     | |  .--| |,~~~~~| |~~~,,,,'-| |
 *     | |-,,~~'-'___   '-'       ~~| |._
 *    .| |~       // ___            '-',,'.
 *   /,'-'     <_// // _  __             ~,\
 *  / ;     ,-,     \\_> <<_' ____________;_)
 *  | ;    {(_)} _,      ._>>`'-._          |
 *  | ;     '-'\_\/>              '-._      |
 *  |\ ~,,,      _\__            ,,,,,'-.   |
 *  | '-._ ~~,,,            ,,,~~ __.-'~ |  |
 *  |     '-.__ ~~~~~~~~~~~~ __.-'       |__|
 *  |\         `'----------'`           _|
 *  | '=._                         __.=' |
 *  :     '=.__               __.='      |
 *   \         `'==========='`          .'
 *snd '-._                         __.-'
 *        '-.__               __.-'
 *             `'-----------'`
 *
 * @author Rolando <rgarro@gmail.com>
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * DataTablePastry component
 *
 */
class DataTablePastryComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function paramFilterSortableColumnNames($columns){
      $ret = [];
      foreach($columns as $col){
        if($col['orderable'] == "true"){
          array_push($ret,$col['data']);
        }
      }
      return $ret;
    }

    public function paramFilterSearchableColumnNames($columns){
      $ret = [];
      foreach($columns as $col){
        if($col['searchable'] == "true"){
          array_push($ret,$col['data']);
        }
      }
      return $ret;
    }

}
