<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Hash;

/**
 * Partners Controller
 */
class PartnersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Crud->enable(['index']);
    }

    public function index()
    {
        $this->setPartners();

        return $this->Crud->execute();
    }

    protected function setPartners()
    {
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

        $partners = $this->Partners->find('all')
        ->order([
            'Partners.name' => 'ASC'
        ])
        ->contain('Countries')
        ->toArray();

        $partnersCountries = Hash::extract($partners, "{n}.countries.{n}.id");

        $this->loadModel('Countries');
        $countryOptions = $this->Countries->find('list', [
            'keyField' => 'id',
            'valueField' => 'name'
        ])->order([
            'Countries.name' => 'ASC'
        ])->toArray();

        foreach ($countryOptions as $key => $val) {
            if (!in_array($key, $partnersCountries)) {
                unset($countryOptions[$key]);
            }
        }
        
        $this->set(compact('partners', 'countryOptions'));
    }
}
