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

        $this->setTable('invoices');
        $this->setDisplayField('InvoiceID');
        $this->setPrimaryKey('InvoiceID');
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
}
