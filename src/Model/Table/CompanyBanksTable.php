<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CompanyBanks Model
 *
 * @method \App\Model\Entity\CompanyBank get($primaryKey, $options = [])
 * @method \App\Model\Entity\CompanyBank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CompanyBank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CompanyBank|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CompanyBank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CompanyBank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CompanyBank findOrCreate($search, callable $callback = null, $options = [])
 */
class CompanyBanksTable extends Table
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

        $this->setTable('CompanyBanks');
        $this->setDisplayField('CompanyID');
        $this->setPrimaryKey(['CompanyID', 'BankID', 'CurrencyID']);
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
            ->integer('BankID')
            ->allowEmpty('BankID', 'create');

        $validator
            ->integer('CurrencyID')
            ->allowEmpty('CurrencyID', 'create');

        $validator
            ->allowEmpty('BankOrder');

        $validator
            ->scalar('AccountNumber')
            ->allowEmpty('AccountNumber');

        $validator
            ->scalar('SINPE')
            ->allowEmpty('SINPE');

        $validator
            ->dateTime('Entered')
            ->requirePresence('Entered', 'create')
            ->notEmpty('Entered');

        $validator
            ->scalar('EnteredBy')
            ->allowEmpty('EnteredBy');

        $validator
            ->scalar('ModifiedBy')
            ->allowEmpty('ModifiedBy');

        $validator
            ->dateTime('Modified')
            ->allowEmpty('Modified');

        return $validator;
    }
}
