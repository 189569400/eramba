<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Documentations Model
 *
 * @property \App\Model\Table\DocumentationRelationsTable|\Cake\ORM\Association\HasMany $DocumentationRelations
 *
 * @method \App\Model\Entity\Documentation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Documentation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Documentation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Documentation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documentation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Documentation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Documentation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Documentation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DocumentationsTable extends Table
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

        $this->setTable('documentations');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('DocumentationCategories');

        $this->hasMany('DocumentationRelations', [
            'foreignKey' => 'documentation_id'
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
            ->integer('number')
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
            ->scalar('link')
            ->maxLength('link', 255)
            ->allowEmptyString('link', false);

        $validator
            ->scalar('video')
            ->maxLength('video', 255)
            ->allowEmptyString('video', false);

        $validator
            ->scalar('video_ubuntu')
            ->maxLength('video_ubuntu', 255)
            ->allowEmptyString('video_ubuntu', false);

        $validator
            ->scalar('video_centos')
            ->maxLength('video_centos', 255)
            ->allowEmptyString('video_centos', false);

        $validator
            ->scalar('video_redhat')
            ->maxLength('video_redhat', 255)
            ->allowEmptyString('video_redhat', false);

        $validator
            ->integer('enterprise')
            ->requirePresence('enterprise', 'create')
            ->allowEmptyString('enterprise', false);

        return $validator;
    }
}
