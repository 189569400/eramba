<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GithubIssueLabel Entity
 *
 * @property int $id
 * @property string $name
 * @property string $color
 * @property bool $is_default
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $issue_id
 *
 * @property \App\Model\Entity\GithubIssue $github_issue
 */
class GithubIssueLabel extends Entity
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
        'color' => true,
        'is_default' => true,
        'created' => true,
        'modified' => true,
        'issue_id' => true,
        'github_issue' => true
    ];
}
