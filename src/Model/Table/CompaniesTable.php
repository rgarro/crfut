<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Companies Model
 *
 * @method \App\Model\Entity\Company get($primaryKey, $options = [])
 * @method \App\Model\Entity\Company newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Company[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Company|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Company patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Company[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Company findOrCreate($search, callable $callback = null, $options = [])
 */
class CompaniesTable extends Table
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

        $this->setTable('Companies');
        $this->setDisplayField('CompanyID');
        $this->setPrimaryKey('CompanyID');
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
            ->integer('CompanyID')
            ->allowEmpty('CompanyID', 'create');

        $validator
            ->scalar('LocaleCode')
            ->requirePresence('LocaleCode', 'create')
            ->notEmpty('LocaleCode');

        $validator
            ->scalar('CompanyName')
            ->allowEmpty('CompanyName');

        $validator
            ->scalar('TaxID')
            ->allowEmpty('TaxID');

        $validator
            ->scalar('CommercialName')
            ->allowEmpty('CommercialName');

        $validator
            ->scalar('Address')
            ->allowEmpty('Address');

        $validator
            ->integer('AreaCode')
            ->allowEmpty('AreaCode');

        $validator
            ->integer('Phone')
            ->allowEmpty('Phone');

        $validator
            ->integer('FaxAreaCode')
            ->allowEmpty('FaxAreaCode');

        $validator
            ->integer('Fax')
            ->allowEmpty('Fax');

        $validator
            ->scalar('Email')
            ->allowEmpty('Email');

        $validator
            ->scalar('ReplyTo')
            ->allowEmpty('ReplyTo');

        $validator
            ->scalar('Logo')
            ->allowEmpty('Logo');

        $validator
            ->scalar('CompanyUrl')
            ->allowEmpty('CompanyUrl');

        $validator
            ->allowEmpty('CompanyStatus');

        $validator
            ->scalar('EmailSubject')
            ->allowEmpty('EmailSubject');

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
            ->scalar('CompanyInfo')
            ->allowEmpty('CompanyInfo');

        $validator
            ->scalar('Processor')
            ->allowEmpty('Processor');

        $validator
            ->integer('AcquirerID')
            ->allowEmpty('AcquirerID');

        $validator
            ->integer('CommerceID')
            ->allowEmpty('CommerceID');

        $validator
            ->integer('MallID')
            ->allowEmpty('MallID');

        $validator
            ->scalar('TerminalID')
            ->allowEmpty('TerminalID');

        $validator
            ->scalar('HexNumber')
            ->allowEmpty('HexNumber');

        $validator
            ->scalar('KeyName')
            ->allowEmpty('KeyName');

        $validator
            ->scalar('BgColor')
            ->requirePresence('BgColor', 'create')
            ->notEmpty('BgColor');

        $validator
            ->scalar('BgImage')
            ->allowEmpty('BgImage');

        $validator
            ->integer('LastInvoiceNo')
            ->allowEmpty('LastInvoiceNo');

        $validator
            ->integer('LastReceiptNo')
            ->allowEmpty('LastReceiptNo');

        $validator
            ->integer('InvoiceDays')
            ->allowEmpty('InvoiceDays');

        $validator
            ->allowEmpty('DayTypeID');

        $validator
            ->allowEmpty('CompanyTypeID');

        return $validator;
    }

    public function getList(){
        $sql = "SELECT CompanyID , CompanyName ";
        $sql .= "FROM Companies  ";
        return $this->connection()->execute($sql)->fetchAll('assoc');
    }

    public function dataTableData($user_id,$length=10,$start=0,$search="",$searchables=[],$sortables=[],$direction =""){
      //get total
      $sql ="SELECT COUNT(*) as hay ";
      $sql .=" FROM Companies ";
      $sql .=" WHERE CompanyID IN(SELECT CompanyID FROM CompanyUsers WHERE UserID = '".$user_id."')";
      $res = $this->connection()->execute($sql)->fetch('assoc');
      //get list
      $list_sql = "SELECT a.*  FROM Companies as a ";
      $list_sql .=" WHERE a.CompanyID IN(SELECT CompanyID FROM CompanyUsers WHERE UserID = '".$user_id."')";
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

}
