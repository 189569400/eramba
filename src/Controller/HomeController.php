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
        
        $counters = [
            'downloads' => [
                'name' => __('Downloads in 2018'),
                'value' => 5000,
                'delay' => null,
                'duration' => 2000
            ],
            'community_users' => [
                'name' => __('Community Users'),
                'value' => 6560,
                'delay' => 100,
                'duration' => 2000
            ],
            'enterprise_users' => [
                'name' => __('Enterprise Users'),
                'value' => 200,
                'delay' => 200,
                'duration' => 1500
            ],
            'releases' => [
                'name' => __('Releases in 2018'),
                'value' => 50,
                'delay' => 300,
                'duration' => 1500
            ]
        ];

        $this->set(compact('counters'));
    }
}
