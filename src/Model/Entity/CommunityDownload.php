<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CommunityDownload Entity
 *
 * @property int $id
 * @property int|null $country_id
 * @property string $name
 * @property string $email
 *
 * @property \App\Model\Entity\Country $country
 */
class CommunityDownload extends Entity
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
        'country_id' => true,
        'state_id' => true,
        'city_id' => true,
        'name' => true,
        'email' => true,
        'country' => true
    ];
}
