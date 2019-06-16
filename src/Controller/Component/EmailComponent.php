<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Email component
 */
class EmailComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [
    	'sendTo' => 'support@eramba.org',
    	'subject' => "",
    	'template' => ''
    ];

    public function sendEmail($name, $from, $vars = [])
    {
        $email = new Email('default');
        $email->setEmailFormat('html')
            ->setFrom([$from => $name])
            ->setTo($this->getConfig('sendTo'))
            ->setSubject($this->getConfig('subject'));

        $email->viewBuilder()->setLayout('default');
        $email->viewBuilder()->setTemplate($this->getConfig('template'));

        $email->setViewVars($vars);

        $email->send();
    }
}
