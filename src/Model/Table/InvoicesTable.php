<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Invoices Model
 *
 * @method \App\Model\Entity\Invoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\Invoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Invoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Invoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Invoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Invoice findOrCreate($search, callable $callback = null, $options = [])
 */
class InvoicesTable extends Table
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

        $this->setTable('Invoices');
        $this->setDisplayField('InvoiceID');
        $this->setPrimaryKey('InvoiceID');

        $this->belongsTo('Companies', ['className' => 'Companies','foreignKey'=>"CompanyID"]);
        $this->belongsTo('Clients', ['className' => 'Clients','foreignKey'=>"ClientID","propertyName"=>"Client"]);
        //$this->belongsTo('Currencies', ['className' => 'Currencies','foreignKey'=>"CurrencyID","propertyName"=>"Currency"]);
      //  $this->hasMany('InvoiceDetail', ['className' => 'InvoiceDetail','foreignKey'=>"InvoiceID","propertyName"=>"Detail"]);
        //$this->belongsTo('Status', ['className' => 'Status','foreignKey'=>"StatusID","propertyName"=>"Status"]);
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
            ->integer('InvoiceID')
            ->allowEmpty('InvoiceID', 'create');

        $validator
            ->integer('CompanyID')
            ->requirePresence('CompanyID', 'create')
            ->notEmpty('CompanyID');

        $validator
            ->integer('StatusID')
            ->requirePresence('StatusID', 'create')
            ->notEmpty('StatusID');

        $validator
            ->integer('ClientID')
            ->requirePresence('ClientID', 'create')
            ->notEmpty('ClientID');

        $validator
            ->scalar('LocaleCode')
            ->requirePresence('LocaleCode', 'create')
            ->notEmpty('LocaleCode');

        $validator
            ->integer('TransactionID')
            ->allowEmpty('TransactionID');

        $validator
            ->scalar('DocTypeCode')
            ->allowEmpty('DocTypeCode');

        $validator
            ->integer('InvoiceNumber')
            ->allowEmpty('InvoiceNumber');

        $validator
            ->scalar('SaleConditionCode')
            ->allowEmpty('SaleConditionCode');

        $validator
            ->dateTime('InvoiceDate')
            ->allowEmpty('InvoiceDate');

        $validator
            ->decimal('Shipping')
            ->allowEmpty('Shipping');

        $validator
            ->decimal('Tax')
            ->allowEmpty('Tax');

        $validator
            ->scalar('Note')
            ->allowEmpty('Note');

        $validator
            ->scalar('EmailSubject')
            ->allowEmpty('EmailSubject');

        $validator
            ->scalar('AuthNumber')
            ->allowEmpty('AuthNumber');

        $validator
            ->dateTime('VoidDate')
            ->allowEmpty('VoidDate');

        $validator
            ->dateTime('PaidDate')
            ->allowEmpty('PaidDate');

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
            ->integer('CurrencyID')
            ->requirePresence('CurrencyID', 'create')
            ->notEmpty('CurrencyID');

        $validator
            ->decimal('ExchangeRate')
            ->allowEmpty('ExchangeRate');

        $validator
            ->decimal('TotalSerGravados')
            ->allowEmpty('TotalSerGravados');

        $validator
            ->decimal('TotalSerExtentos')
            ->allowEmpty('TotalSerExtentos');

        $validator
            ->decimal('TotalMerGravadas')
            ->allowEmpty('TotalMerGravadas');

        $validator
            ->decimal('TotalMerExtentas')
            ->allowEmpty('TotalMerExtentas');

        $validator
            ->decimal('TotalGravado')
            ->allowEmpty('TotalGravado');

        $validator
            ->decimal('TotalExtento')
            ->allowEmpty('TotalExtento');

        $validator
            ->decimal('TotalVenta')
            ->allowEmpty('TotalVenta');

        $validator
            ->decimal('Descuentos')
            ->allowEmpty('Descuentos');

        $validator
            ->decimal('TotalVentaNeta')
            ->allowEmpty('TotalVentaNeta');

        $validator
            ->decimal('MontoImpConsumo')
            ->allowEmpty('MontoImpConsumo');

        $validator
            ->decimal('MontosOtrosImp')
            ->allowEmpty('MontosOtrosImp');

        $validator
            ->decimal('TarifaImpuesto')
            ->allowEmpty('TarifaImpuesto');

        $validator
            ->decimal('MontoImpVentas')
            ->allowEmpty('MontoImpVentas');

        $validator
            ->decimal('TotalFactura')
            ->allowEmpty('TotalFactura');

        $validator
            ->decimal('CreditAmount')
            ->allowEmpty('CreditAmount');

        $validator
            ->dateTime('DueDate')
            ->allowEmpty('DueDate');

        return $validator;
    }

    public function dataTableData($company_id,$status_id,$length=10,$start=0,$search="",$searchables=[],$sortables=[],$direction =""){
      //get total ..
      $sql ="SELECT COUNT(*) as hay ";
      $sql .=" FROM Invoices ";
      $sql .=" WHERE CompanyID = '".$company_id."'";
      $sql .=" AND StatusID = '".$status_id."'";
      $res = $this->connection()->execute($sql)->fetch('assoc');
      //get list
      $list_sql = "SELECT a.* , c.ClientName, c.Email,d.Description FROM Invoices as a,InvoiceDetail as d ,Clients as c";
      $list_sql .=" WHERE a.CompanyID = '".$company_id."' ";
      $list_sql .=" AND a.StatusID = '".$status_id."'";
      $list_sql .=" AND c.ClientID = a.ClientID";
      $list_sql .=" AND d.InvoiceID = a.InvoiceID ";//AND d.LineID = '1'
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
