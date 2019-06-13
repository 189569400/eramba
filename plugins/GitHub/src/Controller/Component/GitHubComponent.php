<?php
namespace GitHub\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Http\Client;
use Cake\Utility\Hash;

/**
 * GitHub component
 */
class GitHubComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    	'token' => 'd149f26880d070e9edf3126d940107248bfe14e4',
    	'baseUrl' => 'https://api.github.com/repos/eramba/eramba_v2/'
    ];

    /**
     * Get milestones from github
     * @return array Array with milestones
     */
    public function getMilestones()
    {
    	return $this->sendRequest('milestones');
    }

    /**
     * Get issue/issues from github
     * @param  string $issue Issue number
     * @param  string $key   Options: labels (get all issue labels), owner (get owner of the issue)
     * @return array         Array with results
     */
    public function getIssues($issue = null, $key = null, $options = [])
    {
    	$supportedKeys = [
    		'labels' => [
    			'direct' => true
    		],
    		'owner' => [
    			'direct' => false,
    			'path' => 'user.login'
    		]
    	];

    	$useLocalMethod = false;

    	$action = 'issues';
    	if (!empty($issue)) {
    		$action .= '/' . $issue;

    		if (!empty($key) &&
    			array_key_exists($key, $supportedKeys) &&
    			$supportedKeys[$key]['direct'] == true) {
    				$action .= '/' . $key;
    		}
    	}

    	if (!empty($options)) {
    		$action .= '?';
    		foreach ($options as $key => $val) {
	    		$action .= '&' . $key . '=' . $val;
	    	}
    	}

    	$results = $this->sendRequest($action);
    	if (!empty($supportedKeys[$key]['path'])) {
    		return Hash::get($results, $supportedKeys[$key]['path']);
    	} else {
    		return $results;
    	}
    }

    protected function sendRequest($action)
    {
    	$curl = curl_init($this->getConfig('baseUrl') . $action);
    	curl_setopt_array($curl, [
    		CURLOPT_CUSTOMREQUEST => 'GET',
    		CURLOPT_USERAGENT => 'eramba',
    		CURLOPT_SSL_VERIFYPEER => false,
    		CURLOPT_RETURNTRANSFER => true,
    		// CURLOPT_HEADER => true,
    		CURLOPT_HTTPHEADER => [
    			"Authorization: token {$this->getConfig('token')}"
    		]
    	]);

    	return json_decode(curl_exec($curl), true);
    }
}
