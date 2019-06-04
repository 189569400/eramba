<?php
namespace App\Crud\Action;

use Crud\Action\BaseAction;

class SectionAction extends BaseAction
{
    /**
     * Default settings
     *
     * @var array
     */
    protected $_defaultConfig = [
        'enabled' => true,
        'view' => null,
        'viewVar' => null,
        'serialize' => [],
        'api' => [
            'success' => [
                'code' => 200
            ],
            'error' => [
                'code' => 400
            ]
        ]
    ];

    /**
    * Generic handler for all HTTP verbs
    *
    * @return void
    */
    protected function _handle()
    {
        $subject = $this->_subject();

        $this->_trigger('beforeRender', $subject);
    }

}