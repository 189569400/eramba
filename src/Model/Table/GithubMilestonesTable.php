<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GithubMilestones Model
 *
 * @method \App\Model\Entity\GithubMilestone get($primaryKey, $options = [])
 * @method \App\Model\Entity\GithubMilestone newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GithubMilestone[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GithubMilestone|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GithubMilestone saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GithubMilestone patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GithubMilestone[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GithubMilestone findOrCreate($search, callable $callback = null, $options = [])
 */
class GithubMilestonesTable extends Table
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

        $this->setTable('github_milestones');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('GithubIssues', [
            'foreignKey' => 'milestone_id'
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
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->allowEmptyString('description', false);

        $validator
            ->integer('open_issues')
            ->requirePresence('open_issues', 'create')
            ->allowEmptyString('open_issues', false);

        $validator
            ->integer('closed_issues')
            ->requirePresence('closed_issues', 'create')
            ->allowEmptyString('closed_issues', false);

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
            ->dateTime('due_on')
            ->requirePresence('due_on', 'create')
            ->allowEmptyDateTime('due_on', false);

        $validator
            ->dateTime('closed_at')
            ->requirePresence('closed_at', 'create')
            ->allowEmptyDateTime('closed_at', false);

        return $validator;
    }
}
