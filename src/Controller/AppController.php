<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Crud\Controller\ControllerTrait;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    use ControllerTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Crud.Crud', [
            'actions' => [
                'index' => [
                    'className' => '\App\Crud\Action\SectionAction'
                ],
                'add' => [
                    'className' => 'Crud.Add',
                    'enabled' => false
                ]
            ]
        ]);

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        $this->loadComponent('Security');
    }

    public function beforeRender(Event $event)
    {
        $this->setHeader();
    }

    protected function setHeader()
    {
        $menuItems = [
            [
                'name' => __('Resources'),
                'link' => '#',
                'subItems' => [
                    [
                        'name' => __('Documentation'),
                        'link' => ''
                    ],
                    [
                        'name' => _('Online Demo'),
                        'link' => '/online-demo'
                    ],
                    [
                        'name' => __('Community Download'),
                        'link' => ''
                    ],
                    [
                        'name' => __('Blog'),
                        'link' => '/blog'
                    ],
                    [
                        'name' => __('Roadmap'),
                        'link' => '/roadmap'
                    ],
                    [
                        'name' => __('Forum'),
                        'link' => [
                            'controller' => '/forum'
                        ]
                    ]
                ]
            ],
            [
                'name' => __('Paid Services'),
                'link' => [
                    'controller' => 'services',
                    'action' => 'index'
                ]
            ],
            [
                'name' => __('Partners'),
                'link' => [
                    'controller' => 'partners',
                    'action' => 'index'
                ]
            ],
            [
                'name' => __('Contact Us'),
                'link' => '/contact-us'
            ]
        ];

        $this->set(compact('menuItems'));
    }
}
