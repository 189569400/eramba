<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity
 *
 * @property int $id
 * @property string $name
 * @property int $state_id
 * @property int $country_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $flag
 *
 * @property \App\Model\Entity\State $state
 * @property \App\Model\Entity\Country $country
 */
class City extends Entity
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
        'name' => true,
        'state_id' => true,
        'country_id' => true,
        'created' => true,
        'modified' => true,
        'flag' => true,
        'state' => true,
        'country' => true
    ];
}
