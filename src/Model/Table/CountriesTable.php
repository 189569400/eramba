<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Countries Model
 *
 * @property |\Cake\ORM\Association\HasMany $Cities
 * @property |\Cake\ORM\Association\HasMany $CommunityDownloads
 * @property |\Cake\ORM\Association\HasMany $Contacts
 * @property |\Cake\ORM\Association\HasMany $ServiceBillingInformations
 * @property |\Cake\ORM\Association\HasMany $States
 * @property |\Cake\ORM\Association\BelongsToMany $Partners
 *
 * @method \App\Model\Entity\Country get($primaryKey, $options = [])
 * @method \App\Model\Entity\Country newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Country[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Country|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Country saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Country patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Country[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Country findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CountriesTable extends Table
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

        $this->setTable('countries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Cities', [
            'foreignKey' => 'country_id'
        ]);
        $this->hasMany('CommunityDownloads', [
            'foreignKey' => 'country_id'
        ]);
        $this->hasMany('Contacts', [
            'foreignKey' => 'country_id'
        ]);
        $this->hasMany('ServiceBillingInformations', [
            'foreignKey' => 'country_id'
        ]);
        $this->hasMany('States', [
            'foreignKey' => 'country_id'
        ]);
        $this->belongsToMany('Partners', [
            'foreignKey' => 'country_id',
            'targetForeignKey' => 'partner_id',
            'joinTable' => 'partners_countries'
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
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('iso3')
            ->maxLength('iso3', 3)
            ->allowEmptyString('iso3');

        $validator
            ->scalar('iso2')
            ->maxLength('iso2', 2)
            ->allowEmptyString('iso2');

        $validator
            ->scalar('phonecode')
            ->maxLength('phonecode', 255)
            ->allowEmptyString('phonecode');

        $validator
            ->scalar('capital')
            ->maxLength('capital', 255)
            ->allowEmptyString('capital');

        $validator
            ->scalar('currency')
            ->maxLength('currency', 255)
            ->allowEmptyString('currency');

        $validator
            ->boolean('flag')
            ->allowEmptyString('flag', false);

        return $validator;
    }

    public function getCountryName($id)
    {
        $country = $this->find('all')
            ->select(['name'])
            ->where([
                'id' => $id
            ])
            ->first();

        $name = "";
        if (!empty($country)) {
            $name = $country->name;
        }

        return $name;
    }
}
