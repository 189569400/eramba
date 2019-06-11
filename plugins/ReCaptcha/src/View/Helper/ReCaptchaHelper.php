<?php
namespace ReCaptcha\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * ReCaptcha helper
 */
class ReCaptchaHelper extends Helper
{
	public $helpers = ['Html'];

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    	'sitekey' => '6LcDyaIUAAAAALz7fnBULKDDmReuRFAUqeeQrlLW'
    ];

    public function getHtml()
    {
    	$rc = $this->Html->div('g-recaptcha', "", [
    		'data-sitekey' => $this->getConfig('sitekey')
    	]);
    	$error = "";
    	if (!empty($this->_View->get('recaptchaError'))) {
    		$error = $this->Html->div('error-message', "Please click on the CAPTCHA above to ensure you are h-u-m-a-n!");
    	}

    	return $this->Html->div('text-center mb-md', $rc . $error);
    }

    public function getScript()
    {
    	return $this->Html->script("https://www.google.com/recaptcha/api.js", [
		    'async', 'defer'
		]);
    }

}
