<?php
namespace App\Model\Table;

use App\Model\Entity\VotesSingle;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VotesSingle Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Persons
 * @property \Cake\ORM\Association\BelongsTo $Votes
 */
class VotesSingleTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('votes_single');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Persons', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Votes', [
            'foreignKey' => 'votes_id',
            'joinType' => 'INNER'
        ]);
        $this->addBehavior('CounterCache', [
            'Persons' => [
                'total_count',
                'win_count' => [
                    'conditions' => ['VotesSingle.opinion' => '1']
                ],
                'lose_count' => [
                    'conditions' => ['VotesSingle.opinion' => '0']
                ],
            ]
        ]);
        $this->addBehavior('ProportionsCache', [
            'Persons' => [
                'score' => ['win_count','lose_count']
            ]
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('opinion', 'valid', ['rule' => 'boolean'])
            ->requirePresence('opinion', 'create')
            ->notEmpty('opinion');

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
        $rules->add($rules->existsIn(['person_id'], 'Persons'));
        $rules->add($rules->existsIn(['votes_id'], 'Votes'));
        return $rules;
    }
}
