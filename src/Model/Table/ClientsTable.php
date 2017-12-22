<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;

/**
 * Clients Model
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
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

        $this->setTable('Clients');
        $this->setDisplayField('ClientID');
        $this->setPrimaryKey('ClientID');
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
            ->integer('ClientID')
            ->allowEmpty('ClientID', 'create');

        $validator
            ->integer('CompanyID')
            ->requirePresence('CompanyID', 'create')
            ->notEmpty('CompanyID');

        $validator
        ->allowEmpty('Email')
        ->add('Email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('ExtraEmails')
            ->allowEmpty('ExtraEmails');

        $validator
            ->allowEmpty('ClientStatus');

        $validator
            ->scalar('CommercialName')
            ->requirePresence('CommercialName', 'create')
            ->notEmpty('CommercialName');

        $validator
            ->dateTime('Entered')
            ->requirePresence('Entered', 'create')
            ->notEmpty('Entered');

        $validator
            ->scalar('EnteredBy')
            ->allowEmpty('EnteredBy');

        $validator
            ->dateTime('Modified')
            ->allowEmpty('Modified');

        $validator
            ->scalar('ModifiedBy')
            ->allowEmpty('ModifiedBy');

        $validator
            ->scalar('CedulaJuridica')
            ->allowEmpty('CedulaJuridica');

        $validator
            ->scalar('ForeginTaxID')
            ->allowEmpty('ForeginTaxID');

        $validator
            ->scalar('ClientName')
            ->allowEmpty('ClientName');

        $validator
            ->scalar('Address')
            ->allowEmpty('Address');

        $validator
            ->scalar('AreaCode')
            ->allowEmpty('AreaCode');

        $validator
            ->scalar('Phone')
            ->allowEmpty('Phone');

        $validator
            ->scalar('ForeginPhone')
            ->allowEmpty('ForeginPhone');

        return $validator;
    }

    public function dataTableData($company_id,$length=10,$start=0,$search="",$searchables=[],$sortables=[],$direction =""){
      //get total ..
      $sql ="SELECT COUNT(*) as hay ";
      $sql .=" FROM Clients ";
      $sql .=" WHERE CompanyID = '".$company_id."'";
      $res = $this->connection()->execute($sql)->fetch('assoc');
      //get list
      $list_sql = "SELECT a.*  FROM Clients as a ";
      $list_sql .=" WHERE a.CompanyID = '".$company_id."' ";
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
      $ret = [];
      $ret['total'] = $res['hay'];
      $ret['data'] = $DataSet;
      return $ret;
    }

    public function deleteCliente($ClientID){
      $sql ="SET FOREIGN_KEY_CHECKS=0";
      $this->connection()->execute($sql);

      $sql = "DELETE FROM Receipts WHERE ClientID ='".$ClientID."'";
      $this->connection()->execute($sql);

      $sql = "DELETE FROM InvoiceDetail WHERE InvoiceID IN( SELECT InvoiceID FROM Invoices WHERE ClientID = '".$ClientID."')";
      $this->connection()->execute($sql);

      $sql = "DELETE FROM InvoiceLog WHERE InvoiceID IN( SELECT InvoiceID FROM Invoices WHERE ClientID = '".$ClientID."')";
      $this->connection()->execute($sql);

      $sql = "DELETE FROM Invoices WHERE ClientID ='".$ClientID."'";
      $this->connection()->execute($sql);

      $sql = "DELETE FROM Clients WHERE ClientID ='".$ClientID."'";
      $this->connection()->execute($sql);

      $sql ="SET FOREIGN_KEY_CHECKS=1";
      $this->connection()->execute($sql);
    }

}
