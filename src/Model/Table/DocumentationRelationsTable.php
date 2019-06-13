<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DocumentationRelations Model
 *
 * @property \App\Model\Table\DocumentationsTable|\Cake\ORM\Association\BelongsTo $Documentations
 * @property \App\Model\Table\DocumentationsTable|\Cake\ORM\Association\BelongsTo $Documentations
 *
 * @method \App\Model\Entity\DocumentationRelation get($primaryKey, $options = [])
 * @method \App\Model\Entity\DocumentationRelation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DocumentationRelation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DocumentationRelation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentationRelation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DocumentationRelation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentationRelation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DocumentationRelation findOrCreate($search, callable $callback = null, $options = [])
 */
class DocumentationRelationsTable extends Table
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

        $this->setTable('documentation_relations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Documentations', [
            'foreignKey' => 'documentation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Documentations', [
            'foreignKey' => 'related_documentation_id',
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
        $rules->add($rules->existsIn(['documentation_id'], 'Documentations'));
        $rules->add($rules->existsIn(['related_documentation_id'], 'Documentations'));

        return $rules;
    }
}
