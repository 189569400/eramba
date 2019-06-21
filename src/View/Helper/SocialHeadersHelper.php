<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Routing\Router;
use Cake\Event\Event;

class SocialHeadersHelper extends Helper
{
	public $helpers = ['Html'];

	private $_headers = [];

    public function set($data = [])
    {
    	$this->_headers = array_merge($this->_headers, $data);
    }

    public function fetch() {
    	$defaults = [
    		'title' => !empty($this->_View->fetch('title')) ? $this->_View->fetch('title') : __('Eramba - Open IT GRC'),
    		'description' => __('Serving thousands of companies around the world, eramba is a popular open Governance, Risk and Compliance (GRC) solution.'),
    	];

    	$data = array_merge($defaults, $this->_headers);

    	$headers = [
			'og:title' => $data['title'],
    		'og:description' => $data['description'],
    		'og:image' => Router::url('/img/eramba-share.png', true),
    		'og:url' => Router::url(null, true),
    		'og:type' => 'article',
    		'og:site_name' => 'www.eramba.org',
    		'og:locale' => 'en_gb'
		];

		foreach ($headers as $name => $value) {
			$this->Html->meta(['property' => $name, 'content' => $value], null, ['block' => true]);
		}
    }

    public function beforeLayout(Event $event, $layoutFile)
    {
    	if ($event->getSubject()->getLayout() == 'default') {
    		$this->fetch();
    	}
    }
}
