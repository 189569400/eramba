<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PartnersCountry Entity
 *
 * @property int $id
 * @property int $partner_id
 * @property int|null $country_id
 *
 * @property \App\Model\Entity\Partner $partner
 * @property \App\Model\Entity\Country $country
 */
class PartnersCountry extends Entity
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
        'partner_id' => true,
        'country_id' => true,
        'partner' => true,
        'country' => true
    ];
}
