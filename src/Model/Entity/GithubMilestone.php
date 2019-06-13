<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GithubMilestone Entity
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property string $description
 * @property int $open_issues
 * @property int $closed_issues
 * @property string $state
 * @property \Cake\I18n\FrozenTime $created_at
 * @property \Cake\I18n\FrozenTime $updated_at
 * @property \Cake\I18n\FrozenTime $due_on
 * @property \Cake\I18n\FrozenTime $closed_at
 */
class GithubMilestone extends Entity
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
        'open_issues' => true,
        'closed_issues' => true,
        'state' => true,
        'created_at' => true,
        'updated_at' => true,
        'due_on' => true,
        'closed_at' => true
    ];
}
