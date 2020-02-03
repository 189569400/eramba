<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServiceBillingInformation Entity
 *
 * @property int $id
 * @property int $service_id
 * @property string $company_name
 * @property string $company_address
 * @property int $country_id
 * @property string $city
 * @property string $zip_code
 * @property string $vat_number
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $currency
 * @property int $payment_type
 *
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\Country $country
 */
class ServiceBillingInformation extends Entity
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
        'service_id' => true,
        'company_name' => true,
        'company_address' => true,
        'country_id' => true,
        'state' => true,
        'city' => true,
        'zip_code' => true,
        'vat_number' => true,
        'name' => true,
        'surname' => true,
        'email' => true,
        'currency' => true,
        'payment_type' => true,
        'notes' => true,
        'service' => true,
        'country' => true
    ];
}
