<?php
namespace ReCaptcha\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Event\Event;
use Cake\Http\Client;

/**
 * ReCaptcha component
 */
class ReCaptchaComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    	'secret' => '6LcDyaIUAAAAAKFOdSe1z80l0R1nkpwgo5QWs0H4'
    ];

    public function beforeFilter(Event $event)
    {
    	$this->getController()->Security->setConfig('unlockedFields', [
            'g-recaptcha-response'
        ]);

        if ($this->getController()->getRequest()->getParam('action') === 'add') {
            $this->getController()->Crud->on('beforeSave', function(Event $event) {
                if (!$this->validateReCaptcha()) {
                    $this->getController()->set('recaptchaError', true);
                    $this->getController()->{$this->getController()->modelClass}->setReCaptchaStatus(false);
                }
            });
        }
    }

    public function validateReCaptcha()
    {
        $data = $this->getController()->getRequest()->getData();

        $rcToken = $data['g-recaptcha-response'];
        $http = new Client();

        $response = $http->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $this->getConfig('secret'),
            'response' => $rcToken
        ]);

        $gJson = $response->getJson();
        if ($gJson['success']) {
            return true;
        } else {
            return false;
        }
    }

    public function beforeRender(Event $event)
    {
        $this->getController()->viewBuilder()->setHelpers(['ReCaptcha.ReCaptcha']);
    }
}
