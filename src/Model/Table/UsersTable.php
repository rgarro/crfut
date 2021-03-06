<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\TableRegistry;
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
        $this->belongsTo('AccessLevels', ['className' => 'AccessLevels','foreignKey'=>"AccessLevelID"]);
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

            ->allowEmpty('UserID', 'create');

        $validator

            ->notEmpty('FirstName');

        $validator

            ->notEmpty('LastName');

        $validator
        ->allowEmpty('Email')
        ->add('Email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
          $return['User']['CiasList'] = $this->getUserCompanies(intval($return['User']['UserID']));
          $return['User']['AccessLevel'] =  $this->getAccessLabel($return['User']['AccessLevelID']);
        }else{
          $return['is_valid'] = false;
        }
        return $return;
      }else{
        throw new Exception("Password must be sha1.");
      }
    }

    public function getAccessLabel($AccessLevelID){
      $sql ="SELECT AccessLevel as label ";
      $sql .=" FROM AccessLevels ";
      $sql .=" WHERE AccessLevelID ='".$AccessLevelID."'";
      $res = $this->connection()->execute($sql)->fetch('assoc');
      return $res['label'];
    }

    public function getUserCompanies($user_id){
      if(is_int($user_id)){
        $sql = "SELECT CompanyID , CompanyName ";
        $sql .= "FROM Companies WHERE ";
        $sql .= "CompanyID IN(SELECT CompanyID FROM CompanyUsers WHERE UserID ='".$user_id."')";
        $sql .= " GROUP BY CompanyID";
        return $this->connection()->execute($sql)->fetchAll('assoc');
      }else{
        throw new Exception("user_id must be int.");
      }
    }

    public function getUserbyEmail($email){
      $sql ="SELECT * ";
      $sql .=" FROM Users ";
      $sql .=" WHERE UserStatus = 1 ";
      $sql .=" AND Email ='".trim($email)."'";
      return $this->connection()->execute($sql)->fetch('assoc');
    }

    public function assignCompanies($user_id,$companies=[],$enteredBy="System"){
      $sql =" DELETE FROM CompanyUsers WHERE UserID = '".$user_id."'";
			$res = $this->connection()->execute($sql);
//file_put_contents("/Users/rolando/Documents/Unity/sqlb.log", print_r($companies,true));
      foreach ($companies as $cid) {
        $sql = "INSERT INTO CompanyUsers (CompanyID,UserID,EnteredBy,Entered) VALUES ('".$cid."','".$user_id."','".$enteredBy."','".date("Y-m-d H:i:s")."')";
        $this->connection()->execute($sql);
      }
			return true;
    }

    public function isSha1($str){
      return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
    }

    public function dataTableData($length=10,$start=0,$search="",$searchables=[],$sortables=[],$direction =""){
      //get total
      $sql ="SELECT COUNT(*) as hay ";
      $sql .=" FROM Users ";
      $res = $this->connection()->execute($sql)->fetch('assoc');
      //get list
      $list_sql = "SELECT a.* , b.AccessLevel FROM Users as a , AccessLevels as b";
      $list_sql .= " WHERE a.AccessLevelID = b.AccessLevelID ";
      //get list searchables ...
      if(strlen($search)>0 && count($searchables) > 0){
        $list_sql .= " AND (";
        for($i=0;$i<count($searchables);$i++){
          $list_sql .= ($i > 0 ?" OR ":"");
          $list_sql .= " a.".$searchables[$i]." LIKE '%".$search."%' ";
        }
        $list_sql .= " ) ";
      }
      //get list sortables ...
      if(strlen($direction)>0 && count($sortables) > 0 ){
        $list_sql .= " GROUP BY a.".implode(",a.",$sortables)." ".$direction;
      }
      //get list pagination ...
      $list_sql .= " LIMIT ".$start.",".$length;
      //get list fetch the thing
      $DataSet = $this->connection()->execute($list_sql)->fetchAll('assoc');
      //pack results ...
      $Companies = TableRegistry::get('Companies');
      $cia_list = $Companies->getList();
      for($i=0;$i<count($DataSet);$i++){
        $uid = $DataSet[$i]['UserID'];
        $cias = $this->getUserCompanies(intval($uid));
        $list = $this->userCompanyIDS($cias);
        $filtered = $this->formFilterCias($list,$cia_list);
        $DataSet[$i]['Companies'] = $filtered;
      }
      $ret = [];
      $ret['total'] = $res['hay'];
      $ret['data'] = $DataSet;
      return $ret;
    }

    public function formFilterCias($list,$all){
      for($i=0;$i<count($all);$i++){
        if(in_array($all[$i]["CompanyID"], $list)){
          $all[$i]["checked"] = 1;
        }
      }
      return $all;
    }

    public function userCompanyIDS($userCompanies){
      $ret = [];
      for($i=0;$i<count($userCompanies);$i++){
        $ret[$i] = $userCompanies[$i]['CompanyID'];
      }
      return $ret;
    }

    public function deleteUser($UserID){
      $sql ="SET FOREIGN_KEY_CHECKS=0";
      $this->connection()->execute($sql);

      $sql = "DELETE FROM CompanyUsers WHERE UserID ='".$UserID."'";
      $this->connection()->execute($sql);

      $sql = "DELETE FROM Users WHERE UserID = '".$UserID."'";
      $this->connection()->execute($sql);

      $sql ="SET FOREIGN_KEY_CHECKS=1";
      $this->connection()->execute($sql);
    }

}
