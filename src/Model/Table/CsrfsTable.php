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

    public  $Xtimes = 5;
    public  $IsReseted = false;
    public  $Counter = 0;
    public  $CypherKey = "";
    public  $CypherKeys = ["chamucosiamanecenosvamoes","elcuasranbatioalosgallegos","nopasaranmorosendiquis","laultramoradavencera","vivasaprissaytibas","lavirgendefatimaentangaroja","lavirgendecuatlaviendoalsur"];
    public $newKeys = [];
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
      $cs = $this->newEntity();
      $cs->session_id = $session_id;
      $cs->theKey = $theKey;
      $this->save($cs);
    }

    public function ResetCsfrs($session_id){
      if(!$this->IsReseted){
        $this->DeletePrevSessionKeys($session_id);
        $this->IsReseted = true;
      }
      if($this->Counter < $this->Xtimes){
        $tkey = $this->CreateKey();
        array_push($this->newKeys,$tkey);
        $this->SetCsfrs($tkey,$session_id);
        $this->Counter ++;
        $this->ResetCsfrs($session_id);
      }else{
        $this->CypherKey = $this->newKeys[array_rand($this->newKeys)];
      }
    }

    public function CreateKey(){
      return str_shuffle(str_shuffle(str_shuffle(decoct(rand(10000,90000)).str_shuffle($this->CypherKeys[array_rand($this->CypherKeys)]).decoct(rand(10000,90000)))));
    }

    public function VerifyReset($session_id,$key){
      $q = $this->find('all',['conditions'=>["Csrfs.session_id"=>$session_id,"Csrfs.theKey"=>$key]]);
      $ret = ($q->count() > 0 ? true : false);
      $this->DeletePrevSessionKeys($session_id);
      return $ret;
    }

    public function DeletePrevSessionKeys($session_id){
      $this->deleteAll(["Csrfs.session_id"=>$session_id]);
    }

    public function GetTheLuckyOne($session_id){
      $this->ResetCsfrs($session_id);
      return $this->CypherKey;
    }
}
