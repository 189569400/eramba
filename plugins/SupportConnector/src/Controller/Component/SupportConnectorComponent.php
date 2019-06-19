<?php
namespace SupportConnector\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Http\Client;
use Cake\Utility\Hash;

/**
 * SupportConnector component
 */
class SupportConnectorComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    ];

    /**
     * Returns list of releases and their data in array
     * [
     *     'enterprise' => data(array),
     *     'community' => data(array)
     * ]
     * 
     * @return array
     */
    public function getReleases()
    {
        $http = new Client();

        $response = $http->get('https://support.eramba.org/releases/getReleases/test_key/5');

        return $response->getJson();
    }
}
