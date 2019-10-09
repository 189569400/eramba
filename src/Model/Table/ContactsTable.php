<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;

/**
 * Contacts Model
 *
 * @method \App\Model\Entity\Contact get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contact newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Contact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contact|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contact[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contact findOrCreate($search, callable $callback = null, $options = [])
 */
class ContactsTable extends Table
{
    protected $reCaptcha = true;

    //
    // Types of email
    const TYPE_ENTERPRISE_QUOTE = 1;
    const TYPE_COMMUNITY_SAAS_QUOTE = 2;
    const TYPE_DEMO_CALL = 3;
    const TYPE_BUG_REPORT = 4;
    const TYPE_PARTNER_SIGN_UP = 5;
    const TYPE_COMMUNITY_SAAS_TESTER = 6;

    public static function getTypes($type = null)
    {
        $types = [
            self::TYPE_ENTERPRISE_QUOTE => __('We need an Enterprise Service Quote'),
            #self::TYPE_COMMUNITY_SAAS_QUOTE => __('Community SaaS Quote'),
            #self::TYPE_COMMUNITY_SAAS_TESTER => __('We would like to be an early tester for the SaaS Community service'),
            self::TYPE_DEMO_CALL => __('We would like to schedulle a Demo Zoom Call'),
            self::TYPE_BUG_REPORT => __('We found a Bug'),
            self::TYPE_PARTNER_SIGN_UP => __('We are interested in becomming a Partner')
        ];

        if ($type !== null && array_key_exists($type, $types)) {
            return $types[$type];
        } else {
            return $types;
        }
    }
    //

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('contacts');
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

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
            ->scalar('type')
            ->maxLength('type', 255)
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->scalar('body')
            ->requirePresence('body', 'create')
            ->allowEmptyString('body', false);

        $validator
            ->boolean('gdpr_consent')
            ->requirePresence('gdpr_consent', 'create')
            ->equals('gdpr_consent', true, 'You need to consent with GDPR rules so we can process your information.', 'create');

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
        if (!$this->reCaptcha) {
            return false;
        }

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

    public function setReCaptchaStatus($status)
    {
        $this->reCaptcha = $status == true ? true : false;
    }
}
