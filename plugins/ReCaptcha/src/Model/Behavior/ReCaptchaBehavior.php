<?php
namespace ReCaptcha\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Event\Event;

/**
 * ReCaptcha behavior
 */
class ReCaptchaBehavior extends Behavior
{
	protected $reCaptcha = true;

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function beforeSave(Event $event, $entity, $options = [])
    {
        if (!$this->reCaptcha) {
            return false;
        }
    }

    public function setReCaptchaStatus($status)
    {
        $this->reCaptcha = $status == true ? true : false;
    }
}
