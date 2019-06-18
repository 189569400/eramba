<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DocumentationVideo Entity
 *
 * @property int $id
 * @property int $documentation_id
 * @property string $video
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Documentation $documentation
 */
class DocumentationVideo extends Entity
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
        'title' => true,
        'video' => true,
        'created' => true,
        'modified' => true,
        'documentation' => true
    ];
}
