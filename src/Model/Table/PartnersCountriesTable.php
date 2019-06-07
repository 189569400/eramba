<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PartnersCountries Model
 *
 * @property \App\Model\Table\PartnersTable|\Cake\ORM\Association\BelongsTo $Partners
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \App\Model\Entity\PartnersCountry get($primaryKey, $options = [])
 * @method \App\Model\Entity\PartnersCountry newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PartnersCountry[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PartnersCountry|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartnersCountry saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PartnersCountry patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PartnersCountry[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PartnersCountry findOrCreate($search, callable $callback = null, $options = [])
 */
class PartnersCountriesTable extends Table
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

        $this->setTable('partners_countries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Partners', [
            'foreignKey' => 'partner_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
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
        $rules->add($rules->existsIn(['partner_id'], 'Partners'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));

        return $rules;
    }
}
