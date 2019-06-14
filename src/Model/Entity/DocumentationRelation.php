<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentationRelation Entity
 *
 * @property int $id
 * @property int $documentation_id
 * @property int $related_documentation_id
 *
 * @property \App\Model\Entity\Documentation $documentation
 */
class DocumentationRelation extends Entity
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
        'documentation_id' => true,
        'related_documentation_id' => true,
        'documentation' => true
    ];
}
