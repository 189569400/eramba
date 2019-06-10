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

    public static function getTypeOptions()
    {
        $types = [
            self::TYPE_ENTERPRISE_QUOTE => __('Enterprise Quote'),
            self::TYPE_COMMUNITY_SAAS_QUOTE => __('Community SaaS Quote'),
            self::TYPE_DEMO_CALL => __('Demo Call'),
            self::TYPE_BUG_REPORT => __('Bug Report'),
            self::TYPE_PARTNER_SIGN_UP => __('Partner SignUp')
        ];

        return $types;
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

        return $rules;
    }

    public function beforeSave(Event $event, $entity, $options = [])
    {
        if (!$this->reCaptcha) {
            return false;
        }
    }

    public function setReCaptchaStatus($status)
    {
        $this->reCaptcha = $status == true ? true : false;
    }
}
