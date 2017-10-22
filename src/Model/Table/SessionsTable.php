<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Sessions Model
 *
 * @method \App\Model\Entity\Session get($primaryKey, $options = [])
 * @method \App\Model\Entity\Session newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Session[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Session|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Session patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Session[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Session findOrCreate($search, callable $callback = null, $options = [])
 */
class SessionsTable extends Table
{


  public $session_seconds = 3600;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('Sessions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('UserID')
            ->requirePresence('UserID', 'create')
            ->notEmpty('UserID');

        $validator
            ->scalar('token')
            ->requirePresence('token', 'create')
            ->notEmpty('token');

        $validator
            ->integer('expires')
            ->requirePresence('expires', 'create')
            ->notEmpty('expires');

        $validator
            ->boolean('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmpty('is_active');

        return $validator;
    }

    public function setSession($uid){
      if(is_int($uid)){
        $session_data = ["UserID"=>$uid,"token"=>$this->createToken(),"expires"=>time()+$this->session_seconds];
        $session_t = $this->newEntity();
        $ses = $this->patchEntity($session_t,$session_data);
        if ($this->save($ses)) {
            $flash = __('Session has been started.');
            $success = 1;
            $invalid_form = 0;
            $errors = [];
        }else{
          $success = 0;
          $flash = __('Session could not be started');
          $invalid_form = 1;
          $errors = $ses->errors();
        }
        $ret = ["session_data"=>$session_data,"is_success"=>$success,"flash"=>$flash,"invalid_form"=>$invalid_form,"error_list"=>$errors];
        print_r($ret);
        exit;
      }else{
        throw new Exception("UserID must be integer");
      }
    }


    public function createToken(){
      $pref = str_shuffle(str_shuffle(rand(1000,9999)."tortugaDeRio".rand(1000,9999)));
      return uniqid($pref,true);
    }

}
