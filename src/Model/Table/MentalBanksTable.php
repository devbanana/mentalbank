<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MentalBanks Model
 *
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\BelongsTo $Contracts
 * @property \CakeDC\Users\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ContractsTable|\Cake\ORM\Association\HasMany $Contracts
 *
 * @method \App\Model\Entity\MentalBank get($primaryKey, $options = [])
 * @method \App\Model\Entity\MentalBank newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MentalBank[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MentalBank|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MentalBank patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MentalBank[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MentalBank findOrCreate($search, callable $callback = null, $options = [])
 */
class MentalBanksTable extends Table
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

        $this->setTable('mental_banks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Contracts', [
            'foreignKey' => 'current_contract_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Contracts', [
            'foreignKey' => 'mental_bank_id'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('balance')
            ->requirePresence('balance', 'create')
            ->notEmpty('balance');

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
        $rules->add($rules->existsIn(['current_contract_id'], 'Contracts'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
