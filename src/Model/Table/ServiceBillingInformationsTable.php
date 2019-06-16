<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceBillingInformations Model
 *
 * @property \App\Model\Table\ServicesTable|\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\CountriesTable|\Cake\ORM\Association\BelongsTo $Countries
 *
 * @method \App\Model\Entity\ServiceBillingInformation get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServiceBillingInformation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ServiceBillingInformation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceBillingInformation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceBillingInformation saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceBillingInformation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceBillingInformation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceBillingInformation findOrCreate($search, callable $callback = null, $options = [])
 */
class ServiceBillingInformationsTable extends Table
{
    const CURRENCY_EUR = 1;

    public static function getCurrencies()
    {
        return [
            self::CURRENCY_EUR => __('EUR')
        ];
    }

    const PAYMENT_TYPE_BANK_TRANSFER = 1;
    const PAYMENT_TYPE_CREDIT_CARD = 2;

    public static function getPaymentTypes()
    {
        return [
            self::PAYMENT_TYPE_BANK_TRANSFER => __('Bank Transfer'),
            self::PAYMENT_TYPE_CREDIT_CARD => __('Credit Card (100€ fee)')
        ];
    }

    const PAYMENT_PRICE_BANK_TRANSFER = 0;
    const PAYMENT_PRICE_CREDIT_CARD = 100;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('service_billing_informations');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Countries', [
            'foreignKey' => 'country_id',
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

        $validator
            ->scalar('company_name')
            ->maxLength('company_name', 255)
            ->requirePresence('company_name', 'create')
            ->allowEmptyString('company_name', false);

        $validator
            ->scalar('company_address')
            ->maxLength('company_address', 255)
            ->requirePresence('company_address', 'create')
            ->allowEmptyString('company_address', false);

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->requirePresence('city', 'create')
            ->allowEmptyString('city', false);

        $validator
            ->scalar('zip_code')
            ->maxLength('zip_code', 50)
            ->requirePresence('zip_code', 'create')
            ->allowEmptyString('zip_code', false);

        $validator
            ->scalar('vat_number')
            ->maxLength('vat_number', 255)
            ->requirePresence('vat_number', 'create')
            ->allowEmptyString('vat_number', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->scalar('surname')
            ->maxLength('surname', 255)
            ->requirePresence('surname', 'create')
            ->allowEmptyString('surname', false);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->allowEmptyString('email', false);

        $validator
            ->integer('currency')
            ->requirePresence('currency', 'create')
            ->allowEmptyString('currency', false);

        $validator
            ->integer('payment_type')
            ->requirePresence('payment_type', 'create')
            ->allowEmptyString('payment_type', false);

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['service_id'], 'Services'));
        $rules->add($rules->existsIn(['country_id'], 'Countries'));

        return $rules;
    }
}
