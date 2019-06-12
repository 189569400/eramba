<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GithubIssue Entity
 *
 * @property int $id
 * @property string $number
 * @property string $title
 * @property int|null $milestone_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\GithubMilestone $github_milestone
 */
class GithubIssue extends Entity
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
        'milestone_id' => true,
        'created' => true,
        'modified' => true,
        'github_milestone' => true,
        'state' => true,
        'created_at' => true,
        'updated_at' => true,
        'closed_at' => true
    ];
}
