<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GithubIssueLabels Model
 *
 * @property \App\Model\Table\GithubIssuesTable|\Cake\ORM\Association\BelongsTo $GithubIssues
 *
 * @method \App\Model\Entity\GithubIssueLabel get($primaryKey, $options = [])
 * @method \App\Model\Entity\GithubIssueLabel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GithubIssueLabel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GithubIssueLabel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GithubIssueLabel saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GithubIssueLabel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GithubIssueLabel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GithubIssueLabel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GithubIssueLabelsTable extends Table
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

        $this->setTable('github_issue_labels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GithubIssues', [
            'foreignKey' => 'issue_id',
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
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('color')
            ->maxLength('color', 20)
            ->requirePresence('color', 'create')
            ->allowEmptyString('color', false);

        $validator
            ->boolean('is_default')
            ->requirePresence('is_default', 'create')
            ->allowEmptyString('is_default', false);

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
        $rules->add($rules->existsIn(['issue_id'], 'GithubIssues'));

        return $rules;
    }
}
