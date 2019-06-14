<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Documentation Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $link
 * @property string $video
 * @property int $category
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\DocumentationRelation[] $documentation_relations
 */
class Documentation extends Entity
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
        'number' => true,
        'title' => true,
        'description' => true,
        'link' => true,
        'video' => true,
        'video_ubuntu' => true,
        'video_centos' => true,
        'video_redhat' => true,
        'category_id' => true,
        'enterprise' => true,
        'created' => true,
        'modified' => true,
        'documentation_relations' => true
    ];
}
