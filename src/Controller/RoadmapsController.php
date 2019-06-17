<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Exception\Exception;
use Cake\Utility\Hash;

/**
 * Roadmaps Controller
 */
class RoadmapsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('GitHub.GitHub');

        $this->modelClass = false;

        $this->Crud->enable(['index']);

        $this->loadModel('GithubMilestones');
        $this->loadModel('GithubIssues');
        $this->loadModel('GithubIssueLabels');
    }

    public function index()
    {
        $milestones = $this->GithubMilestones->find('all', [
            'contain' => [
                'GithubIssues' => [
                    'GithubIssueLabels'
                ]
            ]
        ])->toArray();

        $longTerm = null;
        $shortTerm = null;
        $release = null;
        foreach ($milestones as $milestone) {
            if ($milestone->title === 'Long Term Roadmap') {
                $longTerm = $milestone;
            } elseif ($milestone->title === 'Short Term Roadmap') {
                $shortTerm = $milestone;
            } elseif (strpos($milestone->title, 'Release') !== false) {
                $release = $milestone;
            }
        }

        $this->set(compact('longTerm', 'shortTerm', 'release'));

        return $this->Crud->execute();
    }

    public function update($secKey)
    {
        $this->autoRender = false;

        $updateSecurityKey = file_get_contents(CONFIG . 'roadmap_sec_key.txt');
        if ($secKey === $updateSecurityKey) {
            //
            // Clean up tables
            $this->GithubMilestones->deleteAll([]);
            $this->GithubIssues->deleteAll([]);
            $this->GithubIssueLabels->deleteAll([]);
            // 

            //
            // Save actual data from GitHub
            $milestones = $this->GitHub->getMilestones();
            $allowedMilestones = [
                'Long Term Roadmap',
                'Short Term Roadmap',
                'Release'
            ];

            if (array_key_exists('message', $milestones)) {
                echo $milestones['message'];
            } else {
                foreach ($milestones as $milestoneData) {
                    $allowed = false;
                    foreach ($allowedMilestones as $am) {
                        if (strpos($milestoneData['title'], $am) !== false) {
                            $allowed = true;
                            break;
                        }
                    }

                    if (!$allowed) {
                        continue;
                    }

                    $milestone = $this->GithubMilestones->newEntity();
                    $milestone->number = $milestoneData['number'];
                    $milestone->title = $milestoneData['title'];
                    $milestone->description = $milestoneData['description'];
                    $milestone->open_issues = $milestoneData['open_issues'];
                    $milestone->closed_issues = $milestoneData['closed_issues'];
                    $milestone->state = $milestoneData['state'];
                    $milestone->created_at = $milestoneData['created_at'];
                    $milestone->updated_at = $milestoneData['updated_at'];
                    $milestone->due_on = $milestoneData['due_on'];
                    $milestone->closed_at = $milestoneData['closed_at'];

                    if ($this->GithubMilestones->save($milestone)) {
                        $issues = $this->GitHub->getIssues(null, null, [
                            'per_page' => 100,
                            'milestone' => $milestone->number
                        ]);
                        foreach ($issues as $issueData) {
                            $issue = $this->GithubIssues->newEntity();
                            $issue->number = $issueData['number'];
                            $issue->title = $issueData['title'];
                            $issue->owner = Hash::get($issueData, 'user.login', '');
                            $issue->state = $issueData['state'];
                            $issue->milestone_id = $milestone->id;
                            $issue->created_at = $issueData['created_at'];
                            $issue->updated_at = $issueData['updated_at'];
                            $issue->closed_at = $issueData['closed_at'];

                            if ($this->GithubIssues->save($issue)) {
                                $issueLabels = Hash::get($issueData, 'labels', []);
                                foreach ($issueLabels as $labelData) {
                                    $label = $this->GithubIssueLabels->newEntity();
                                    $label->name = $labelData['name'];
                                    $label->color = $labelData['color'];
                                    $label->is_default = $labelData['default'] == true ? 1 : 0;
                                    $label->issue_id = $issue->id;

                                    $this->GithubIssueLabels->save($label);
                                }
                            }
                        }
                    }
                }

                echo __('Successfully updated');
            }
            //
        } else {
            throw new Exception('You don\'t have permission to do this action');
        }
    }
}
