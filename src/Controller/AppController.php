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
                    'className' => '\App\Crud\Action\SectionAction',
                    'enabled' => false
                ],
                'add' => [
                    'className' => 'Crud.Add',
                    'enabled' => false,
                    'messages' => [
                        'success' => [
                            'params' => [
                                'class' => 'success'
                            ]
                        ],
                        'error' => [
                            'params' => [
                                'class' => 'danger'
                            ]
                        ]
                    ]
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
        /**
         * Set menu items which will be displayed on every page header
         * Options of each item and subitem:
         *  - name: Name of the menu item (mandatory)
         *  - link: Link to which menu item points to (default is _self) (mandatory)
         *  - target: Where should link be opened (_self, _blank) (optional)
         *  - subItems: Sub items which will be displayed under main item (each sub item has the same options as main item) (optional)
         * @var array
         */
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
                        'link' => '/blog',
                        'target' => '_blank'
                    ],
                    [
                        'name' => __('Roadmap'),
                        'link' => '/roadmap'
                    ],
                    [
                        'name' => __('Forum'),
                        'link' => '/forum',
                        'target' => '_blank'
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
