<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Country Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $iso3
 * @property string|null $iso2
 * @property string|null $phonecode
 * @property string|null $capital
 * @property string|null $currency
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $flag
 */
class Country extends Entity
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
        'iso3' => true,
        'iso2' => true,
        'phonecode' => true,
        'capital' => true,
        'currency' => true,
        'created' => true,
        'modified' => true,
        'flag' => true
    ];
}
