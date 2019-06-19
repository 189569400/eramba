<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ReleasesTable;

/**
 * Home Controller
 */
class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->modelClass = false;

        $this->Crud->enable(['index']);
    }

    public function index()
    {
        $this->setLatestRls();
        $this->setCounters();

        return $this->Crud->execute();
    }

    protected function setLatestRls()
    {
        $this->loadModel('Releases');

        $eRls = $this->Releases->find('all')
            ->select([
                'release_date'
            ])
            ->where([
                'type' => ReleasesTable::TYPE_ENTERPRISE
            ])->first();

        $cRls = $this->Releases->find('all')
            ->select([
                'release_date'
            ])
            ->where([
                'type' => ReleasesTable::TYPE_COMMUNITY
            ])->first();


        $latestEnterpriseRls = !empty($eRls) ? date('F d, Y', strtotime($eRls->release_date)) : __('No Date');
        // $latestCommunityRls = !empty($cRls) ? $cRls->release_date : __('No Date');
        $latestCommunityRls = 'March 19, 2018';

        $this->set(compact('latestEnterpriseRls', 'latestCommunityRls'));
    }

    public function setCounters()
    {
        $countersFiles = [
            'downloads' => 'downloads.txt',
            'community_users' => 'community_users.txt',
            'enterprise_users' => 'enterprise_users.txt',
            'releases' => 'releases.txt'
        ];

        $counters = [
            'downloads' => [
                'name' => __('Downloads in 2018'),
                'value' => 0,
                'delay' => null,
                'duration' => 2000
            ],
            'community_users' => [
                'name' => __('Community Users'),
                'value' => 0,
                'delay' => 100,
                'duration' => 2000
            ],
            'enterprise_users' => [
                'name' => __('Enterprise Users'),
                'value' => 0,
                'delay' => 200,
                'duration' => 1500
            ],
            'releases' => [
                'name' => __('Releases in 2018'),
                'value' => 0,
                'delay' => 300,
                'duration' => 1500
            ]
        ];

        foreach ($countersFiles as $key => $file) {
            $filePath = WWW_ROOT . 'resources' . DS . 'home' . DS . 'counters' . DS . $file;

            if (!file_exists($filePath)) {
                continue;
            }

            $counters[$key]['value'] = intval(file_get_contents($filePath));
        }

        $this->set(compact('counters'));
    }
}
