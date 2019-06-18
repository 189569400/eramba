<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * CommunityDownloads Model
 *
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \App\Model\Entity\CommunityDownload get($primaryKey, $options = [])
 * @method \App\Model\Entity\CommunityDownload newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CommunityDownload[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CommunityDownload|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommunityDownload saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CommunityDownload patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CommunityDownload[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CommunityDownload findOrCreate($search, callable $callback = null, $options = [])
 */
class CommunityDownloadsTable extends Table
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

        $this->setTable('community_downloads');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('ReCaptcha.ReCaptcha');

        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id'
        ]);

        $this->belongsTo('States', [
            'foreignKey' => 'state_id'
        ]);

        $this->belongsTo('Cities', [
            'foreignKey' => 'city_id'
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
            ->integer('country_id')
            ->requirePresence('country_id', 'create')
            ->allowEmptyString('country_id', false);

        $validator
            ->integer('state_id')
            ->requirePresence('state_id', 'create')
            ->allowEmptyString('state_id', true);

        $validator
            ->integer('city_id')
            ->requirePresence('city_id', 'create')
            ->allowEmptyString('city_id', true);

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->boolean('policy_consent')
            ->requirePresence('policy_consent', 'create')
            ->equals('policy_consent', true, 'You need to consent with our privacy policy', 'create');

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
        // $rules->add($rules->isUnique(['email']));
        // $rules->add($rules->existsIn(['country_id'], 'Countries'));

        return $rules;
    }

    public function beforeSave(Event $event, $entity, $options = [])
    {
        if ($entity->country_id == -1 || !$this->exists(['id' => $entity->country_id])) {
            $entity->country_id = null;
        }
        if ($entity->state_id == -1 || !$this->exists(['id' => $entity->state_id])) {
            $entity->state_id = null;
        }
        if ($entity->city_id == -1 || !$this->exists(['id' => $entity->city_id])) {
            $entity->city_id = null;
        }
    }
}
