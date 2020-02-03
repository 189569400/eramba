<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\I18n\Number;
use App\Model\Table\ServiceBillingInformationsTable as SBIT;

/**
 * Services Model
 *
 * @property \App\Model\Table\ServiceBillingInfoTable|\Cake\ORM\Association\HasMany $ServiceBillingInfo
 *
 * @method \App\Model\Entity\Service get($primaryKey, $options = [])
 * @method \App\Model\Entity\Service newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Service[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Service|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Service[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Service findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServicesTable extends Table
{
    const TYPE_ENTERPRISE = 1;
    const TYPE_COMMUNITY_SAAS = 2;

    public static function getTypes($type = null)
    {
        $types = [
            self::TYPE_ENTERPRISE => __('Enterprise License'),
            self::TYPE_COMMUNITY_SAAS => __('Eramba Community - SaaS')
        ];

        if ($type !== null && array_key_exists($type, $types)) {
            return $types[$type];
        } else {
            return $types;
        }
    }

    const VERSION_PERM = 1;
    const VERSION_SAAS = 2;

    public static function getVersions($version = null)
    {
        $versions = [
            self::VERSION_PERM => __('On Premise - 2500 EUR / Year'),
            // self::VERSION_SAAS => __('On SaaS')
        ];

        if ($version !== null && array_key_exists($version, $versions)) {
            return $versions[$version];
        } else {
            return $versions;
        }
    }

    const VERSION_PERM_PRICE_EUR = 2500;
    const VERSION_PERM_PRICE_USD = 3000;
    const VERSION_PERM_PRICE_GBP = 2100;
    const VERSION_SAAS_PRICE_EUR = 0;
    const ONLINE_TRAININGS_HOUR_PRICE_EUR = 80;
    const ONSITE_WORKSHOPS_PRICE_EUR = 2500;

    public static function getPriceByCurrency($type, $currency = SBIT::CURRENCY_EUR)
    {
        $prices = [
            'PERM' => [
                SBIT::CURRENCY_EUR => 2500,
                SBIT::CURRENCY_USD => 3000,
                SBIT::CURRENCY_GBP => 2100
            ],
            'SAAS' => [
                SBIT::CURRENCY_EUR => 0,
                SBIT::CURRENCY_USD => 0,
                SBIT::CURRENCY_GBP => 0
            ],
            'ONLINE_TRAININGS' => [
                SBIT::CURRENCY_EUR => 80,
                SBIT::CURRENCY_USD => 80,
                SBIT::CURRENCY_GBP => 80
            ],
            'ONSITE_WORKSHOPS' => [
                SBIT::CURRENCY_EUR => 2500,
                SBIT::CURRENCY_USD => 2500,
                SBIT::CURRENCY_GBP => 2500
            ]
        ];

        return isset($prices[$type][$currency]) ? $prices[$type][$currency] : $prices[$type][SBIT::CURRENCY_EUR];
    }

    public static function getFriendlyPrice($price, $currency = SBIT::CURRENCY_EUR)
    {
        $convert = [
            SBIT::CURRENCY_EUR => 'EUR',
            SBIT::CURRENCY_USD => 'USD',
            SBIT::CURRENCY_GBP => 'GBP'
        ];
        return Number::currency($price, $convert[$currency], ['places' => 0]);
    }

    private $setNewQuoteNumber = false;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('services');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('ServiceBillingInformations', [
            'foreignKey' => 'service_id'
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
            ->maxLength('number', 30)
            ->allowEmptyString('number', true);

        $validator
            ->integer('type')
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->integer('version')
            ->requirePresence('version', 'create')
            ->allowEmptyString('version', false);

        $validator
            ->dateTime('start_date')
            ->requirePresence('start_date', 'create')
            ->allowEmptyDateTime('start_date', false);

        $validator
            ->integer('online_trainings_hours')
            ->requirePresence('online_trainings_hours', 'create')
            ->allowEmptyString('online_trainings_hours', false);

        $validator
            ->integer('onsite_workshops')
            ->requirePresence('onsite_workshops', 'create')
            ->allowEmptyString('onsite_workshops', false);

        $validator
            ->numeric('price')
            ->allowEmptyString('price', true);

        return $validator;
    }

    public function beforeSave(Event $event, $entity, $options)
    {
        if (!$entity->isNew() && $entity->isDirty('number') && $this->setNewQuoteNumber == false) {
            $entity->number = $entity->getOriginal('number');
        }
    }

    public function afterSave($event, $entity, $options)
    {
        if ($entity->isNew()) {
            //
            // Generate new quote number
            $year = date('Y', strtotime($entity->created));
            $firstNums = substr($year, 0, 1) . substr($year, 2);
            $middleNums = '';
            if ($entity->id < 10) {
                $middleNums = '000000';
            } else if ($entity->id >= 10 && $entity->id < 100) {
                $middleNums = '00000';
            } else if ($entity->id >= 100 && $entity->id < 1000) {
                $middleNums = '0000';
            } else if ($entity->id >= 1000 && $entity->id < 10000) {
                $middleNums = '000';
            } else if ($entity->id >= 10000 && $entity->id < 100000) {
                $middleNums = '00';
            } else if ($entity->id >= 100000 && $entity->id < 1000000) {
                $middleNums = '0';
            } else if ($entity->id >= 1000000 && $entity->id < 10000000) {
                $middleNums = '';
            }
            
            $entity->number = 'QU-' . $firstNums . $middleNums . $entity->id;
            //
            
            //
            // Save price
            $entity->price = $this->calcPrice([
                'version' => $entity->version,
                'online_trainings_hours' => $entity->online_trainings_hours,
                'onsite_workshops' => $entity->onsite_workshops
            ]);
            //

            // Temporary allow to edit quote number
            $this->setNewQuoteNumber = true;

            $this->save($entity);

            // Don't allow changing quote number after save
            $this->setNewQuoteNumber = false;
            //
        }
    }

    public function calcPrice($data, $which = null, $currency = SBIT::CURRENCY_EUR)
    {
        $version = $data['version'];
        $online_trainings_hours = $data['online_trainings_hours'];
        $onsite_workshops = $data['onsite_workshops'];

        $price = 0;
        $priceVersion = 0;
        $priceOnlineTranings = 0;
        $priceOnsiteWorkshops = 0;
        if ($version == self::VERSION_PERM) {
            $priceVersion = self::getPriceByCurrency('PERM', $currency);
        } elseif ($version == self::VERSION_SAAS) {
            $priceVersion = self::getPriceByCurrency('SAAS', $currency);
        }

        $priceOnlineTranings = $online_trainings_hours * self::getPriceByCurrency('ONLINE_TRAININGS', $currency);

        if ($onsite_workshops == 1) {
            $priceOnsiteWorkshops = self::getPriceByCurrency('ONSITE_WORKSHOPS', $currency);
        }

        switch ($which) {
            case 'version': $price = $priceVersion;
                break;
            case 'online_trainings': $price = $priceOnlineTranings;
                break;
            case 'onsite_workshops': $price = $priceOnsiteWorkshops;
                break;
            default: $price = $priceVersion + $priceOnlineTranings + $priceOnsiteWorkshops;
                break;
        }

        return $price;
    }
}
