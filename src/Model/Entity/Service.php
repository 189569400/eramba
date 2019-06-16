<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Service Entity
 *
 * @property int $id
 * @property string $number
 * @property int $type
 * @property int $version
 * @property \Cake\I18n\FrozenTime $start_date
 * @property int $online_trainings_hours
 * @property int $onsite_workshops_days
 * @property float $price
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ServiceBillingInfo $service_billing_info
 */
class Service extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'number' => false,
        'type' => true,
        'version' => true,
        'start_date' => true,
        'online_trainings_hours' => true,
        'onsite_workshops_days' => true,
        'price' => true,
        'created' => true,
        'modified' => true,
        'service_billing_information' => true
    ];
}
