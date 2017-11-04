<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Csrfs Model
 *
 * @property \App\Model\Table\SessionsTable|\Cake\ORM\Association\BelongsTo $Sessions
 *
 * @method \App\Model\Entity\Csrf get($primaryKey, $options = [])
 * @method \App\Model\Entity\Csrf newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Csrf[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Csrf|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Csrf patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Csrf[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Csrf findOrCreate($search, callable $callback = null, $options = [])
 */
class CsrfsTable extends Table
{

    public  $Xtimes = 0;
    public  $IsReseted = false;
    public  $Counter = 0;
    public  $CypherKey = "";
    public  $CypherKeys = [];
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('Csrfs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('session_id', 'create')
            ->notEmpty('session_id');
        $validator
            ->requirePresence('theKey', 'create')
            ->notEmpty('theKey');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }

    public function SetCsfrs($theKey,$session_id){

    }

    public function ResetCsfrs($session_id){

    }

    public function CreateKey(){

    }

    public function VerifyReset($session_id,$key){

    }

    public function DeletePrevSessionKeys($session_id){

    }

    public function GetTheLuckyOne(){

    }
}
