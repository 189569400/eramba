<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GithubIssues Model
 *
 * @property \App\Model\Table\GithubMilestonesTable|\Cake\ORM\Association\BelongsTo $GithubMilestones
 *
 * @method \App\Model\Entity\GithubIssue get($primaryKey, $options = [])
 * @method \App\Model\Entity\GithubIssue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GithubIssue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GithubIssue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GithubIssue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GithubIssue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GithubIssue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GithubIssue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GithubIssuesTable extends Table
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

        $this->setTable('github_issues');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GithubMilestones', [
            'foreignKey' => 'milestone_id'
        ]);

        $this->hasMany('GithubIssueLabels', [
            'foreignKey' => 'issue_id'
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
            ->scalar('number')
            ->maxLength('number', 10)
            ->requirePresence('number', 'create')
            ->allowEmptyString('number', false);

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->allowEmptyString('title', false);

        $validator
            ->scalar('state')
            ->maxLength('state', 30)
            ->requirePresence('state', 'create')
            ->allowEmptyString('state', false);

        $validator
            ->dateTime('created_at')
            ->requirePresence('created_at', 'create')
            ->allowEmptyDateTime('created_at', false);

        $validator
            ->dateTime('updated_at')
            ->requirePresence('updated_at', 'create')
            ->allowEmptyDateTime('updated_at', false);

        $validator
            ->dateTime('closed_at')
            ->requirePresence('closed_at', 'create')
            ->allowEmptyDateTime('closed_at', false);

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
        $rules->add($rules->existsIn(['milestone_id'], 'GithubMilestones'));

        return $rules;
    }
}
