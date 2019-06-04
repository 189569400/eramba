<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Home Controller
 */
class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->modelClass = false;
    }

    public function index()
    {
        $this->setLatestRls();
        $this->setCounters();

        return $this->Crud->execute();
    }

    protected function setLatestRls()
    {
        $latestRls = '5th Feb 2019';

        $this->set(compact('latestRls'));
    }

    public function setCounters()
    {
        //
        // Load these numbers from file (one file for one number so esteban can update it easily with cron)
        // Files:
        // - downloads.txt
        // - community_users.txt
        // - enterprise_users.txt
        // - releases.txt
        //
        
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

            $counters[$key]['value'] = file_get_contents($filePath);
        }

        $this->set(compact('counters'));
    }
}
