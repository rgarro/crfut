<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('Users');
        $this->setDisplayField('UserID');
        $this->setPrimaryKey('UserID');
        //$this->belongsTo('AccessLevels', ['className' => 'AccessLevels','foreignKey'=>"AccessLevelID"]);
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
            ->integer('UserID')
            ->allowEmpty('UserID', 'create');

        $validator

            ->notEmpty('FirstName');

        $validator

            ->notEmpty('LastName');

        $validator

            ->notEmpty('Email')
            ->email('Email')
            ->isUnique('Email');
        $validator

            ->notEmpty('Password');

        $validator
            ->allowEmpty('UserStatus');

        $validator
            ->integer('AccessLevelID')
            ->requirePresence('AccessLevelID', 'create')
            ->notEmpty('AccessLevelID');

        $validator

            ->allowEmpty('ModifiedBy');

        $validator
            ->dateTime('Entered')
            ->requirePresence('Entered', 'create')
            ->notEmpty('Entered');

        $validator

            ->allowEmpty('EnteredBy');

        $validator
            ->dateTime('Modified')
            ->allowEmpty('Modified');

        return $validator;
    }

    public function checkAuth($email,$sha1_password){
      if($this->isSha1($sha1_password)){
        $sql ="SELECT COUNT(*) as hay ";
  			$sql .=" FROM Users ";
  			$sql .=" WHERE UserStatus = 1 ";
  			$sql .=" AND Email ='".$email."'";
        $sql .=" AND Password ='".$sha1_password."'";
  			$res = $this->connection()->execute($sql)->fetch('assoc');
        $return = [];

        if($res['hay']){
          $return['is_valid'] = true;
          $return['User'] = $this->getUserbyEmail($email);
        }else{
          $return['is_valid'] = false;
        }
        return $return;
      }else{
        throw new Exception("Password must be sha1.");
      }
    }

    public function getUserbyEmail($email){
      $sql ="SELECT * ";
      $sql .=" FROM Users ";
      $sql .=" WHERE UserStatus = 1 ";
      $sql .=" AND Email ='".trim($email)."'";
      return $this->connection()->execute($sql)->fetch('assoc');
    }

    public function isSha1($str){
      return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
    }

    public function dataTableData(){
      $sql ="SELECT COUNT(*) as hay ";
      $sql .=" FROM Users ";
      $res = $this->connection()->execute($sql)->fetch('assoc');
      $list_sql = "SELECT * FROM Users ";
      $DataSet = $this->connection()->execute($list_sql)->fetchAll('assoc');
      $ret = [];
      //$q = $this->find('all');
      //$ret['total'] = $q->count();
      $ret['total'] = $res['hay'];
      $ret['data'] = $DataSet;
      return $ret;
    }

}
