<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Releases Model
 *
 * @method \App\Model\Entity\Release get($primaryKey, $options = [])
 * @method \App\Model\Entity\Release newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Release[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Release|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Release saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Release patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Release[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Release findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReleasesTable extends Table
{
    const TYPE_ENTERPRISE = 1;
    const TYPE_COMMUNITY = 2;

    public static function getTypes($type = null)
    {
        $types = [
            self::TYPE_ENTERPRISE => __('Enterprise'),
            self::TYPE_COMMUNITY => __('Community')
        ];

        if ($type !== null && array_key_exists($type, $types)) {
            return $types[$type];
        } else {
            return $types;
        }
    }
    
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('releases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->integer('type')
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('version')
            ->maxLength('version', 30)
            ->requirePresence('version', 'create')
            ->allowEmptyString('version', false);

        $validator
            ->dateTime('release_date')
            ->requirePresence('release_date', 'create')
            ->allowEmptyDateTime('release_date', false);

        $validator
            ->scalar('changelog')
            ->requirePresence('changelog', 'create')
            ->allowEmptyString('changelog', false);

        return $validator;
    }
}
